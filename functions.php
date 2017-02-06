<?php
/**
 * Neat functions and definitions
 *
 * @package Neat
 */

/**
 * Paths
 *
 * @since  1.0
 */
if ( !defined( 'AA_THEME_DIR' ) ){
    define('AA_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'neat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function neat_setup() {


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
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'neat' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'neat_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // neat_setup
add_action( 'after_setup_theme', 'neat_setup' );



/**
 * Styles and scripts
 *
 * @since 1.0.0
 */

/**
 *
 * Scripts: Frontend with no conditions, Add Custom Scripts to wp_head
 *
 * @since  1.0.0
 *
 */
add_action('wp_enqueue_scripts', 'aa_scripts');
function aa_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {


    	wp_enqueue_script('jquery');
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.1.1.min.js', array(), '1.11.2', true);

        wp_register_script('validate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js', array(), '1.16.0', true); // Custom scripts
        wp_enqueue_script('validate'); // Enqueue it!


        /**
         *
         * Minified and concatenated scripts
         *
         *     @vendors     plugins.min,js
         *     @custom      scripts.min.js
         *
         *     Order is important
         *
         */

        wp_register_script('aa_skrollr', get_template_directory_uri() . '/assets/js/skrollr.min.js', array(), '1.11.2', true); // Custom scripts
        wp_enqueue_script('aa_skrollr'); // Enqueue it!

        wp_register_script('aa_unsliderjs', get_template_directory_uri() . '/assets/js/unslider-min.js', array(), '1.11.2', true); // Custom scripts
        wp_enqueue_script('aa_unsliderjs'); // Enqueue it!

        wp_register_script('aa_customJs', get_template_directory_uri() . '/assets/js/custom.min.js', array(), '1.11.2', true); // Custom scripts
        wp_enqueue_script('aa_customJs'); // Enqueue it!



    }

}


/**
 *
 * Styles: Frontend with no conditions, Add Custom styles to wp_head
 *
 * @since  1.0
 *
 */
add_action('wp_enqueue_scripts', 'aa_styles'); // Add Theme Stylesheet
function aa_styles()
{

    /**
     *
     * Minified and Concatenated styles
     *
     */
    // wp_register_style('aa_style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_register_style('aa_style', get_template_directory_uri() . '/style.min.css', array(), '1.0', 'all');
    wp_enqueue_style('aa_style'); // Enqueue it!

    wp_register_style('aa_unslider', get_template_directory_uri() . '/unslider.css', array(), '1.0', 'all');
    wp_enqueue_style('aa_unslider'); // Enqueue it!

}

/**
 *
 * Comment Reply js to load only when thread_comments is active
 *
 * @since  1.0.0
 *
 */
add_action( 'wp_enqueue_scripts', 'aa_enqueue_comments_reply' );
function aa_enqueue_comments_reply() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( '3 Column Widget', 'three-col-widget' ),
        'id' => 'three-col-widget',
        'description' => __( '3 Column Widget', 'three-col-widget' ),
        'before_widget' => '<li id="%1$s" class="three-col-widget"><div class="widget-wrapper">',
        'after_widget'  => '<div class="expand"></div></div></li>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'CTA', 'cta' ),
        'id' => 'cta',
        'description' => __( 'CTA', 'cta' ),
        'before_widget' => '<li id="%1$s" class="action">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="cta-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'Contact', 'contact' ),
        'id' => 'contact',
        'description' => __( 'Get in Touch Widget', 'contact' ),
        'before_widget' => '<div class="side-item contact"><header class="apply-header">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3></header>',
    ) );
    register_sidebar( array(
        'name' => __( 'Investment Report', 'report' ),
        'id' => 'report',
        'description' => __( 'Investment Report Widget', 'report' ),
        'before_widget' => '<div class="side-item report"><header class="apply-header">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3></header>',
    ) );
    register_sidebar( array(
        'name' => __( 'Get Started', 'apply' ),
        'id' => 'apply',
        'description' => __( 'Get Started Widget', 'apply' ),
        'before_widget' => '<div class="side-item apply"><header class="apply-header">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3></header>',
    ) );
    register_sidebar( array(
        'name' => __( 'Social Media', 'social' ),
        'id' => 'social',
        'description' => __( 'Social Media Stream Widget', 'social' ),
        'before_widget' => '<div class="side-item social"><header class="apply-header">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3></header>',
    ) );
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );