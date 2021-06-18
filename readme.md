## Base CRUDBooster with new Template + Laravel 5.8
you can use with three easy step

## STEP 1 : SETTING your .env file
```
DB_CONNECTION=your_database_type
DB_HOST=your_database_connection
DB_PORT=your_database_port
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

example :

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

## STEP 2 : run this command 
```php
php artisan migrate
```

```php
php artisan db:seed --class=CallTableMasterSeeder
```

## STEP 3 : you can login with this users
in your server : 
```
link: {your_server}/admin/login
usersname: admin@crocodic.com
password: 123456
```

in your locahost : 
```
link: http://locahost/{name_project}/admin/login
usersname: admin@crocodic.com
password: 123456
```

### have fun code. Good luck 👌🏻😁