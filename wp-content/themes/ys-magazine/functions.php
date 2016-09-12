<?php
/**
 * YS Magazine functions and definitions
 *
 * @package YS Magazine
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'ys_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ys_magazine_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on YS Magazine, use a find and replace
	 * to change 'ys-magazine' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ys-magazine', get_template_directory() . '/languages' );

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
	add_image_size('ys-magazine-large-thumb', 820, 300, true);
	add_image_size('ys-magazine-index-thumb', 900, 150, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ys-magazine' ),
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
	/*add_theme_support( 'post-formats', array(
		'aside'
	) );*/

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ys_magazine_custom_background_args', array(
		'default-color' => 'fff',
		'default-image' => '',
		) ) );
	}
	endif; // ys_magazine_setup
	add_action( 'after_setup_theme', 'ys_magazine_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function ys_magazine_widgets_init() {
	$widgetDescription = __( 'The primary sidebar widget of YS Magazine.', 'ys-magazine' );
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ys-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => $widgetDescription,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ys_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ys_magazine_scripts() {
	wp_enqueue_style( 'ys-magazine-flex-style', get_template_directory_uri() . '/css/flexboxgrid.min.css' );

	wp_enqueue_style( 'ys-magazine-style', get_template_directory_uri() . '/style.css' );

	// wp_enqueue_style('ys-magazine-content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css' );

	wp_enqueue_style('ys-magazine-google-fonts', '//fonts.googleapis.com/css?family=Unica+One|Vollkorn:400,400italic,700,700italic');

	wp_enqueue_script( 'ys-magazine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ys-magazine-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20150323', true );

	wp_enqueue_script( 'ys-magazine-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('ys-magazine-superfish'), '20150323', true );

	wp_enqueue_script( 'ys-magazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ys_magazine_scripts' );

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

//Customizer settings for the front page categories:

if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            // Adding the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}
