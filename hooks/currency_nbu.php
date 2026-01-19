<?php
/**
 * WHMCS Currency Auto Update (NBU) - FREE
 * Updates WHMCS currency exchange rates once per day using NBU official rates.
 *
 * - Runs via DailyCronJob
 * - No margin
 * - No rounding
 * - No invoice recalculation
 */

use WHMCS\Database\Capsule;

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

add_hook('DailyCronJob', 1, function () {

    // NBU endpoint (JSON)
    $url = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';

    $response = @file_get_contents($url);
    if ($response === false) {
        return; // fail silently
    }

    $rates = json_decode($response, true);
    if (!is_array($rates)) {
        return;
    }

    // Get base currency from WHMCS
    $baseCurrency = Capsule::table('tblcurrencies')
        ->where('default', 1)
        ->first();

    if (!$baseCurrency) {
        return;
    }

    $baseCode = strtoupper($baseCurrency->code);

    // Build map: CURRENCY_CODE => RATE (UAH-based)
    $nbuRates = [];
    foreach ($rates as $rate) {
        if (!empty($rate['cc']) && !empty($rate['rate'])) {
            $nbuRates[strtoupper($rate['cc'])] = (float) $rate['rate'];
        }
    }

    // NBU base is UAH
    $nbuRates['UAH'] = 1.0;

    if (!isset($nbuRates[$baseCode])) {
        return;
    }

    $baseRateUAH = $nbuRates[$baseCode];

    // Update all non-base currencies
    $currencies = Capsule::table('tblcurrencies')
        ->where('code', '!=', $baseCode)
        ->get();

    foreach ($currencies as $currency) {
        $code = strtoupper($currency->code);

        if (!isset($nbuRates[$code])) {
            continue;
        }

        // WHMCS expects: 1 base currency = X foreign currency
        $rate = $baseRateUAH / $nbuRates[$code];

        if ($rate <= 0) {
            continue;
        }

        Capsule::table('tblcurrencies')
            ->where('id', $currency->id)
            ->update([
                'rate' => $rate,
            ]);
    }
});
