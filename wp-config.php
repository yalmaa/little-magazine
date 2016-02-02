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
define('DB_NAME', 'yalmaaco_wordpress3da');

/** MySQL database username */
define('DB_USER', 'yalmaaco_word3da');

/** MySQL database password */
define('DB_PASSWORD', '7fKdE8XuPb51');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', '}kvIcbuCdqEYXAko?uBQm?T;vspGnZ!;eRn+LD|JUJV|*lL)%CkTrxU$Yv?&Nqh;;j@Ro;o>*^?WKopKXHO^s[rQJQzVrqoA_S-];%HhN}ekncLEqcnH$nC-tA^tR<@}');
define('SECURE_AUTH_KEY', '/m%y-jr_GkW|*we(R@Xif})_DMTd!ZXV)&nE;*|<IHTab;$?kp|?rVGt)jm}oJhBD;yh|kQ+auGUyO{P@P|Y<b&p{oDtgWPd_I(d(;D{*_<Pu<aa??R[lmm]Jd>G_hYV');
define('LOGGED_IN_KEY', 'yPU!!fOFa]F*[nuIJMB=>_jXewP<%de&}<%M>/_{O;_Fgdv)P=?c_=Qj/=%dOMUO+LHhOAjlg}xnPWMT/^Uu?wxdAvxGkfB$S-y@;j??z+=Efg*y>OBHHhKrxHfscFpt');
define('NONCE_KEY', 'rw<YBA-&_HzC=iEvkB[<PSsf<[Me(aNwoWZnT[X>lm!r-([-EqdS%VbXcXF_rDt_vk<>&vw=vHfCjD{l<IksQXs@}{dqsT?CR*f?K%dkz?>oA^HRseeJgY}Jk^SHdRO*');
define('AUTH_SALT', '!;n@FBJiRpz?-Cix)P@gJL*wdNU}pMRCXkdl/Ua;W<]^WaXGi$=v<rWq/zCdO<$HJZArqujtb*xcjm[T&$GK}P;hV?PYJD_oz([DL|GRw%l}k>g&UsG!Ds|;yUQ*%Y{G');
define('SECURE_AUTH_SALT', ')ODWZX;K$pcp*Hv&}&MqWKs<h$G<DhTeT*(<F>=xW<gKd$[{BR*KN[^K/{^wTSxJ_*=rbuxiN)>@OmYouyl{fm[]FxAzVCe$yaD{$bMg&;-uZ_cPpvg>iu>EEBRM$DGI');
define('LOGGED_IN_SALT', '_FCPL]^KY=uDVBHH!LVRQSRSglEb(e(a-?=]{Pk_m]&g=*tJ=rU=mucksQxH!{|uhv)FRVIO$-Sr!rMBjmVg)>?ak/Do+@/jm=L^n%emTBkpi@ihbjV_yn_q=nf&>e@T');
define('NONCE_SALT', '%I;bR$n|boCjgmfSU_p|;Hc/W=/IP<{h>u}CPI^b!NpoB)PFLo|d;UzTRa(q)j]aA?oIu{yMa;I$&&kR?UOwly$sB*S%aPckVXkz?Q&Nn]w+Fjlgx?!?OkuuahmFeQ!W');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ofma_';

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

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
