<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Portfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ']#l{Z<QY)qv+I`sOIn`9UlDgmpvD[Jmn(FAWZ@x#h,V [jDQUno;~gR91+VHX_qI' );
define( 'SECURE_AUTH_KEY',  '9$ifH#;+O~-Xj3TG1LoH]Nc`p[ ?=C$9%b3w4T*~E3(-s/d4h[RB~BPN[;&F+]pn' );
define( 'LOGGED_IN_KEY',    ' (uzowVOTBqmBU5@mj<X6r?oMC1b3i7f91`,4Rd^[HbBwkmumg[lye^:iv|Ctur#' );
define( 'NONCE_KEY',        '>_cFC?)yx@tZ_:#~OW//lWYS:#Z3PC-nz_DZ %[!c_`j%oqg{@<lxw@,[vIZ{{US' );
define( 'AUTH_SALT',        'dH_ICUQZV${RH&r}$x]q+Ea2=yfpIPjn,+RQzgYf2bRlj+xF`DBiIQ{YB5@;aYYM' );
define( 'SECURE_AUTH_SALT', ';e.9yanz6G aR]](jVlbKm0vuz~axw{$P2Esfke03zRk wN;a>>%?<[n*%ac_uZi' );
define( 'LOGGED_IN_SALT',   'd|`]T>su$vfm(e5nOOb;CbB [>V:bj0|!:wIb`>Q+J0OQSF>MeKCq2:b!i)OJtTj' );
define( 'NONCE_SALT',       '_lCX ?65[tgRE@8ah,gcME[yZgqaiCi<45q^rpn<^w9Fi :FENO73B2<M}ZQ;e3p' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
