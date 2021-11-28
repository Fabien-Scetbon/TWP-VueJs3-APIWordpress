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
define('DB_NAME', 'WordPressOct2021');

/** MySQL database username */
define('DB_USER', 'fabino');

/** MySQL database password */
define('DB_PASSWORD', 'MonopolI');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '#aN4oL87AFMHrnmV,JANtrSF0DN@L5k e694N)!yS6;D8{b$97 ROK1`,=TB.eB0');
define('SECURE_AUTH_KEY',  'N#jX.k-W_f%.$+QZ~pK`Ys;TotPwC^`2`NeI/5(L*CAW|/3{vI[-Y--wm7f**-p-');
define('LOGGED_IN_KEY',    'zR89s*/s#L:fQZE87/>s1(V5g?DB|0GFM|=GCyu@xC0IQcHa,OkA(^:1Wu: +xqE');
define('NONCE_KEY',        '|ZNd9Ico:iTQ171T7@e-F?I:L>0=,K_;#:>U_)q{b2]uBW#d-a[Q`B?kaPGo>IdH');
define('AUTH_SALT',        'N0,ocaQSsFxJD}~qj-nU#.P?9OOSiHY|dDP]Dr.AQ,_)3K)f(J@.[(VT;nV:?(C6');
define('SECURE_AUTH_SALT', '+d3CLB{Er&9*Z/_?r`JKs6q|utTD1WQ>sX~y<|;ysys,yZ-9?iP_(Cbb}M_C i.>');
define('LOGGED_IN_SALT',   '4>fg2dJ,BU@gJ5_;P6S!`R2k3-{M.8GB3^4#~ <oxQNN0t-$n :n:,[%5Z6#P,Au');
define('NONCE_SALT',       '}#pQ`+Rx|+|V;~[ LgLBlX<@0~t:$YU!^SR-fr#mb{pz6G&eT)6TlL!wNqlvz5=)');
define('JWT_AUTH_SECRET_KEY', 'MonopolI');
define('JWT_AUTH_CORS_ENABLE', true);

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
