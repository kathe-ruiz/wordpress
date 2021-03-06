<?php

/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information
* by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/

$loader = require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

define('SENTRY_DSN', getenv('SENTRY_DSN')?:"");

if(SENTRY_DSN){
    require_once __DIR__ . '/vendor/sentry/sentry/lib/Raven/Autoloader.php';
    Raven_Autoloader::register();
    $client = new Raven_Client(SENTRY_DSN);
    $error_handler = new Raven_ErrorHandler($client);
    $error_handler->registerExceptionHandler();
    $error_handler->registerErrorHandler();
    $error_handler->registerShutdownFunction();
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME'));
/** MySQL database username */
define('DB_USER', getenv('DB_USER'));
/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));
/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('MULTISITE_DOMAIN', getenv('MULTISITE_DOMAIN'));

if (MULTISITE_DOMAIN){
    define( 'WP_ALLOW_MULTISITE', true );
    define( 'MULTISITE', true );
    define( 'SUBDOMAIN_INSTALL', true );
    define( 'DOMAIN_CURRENT_SITE', MULTISITE_DOMAIN);
    define( 'PATH_CURRENT_SITE', '/' );
    define( 'SITE_ID_CURRENT_SITE', 1 );
    define( 'BLOG_ID_CURRENT_SITE', 1 );
    define( 'SUNRISE', 'on' );
}

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY', getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY'));
define('NONCE_KEY', getenv('NONCE_KEY'));
define('AUTH_SALT', getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT'));
define('NONCE_SALT', getenv('NONCE_SALT'));
/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'wp_';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress. A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define('WPLANG', '');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
$wp_debug = filter_var(getenv('WP_DEBUG'), FILTER_VALIDATE_BOOLEAN);
define('WP_DEBUG', $wp_debug);

define('SITE_STATUS', getenv('SITE_STATUS')?:"");

define( 'DBI_AWS_ACCESS_KEY_ID', getenv('AWS_ACCESS_KEY_ID') );
define( 'DBI_AWS_SECRET_ACCESS_KEY', getenv('AWS_SECRET_ACCESS_KEY'));
define('SUPERUSER', getenv("SUPERUSER")?:"");
define('WP_PAGES_LIMIT', getenv("WP_PAGES_LIMIT")?:null);

define('ACCOUNTANT_API_URL', getenv("ACCOUNTANT_API_URL")?:null);
define('ACCOUNTANT_API_TOKEN', getenv("ACCOUNTANT_API_TOKEN")?:null);

define('SSL_ON', filter_var(getenv('SSL_ON'), FILTER_VALIDATE_BOOLEAN));

if (SSL_ON == true) {
	$_SERVER['HTTPS']='on';
}
//controling WP_CACHE
define('WP_CACHE', filter_var(getenv('WP_CACHE'), FILTER_VALIDATE_BOOLEAN));

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('FONT_NAME', getenv("MAIN_FONT_NAME")?:"Montserrat");
define('PARAGRAPHS_SECONDARY_FONT_NAME', getenv("PARAGRAPHS_SECONDARY_FONT_NAME")?:"Playfair Display");
define('WP_SHOW_ALL_SIDEBAR_ITEMS', filter_var(
    getenv('SHOW_ALL_SIDEBAR_ITEMS'), FILTER_VALIDATE_BOOLEAN
    )?:False);

define('WPROCKETHELPERS_CUSTOM_VARNISH_IP', getenv("VARNISH_IP")?:'127.0.0.1');



$restrict_value = filter_var(getenv('RESTRICT')?:true, FILTER_VALIDATE_BOOLEAN);


if($restrict_value == false):
    $restrict_value = false;
endif;

define('RESTRICT', $restrict_value);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
