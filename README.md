# Deploy
1) `composer install`
2) `yarn prod`
3) `cp .env.example .env` и настроить `.env` (логин, пароль и имя БД)
4) `php artisan migrate`
5) `php artisan db:seed` - чтобы сгенерировать рандомных юзеров и их транзакции
