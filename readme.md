# laravel-community-bbs

## Installation
install git
install composer
git clone https://github.com/grkin2002/testlaravel.git projectname
cd projectname
composer install
php -S localhost:80 -t public
open url localhost in your browser

>database using sqlite
>create a database and inform .env
>php artisan key:generate
>php artisan migrate to create tables
>php artisan db:seed to populate tables

default user ['grkin2002@gmail.com' => '123']

>redis or memcached cache is required.

>homestead is recommended.