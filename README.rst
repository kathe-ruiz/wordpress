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
Use the project as multisite project
***************

add the following variable to your .env ::
    MULTISITE_DOMAIN=mydomain.com

install the site using the following command. Replace the user credentials with your desired credentials.

```
wp core multisite-install --title="Welcome to the WordPress" --admin_user="admin" --admin_password="password" --admin_email="admin@example.com" --skip-config=true
```

go to the url defined on MULTISITE_DOMAIN, login with the credentials and create the sites you need.

***************
Run the project
***************

Run the project ::

    sudo php -S 0.0.0.0:8888

View in the browser at http://localhost:8888


License
===============

Copyright (C) Smart Web Apps SAS - All Rights Reserved

Unauthorized copying of this repository and it's files, via any medium is strictly prohibited

Proprietary and confidential.

Owned by Swapps <hi@swapps.co>

