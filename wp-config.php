<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_basics' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root123' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'MzX<_D^Mgt($~?!S adpezPF$h=K=J}<~*UdvR,v&pm~O:=j~2Mz`H5la*Ov@wHU' );
define( 'SECURE_AUTH_KEY',  '!1{?1F*+uHC@(wYM+ c<q0P.I4&<6`QTVUO]mC+e j#aiHQv.T%Y-[OPu^2ty=AH' );
define( 'LOGGED_IN_KEY',    'DS}OCS&^qJ&&ZlZ7P3rXo`p$+?oCL7D4)fZ3K=zPOpCT!2[!ick<8JsAd&s+Yiu(' );
define( 'NONCE_KEY',        '#6KTMc%`B^Rlg?%[p+C]I@^=5&8L(>%1x5!/tso4[dMQG#53%n8LxJ8WF>P7P@kK' );
define( 'AUTH_SALT',        '1+%* nn,/wp6_.m)f2 iwOBMpG_uqJ{OR|042eq)A OjkRjGg#u^v-h-} (zcbKB' );
define( 'SECURE_AUTH_SALT', '.i(~{4Y#Sy~ZeA^d?(J.rNS(Ak[=+wImpv|uQeN32mTif4-U_;8eXLD!4dgtqAm1' );
define( 'LOGGED_IN_SALT',   'uN:/$?]@:yviK<gpwXX;lX==tqaD1ha9tR03[<&a<2!UqqCXG^%*vhoF<Iy|)lm8' );
define( 'NONCE_SALT',       'mak#U`]b*D *:eo<yq3P=c=}h>g5P$GAFB^ej8,6`ENez*t(EsyMq-=xv<CHV  t' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use 
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

define('FS_METHOD', 'direct');

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

