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
define('DB_NAME', 'wp_feltrolindo');

/** MySQL database username */
define('DB_USER', 'feltrolindo');

/** MySQL database password */
define('DB_PASSWORD', '9tyGym7X4z]Wu;(9');

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
define('AUTH_KEY',         'TN|vzuD#!zAqqH_PQW[BAliwkYv4j|E*GhHM-h*h4/TrBBTJR~WXMmo-(yv: ;/)');
define('SECURE_AUTH_KEY',  '=GV>P0`m^M8KqBG+xI -QEPLnws+yqvM%:V|@51ApE9gA&}ykkh2Bh*L,#oYwL6=');
define('LOGGED_IN_KEY',    '6]Qz*tA:5mc/v<6zXz%8UP:)B@krR-Z Te9JSY`wqt9k#uR{[6N.Z/XxbAiKI%;k');
define('NONCE_KEY',        'TTF9zffg4[rG$zF04liX7X0!#`l~_o^I{qrzMiTE*h4?H-NWHva3+{{e!n!&axqs');
define('AUTH_SALT',        ':p.>zNhr2haBS,hAU`H|rh:+XmjOfZ7DG?hNGfvGSD]bA,5o:(3F8T.Z=|??PMmD');
define('SECURE_AUTH_SALT', 'bv0WP[2h%)r3nSZbZs?d<+U:{Ft^B+)b7Y?HsQ5*`hjn0Y*BKR=X$lXUx88JO`AI');
define('LOGGED_IN_SALT',   'U!yR[kReu==JE=UrM:?K=czn(bS%5uSO+&vc47OOTbc}nC_3hT7YsS%d,APe%f&|');
define('NONCE_SALT',       '!<[Bhf^),}Mf4eu)@(+L$k<D,tabUaLT-8JOtaGHT<7SwQHFvCW?Io(TZz)R2VD3');

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
