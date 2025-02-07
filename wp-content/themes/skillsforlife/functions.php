<?php
/**
 * Skills for Life functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skills_for_Life
 */
 
 /* ================================================================================================ */
 /*                                  WP Plugin Update Server                                         */
 /* ================================================================================================ */
 
 /**
 * Selectively uncomment the sections below to enable updates with WP Plugin Update Server.
 *
 * WARNING - READ FIRST:
 * Before deploying the plugin or theme, make sure to change the following value
 * - https://your-update-server.com  => The URL of the server where WP Plugin Update Server is installed
 * - Public API Authentication Key   => The Public API Authentication Key in the "Licenses" tab of WP Plugin Update Server
 * - $prefix_updater                 => Replace "prefix" in this variable's name with a unique theme prefix
 *
 * @see https://github.com/froger-me/wp-package-updater
 **/
 
require_once get_template_directory() . '/lib/wp-package-updater/class-wp-package-updater.php';
 
 /** Enable theme updates with license check **/
 // $prefix_updater = new WP_Package_Updater(
 // 	'https://your-update-server.com',
 // 	wp_normalize_path( __FILE__ ),
 // 	get_stylesheet_directory(),
 // 	'Public API Authentication Key',
 // 	true
 // );
 
 /** Enable theme updates without license check **/
$skillsforlife_updater = new WP_Package_Updater(
 'https://updates.mwscouts.org',
 wp_normalize_path( __FILE__ ),
 get_template_directory()
 );
 
 /* ================================================================================================ */

if ( ! function_exists( 'skillsforlife_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function skillsforlife_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Skills for Life, use a find and replace
		 * to change 'skillsforlife' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'skillsforlife', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

/*
 * Style Gutenberg
 */
function ea_gutenberg_scripts() { wp_enqueue_style( 'ea-genesis-layout', get_stylesheet_directory_uri() . '/editor2-style.css' );}
add_theme_support( 'editor-styles' );
add_editor_style(get_template_directory_uri().'/editor-style.css' );
add_action( 'enqueue_block_editor_assets', 'ea_gutenberg_scripts' );

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
			'menu-1' => esc_html__( 'Primary', 'skillsforlife' ),
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

        
			// Declare Embeds support
		add_theme_support( 'responsive-embeds' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'skillsforlife_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Adds support for editor color palette.
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Black', 'skillsforlife' ),
		'slug'  => 'black',
		'color'	=> '#000000',
	),
	array(
		'name'  => __( 'Dark Gray', 'skillsforlife' ),
		'slug'  => 'dark-grey',
		'color'	=> '#404040',
	),
    array(
        'name'  => __( 'Light Gray', 'skillsforlife' ),
        'slug'  => 'light-grey',
        'color'	=> '#f1f1f1',
    ),
	array(
		'name'  => __( 'White', 'skillsforlife' ),
		'slug'  => 'white',
		'color' => '#ffffff',
	),
	array(
		'name'  => __( 'Scout Dark Purple', 'skillsforlife' ),
		'slug'  => 'dark-purple',
		'color' => '#490499',
       ),
	array(
		'name'  => __( 'Scout Purple', 'skillsforlife' ),
		'slug'  => 'scout-purple',
		'color' => '#7413dc',
       ),
    array(
		'name'  => __( 'Scout Teal', 'skillsforlife' ),
		'slug'  => 'scout-teal',
		'color' => '#088486',
       ),
    array(
		'name'  => __( 'Scout Red', 'skillsforlife' ),
		'slug'  => 'scout-red',
		'color' => '#e22e12',
       ),
    array(
		'name'  => __( 'Scout Pink', 'skillsforlife' ),
		'slug'  => 'scout-pink',
		'color' => '#ffb4e5',
       ),
    array(
		'name'  => __( 'Scout Green', 'skillsforlife' ),
		'slug'  => 'scout-green',
		'color' => '#23a950',
       ),
    array(
		'name'  => __( 'Scout Navy', 'skillsforlife' ),
		'slug'  => 'scout-navy',
		'color' => '#003982',
       ),
    array(
		'name'  => __( 'Scout Blue', 'skillsforlife' ),
		'slug'  => 'scout-blue',
		'color' => '#006ddf',
       ),
    array(
		'name'  => __( 'Scout Yellow', 'skillsforlife' ),
		'slug'  => 'scout-yellow',
		'color' => '#ffe627',
       ),
    array(
       'name'  => __( 'Scout Orange', 'skillsforlife' ),
       'slug'  => 'scout-orange',
       'color' => '#ff912a',
          ),
    array(
        'name'  => __( 'Scout Forest Green', 'skillsforlife' ),
        'slug'  => 'scout-forest-green',
        'color' => '#205b41',
           ),
   array(
      'name'  => __( 'Scout Section Green', 'skillsforlife' ),
      'slug'  => 'scout-section-green',
      'color' => '#004851',
       ),
) );
	}
endif;
add_action( 'after_setup_theme', 'skillsforlife_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skillsforlife_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'skillsforlife_content_width', 640 );
}
add_action( 'after_setup_theme', 'skillsforlife_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skillsforlife_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skillsforlife' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'skillsforlife' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
  
  // header-widget-left
  register_sidebar(array(
      'name' => __('header-widget-left', 'skillsforlife'),
      'description' => __('Description for this widget-area...', 'skillsforlife'),
      'id' => 'header-widget-left-widget',
  'before_widget' => '<section id="%1$s" class="header-widget-left-widget %2$s">',
  'after_widget'  => '</section>',
  ));	
  
  register_sidebar(array(
    'name' => __('header-widget-centre', 'skillsforlife'),
    'description' => __('Description for this widget-area...', 'skillsforlife'),
    'id' => 'header-widget-centre-widget',
'before_widget' => '<section id="%1$s" class="header-widget-centre-widget %2$s">',
'after_widget'  => '</section>',
));	

register_sidebar(array(
  'name' => __('header-widget-right', 'skillsforlife'),
  'description' => __('Description for this widget-area...', 'skillsforlife'),
  'id' => 'header-widget-righ-widgett',
'before_widget' => '<section id="%1$s" class="header-widget-right-widget %2$s">',
'after_widget'  => '</section>',
));	
  
	 // sub-banner-widget-grey
    register_sidebar(array(
        'name' => __('sub-banner-widget', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'sub-banner-widget',
        'before_widget' => '<div id="%1$s" class="sub-banner-widget">',
        'after_widget' => '</div><div class="clear"></div></div>',
        'before_title' => '<div class="heading">',
        'after_title' => '</div><div class="sub-banner-widget-menu">'
    ));
    // sub-banner--index-widget-grey
     register_sidebar(array(
         'name' => __('sub-banner-index-widget', 'skillsforlife'),
         'description' => __('Description for this widget-area...', 'skillsforlife'),
         'id' => 'sub-banner-index-widget',
         'before_widget' => '<div id="%1$s" class="sub-banner-index-widget">',
         'after_widget' => '</div></div>',
         'before_title' => '<div class="heading">',
         'after_title' => '</div><div class="sub-banner-widget-menu">'
     ));
    // sub-banner-widget-navy
    register_sidebar(array(
        'name' => __('sub-banner-widget-navy', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'sub-banner-widget-navy',
        'before_widget' => '<div id="%1$s" class="sub-banner-widget-navy">',
        'after_widget' => '</div><div class="clear"></div></div>',
        'before_title' => '<div class="heading">',
        'after_title' => '</div><div class="sub-banner-widget-navy-menu">'
    ));
		// Groups Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Groups Sidebar', 'skillsforlife' ),
		'id'            => 'groups-sidebar',
		'description'   => esc_html__( 'Groups & Units.', 'skillsforlife' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
		// Services Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Services Sidebar', 'skillsforlife' ),
		'id'            => 'services-sidebar',
		'description'   => esc_html__( 'Support on offer.', 'skillsforlife' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	// ASU Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Active Support Sidebar', 'skillsforlife' ),
		'id'            => 'asu-sidebar',
		'description'   => esc_html__( 'Support on offer.', 'skillsforlife' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
   
     // footer-widget-left
    register_sidebar(array(
        'name' => __('footer-widget-left', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'footer-widget-left',
        'before_widget' => '<div id="%1$s" class="widget-footer">',
        'after_widget' => '</div><div class="clear"></div></div>',
        'before_title' => '<div class="heading">',
        'after_title' => '</div><div class="widget-footer-content">'
    ));

	// footer-widget-mid-left
    register_sidebar(array(
        'name' => __('footer-widget-mid-left', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'footer-widget-mid-left',
        'before_widget' => '<div id="%1$s" class="widget-footer">',
        'after_widget' => '</div><div class="clear"></div></div>',
        'before_title' => '<div class="heading">',
        'after_title' => '</div><div class="widget-footer-content">'
    ));

	// footer-widget-mid-right
    register_sidebar(array(
        'name' => __('footer-widget-mid-right', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'footer-widget-mid-right',
        'before_widget' => '<div id="%1$s" class="widget-footer">',
        'after_widget' => '</div><div class="clear"></div></div>',
        'before_title' => '<div class="heading">',
        'after_title' => '</div><div class="widget-footer-content">'
    ));

	// footer-widget-right
    register_sidebar(array(
        'name' => __('footer-widget-right', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'footer-widget-right',
        'before_widget' => '<div id="%1$s" class="widget-footer">',
        'after_widget' => '</div><div class="clear"></div>',
        'before_title' => '<div class="heading">',
        'after_title' => '</div><div class="widget-footer-content">'
    ));

	// home-widget-left
    register_sidebar(array(
        'name' => __('home-widget-left', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'home-widget-left',
		'before_widget' => '<section id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
    ));	

	// home-widget-mid
    register_sidebar(array(
        'name' => __('home-widget-mid', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'home-widget-mid',
		'before_widget' => '<section id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
    ));	
    

	// home-widget-right
    register_sidebar(array(
        'name' => __('home-widget-right', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'home-widget-right',
		'before_widget' => '<section id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
    ));	
    
    // home-widget-main
    register_sidebar(array(
        'name' => __('home-widget-main', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'home-widget-main',
		'before_widget' => '<section id="%1$s" class="home-main-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
    ));	
    
    // home-widget-main-bottom
    register_sidebar(array(
        'name' => __('home-widget-main-bottom', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'home-widget-main-bottom',
		'before_widget' => '<section id="%1$s" class="home-main-widget-bottom %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
    ));	
    
    // safety-widget-right
    register_sidebar(array(
        'name' => __('safety-widget-right', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'safety-widget-right',
        'before_widget' => '<div id="%1$s" class="safety-widget">',
        'after_widget' => '</div><div class="clear"></div></div>',
        'before_title' => '<div class="heading">',
        'after_title' => '</div><div class="safety-widget-content">'
    ));
    
    //  contact-widget
    register_sidebar(array(
        'name' => __('contact-widget', 'skillsforlife'),
        'description' => __('Description for this widget-area...', 'skillsforlife'),
        'id' => 'contact-widget',
        'before_widget' => '<section id="%1$s" class="contact-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h1>',
        'after_title'   => '</h1>',
    ));	
 
 //   contact-map-widget
 register_sidebar(array(
     'name' => __(' contact-map-widget', 'skillsforlife'),
     'description' => __('Description for this widget-area...', 'skillsforlife'),
     'id' => ' contact-map-widget',
     'before_widget' => '<section id="%1$s" class=" contact-map-widget %2$s">',
     'after_widget'  => '</section>',
     'before_title'  => '<h1>',
     'after_title'   => '</h1>',
 ));	

}
add_action( 'widgets_init', 'skillsforlife_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skillsforlife_scripts() {
	wp_enqueue_style( 'skillsforlife-style', get_stylesheet_uri() );

    wp_register_style('skillsforlife-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('skillsforlife-fontawesome'); // Enqueue it!
	
    wp_register_style('skillsforlife-nunitosans', 'https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900', array(), '1.0', 'all');
    wp_enqueue_style('skillsforlife-nunitosans'); // Enqueue it!
	
    wp_register_style('skillsforlife-animate', get_template_directory_uri() . '/animate.css', array(), '1.0', 'all');
    wp_enqueue_style('skillsforlife-animate'); // Enqueue it!

	wp_register_style('colorbox', get_template_directory_uri() . '/js/colorbox/colorbox.css', array(), '1.0', 'all');
    wp_enqueue_style('colorbox'); // Enqueue it!

	wp_register_style('flipclock', get_template_directory_uri() . '/js/flipclock/flipclock.css', array(), '1.0', 'all');
    wp_enqueue_style('flipclock'); // Enqueue it!

	wp_enqueue_script( 'skillsforlife-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'skillsforlife-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'skillsforlife-search', get_template_directory_uri() . '/js/search.js', array(), '20151215', true );
	
	wp_enqueue_script( 'skillsforlife-wowjs', get_template_directory_uri() . '/js/wow.js', array(), '20151215', true );

  wp_enqueue_script( 'skillsforlife-scriptsjs', get_template_directory_uri() . '/js/scripts.js', array('jquery'));

	wp_enqueue_script( 'skillsforlife-colorbox', get_template_directory_uri() . '/js/colorbox/jquery.colorbox-min.js', array(), '20151215', true );

	wp_enqueue_script( 'skillsforlife-flipclock', get_template_directory_uri() . '/js/flipclock/flipclock.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skillsforlife_scripts' );

/**
 * Custom Marker Store Locator
 */
define( 'WPSL_MARKER_URI', dirname( get_bloginfo( 'stylesheet_url') ) . '/wpsl-markers/' );

add_filter( 'wpsl_admin_marker_dir', 'custom_admin_marker_dir' );

function custom_admin_marker_dir() {

    $admin_marker_dir = get_stylesheet_directory() . '/wpsl-markers/';
    
    return $admin_marker_dir;
}

/**
 * Implement the Custom Header feature.
 */
/* require get_template_directory() . '/inc/custom-header.php'; */

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

//Add the give below snippet in themes function.php file
// Or create a snippet using code snippet plugin
//Set theme_location parameter by the menu locations theme offers

add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

// Display fontawesome search icon in menus and toggle search form 

function add_search_form($items, $args) {
if( $args->theme_location == 'menu-1' )
       $items .= '<li class="search"><span class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i></span></li>';
       return $items;
}

// add arrows to menu parent 
function skillsforlife_add_menu_parent_class( $items ) {
 
 $parents = array();
 foreach ( $items as $item ) {
 if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
 $parents[] = $item->menu_item_parent;
 }
 }
 
 foreach ( $items as $item ) {
 if ( in_array( $item->ID, $parents ) ) {
 $item->classes[] = 'has-children';
 }
 }
 
 return $items;
}
add_filter( 'wp_nav_menu_objects', 'skillsforlife_add_menu_parent_class' );

// Breadcrumbs
function skillsforlife_breadcrumbs() {
       
    // Settings
    $separator          = '<div class="chevron-right-gray" style="font-weight: 100;"></div>';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrumbs
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                
                $vals = array_values($category);
                $last_category = end($vals);
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul><div class="share-space"><a onclick="openShare()"><img class="share-button" src="'.get_template_directory_uri().'/img/share.svg"></a></div>';
           
    }
       
}

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '... <p class="read-more"><a href="%1$s">%2$s <i class="far fa-angle-right"></i></a></p>',
            get_permalink( get_the_ID() ),
            __( 'Read More', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

add_action( 'customize_register', 'skillsforlife_register_theme_customizer' );

 	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
	 	// Menu descriptions
class Menu_With_Description extends Walker_Nav_Menu {
function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
         
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
 
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
 
        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
 
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '<div class="sub">'. $item->description . '</div>';
        $item_output .= '</a>';
        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


$item_output = "";
if (isset($args->before)) {
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '<div class="sub">'. $item->description . '</div>';
    $item_output .= '</a>';
    $item_output .= $args->after;
}



// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravataricon.png';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}
/**
 * Add iFrame to allowed wp_kses_post tags
 *
 * @param array  $tags Allowed tags, attributes, and/or entities.
 * @param string $context Context to judge allowed tags by. Allowed values are 'post'.
 *
 * @return array
 */
 function custom_wpkses_post_tags( $tags, $context ) {

	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => false,
			'allowfullscreen' => true,
		);
	}

	return $tags;
}

add_filter( 'wp_kses_allowed_html', 'custom_wpkses_post_tags', 10, 2 );
add_theme_support( 'align-wide' );

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Skills for Life
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'skillsforlife_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function skillsforlife_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(


        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'KIA Subtitle',
            'slug'      => 'kia-subtitle',
            'required'  => true,
        ),
        array(
            'name'      => 'Quick and Easy FAQs',
            'slug'      => 'quick-and-easy-faqs',
            'required'  => true,
        ),
        array(
            'name'      => 'SVG Support',
            'slug'      => 'svg-support',
            'required'  => true,
        ),
        array(
            'name'      => 'Wired Impact Volunteer Management',
            'slug'      => 'wired-impact-volunteer-management',
            'required'  => false,
        ),
        array(
            'name'      => 'WP Store Locator',
            'slug'      => 'wp-store-locator',
            'required'  => false,
        ),
        array(
            'name'      => 'The Events Calendar',
            'slug'      => 'the-events-calendar',
            'required'  => false,
        ),

    );
    
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'skillsforlife',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

        /*
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'skillsforlife' ),
            'menu_title'                      => __( 'Install Plugins', 'skillsforlife' ),
            /* translators: %s: plugin name. * /
            'installing'                      => __( 'Installing Plugin: %s', 'skillsforlife' ),
            /* translators: %s: plugin name. * /
            'updating'                        => __( 'Updating Plugin: %s', 'skillsforlife' ),
            'oops'                            => __( 'Something went wrong with the plugin API.', 'skillsforlife' ),
            'notice_can_install_required'     => _n_noop(
                /* translators: 1: plugin name(s). * /
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'skillsforlife'
            ),
            'notice_can_install_recommended'  => _n_noop(
                /* translators: 1: plugin name(s). * /
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'skillsforlife'
            ),
            'notice_ask_to_update'            => _n_noop(
                /* translators: 1: plugin name(s). * /
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'skillsforlife'
            ),
            'notice_ask_to_update_maybe'      => _n_noop(
                /* translators: 1: plugin name(s). * /
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'skillsforlife'
            ),
            'notice_can_activate_required'    => _n_noop(
                /* translators: 1: plugin name(s). * /
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'skillsforlife'
            ),
            'notice_can_activate_recommended' => _n_noop(
                /* translators: 1: plugin name(s). * /
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'skillsforlife'
            ),
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'skillsforlife'
            ),
            'update_link' 					  => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'skillsforlife'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'skillsforlife'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'skillsforlife' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'skillsforlife' ),
            'activated_successfully'          => __( 'The following plugin was activated successfully:', 'skillsforlife' ),
            /* translators: 1: plugin name. * /
            'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'skillsforlife' ),
            /* translators: 1: plugin name. * /
            'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'skillsforlife' ),
            /* translators: 1: dashboard link. * /
            'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'skillsforlife' ),
            'dismiss'                         => __( 'Dismiss this notice', 'skillsforlife' ),
            'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'skillsforlife' ),
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'skillsforlife' ),

            'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
        ),
        */
    );

    tgmpa( $plugins, $config );
}
/*
 * Woocommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}

/*
 * Social sharing
 */

function skillsforlife_social_sharing_buttons($content) {
  global $post;
  if(is_singular() || is_home()){
  
    // Get current page URL 
    $skillsforlifeURL = urlencode(get_permalink());
 
    // Get current page title
    $skillsforlifeTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
    // $skillsforlifeTitle = str_replace( ' ', '%20', get_the_title());
    
    // Get Post Thumbnail for pinterest
    $skillsforlifeThumbnail = get_the_post_thumbnail_url( $post->ID,'full');
 
    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$skillsforlifeTitle.'&amp;url='.$skillsforlifeURL.'';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$skillsforlifeURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$skillsforlifeURL.'&amp;title='.$skillsforlifeTitle;
    $whatsappURL = 'https://wa.me/?text=Thought%20you%20would%20be%20interested%20in%20this%20%23SkillsForLife - '. $skillsforlifeURL;
    $emailURL = 'mailto:?&amp;subject=Thought%20you%20would%20be%20interested%20in%20this%20%23SkillsForLife&amp;body='.$skillsforlifeURL;
 
    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$skillsforlifeURL.'&amp;media='.$skillsforlifeThumbnail.'&amp;description='.$skillsforlifeTitle;
    
    // Add sharing button at the end of page/page content
    $content .= '<div class="social-social">';
    $content .= '<div class="social-share"><a class="social-link social-facebook" href="'.$facebookURL.'" target="_blank" rel="noopener"><span class="social-img"><img src="'.get_template_directory_uri().'/img/facebook-share.svg"></img></span><span class="social-label">Facebook</span></a></div>';
    $content .= '<div class="social-share"><a class="social-link social-twitter" href="'. $twitterURL .'" target="_blank" rel="noopener"><span class="social-img"><img src="'.get_template_directory_uri().'/img/twitter-share.svg"></img></span><span class="social-label">Twitter</span</a></div>';
    $content .= '<div class="social-share"><a class="social-link social-whatsapp" href="'.$whatsappURL.'" target="_blank" rel="noopener"><span class="social-img"><img src="'.get_template_directory_uri().'/img/whatsapp-share.svg"></img></span><span class="social-label">WhatsApp</span></a></div>';
    $content .= '<div class="social-share"><a class="social-link social-linkedin" href="'.$linkedInURL.'" target="_blank" rel="noopener"><span class="social-img"><img src="'.get_template_directory_uri().'/img/linkedin-share.svg"></img></span><span class="social-label">LinkedIn</span></a></div>';
    $content .= '<div class="social-share"><a class="social-link social-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank" rel="noopener"><span class="social-img"><img src="'.get_template_directory_uri().'/img/pinterest-share.svg"></img></span><span class="social-label">Pin It</span></a></div>';
    $content .= '<div class="social-share"><a class="social-link social-email" href="'.$emailURL.'" target="_blank" rel="noopener"><span class="social-img"><img src="'.get_template_directory_uri().'/img/email-share.svg"></img></span><span class="social-label">Email</span></a></div>';
    $content .= '<div class="social-share"><a class="social-link social-print" onclick="closeShare();window.print()"><span class="social-img"><img src="'.get_template_directory_uri().'/img/print.svg"></img></span><span class="social-label">Print</span></a></div>';
    $content .= '</div>';
 
  return $content;
  }else{
    // if not a post/page then don't include sharing button
    return $variable.$content;
  }
};


/*
 * Sub-banner - colour selection
 */
/* Display the post meta box. */
function sfl_post_shift_meta_box( $post ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'sfl_post_shift_nonce' ); ?>
  <?php  $dropdown_value = get_post_meta( get_the_ID(), 'sfl_shift', true ); ?>
  <p>
    <label for="sfl-post-shift"><?php _e( "Use this colour for the post", 'example' ); ?></label>
    <label for="sfl-post-shift"><?php _e( "using Template: Full Width - Colour Sub-banner ", 'example' ); ?></label>
    <br />
     <select name="sfl-post-shift" id="sfl-post-shift">
        <option value="purple" <?php if($dropdown_value == 'purple') echo 'selected'; ?>>Purple</option>
        <option value="teal" <?php if($dropdown_value == 'teal') echo 'selected'; ?>>Teal</option>
        <option value="navy" <?php if($dropdown_value == 'navy') echo 'selected'; ?>>Navy</option>
        <option value="grey" <?php if($dropdown_value == 'grey') echo 'selected'; ?>>Grey</option>
        <option value="yellow" <?php if($dropdown_value == 'yellow') echo 'selected'; ?>>Yellow</option>
         <option value="red" <?php if($dropdown_value == 'red') echo 'selected'; ?>>Red</option>
          <option value="pink" <?php if($dropdown_value == 'pink') echo 'selected'; ?>>Pink</option>
           <option value="green" <?php if($dropdown_value == 'green') echo 'selected'; ?>>Green</option>
            <option value="blue" <?php if($dropdown_value == 'blue') echo 'selected'; ?>>Blue</option>
              <option value="black" <?php if($dropdown_value == 'black') echo 'selected'; ?>>Black</option>
            <option value="sgreen" <?php if($dropdown_value == 'sgreen') echo 'selected'; ?>>Scout Green</option>
    </select>   
   <!-- <input class="widefat" type="text" name="sfl-post-shift" id="sfl-post-shift" value="<?php echo esc_attr( get_post_meta( $post->ID, 'sfl_shift', true ) ); ?>" size="30" /> -->
  </p>
<?php }

function sfl_add_post_meta_boxes() {

  add_meta_box(
    'sfl-post-shift',      // Unique ID
    esc_html__( 'Offset for Header Image', 'example' ),    // Title
    'sfl_post_shift_meta_box',   // Callback function
    'post',         // Admin page (or post type)
    'side',         // Context
    'core'         // Priority
  );
  
   global $post;
$page_template = get_post_meta( $post->ID, '_wp_page_template', true );
//if ( 'page-fullwidth-subbanner-color.php' == $page_template ) {
    if(!empty($post))
    {
         
            add_meta_box(
                'product_meta', // $id
                'Color for Header', // $title
                'sfl_post_shift_meta_box', // $callback
                'page', // $page
                'side', // $context
                'high'); // $priority
        
    }
//}
}

/* Save the meta box’s post metadata. */
function sfl_save_post_class_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['sfl_post_shift_nonce'] ) || !wp_verify_nonce( $_POST['sfl_post_shift_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['sfl-post-shift'] ) ? $_POST['sfl-post-shift']  : '' );

  /* Get the meta key. */
  $meta_key = 'sfl_shift';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && ’ == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( ’ == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}


/* Meta box setup function. */
function sfl_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'sfl_add_post_meta_boxes' );
  add_action( 'save_post', 'sfl_save_post_class_meta', 10, 2 );
}
add_action( 'load-post.php', 'sfl_meta_boxes_setup' );
add_action( 'load-post-new.php', 'sfl_meta_boxes_setup' );

/*
 * Group picker widget
 */
class grouppicker_widget extends WP_Widget {
    
  function __construct() {
  parent::__construct(
    
  // Base ID of your widget
  'grouppicker_widget', 
    
  // Widget name will appear in UI
  __('Group Picker Widget', 'grouppicker_widget_domain'), 
    
  // Widget description
  array( 'description' => __( 'Add a dropdown list of all the groups in your District/County', 'grouppicker_widget_domain' ), ) 
  );
  }
    
  // Creating widget front-end
    
  public function widget( $args, $instance ) {
  $title = apply_filters( 'widget_title', $instance['title'] );
    
  // before and after widget arguments are defined by themes
  echo $args['before_widget'];
  if ( ! empty( $title ) )
  //echo $args['before_title'] . $title . $args['after_title'];
    
  // This is where you run the code and display the output
  //echo __( 'Hello, World!', 'grouppicker_widget_domain' );
  //echo(get_theme_mod( 'sfl_group_page' ));
  $my_wp_query = new WP_Query();
  $all_wp_pages = $my_wp_query->query(array('post_type' => 'page','posts_per_page' => -1));
  $gp = get_page_children(get_theme_mod( 'sfl_group_page' ),$all_wp_pages);
  echo('<div class="group-finder">
        <div id="group-picker">
  <div class="top"><span class="text">Select a group...</span><span class="arrow"></span></div>
            <ul class="dropdown" style="">');
  // echo '<pre>' . print_r( $gp, true ) . '</pre>';
  echo("<li class='ddgf' style='line-height: 1;'><b><a href='".get_page_link(get_theme_mod( 'sfl_group_page' ))."'>");
  echo('Search by Postcode...');echo("</a></b></li>");
  foreach($gp as $s){
  //    echo($s->ID);
      echo("<li class='ddgf' style='line-height: 1'><a href='".get_page_link($s->ID)."'>");
      echo($s->post_title);echo("</a></li>");
  }
  echo('</ul></div></div>');
  echo $args['after_widget'];
  }
            
  // Widget Backend 
  public function form( $instance ) {
  if ( isset( $instance[ 'title' ] ) ) {
  $title = $instance[ 'title' ];
  }
  else {
  $title = __( 'New title', 'grouppicker_widget_domain' );
  }
  // Widget admin form
  ?>
  <p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
  </p>
  <?php 
  }
        
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
  $instance = array();
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  return $instance;
  }
   
  // Class wpb_widget ends here
  } 
  
  add_action( 'widgets_init', 'wpdocs_register_widgets' );
   
  function wpdocs_register_widgets() {
      register_widget( 'grouppicker_widget' );
  }
  add_filter( 'tribe_tickets_block_ticket_html_attributes', 'rt_et_woo_payments_fatal_fix' );
  
  function rt_et_woo_payments_fatal_fix( $attrs ) {
    if ( ! isset( $attrs['data-ticket-price'] ) ) {
      return $attrs;
    }
  
    $attrs['data-ticket-price'] = (string) $attrs['data-ticket-price'];
  
    return $attrs;
  }