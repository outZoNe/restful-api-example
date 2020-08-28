# Deploy
1) `composer install`
2) `yarn prod`
3) `cp .env.example .env` и настроить `.env` (логин, пароль и имя БД)
4) `php artisan migrate`
5) `php artisan db:seed` - чтобы сгенерировать рандомных юзеров и их транзакции
6) `php artisan parse:exchange_rate` - artisan команда для парсинга валюты. Так же предполагается, что каждый день в полночь, через schedule автоматически парсится курс валюты на сутки. Если дело дойдет до продакшена, то незабываем поставить крон: `* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`

# JSON for postman request

Домен сайта: `{doman}`

### Создать пользователя

Отправлять на: `http://{doman}/api/create-user`
```json
{
    "nickname": "roman",
    "currency": "RUB"
}
```

Доступные валюты: `AUD`, `GBP`, `BYR`, `DKK`, `USD`, `EUR`, `ISK`, `KZT` и `RUB`

### Получить танзакции пользователя (по 10 на страницу, сортировка по дате: `ASC` или `DESC`)

Отправлять на: `http://{doman}/api/get-user-transactions`
```json
{
    "user_id": 1,
    "page": 1,
    "sort_by_date": "ASC"
}
```

### Создать транзакцию

Отправлять на: `http://{doman}/api/get-user-transactions`
```json
{
    "user_id": 1,
    "amount": 30000,
    "type": "income",
    "date": "2020-01-01 00:00:01"
}
```
`date` - дата создания транзакции с точностью до секунды
Доступные типы транзакций: `income` и `expense`

### Получение всех транзакций за определенную дату

Отправлять на: `http://{doman}/api/get-transactions-by-date`

```json
{
    "date": "2020-01-01",
    "page": 1,
    "sort_by_date": "ASC"
}
```
