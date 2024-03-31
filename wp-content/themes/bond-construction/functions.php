<?php
/**
 * Bond Construction functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bond Construction
 */

if ( ! function_exists( 'bond_construction_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bond_construction_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bond Construction, use a find and replace
		 * to change 'bond-construction' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bond-construction' );

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
		
		add_image_size( 'bond-construction-home-blog', 400, 300, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'bond-construction' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bond_construction_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-header', array(
		        'default-image'      => '%s/assets/img/header-image.jpg',
		        'default-text-color' => '000',
		       	'width'              => 1332, /* 16:9 Aspect Ratio */
				'height'             => 749,
		    ) );
	

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	    
    	/*
    	 * This theme styles the visual editor to resemble the theme style,
    	 * specifically font, colors, and column width.
     	 */
    	add_editor_style( array( 'assets/css/editor-style.css', bond_construction_fonts_url() ) );

    	// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'bond-construction' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'bond-construction' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'bond-construction' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'bond-construction' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'bond-construction' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'bond-construction' ),
		       	'shortName' => esc_html__( 'S', 'bond-construction' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'bond-construction' ),
		       	'shortName' => esc_html__( 'M', 'bond-construction' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'bond-construction' ),
		       	'shortName' => esc_html__( 'L', 'bond-construction' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'bond-construction' ),
		       	'shortName' => esc_html__( 'XL', 'bond-construction' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'bond_construction_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bond_construction_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bond_construction_content_width', 900 );
}
add_action( 'after_setup_theme', 'bond_construction_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bond_construction_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'bond-construction' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bond-construction' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for ( $i=1; $i <= 4; $i++ ) { 
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area ', 'bond-construction' )  . $i,
			'id'            => 'footer-' . $i,
			'description'   => esc_html__( 'Add widgets here.', 'bond-construction' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title aos_content">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'bond_construction_widgets_init' );

/**
 * Register custom fonts.
 */
function bond_construction_fonts_url() {
	$fonts_url = '';

	$font_families = array();
	
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Montserrat, translate this to 'off'. Do not translate
	 * into your own language.
	 */

	$montserrat_sans = _x( 'on', 'Montserrat font: on or off', 'bond-construction' );

	if ( 'off' !== $montserrat_sans ) {
		$font_families[] = 'Montserrat:400,700';
	}


	$raleway_sans = _x( 'on', 'Raleway: on or off', 'bond-construction' );

	if ( 'off' !== $raleway_sans ) {
		$font_families[] = 'Raleway:400,600';
	}


	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function bond_construction_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bond-construction-fonts', bond_construction_fonts_url(), array(), null );
	
	//slick.css
	wp_enqueue_style( 'slick', get_theme_file_uri() . '/assets/css/slick.css', '', '1.8.0' );


	//slick-theme.css
	wp_enqueue_style( 'slick-theme', get_theme_file_uri() . '/assets/css/slick-theme.css', '', '1.8.0' );

	//font-awesome.css
	wp_enqueue_style( 'font-awesome', get_theme_file_uri() . '/assets/css/font-awesome.css', '', '4.7.0' );

	// blocks
	wp_enqueue_style( 'bond-construction-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

	wp_enqueue_style( 'bond-construction-style', get_stylesheet_uri() );

	//slick.js
	wp_enqueue_script( 'slick-jquery', get_theme_file_uri( '/assets/js/slick.js' ), array( 'jquery' ), '20151215', true );

	// matchHeight
	wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight.js', array( 'jquery' ), true );

	wp_enqueue_script( 'bond-construction-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '20151215', true );

	wp_enqueue_script( 'bond-construction-skip-link-focus-fix', get_theme_file_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'bond-construction-custom', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bond_construction_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since bond-construction 1.0.0
 */
function bond_construction_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'bond-construction-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'bond-construction-fonts', bond_construction_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'bond_construction_block_editor_styles' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Breadcrumb trail class.
 */
require get_parent_theme_file_path( '/inc/class-breadcrumb-trail.php' );

/**
 * Metabox
 */
require get_parent_theme_file_path( '/inc/metabox.php' );


/**
 * TGMPA call
 */
require get_parent_theme_file_path( '/inc/tgmpa/call.php' );

require get_parent_theme_file_path( '/inc/custom-style.php' );


/**
 * Enqueue admin css.
 * @return [type] [description]
 */
function bond_construction_load_custom_wp_admin_style( $hook ) {

    wp_register_style( 'bond-construction-admin', get_theme_file_uri( 'assets/css/bond-construction-admin.css' ), false, '1.0.0' );
    wp_enqueue_style( 'bond-construction-admin' );
}
add_action( 'admin_enqueue_scripts', 'bond_construction_load_custom_wp_admin_style' );



/**
 *
 * Reset all setting to default.
 *
 */
function bond_construction_reset_settings() {
    $reset_settings = get_theme_mod( 'bond_construction_reset_settings', false );
    if ( $reset_settings ) {
        remove_theme_mods();
    }
}
add_action( 'customize_save_after', 'bond_construction_reset_settings' );


if ( ! function_exists( 'bond_construction_exclude_sticky_posts' ) ) {
    function bond_construction_exclude_sticky_posts( $query ) {
        if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
            $sticky_posts = get_option( 'sticky_posts' );  
            if ( ! empty( $sticky_posts ) ) {
            	$query->set('post__not_in', $sticky_posts );
            }
            $query->set('ignore_sticky_posts', true );
        }
    }
}
add_action( 'pre_get_posts', 'bond_construction_exclude_sticky_posts' );

function bond_construction_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Bond Construction Theme.', 'bond-construction' ),
    esc_url( 'https://bitbucket.org/totheme/bond-construction-demo/get/007ff83258c2.zip' ), esc_html__( 'Click here for Demo File download', 'bond-construction' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'bond_construction_intro_text' );
