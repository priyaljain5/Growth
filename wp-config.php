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
define( 'DB_NAME', 'Growth' );

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
define( 'AUTH_KEY',         'q3v$,wfWIBAByZa~{=aXsY=k>y?4*PeMrL_bA/VT`O]FD2g}xBU6,!{`Hcz|fL+1' );
define( 'SECURE_AUTH_KEY',  'm#M:qzllQHn54Itujm${{+9bCjC:1j8e!iJ)NU:Q@s3W;4-lMkTwS8;2|J4a{t4A' );
define( 'LOGGED_IN_KEY',    's2=C`e.|AlE@oi=|#(s7E_7[::D=WY9LKj8rpI.HzF2R=fT#FMWfW6B*v4`kg(R6' );
define( 'NONCE_KEY',        'ZEmB-6FjC.@:[ ZzBFgfyiX<C+Zl*ZsoU)CH53lGs)&Pp04_VgJIx34y|+:QiWVi' );
define( 'AUTH_SALT',        'W,-T^AvAUmoWP)sB/5g 8*oD:G&EOz0P4H7Jh[~|eg,f$Z,A>ZC9Ub~]P*vH;rlN' );
define( 'SECURE_AUTH_SALT', '<dCg1UW/gfS3V?cp0K^<gBs=N.bNgxeTJfD}sJ6v~@iQIX!T9as4X]YHp`FBS&WO' );
define( 'LOGGED_IN_SALT',   '4bM-`=&[4<::;bIvD>%|q:nJ.G9o4{H7,4q-*59m3{UpO{`/#rlNwP@2,de[{L{%' );
define( 'NONCE_SALT',       'M8%MJ;?U%a%z|G`/>d%XQ**Q<yN(9>$28v)`oA50j%C$>jv!|NVoq.Np j-KoIWx' );

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
