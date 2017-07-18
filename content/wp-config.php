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
define('DB_NAME', 'where031_wp731');

/** MySQL database username */
define('DB_USER', 'where031_wp731');

/** MySQL database password */
define('DB_PASSWORD', '3WTp1S[2@8');

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
define('AUTH_KEY',         'qbos4dc0zukqvlezolbzmumsnf9vrnzi5a9plcuomblylkai34so5fwlqkzjcuaz');
define('SECURE_AUTH_KEY',  'ckliqiwt7gtyjagwxjxqaxpfxjwlrklhsfytxcdiqxnycfaftrmsalatgobwtljm');
define('LOGGED_IN_KEY',    'bpryq9xyelcdmrv8aybfvklorip1rezyhbzn1zytjmobw0zd2gr6zcc0xho2qsli');
define('NONCE_KEY',        'fd6zlk9exz2thvsldy3op6zmzyumj9fmydxlsqnfruzowyy8pyzrquv7n6gpru5a');
define('AUTH_SALT',        'v8egmsu4wn5chjhx7tekyzxqy9q2bfznmfmebwhesdwcdoiccuximz4ne9gjclid');
define('SECURE_AUTH_SALT', 'vapilte1xvng13c5mov9qngsqtbznmlumir62mrbeqnucpktasjxbhjzfsuuxyrz');
define('LOGGED_IN_SALT',   '8xgy9zfqccyv8msfydf0wwf42u99esfgbzov1i0hhjsnhjaa64f5n9mdsf2vpe3m');
define('NONCE_SALT',       'b1muaoyhzhz1e3l9hykr2aeaihj12ffm0jmx2llwottj4b1hvsi6ynvlpintjuyq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpq1_';

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
