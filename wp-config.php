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
define( 'DB_NAME', 'softuniada' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'rT39%~%xgm_w7BW9DsE85_h&^w<SYwwkY9jPibBz aRU0~XKq#?8]v@^Z;@A;}A<' );
define( 'SECURE_AUTH_KEY',  'V/E1!E/n-ufoJYoTaE}[NF#KW<<ORR^sk&7i`y31J$/+m&;ThRN6-_H&[,>-m8vi' );
define( 'LOGGED_IN_KEY',    ':6lJD$6Xj8tt.T$T(a[9qEZBS*|ugO[7];:ncL~K9Tu]#:[u%TGntgkh|HW}L~b8' );
define( 'NONCE_KEY',        'zLqt@n|XR@zA w~a5O=~}SECsKC0_yJy7=cT&*jo[-x#}Diz)o;itfN@,m}HPKjU' );
define( 'AUTH_SALT',        'Rp2%-%LO=(`c/Y7#[xpW*A~R^&%EJq..bK+#8|ktlz|)86Q;&}LdC=03z&*qZ^n`' );
define( 'SECURE_AUTH_SALT', 'o/jj`Nz=`u.2gU|1lj4x(R0Inm~+=/ki;{y2LP`<QIr;.o>]*J~_A+:~i>dqX]4K' );
define( 'LOGGED_IN_SALT',   'qJxei$Q#P>DE@>+W{C:TUm<HN^^:EKfNA<(0GO&G+ ]vU<Iy?>R)4)s(2SwNFWi6' );
define( 'NONCE_SALT',       'IMxo7..3faFMIyuTaiP`p|Q;3(qZe=,8s:+MV323/ D_kN=2<fi,4.Q:.83bB:2m' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
