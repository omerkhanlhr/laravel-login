![LARAVEL Developer](C:\Users\umar khan\Documents\project\public\images\james-harrison-vpOeXr5wmR4-unsplash.jpg)
# LARAVEL Login System
In this repository, you will learn how to create a login system with LARAVEL and PostgreSQL. This is a useful skill for web developers who want to authenticate users and protect their data.

I will guide you through the steps to set up the database, the routes, the views, and the controllers for the login system.

## Make Project Directory
- Launch Terminal
- write `larvel new proejct_name` in terminal
- write `laravel/breeze --dev` in terminal
- write `php artisan breeze:install` in terminal
- write `php artisan migrate` in terminal
- write `php artisan migrate` in terminal
- Run the Server `php artisan serve`

## connect laravel with pgadmin
- enabled the extensions in php.ini:

```
extension=php_pdo_pgsql.dll
extension=php_pdo_sqlite.dll
extension=php_pgsql.dll
```

- go to .env file
- put pgsql credentials
- ctrl+p and search for database.php
- find for relevant database credentials
- enter DB_DABASE
- enter DB_USERNAME & DB_PASWORD
- RUN `php artisan migrate`
