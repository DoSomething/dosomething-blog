<?php
/**
 * dosomething functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package dosomething
 */

if ( ! function_exists( 'dosomething_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dosomething_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dosomething, use a find and replace
	 * to change 'dosomething' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dosomething', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dosomething' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
}
endif; // dosomething_setup
add_action( 'after_setup_theme', 'dosomething_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dosomething_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dosomething_content_width', 640 );
}
add_action( 'after_setup_theme', 'dosomething_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dosomething_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dosomething' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dosomething_widgets_init' );

/**
 * Customize 'read more' link.
 */
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
	return '<p class="footnote"><a href="' . get_permalink() . '">Continue reading&hellip;</a></p>';
}

/**
 * Enqueue scripts and styles.
 */
function dosomething_scripts() {
	wp_enqueue_style( 'dosomething-style', get_template_directory_uri() . '/dist/blog.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dosomething_scripts' );

/**
 * Only show "Our Blog" posts on homepage.
 * @see https://github.com/DoSomething/dosomething-blog/issues/87
 */
function set_our_blog_homepage_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '4' );
    }
}
add_action( 'pre_get_posts', 'set_our_blog_homepage_category' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
