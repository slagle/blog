<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', $_ENV['OPENSHIFT_APP_NAME']);

/** MySQL database username */
define('DB_USER', $_ENV['OPENSHIFT_DB_USERNAME']);

/** MySQL database password */
define('DB_PASSWORD', $_ENV['OPENSHIFT_DB_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $_ENV['OPENSHIFT_DB_HOST']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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

// Set the default keys to use
$_default_keys = array(
define('AUTH_KEY',         'k+|@Kq-8OdZ^SzP:)xK>eMiw)+{F^)x  .u6XA0t?G%a^HVIP^_/gsGA3HIs3 K4'),
define('SECURE_AUTH_KEY',  'Z^vk)fW.U]`MW8xykmTf[,c /#ty+R?Wno~vMbd/u!l?I{mR TnN-nhU-|_;n)_Q'),
define('LOGGED_IN_KEY',    'xHXq-<Yj6xyoZJZcg-|}?16+@`,++*fix%T(TW!hv?#/|,59WR]RpQ>SQIf*}!kU'),
define('NONCE_KEY',        '3.%-{KwP4d]aWb#,DR+.VDkk^X,[Wq]Wcu~Bo1vI%S>BQ2sps--17l]6wlah}F?,'),
define('AUTH_SALT',        '0Z38lH&$0Oz*e6aNW{<WL/r]S[ /7Y)dZ{nh-|+;jgX#$e|JH|`Rusf7 <#)2?L2'),
define('SECURE_AUTH_SALT', 'h,4e8f6=0k:N7hvF!k.8OL1}H<O){w?;[%gKfga=$~vl<i}K6N9D/F[Yhw3NQq2('),
define('LOGGED_IN_SALT',   'Zp4Y(_ab#y$0%=Q.O6&@+@eKfp.($Di{QaY=H+|NgtmWb/)qc25$YjdWnP<ET,Rr'),
define('NONCE_SALT',       '+/;~/A~h6[D]GfbV0<s:Nc}`sjM`DX~gL4eE* 7)c-*:<S4l1#+z?sAR!v,!I$F0'),
);

// Set the token to use to seed the RNG, if we're on OpenShift
$_my_token = null;

if (getenv('OPENSHIFT_SECRET_TOKEN'))
  $_my_token = getenv('OPENSHIFT_SECRET_TOKEN');
elseif (getenv('OPENSHIFT_APP_NAME') && getenv('OPENSHIFT_APP_UUID'))
  $_my_token = hash('sha256',sprintf("%s-%s",getenv('OPENSHIFT_APP_NAME'),getenv('OPENSHIFT_APP_UUID')));

// Only generate random values if on OpenShift
// This is similar to wp-includes/pluggable.php#wp_generate_password
//    Couldn't use that because we weren't able to override the random seed
if ($_my_token){
  // Character set to use
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $chars .= '!@#$%^&*()';
  $chars .= '-_ []{}<>~`+=,.;:/?|';

  // Loop over each default_key and set the new value
  foreach ($_default_keys as $key => $value) {
    // Create hash out of token and this key's name
    $_sha = hash('sha256',"$_my_token-$key");
    // Convert the hash to an int to seed the RNG
    srand(hexdec(substr($_sha,0,8)));
    // Create a random string the same length as the default
    $val = '';
    for($i = 1; $i <= strlen($value); $i++){
      $val .= substr( $chars, rand(0,strlen($chars))-1, 1);
    }
    // Reset the RNG
    srand();
    // Set the value
    define($key,$val);#apply_filters('random_password',$val));
  }
} else {
  error_log("OPENSHIFT WARNING: Using default WordPress salts, please change manually in wp-config.php", 0);
  foreach ($_default_keys as $key => $value) {
    define($key,$value);
  }
}

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
