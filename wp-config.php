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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webMeridianTest' );

/** MySQL database username */
define( 'DB_USER', 'mysql' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mysql' );

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
define( 'AUTH_KEY',         '|zTHZSwO0F>}eUHJ8GnJz72EKtVnf(W#%;ucEi6Mx6*.s4%U.wG86vg<(KBTlJ^|' );
define( 'SECURE_AUTH_KEY',  'hi$tmx,M`vb?ul|dE`)mw?v,QQ/qi.*.-.MFo*:+2@UGf,(AFTe%T`NzF7;:Z,la' );
define( 'LOGGED_IN_KEY',    'MxMjPcrvFv84+z#,e9rE8nK9i6t3*-!J$`>Mmk/*ghQ{_+K=(0k>Sf:Gl1=bXF6c' );
define( 'NONCE_KEY',        '3>plcWhYq)mNJ/ZQac`w`DuYtLF~0r-r*v~Yp)}xCd0lGLaT#.9R[N/f+p_{JYz2' );
define( 'AUTH_SALT',        'i/mr*)Rqh7l?N%<+M24x?H%kRhge*83JZuiE7!NvrqDToEV=6Km3s|F5?3G`zl7/' );
define( 'SECURE_AUTH_SALT', 'pX3AbT~}a& 9KYA,$3yniUa8V}xVB6oG_bhfyFY@+(`~_B=_Q%l2$b}@`$S$nZmw' );
define( 'LOGGED_IN_SALT',   'vV#mdin0PZ%Ze8q-~syj1<U=xUR@8&:d{?@[+fjZC*@p}UmST-[:RFU/$5 j.l[-' );
define( 'NONCE_SALT',       'TNXo94O~.fteH[8<TM6._M1SdEV;vo=%o US$(f9;LuV4qt*)ksAC>^Gjws!%_X{' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
