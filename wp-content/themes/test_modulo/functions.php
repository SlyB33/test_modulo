<?php
/**
 * test_modulo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test_modulo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'test_modulo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function test_modulo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on test_modulo, use a find and replace
		 * to change 'test_modulo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'test_modulo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'test_modulo' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'test_modulo_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'test_modulo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_modulo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_modulo_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_modulo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_modulo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'test_modulo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'test_modulo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'test_modulo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_modulo_scripts() {
	wp_enqueue_style( 'test_modulo-main', get_template_directory_uri() . '/scss/styles.css', array(), _S_VERSION );
	wp_enqueue_style( 'test_modulo-main', get_template_directory_uri() . '/scss/reset.css', array(), _S_VERSION );
	// wp_enqueue_style( 'test_modulo-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css',array(), _S_VERSION, true );
	// wp_style_add_data( 'test_modulo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'test_modulo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'test_modulo-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_modulo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



function debug($data) {
    echo '<pre>';
        var_dump($data);
    echo '</pre>';
}

// fonction gérant l'affichage
function custom_parse_event_date() {
    setlocale(LC_TIME, "");
    setlocale(LC_TIME, "fr_FR.utf8");

    $date_debut_format = utf8_encode(strftime('%d %B %G',strtotime(get_field('date_de_debut',$post->ID))));
    $date_fin_format = utf8_encode(strftime('%d %B %G',strtotime(get_field('date_de_fin',$post->ID))));

    if($date_debut_format === $date_fin_format) { 
        echo '<span class=infos">Le '.$date_debut_format.'</span>';
    } else { 
        $mois_debut = substr($date_debut_format,-9,4);
        $mois_fin = substr($date_fin_format,-9,4);
        echo '<span class=infos">Du '.$date_trunc = ($mois_debut != $mois_fin) ? substr($date_debut_format,0,7).' au '. $date_fin_format : substr($date_debut_format,0,2). ' au '. $date_fin_format.'</span>';
    } 
}


// Création de la DbTable custom

// id auto-inc
// name varchar 256
// site web varchar 256
// contact mail varchar 256


global $wpdb;

$charset = $wpdb->get_charset_collate();
$organisateurs_table_name = $wpdb->prefix.'organisateurs';

$organisateurs_table = "CREATE TABLE IF NOT EXISTS $organisateurs_table_name (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	name varchar(45) DEFAULT NULL,
	website varchar(256) DEFAULT NULL,
	mail_contact varchar(256) DEFAULT NULL,
	PRIMARY KEY  (id)
) $charset;";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($organisateurs_table);



//insertion manuelle des données

// $wpdb->insert($organisateurs_table_name, array(
//     'name' => 'Modulo',
//     'website' => 'https://www.modulodigital.com/',
//     'mail_contact' => 'contact@agencemodulo.com', 
// ));
// $wpdb->insert($organisateurs_table_name, array(
//     'name' => 'WordPress',
//     'website' => 'https://fr.wordpress.com/',
//     'mail_contact' => '', 
// ));
// $wpdb->insert($organisateurs_table_name, array(
//     'name' => 'Google',
//     'website' => 'https://www.google.com',
//     'mail_contact' => 'events@google.com', 
// ));
// $wpdb->insert($organisateurs_table_name, array(
//     'name' => 'Live Nation',
//     'website' => 'https://www.livenation.com/',
//     'mail_contact' => 'contact@livenation.com', 
// ));




//gestion des organisateurs dans le custom post "Evenement"

add_action('add_meta_boxes','metabox_choix_organisateurs');
function metabox_choix_organisateurs(){
  add_meta_box('organisateur', 'Organisateur', 'get_organisateurs', 'evenement', 'side', 'high');
}
function get_organisateurs($event){
    global $wpdb;
    $query = "SELECT `name` FROM `wpmt_organisateurs`";
    $results = $wpdb->get_results($query);
    $orga = get_post_meta($event->ID,'promoter',true);
    echo '<select id="select_organisateurs" type="text" name="select_organisateurs">';
    echo '<option value="">Selectionner l\'organisateur</option>';
        foreach( $results as $result ){
            echo '<option'. selected( $result->name, $orga, false ) .' value="'.$result->name.'">'.$result->name.'</option>';
        }
    echo '</select>';
}
add_action('save_post','save_organisateur');
function save_organisateur($post_ID){
  if(isset($_POST['select_organisateurs'])){
    update_post_meta($post_ID,'promoter', esc_html($_POST['select_organisateurs']));
  }
}


function remove_menu_items(){
    if( current_user_can('editor')) {
        remove_menu_page( 'edit.php' ); 
        remove_menu_page( 'edit.php?post_type=page' );    
        remove_menu_page( 'edit-comments.php' );          
        remove_menu_page( 'themes.php' );                 
        remove_menu_page( 'users.php' );                  
        remove_menu_page( 'tools.php' );   
    }
}
add_action( 'admin_menu', 'remove_menu_items' );
?>