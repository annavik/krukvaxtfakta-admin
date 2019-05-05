<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'paletten' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'zz~?m>qnS&i(ML&.vt#Y7*.b$HA/0Mq%~0Hg|DOqz(Y,2I[JJ7})/uRYWd,{96QX' );
define( 'SECURE_AUTH_KEY',  '2+|AMp`*ct|-l[~B]^QY$k^4Y$Uy<tKX`{&[WKb)I,w8N65BI@yzH.,.S_<2_+x[' );
define( 'LOGGED_IN_KEY',    'oVdul7cWS_)/7bDlg4ZI`J_ u+FW{Nve7N1+iC5B>_d3faY^Qovljq}Mo{^7Q@6p' );
define( 'NONCE_KEY',        'JJ?8WH8TA)2;AQ=CiX3-uPG))(X#|Do;{k6hIz@{)&)-i(1VRVgC82t2eQ>.a5hr' );
define( 'AUTH_SALT',        'Nqo053*-U$63Ak&)$8sGLUA_Ew#~!e$bOQ;JU.4Ush&S%+x4dd0kIX$uSOjnR<yO' );
define( 'SECURE_AUTH_SALT', '[fg{>.:3?>Ca-5Wi@?x?Mv0<Z;$k`CiDOW/K[H;8{Q&.V7^qk;@6l!oOFz:T+|7t' );
define( 'LOGGED_IN_SALT',   '/xf}(t`*Eh`&.B?Wnw[vveH5`_j/crbo!LO:U-aRjp)`O+N~Z</5<g%nR<;9tIdd' );
define( 'NONCE_SALT',       '*30IM#$.{~;>3)7hUgKRwFUDJL6<ig?_1Vssj%&0OjM~$VfP^a=6!SpGjA6B#!{%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
