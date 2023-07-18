## Local Deploy via Docker

Clone project from GitLab

1. `cp .env.example .env` and set database connection variable, e.g.

``` 
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=user_name
DB_PASSWORD=password
```

2. `docker-compose build`
3. `docker-compose up -d`
4. Connect to docker container
    1. In PHPStorm: tab `Services` (macOS: `⌘8`)
    2. Create terminal for `tehnum-app` container
5. `composer install`
6. `php artisan key:generate`
7. `php artisan storage:link`
8. `chmod -R 777 ./storage/`
9. `php artisan optimize`
10. `php artisan migrate:fresh --seed`

## Admin

http://localhost:8000/admin/login

Admin credentials:

```
Email: admin@admin
Password: password
```

