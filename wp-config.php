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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
/*define( 'DB_NAME', 'wp_MSCM' );
define( 'DB_USER', 'wp_nls' );
define( 'DB_PASSWORD', 'GL!CZ@hvU(' );*/

define( 'DB_NAME', 'groundcontrolcom_new' );

/** MySQL database username */
define( 'DB_USER', 'groundI8i6_new' );

/** MySQL database password */
define( 'DB_PASSWORD', 'BDRaDG1JZMHZ' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'WP_MEMORY_LIMIT', '128M' );

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
define( 'AUTH_KEY',         'iQUql8ibm#=Sx rdGr(i2-MS]1 !_vU?W{1qx~#^b~#SPme{bI,eoV;!8xYXE5&u' );
define( 'SECURE_AUTH_KEY',  '64NP8l`O}PUuy#TBw^t{lp-k-$HG~hnpyd3zuP{Gk@P*O&a[B83*DU&f5Gk7vayt' );
define( 'LOGGED_IN_KEY',    'mQuRzVOwEM#p#/~rHNY}jmYWs|}At1v.k*+j3cGC,i^lmd1a|!HHtx|W]iu*Fl&}' );
define( 'NONCE_KEY',        'nOdfYni~cap:Np{bYDjujYCJz]c[YAYyq?Kk-)>Y+>y]j5BV,IglJ~3j|%OLu0V9' );
define( 'AUTH_SALT',        '1<,;hFbx${GiChJ3tGs#3C!qG/z-nu}];_eSu:!%Bzywxcp]<?Hoe-@8(6x]5}~Z' );
define( 'SECURE_AUTH_SALT', ',.ypT*M|:KwFRB_h%+Hf @BlYkH2Kx&My3W<RDJ$?4QAEa&9$<Fo9V@PDV4^+*lJ' );
define( 'LOGGED_IN_SALT',   'Bx=6d,j{PPc]WE P&Y-w$rQl}Gp(t1>9vKF3-v(@Aci,#226I1R@KWA?^dlk$fdp' );
define( 'NONCE_SALT',       '8t!CoLHT-?Lh*77Z[KG,+9dG/(o8KMGEFDJ[ENCC~4Q!dE`dZbm&VCz&3;FE<=Y+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'groud_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */
define('WP_ALLOW_MULTISITE', true);
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'groundcontrol.com' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
define( 'FS_METHOD', 'direct' );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
