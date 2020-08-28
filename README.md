# Deploy
1) `composer install`
2) `cp .env.example .env` и настроить `.env` (логин, пароль и имя БД)
3) `php artisan migrate`
4) `php artisan db:seed` - чтобы сгенерировать рандомных юзеров и их транзакции
5) `php artisan parse:exchange_rate` - artisan команда для парсинга валюты. Предполагается, что каждый день в полночь по крону парсится курс валют
6) `php artisan test`

# JSON for postman request

Домен сайта: `{doman}`

### Создать пользователя

Отправлять на: `http://{doman}/api/create/user`
```json
{
    "nickname": "roman",
    "currency": "RUB"
}
```

Доступные валюты: `AUD`, `GBP`, `DKK`, `USD`, `EUR`, `KZT` и `RUB`

### Получить танзакции пользователя (по 10 на страницу, сортировка по дате: `ASC` или `DESC`)

Отправлять на: `http://{doman}/api/get-transactions/user?page=1`
```json
{
    "user_id": 1,
    "sort_by_date": "ASC"
}
```
`page` - это номер страницы с данными. Максимум 10 записей на страницу

### Создать транзакцию

Отправлять на: `http://{doman}/api/create/transaction`
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

Отправлять на: `http://{doman}/api/get-transactions/date`

```json
{
    "date": "2020-01-01"
}
```
