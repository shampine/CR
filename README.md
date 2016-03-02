# donation app

## config

The config is hardcoded into `/config/` for local requirements, either modify them there or use the `.env` file in the root to override.

## setup

In the root is a database dump, else you can manually setup the DB.

1) Create a database called `cr_dev` or override this in a `.env` file in the root.    
2) `composer install`  
3) `php artisan migrate`  
4) `php artisan db:seed`  

Any errors? Make sure `/storage/logs/` has the correct permissions for Apache2/Laravel to write to file.

The project config holds the url `cr.dev`, you can override this in the `.env` file in the root as well.  

## deliverables

[SQL to Create](https://github.com/shampine/donate/blob/master/database/migrations/2016_02_29_011632_create_database.php)  

[Donate](http://cr.dev/)  

[Reporting](http://cr.dev/reporting)  
