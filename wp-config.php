<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */
// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'modulo_test' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'y!:->X*e?uQVE0uz*;G-(#N?6HJq!|!*vG5})=n>RAl#Jwsl>W|s2 oQ+r[}V,5k' );
define( 'SECURE_AUTH_KEY',  '$X#^><MTk`K&tBW!Y~xB}rCx;Y=y)MFAMVu]MW}+JncATe{aB[a{.NzS:)(]m@Iy' );
define( 'LOGGED_IN_KEY',    'ssr3<65.3s9W=>O)+Y;nf<=ntdw>u!Z61*6?p;2;X_fj.QEw&`e:CzJO9(y[}uyv' );
define( 'NONCE_KEY',        'JO51oh^.ln>zbkC3xWVY8R./I%vS= KYNT&wPtyHFA~Wue*r58Xcd}lpKNfG)d-@' );
define( 'AUTH_SALT',        '(wCo+Hi-@~n2|~MpbKD;0l.PTv(vWfOGf_rg]2&IE]m16._(zxOBU|Hg`iIUi[?O' );
define( 'SECURE_AUTH_SALT', '{_X;M}|*:X?Dg:4]syt6kaAs,ay}{TbMgPOjPlvhHN[S>6xF:9c;h!zl.j!^L8gU' );
define( 'LOGGED_IN_SALT',   'CtVD.tnq[nRhoBc[st|;A5@k)6caLEH;F5C*jRgPn?4ZPQ%-OB[&`lE+YZ:pKQqQ' );
define( 'NONCE_SALT',       '{y+~7-mj7B[Q1 PZ,_~JW9_/9x(Dlne l(L`e;3QEdk{Gp4?EV3h8f-YY_S+5={~' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wpmt_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define('WP_DEBUG_DISPLAY', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
