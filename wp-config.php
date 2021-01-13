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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NU7JJyfue9cXQuv1fvKTfT2Z92s53lLzNKOSXVmUsVKIO73OxLvFy4aXqcQAi9RKB33fOXZQokXv9mvMbpPfwg==');
define('SECURE_AUTH_KEY',  'rNIRkoYXQ0QqWqq1/L0SRvBPHFll2b6UVem3Ipv1IpBHbo8tBZ1HR2hNLetJ9jKaB30qCE9SU6SKu90lMtFXTw==');
define('LOGGED_IN_KEY',    '/5qZvD6qD9te3U/agCKcoj7x5PZV9eEjEVptIEeYKpa15rxhd6eYbDxpPFgrPD+B3Jt6gyQSXn3s3mqGIoXflw==');
define('NONCE_KEY',        'CCaMauAwrJrHO+gzNy+NoRXGmc8HSJBW42ca2MyYTm7yeIr80lLb72z9Pj0RxQP042xKgPFqLz/bbr6AtwY2hw==');
define('AUTH_SALT',        'anbfGJQUC6g8YsIaVMhXBmi9apvO/pIse7Me1tbf22VqhRd9Mtw0VwVh0ilEGKFzMlkQcoTJbBnmKLHKsE/7QQ==');
define('SECURE_AUTH_SALT', '9rlM2OR3tceJPALl7deDda9NuL8IicSeBlf4p+6X2+ZY2XqxpOYMrHdvkJAY+64KrSuS5o3La4jzKiCN9IxnPA==');
define('LOGGED_IN_SALT',   'COiBZoRKKE940GYfQBKGWcTESF3zdGEOzX/jhe7dWpdKSRrNTIb3zbgugdmHluBSnpPvkaEct2E/xuMvKBQErw==');
define('NONCE_SALT',       'QpTLnNRS6MCt4txwbCBJ1fYMqXFgKkyx3/dHNDJZtm04C4nHbJ+3jcLJ0kzsT2hBZyPpBwKjUEm1/yxUThH7uA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
