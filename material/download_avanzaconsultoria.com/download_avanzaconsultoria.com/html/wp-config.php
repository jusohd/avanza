<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'qql725');

/** MySQL database username */
define('DB_USER', 'qql725');

/** MySQL database password */
define('DB_PASSWORD', 'Ga5m2toi3t2');

/** MySQL hostname */
define('DB_HOST', 'lldf622.servidoresdns.net:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'UO2leHr^C@BSf!O7wZ*s9C^@ckNt79UZ9G62nN8dAiSw#3r&&d)90R0(GMocS)Xk');
define('SECURE_AUTH_KEY',  'vUxTq!QheE7$9HrpvB@ii0&W2Eo68VBjHGsehWzAvMrcKY#2vQ4cjk2P&SLTOsK6');
define('LOGGED_IN_KEY',    'w0et&6U)u@XOwoM$rSh3&zcV4HLHzKjxCO)CQTA6*NW0MJnmMstmfxk0KPdX27Iy');
define('NONCE_KEY',        'y54vje2*FCqkNSpwWMNSh0A%yBTWn2hQG%8IZHWy@64FYImmENElG7l7O4D!17E#');
define('AUTH_SALT',        'BF%DGn*b6!9dQZ2q**JWjRYNE@p*zTGJ%CDEN6BI@b6W7Kxg)IBiX&qM1Y4)6)nc');
define('SECURE_AUTH_SALT', 'j!vR0w7i4ok&H8)QIHTXMjaiY^deC80DhXYMbboQy7&xRfF(Tc3iFlZFdr4yOy2%');
define('LOGGED_IN_SALT',   'RzVTXOroVK#o5yP*3ZDlde0wSD##Xqvku9KC(LPnR&9Iw#Ajpxjl(MzKMqSWGV)5');
define('NONCE_SALT',       'HPIgQts2oE&#z$vycQh#livexzdR0i46Kn52o4Eu!E2K4a&z#zRHXLJ%d2ElhUcd');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'Wordpress22638_wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'es_ES');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
