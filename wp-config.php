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
define('DB_NAME', 'testsoftiblog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'b6$inlI]; C.ezx=CPZMijG`F~]}i+c -=<Cv|m}Ua~%1|A<tIn1nvdgiyKn<$z3');
define('SECURE_AUTH_KEY',  'b0]tvmeGI#jr5W;bgRWeiiv2qA1 Ab8dD5CFKDKFvpGLSM9$O~8Pyyq?%oeX22{X');
define('LOGGED_IN_KEY',    '}U5sHo<eK}HCkyg1CnLC|w@r(6@#:bL_F?58Wh(Z}x)e,JwlY(e,9wzkGX!bEH?P');
define('NONCE_KEY',        '3LGHsQxO~wR|Z$5p*eGm+!-L&oX[Iva:ka8Kh+lBO$Z8GQE|>kAB+C#yRoes=(-c');
define('AUTH_SALT',        'e?UH4u:K2C2tiJ-CmVy6eL)l@!f@jE<fUlM9J?F>uDMxX9A<|(ku~>zgJe.xP)-x');
define('SECURE_AUTH_SALT', 'T/Z2rN~{HCv%vPP5}XNmlR?nty}{OGq`nMnSc-{ztW0#u!r ZyeS+/.@^FIc&2<+');
define('LOGGED_IN_SALT',   'Co^1PP:&3_gxPp0T;1tZw:KS`r[tZ}oGj;E@H3)Q1/o5:rWtL;ajH<Ad=#EQ[gGu');
define('NONCE_SALT',       'Puu_$]KtZD,mHgtL~g]+:>D3`Vn|Dt4OaMDawUi%C<D+jjKJl}KT[Ku5foy<$s`m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
