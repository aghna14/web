<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('JWT_AUTH_SECRET_KEY', 'your-top-secrect-key');
define('JWT_AUTH_CORS_ENABLE', true);
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'webokewe_web');

/** MySQL database username */
define('DB_USER', 'webokewe_db');

/** MySQL database password */
define('DB_PASSWORD', 'Asli2018ciamis');

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
define('AUTH_KEY',         'H?[#d3.-9rtP@YlRX:$LQb{P7p}bP^-XlF*z?Ld)wt{VJ^955 [m$+X=A5;qy<TP');
define('SECURE_AUTH_KEY',  '51~ekI+[:!R<d2_xe*eWUQCMrBJ0w-};#:X|kJ-q/PJAS@wJ$`yIhy5Di%BP xM_');
define('LOGGED_IN_KEY',    'Om01IC@@80Z 0U3S4J)s1F=g!EoiwB<n3f[%hsT&igGOagfti7MteBUS7wqcjGKo');
define('NONCE_KEY',        ',;?_[myXrb96I#},$2sYD~ Vb2(QtSi}8x$iF6|Nt-XZ2=JtW9S%S5pN$o}/SD9/');
define('AUTH_SALT',        'cR!/9N(,p1=ei}0=.b5P@9#k3)k3R$$4gcHRK +g^@bCm9RBr9eX.3hHW5{3TLL5');
define('SECURE_AUTH_SALT', 'Bw~UdBvqWY}gaE}>~RM&~F|oo*wa!BF=>*,X{RO,.1Q_WC5,k@sw8P~o+AfmN.}s');
define('LOGGED_IN_SALT',   '~*`4lE9G2dGNkzgRwTw#]l8*7)KPsP}_Z1nj<h%{_Tk.eBeTs-iy3#m)/Aj<6k.b');
define('NONCE_SALT',       'TMr sC,b#wc3V3w,x{;IT@NDc!&U}] Q$xX1oMr&F%VzW98@y*SLF]PY.<N~RBeA');

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
//Disable File Edits
define('DISALLOW_FILE_EDIT', true);