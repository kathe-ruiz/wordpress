==============
Wordpress Base
==============

Wordpress project using wordpress-ansible and PHP Dot Env


************
Requirements
************

* PHP >= 5.5.x
* MySQL >= 5.5.x
* Composer

************
Installation
************

Clone the project ::

    git@github.com:swappsco/wordpress-base.git

Create a database ::

    mysql -u root
    CREATE DATABASE database_name;


Install composer dependencies ::

    composer install

Create .env file with the following variables and complete according to the needs: ::

    DB_NAME="database_name"
    DB_USER="root"
    DB_PASSWORD=""
    WP_DEBUG=true
    DB_HOST="127.0.0.1"
    AWS_ACCESS_KEY_ID=""
    AWS_SECRET_ACCESS_KEY=""


***************
Run the project
***************

Run the project ::

    sudo php -S 0.0.0.0:8888

View in the browser at http://localhost:8888
