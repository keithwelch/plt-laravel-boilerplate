## Laravel 4.1 with Bootstrap 3.0 Boilerplate

### Setup

Run the following commands from project root:

    composer update
    composer dumpautoload -o
    php artisan generate:key
    php artisan migrate
    
Modify app/config/site.php (sitename)

Modify app/config/database.php (driver), then run:

    php artisan migrate

Modify app/config/app.php (timezone, url)

Signup a new user, then set is_admin, is_active to 1 (TODO Database Seeder for admin user)

If you're using sqlite driver, recommend following (TODO refactor this process):

    git rm app/database/production.sqlite
    git commit -a
    echo app/database/production.sqlite >> .gitignore
    touch app/database/production.sqlite
    
