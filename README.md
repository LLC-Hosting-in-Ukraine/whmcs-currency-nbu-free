[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://stand-with-ukraine.pp.ua)

# WHMCS Currency Auto Update (NBU) – Free

🇬🇧 **English** | 🇺🇦 **Українська**

---

## 🇬🇧 Description

Free and lightweight WHMCS hook that automatically updates currency exchange
rates once per day using official data from the National Bank of Ukraine (NBU).

Designed for stable, predictable currency updates without affecting existing
invoices or financial history.

---

## 🇺🇦 Опис

Безкоштовний та легкий hook для WHMCS, який автоматично оновлює курси валют
один раз на добу, використовуючи офіційні дані Національного банку України (НБУ).

Призначений для стабільного та безпечного оновлення курсів без впливу
на вже створені рахунки та фінансову історію.

---

## 🇬🇧 Features
- Automatic daily update via WHMCS cron
- Official NBU exchange rates
- No API key required
- Safe: does NOT recalculate existing invoices

## 🇺🇦 Можливості
- Автоматичне щоденне оновлення через cron WHMCS
- Офіційні курси НБУ
- Не потребує API-ключа
- Безпечно: НЕ перераховує існуючі інвойси

---

## 🇬🇧 Requirements
- WHMCS 8.x+
- PHP 7.4+
- WHMCS cron enabled

## 🇺🇦 Вимоги
- WHMCS 8.x+
- PHP 7.4+
- Увімкнений cron WHMCS

---

## 🇬🇧 Installation
1. Copy the file: hooks/currency_nbu.php into: /includes/hooks/
2. Ensure WHMCS daily cron is running.

## 🇺🇦 Встановлення
1. Скопіюйте файл: hooks/currency_nbu.php у директорію: /includes/hooks/
2. Переконайтесь, що щоденний cron WHMCS працює.

---

## 🇬🇧 How It Works
- Runs on `DailyCronJob`
- Fetches UAH-based rates from NBU
- Detects WHMCS base currency
- Updates all other currencies relative to base currency
- Fails silently if NBU API is unavailable

## 🇺🇦 Як це працює
- Запускається через `DailyCronJob`
- Отримує курси валют від НБУ (базова валюта — UAH)
- Визначає базову валюту WHMCS
- Оновлює всі інші валюти відносно базової
- У разі помилки API нічого не змінює

---

## 🇬🇧 Limitations (Free Version)
- Only NBU provider
- Updates once per day
- No margin or rounding
- No logs or history
- No admin interface
- No invoice rate freeze

## 🇺🇦 Обмеження (Free-версія)
- Лише провайдер НБУ
- Оновлення 1 раз на добу
- Без маржі та округлення
- Без логів та історії
- Без адмін-інтерфейсу
- Без фіксації курсу для інвойсів

---

## 🇬🇧 Planned Pro Version
- Multiple providers (NBU, ECB, commercial APIs)
- Margin and rounding
- Invoice exchange-rate freeze
- Logs and history
- Admin UI
- Alerts and monitoring

## 🇺🇦 Запланована Pro-версія
- Кілька провайдерів (НБУ, ECB, комерційні API)
- Маржа та округлення
- Фіксація курсу інвойсу
- Логи та історія змін
- Адмін-інтерфейс
- Сповіщення та моніторинг

---

## License
MIT
