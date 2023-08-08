# laravel-login
 Laravel LOGin susytem

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
