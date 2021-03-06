<?php
/**
 * Humanly Possible Productions functions and definitions
 *
 * @package Humanly Possible Productions
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'humanly_possible_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function humanly_possible_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Humanly Possible Productions, use a find and replace
	 * to change 'humanly_possible' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'humanly_possible', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'humanly_possible' ),
        'footer' => __( 'Footer Menu', 'humanly_possible' ),  // Footer menu
    'social' => __( 'Social Menu', 'humanly_possible' ),   // If you want to use a social menu
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'humanly_possible_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // humanly_possible_setup
add_action( 'after_setup_theme', 'humanly_possible_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function humanly_possible_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'humanly_possible' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'humanly_possible_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function humanly_possible_scripts() {
	wp_enqueue_style( 'humanly_possible-style', get_stylesheet_uri() );
    
    //fonts//
    wp_enqueue_style( 'humanly_possible-roboto', '//fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700');
    
    wp_enqueue_style( 'humanly_possible-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    
    wp_enqueue_style( 'humanly_possible-raleway', '//fonts.googleapis.com/css?family=Raleway:700,100,900,400');

    wp_enqueue_style( 'humanly_possible-abril-fatface', '//fonts.googleapis.com/css?family=Abril+Fatface');
    
    wp_enqueue_style( 'humanly_possible-righteous', '//fonts.googleapis.com/css?family=Righteous');

    

	wp_enqueue_script( 'humanly_possible-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'humanly_possible-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'humanly_possible_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
