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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_bsa1' );

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
define( 'AUTH_KEY',         'B7zmnu`7+jHDX6q@k0,f%_U[;S)s>z QPkgHGO}.2lzZA;6}7/dJtknRW,5n3)hq' );
define( 'SECURE_AUTH_KEY',  'v>u/pdkj[XuG;T.%*f^4=xF:g]3fl7T*]{jOBwdz.q#>Z~?.( 2*]{j0.U` &Y^x' );
define( 'LOGGED_IN_KEY',    ':{A]L^kQ[piqKv.M0gn>By-)m+]<~Rrs2w8Ot!HaBhL([whs>,Uq,W<yNl`#UQ@?' );
define( 'NONCE_KEY',        '~3-_]?2eT2k]Qt`yG`@dKPxz_(F:+@,k.c_>,Q/P,Gdd>;:9#{#c>gVb)a<*$|dm' );
define( 'AUTH_SALT',        'x*P4z$]wY|DX8v3=8}pW!_vdjjO#&% |cli_6v>tMY3;R&q&V@NVA!MC=)8T#y/U' );
define( 'SECURE_AUTH_SALT', 'Cx;:jZ{BMqV)m~(co`eTy9[&ZYTKDE3h,Lr&O>J/b{tgHKT{*zmx}Av.h6kSZ4/[' );
define( 'LOGGED_IN_SALT',   '(=yR/3(qQuR=%1.:.Tg Em@X+*S`=~h^{}6WZ&bBkyoKSlJ5;z7Fk07$z+;|+FSY' );
define( 'NONCE_SALT',       'PGtf2HyD;:`LS^xV_sv:!]Ho/f?,[~Z#9Oog|z{eV#d+Bg0!C xdGD%dgkc]o%GW' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
