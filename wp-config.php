<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rohp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'cym4t1ka');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

$domain = $_SERVER['HTTP_HOST'];

if(strpos($domain, ":")) {
 
 	define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] ."/ROHP/");
	define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']."/ROHP/");	
}

define('WP_ALLOW_MULTISITE', true);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'C`7?gGP-*|/arvdtf@vXI[+N(KD:#<7=X4~7coj<It;<X> 4AC]z+>^Z5ybC{Jx]');
define('SECURE_AUTH_KEY',  'x+;)1yd]2wJ|7b3@|A2+Kmgn $<tY(I/x[;!.UA%2`]uf&U7w-o/8r<&H-h74Jj4');
define('LOGGED_IN_KEY',    '&Af->Kp=#? Pf-}&+fYs1dFV|HSZ;[}2=ul2;PJBlGD-AYEfQg]OryfP2l|,;xPf');
define('NONCE_KEY',        '8vk#TN5~fVD6xb)`^o;H$5~} H/Gg04CWP}1J!*Fi%S3n+$Sl67s@<q>>TVE_!^-');
define('AUTH_SALT',        '}nP9igW)CF2=**}i|RA<hvv,c#CrY^-@1?V10T^wxo7;+, GoDs;r9s0C?#wTVrh');
define('SECURE_AUTH_SALT', 'Qw#Y)^Hr5[g,HH8:5K&c@b>0cP;/;-hs_W$4%]O(Qsc-8OSelBv:_U+8+ONei{i7');
define('LOGGED_IN_SALT',   '4T9;Q>)!->Wv$5),)gm:L@x$ :Rq*SrwmZ.;]$Q11>$PTJn1W6Q|{%,|!.|u`q-T');
define('NONCE_SALT',       ']@L84x_t_UIYO<x<G:gLy_uj&w&36NLRQjGb;f~h<gLcb4AFii,+n|d8VjzlGcIO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
