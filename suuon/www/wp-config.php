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
define('DB_NAME', 'suuon_db');

/** MySQL database username */
define('DB_USER', 'suuon');

/** MySQL database password */
define('DB_PASSWORD', 'suuon');

/** MySQL hostname */
define('DB_HOST', 'db');

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
define('AUTH_KEY',         'Y[`H:(fA4&iH^=]}R9-EG;FosPK03Fv#5gZ.Kz:dgeXqrytTCB/^?&R#Fb=6k.K+');
define('SECURE_AUTH_KEY',  'mzUYK*A Ey&d.~uYl$-2L|>=MdAuI}L5 9V< xxS9wf#}]DWYJWJ6T?o7K4) MNb');
define('LOGGED_IN_KEY',    'JXW&VKR@rx(;GZ2D-{:>0e/YRu_O-.=C$T*%:o{dhpW:V|CGXo|f4Y$*/u_O7[}A');
define('NONCE_KEY',        '5$X rL1rq(Kc_Pxx]bhNKbT=N-o4A{{e*v$wp#V+Z>15!{9~FB8vNt6Q3^{&OVr+');
define('AUTH_SALT',        'w0!bwj!;uArPYm9{yNy6tc2AEFY[bZd|r}gYI./^|&cl{Bs(F!!B5e^/$d~_yAcJ');
define('SECURE_AUTH_SALT', 'wbNj8mh;wy!Jv}cRo7zVn#K-7&i!U_vN@ >`>d/KeA|+3Enb[Q!0>&^OJ[mATMJC');
define('LOGGED_IN_SALT',   'M<foO/[KKH6.~nwCT|`he6,fV%.;4wis}jjSv]NUwm x7IF@,2Z%=b|_a?+smxwP');
define('NONCE_SALT',       '74F|x`7fp=(UJP6KMt4d%7$Kmp5ywR[&7saVh,;%I?aO#c+z}]O%_#.2.^:OA_D}');

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
