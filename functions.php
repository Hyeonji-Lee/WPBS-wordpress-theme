<?php
/**
 * WPBS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WPBS
 */

if ( ! function_exists( 'wpbs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpbs_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WPBS, use a find and replace
	 * to change 'wpbs' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wpbs', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'wpbs' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wpbs_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'wpbs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpbs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpbs_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpbs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpbs_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpbs' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpbs' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpbs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpbs_scripts() {
	wp_enqueue_style( 'wpbs-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wpbs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wpbs-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpbs_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function wpbs_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'wpbs_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * 웹폰트 비동기식으로 불러오기
 */
function webfont_js(){
?>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" async=""></script>
<script>
	WebFontConfig = {
		active: function() {
			sessionStorage.fonts = true;
		},
		custom: {
			families: ['Nanum Gothic'],
			urls: ['http://fonts.googleapis.com/earlyaccess/nanumgothic.css']
		}
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		'://ajax.googleapis.com/ajax/libs/webfont/1.4.10/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();
</script>
<?php
}
add_action( 'wp_head', 'webfont_js' );

/**
 * Bootstrap3
 */
 function bootstrap_styles(){
	 wp_enqueue_style( 'bootstrap-stylesheet', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.css' );
	 wp_enqueue_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.js', array('jquery') );
	 wp_enqueue_style( 'wpbs-stylesheet', get_stylesheet_directory_uri() . '/wpbs-style.css' );
 }
 add_action( 'wp_enqueue_scripts', 'bootstrap_styles' );

 // Register Custom Navigation Walker
 require_once('wp-bootstrap-navwalker.php');