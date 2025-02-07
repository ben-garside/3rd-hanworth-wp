<?php
/**
 * Skills for Life Theme Customizer
 *
 * @package Skills_for_Life
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
add_action( 'admin_enqueue_scripts', 'sfl_load_admin_styles' );
function sfl_load_admin_styles() {
		wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
		  }  
 
 
function skillsforlife_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'skillsforlife_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'skillsforlife_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'skillsforlife_customize_register' );

/*
 * Register Our Customizer Stuff Here
 */
function skillsforlife_register_theme_customizer( $wp_customize ) {
	
	
	// Welcome Box Background Colour
	// Add setting
	$wp_customize->add_setting( 'welcome_box_bg_colour', array(
		 'default'           => __( '#490499', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_hex_color'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'welcome_box_bg_colour',
		    array(
		        'label'    => __( 'Welcome Box Background Colour', 'skillsforlife' ),
		        'section'  => 'colors',
		        'settings' => 'welcome_box_bg_colour',
		        'type'     => 'color'
		    )
	    )
	);
	
	// Widget Background Colour
	// Add setting
	$wp_customize->add_setting( 'wgt_bg_colour', array(
		 'default'           => __( '#00A794', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_hex_color'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'wgt_bg_colour',
			array(
				'label'    => __( 'Widget Area Background Colour', 'skillsforlife' ),
				'section'  => 'colors',
				'settings' => 'wgt_bg_colour',
				'type'     => 'color'
			)
		)
	);
	
	// Social Background Colour
	// Add setting
	$wp_customize->add_setting( 'social_bg_colour', array(
		 'default'           => __( '#00A794', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_hex_color'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'social_bg_colour',
			array(
				'label'    => __( 'Social Background Colour', 'skillsforlife' ),
				'section'  => 'colors',
				'settings' => 'social_bg_colour',
				'type'     => 'color'
			)
		)
	);
	
	// Footer Background Colour
	// Add setting
	$wp_customize->add_setting( 'footer_bg_colour', array(
		 'default'           => __( '#490499', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_hex_color'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'footer_bg_colour',
		    array(
		        'label'    => __( 'Footer Background Colour', 'skillsforlife' ),
		        'section'  => 'colors',
		        'settings' => 'footer_bg_colour',
		        'type'     => 'color'
		    )
	    )
	);

	// Create custom panel.
	$wp_customize->add_panel( 'sitewide_notice', array(
		'priority'       => 20,
		'theme_supports' => '',
		'title'          => __( 'Side Wide Notice', 'skillsforlife' ),
		'description'    => __( 'Enable a collapsable site-wide notice in the header', 'skillsforlife' ),
	) );

	// Enable Site-wide Notice
	// Add section.
	$wp_customize->add_section( 'enable_sitewide_notice' , array(
		'title'    => __('Enable Site-wide Notice','skillsforlife'),
		'panel'    => 'sitewide_notice',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'enable_sitewide_notice'
	);
	$wp_customize->add_control(
		'enable_sitewide_notice',
		array(
			'type' => 'checkbox',
			'label' => 'Enables the site-wide notice.',
			'section' => 'enable_sitewide_notice',
		)
	);

// Site-wide Notice Icon
// Add section.
$wp_customize->add_section( 'sitewide_notice_icon' , array(
	'title'    => __('Site-wide Notice Icon','skillsforlife'),
	'panel'    => 'sitewide_notice',
	'priority' => 10
) );
// Add setting
$wp_customize->add_setting( 'sitewide_notice_icon', array(
	'capability' => 'edit_theme_options',
	 'default'           => __( '"\f071"', 'skillsforlife' ),
//	 'sanitize_callback' => 'sanitize_text'
) );

$ic =  array( 
	
	'"\f071"' => 'Warning &#xf071;',
	'"\f002"' => 'Search &#xf002;', 
	'"\f003"' => 'Envelope &#xf003;', 
	'"\f004"' => 'Heart &#xf004;', 
	'"\f005"' => 'Star &#xf005;', 
	'"\f006"' => 'Star-o &#xf006;', 
	'"\f007"' => 'User &#xf007;', 
	'"\f008"' => 'Film &#xf008;', 
	'"\f00c"' => 'Tick &#xf00c;', 
	'"\f00d"' => 'Cross &#xf00d;', 
	'"\f011"' => 'Power &#xf011;', 
	'"\f013"' => 'Cog &#xf013;', 
	'"\f015"' => 'Home &#xf015;', 
	'"\f016"' => 'File &#xf016;', 
	'"\f017"' => 'Clock &#xf017;', 
	'"\f018"' => 'Road &#xf018;', 
	'"\f019"' => 'Download &#xf019;', 
	'"\f01a"' => 'Arrow Up &#xf01a;', 
	'"\f01b"' => 'Arrow Down &#xf01b;', 
	'"\f01c"' => 'Inbox &#xf01c;', 
	'"\f01d"' => 'Play &#xf01d;', 
	'"\f01e"' => 'Repeat &#xf01e;', 
	'"\f021"' => 'Refresh &#xf021;', 
	'"\f022"' => 'List &#xf022;', 
	'"\f023"' => 'Lock &#xf023;', 
	'"\f024"' => 'Flag &#xf024;', 
	'"\f025"' => 'Headphones &#xf025;', 
	'"\f026"' => 'Mute &#xf026;', 
	'"\f027"' => 'Volume down &#xf027;', 
	'"\f028"' => 'Volume up &#xf028;', 
	'"\f029"' => 'QR code &#xf029;', 
	'"\f02a"' => 'Barcode &#xf02a;', 
	'"\f02b"' => 'Tag &#xf02b;', 
	'"\f02d"' => 'Book &#xf02d;', 
	'"\f02f"' => 'Print &#xf02f;', 
	'"\f030"' => 'Font &#xf030;', 
	'"\f03d"' => 'Video Camera &#xf03d;', 
	'"\f040"' => 'Pencil &#xf040;', 
	'"\f041"' => 'Map Marker &#xf041;', 
	'"\f059"' => 'Question &#xf059;', 
	'"\f05a"' => 'Info &#xf05a;', 
	'"\f064"' => 'Share &#xf064;', 
	'"\f065"' => 'Expand &#xf065;', 
	'"\f066"' => 'Compress &#xf066;', 
	'"\f06a"' => 'Exclaimation &#xf06a;', 
	'"\f069"' => 'Asterisk &#xf069;', 
	'"\f06b"' => 'Gift &#xf06b;', 
	'"\f06d"' => 'Fire &#xf06d;', 
	'"\f06c"' => 'Leaf &#xf06c;', 
	'"\f06e"' => 'Eye &#xf06e;', 
	'"\f073"' => 'Calendar &#xf073;', 
	'"\f075"' => 'Comment &#xf075;', 
	'"\f07a"' => 'Shopping Cart &#xf07a;', 
	'"\f081"' => 'Twitter &#xf081;', 
	'"\f082"' => 'Facebook &#xf082;', 
	'"\f08e"' => 'External Link &#xf08e;', 
	'"\f090"' => 'Sign in &#xf090;', 
	'"\f093"' => 'Upload &#xf093;', 
	'"\f095"' => 'Phone &#xf095;',  
	'"\f09c"' => 'Unlock &#xf09c;', 
	'"\f09d"' => 'Credit Card &#xf09d;',
	'"\f09e"' => 'RSS &#xf09e;', 
	'"\f0a1"' => 'Megaphone &#xf0a1;', 
	'"\f0f3"' => 'Bell &#xf0f3;', 
	'"\f0ac"' => 'Globe &#xf0ac;', 
	'"\f0d0"' => 'Magic &#xf0d0;', 
	'"\f0eb"' => 'Light bulb &#xf0eb;', 
	'"\f118"' => 'Smile &#xf118;', 
	'"\f119"' => 'Frown &#xf119;', 
	'"\f11a"' => 'Meh &#xf11a;', 
	'"\f11d"' => 'Flag &#xf11d;', 
	'"\f124"' => 'Location &#xf124;', 
	'"\f145"' => 'Ticket &#xf145;', 
	'"\f279"' => 'Map &#xf279;',
	'"\f277"' => 'Sign post &#xf277;',
	'"\f276"' => 'Pin &#xf276;', 
	'"\f1f9"' => 'Copyright &#xf1f9;', 
	'"\f251"' => 'Hour Glass &#xf251;', 
	'"\f1e0"' => 'Share &#xf1e0;',
	'"\f1ea"' => 'News &#xf1ea;', 
	'none' => 'None',  
	



);

asort( $ic );

// Add control
$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'sitewide_notice_icon',
		array(
			'label'    => __( 'Site-wide Notice Icon', 'skillsforlife' ),
			'section'  => 'sitewide_notice_icon',
			'settings' => 'sitewide_notice_icon',
			'description'    => __( 'Select a Font Awesome Icon', 'skillsforlife' ),
			'type'     => 'select',
			'choices' => $ic

		)
	)
);


	// Site-wide Notice Contents
	// Add section.
	$wp_customize->add_section( 'sitewide_notice_content' , array(
		'title'    => __('Site-wide Notice Contents','skillsforlife'),
		'panel'    => 'sitewide_notice',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'notice_textarea', array(
		 'default'           => __( 'Enter text here', 'skillsforlife' ),
	//	 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'sitewide_notice_content',
		    array(
		        'label'    => __( 'Site-wide Notice Content', 'skillsforlife' ),
		        'section'  => 'sitewide_notice_content',
		        'settings' => 'notice_textarea',
		        'type'     => 'textarea'
		    )
	    )
	);
	
	// Site-wide Notice Colour
	// Add section.
	$wp_customize->add_section( 'sitewide_notice_colour' , array(
		'title'    => __('Site-wide Notice Colour','skillsforlife'),
		'panel'    => 'sitewide_notice',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'sitewide_notice_bg_colour', array(
		 'default'           => __( '#ffe627', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_hex_color'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sitewide_notice_bg_colour',
			array(
				'label'    => __( 'Site-wide Notice Background Colour', 'skillsforlife' ),
				'section'  => 'colors',
				'settings' => 'sitewide_notice_bg_colour',
				'type'     => 'color'
			)
		)
	);
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sitewide_notice_bg_colour2',
			array(
				'label'    => __( 'Site-wide Notice Background Colour', 'skillsforlife' ),
				'section'  => 'sitewide_notice_colour',
				'settings' => 'sitewide_notice_bg_colour',
				'type'     => 'color'
			)
		)
	);
	// Site-wide Notice Font Colour
	// Add setting
	$wp_customize->add_setting( 'sitewide_notice_font_colour', array(
		 'default'           => __( '#404040', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_hex_color'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sitewide_notice_font_colour',
			array(
				'label'    => __( 'Site-wide Notice Font Colour', 'skillsforlife' ),
				'section'  => 'colors',
				'settings' => 'sitewide_notice_font_colour',
				'type'     => 'color'
			)
		)
	);
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sitewide_notice_font_colour2',
			array(
				'label'    => __( 'Site-wide Notice Font Colour', 'skillsforlife' ),
				'section'  => 'sitewide_notice_colour',
				'settings' => 'sitewide_notice_font_colour',
				'type'     => 'color'
			)
		)
	);


	// Create custom panel.
	$wp_customize->add_panel( 'header_widget', array(
		'priority'       => 20,
		'theme_supports' => '',
		'title'          => __( 'Header Widget Area', 'skillsforlife' ),
		'description'    => __( 'Enable a widget area in the header', 'skillsforlife' ),
	) );

	// Enable Header Widget Area
	// Add section.
	$wp_customize->add_section( 'enable_header_widget' , array(
		'title'    => __('Enable Header Widget Area','skillsforlife'),
		'panel'    => 'header_widget',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'enable_header_widget'
	);
	$wp_customize->add_control(
		'enable_header_widget',
		array(
			'type' => 'checkbox',
			'label' => 'Enables the header widget area.',
			'section' => 'enable_header_widget',
		)
	);
	
	// Header Widget Area Colour
	// Add section.
	$wp_customize->add_section( 'header_widget_colour' , array(
		'title'    => __('Header Widget Area Colour','skillsforlife'),
		'panel'    => 'header_widget',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'header_widget_bg_colour', array(
		 'default'           => __( '#003a82', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_hex_color'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'header_widget_bg_colour',
			array(
				'label'    => __( 'Header Widget Background Colour', 'skillsforlife' ),
				'section'  => 'colors',
				'settings' => 'header_widget_bg_colour',
				'type'     => 'color'
			)
		)
	);
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'header_widget_bg_colour2',
			array(
				'label'    => __( 'Header Widget Background Colour', 'skillsforlife' ),
				'section'  => 'header_widget_colour',
				'settings' => 'header_widget_bg_colour',
				'type'     => 'color'
			)
		)
	);
	// Header Widget Font Colour
	// Add setting
	$wp_customize->add_setting( 'header_widget_font_colour', array(
		 'default'           => __( '#FFF', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_hex_color'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'header_widget_font_colour',
			array(
				'label'    => __( 'Header Widget Font Colour', 'skillsforlife' ),
				'section'  => 'colors',
				'settings' => 'header_widget_font_colour',
				'type'     => 'color'
			)
		)
	);
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'header_widget_font_colour2',
			array(
				'label'    => __( 'Header Widget Font Colour', 'skillsforlife' ),
				'section'  => 'header_widget_colour',
				'settings' => 'header_widget_font_colour',
				'type'     => 'color'
			)
		)
	);
	
	
	// Group info Panel
	$wp_customize->add_panel( 'sfl_logo_info', array(
		'priority'       => 20,
		'theme_supports' => '',
		'title'          => __( 'Skills for Life Logo', 'skillsforlife' ),
		'description'    => __( 'Replace theme elements with local info.', 'skillsforlife' ),
	) );
	$wp_customize->add_section( 'sfl_logo_text_options' , array(
		'title'    => __('Setup logo','skillsforlife'),
		'panel'    => 'sfl_logo_info',
		'priority' => 10
	) );
		// Add setting
	$wp_customize->add_setting( 'sfl_logo_text1', array(
		 'default'           => __( '1st Anytown', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
		$wp_customize->add_control(  'sfl_logo_text1',
			array(
				'label'    => __( 'Subline 1', 'skillsforlife' ),
				'section'  => 'sfl_logo_text_options',
				'type'     => 'text'
			)
		);

	 $wp_customize->add_setting( 'sfl_logo_text2', array(
		 'default'           => __( 'Sea Scouts', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
		$wp_customize->add_control(  'sfl_logo_text2',
			array(
				'label'    => __( 'Subline 2', 'skillsforlife' ),
				'section'  => 'sfl_logo_text_options',
				'type'     => 'text'
			)
		);
	 $wp_customize->add_setting( 'sfl_logo_colour',array(
'capability' => 'edit_theme_options',
'default' => 'b',

)  );

// Add control
$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'sfl_logo_colour',
	array(
'type' => 'radio',
'section' => 'sfl_logo_text_options', // Add a default or your own section
'label' => __( 'Logo Colour' ),
'description' => __( 'Please use the colours permitted by your nation' ),
'choices' => array(
'b' => __( 'Black' ),
'p' => __( 'Purple' ),
'r' => __( 'Red' ),
'l' => __( 'Blue' ),
'g' => __( 'Green' ),
),
) )
); // New Control
	 $wp_customize->add_setting( 'sfl_logo_usesvg',array(
'capability' => 'edit_theme_options',
'default' => '',

)  );
	$wp_customize->add_control(
		'sfl_logo_usesvg',
		array(
			'type' => 'checkbox',
			'label' => 'Use this logo',
			'section' => 'sfl_logo_text_options'
		)
	);
 $wp_customize->add_setting( 'sfl_logo_beta', array(
		 'default'           => __( '', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
		$wp_customize->add_control(  'sfl_logo_beta',
			array(
				'label'    => __( 'Show as Beta', 'skillsforlife' ),
				'section'  => 'sfl_logo_text_options',
				'type'     => 'checkbox'
			)
		);
	// Create custom panel.
	$wp_customize->add_panel( 'group_info', array(
		'priority'       => 20,
		'theme_supports' => '',
		'title'          => __( 'Skills for Life Theme Options', 'skillsforlife' ),
		'description'    => __( 'Replace theme elements with local info.', 'skillsforlife' ),
	) );
		
	// Charity Number
	// Add section.
	$wp_customize->add_section( 'group_charity_number' , array(
		'title'    => __('Charity Number','skillsforlife'),
		'panel'    => 'group_info',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'charity_number', array(
		 'default'           => __( '#######', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_charity_number',
		    array(
		        'label'    => __( 'Charity Number', 'skillsforlife' ),
		        'section'  => 'group_charity_number',
		        'settings' => 'charity_number',
		        'type'     => 'text'
		    )
	    )
	);
	// Add setting
	$wp_customize->add_setting(
		'hide_charity_number'
	);
	// Add control
	$wp_customize->add_control(
		'hide_charity_number',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Charity Number',
			'section' => 'group_charity_number',
		)
	);

	// Group Address
	// Add section.
	$wp_customize->add_section( 'group_address_editor' , array(
		'title'    => __('Address','skillsforlife'),
		'panel'    => 'group_info',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'group_address', array(
		 'default'           => __( 'nth Scouts, Scout HQ, xxxxxx, xxxxxx, WA# #xx', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_address_editor',
		    array(
		        'label'    => __( 'Address', 'skillsforlife' ),
		        'section'  => 'group_address_editor',
		        'settings' => 'group_address',
		        'type'     => 'text'
		    )
	    )
	);
	// Add setting
	$wp_customize->add_setting(
		'hide_address'
	);
	// Add control
	$wp_customize->add_control(
		'hide_address',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Address',
			'section' => 'group_address_editor',
		)
	);

	// Group Telephone
	// Add section.
	$wp_customize->add_section( 'group_telephone_editor' , array(
		'title'    => __('Telephone number','skillsforlife'),
		'panel'    => 'group_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_telephone'
	);
	$wp_customize->add_control(
		'hide_telephone',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Telephone number.',
			'section' => 'group_telephone_editor',
		)
	);
	// Add setting
	$wp_customize->add_setting( 'group_telephone', array(
		 'default'           => __( '01928 000000', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_telephone_editor',
		    array(
		        'label'    => __( 'Telephone number', 'skillsforlife' ),
		        'section'  => 'group_telephone_editor',
		        'settings' => 'group_telephone',
		        'type'     => 'text'
		    )
	    )
	);	
	// Support MW
	// Add section.
	$wp_customize->add_section( 'mw' , array(
		'title'    => __('Credit to Mersey Weaver Technology ASU','skillsforlife'),
		'panel'    => 'group_info',
		'priority' => 90
	) );
	$wp_customize->add_setting(
		'hide_mw'
	);
	$wp_customize->add_control(
		'hide_mw',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Credit to Mersey Weaver',
			'section' => 'mw',
		)
	);
	// Social Media Panel
$wp_customize->add_panel( 'social_info', array(
	'priority'       => 20,
	'theme_supports' => '',
	'title'          => __( 'Skills for Life Social Options', 'skillsforlife' ),
	'description'    => __( 'Replace theme elements with local info.', 'skillsforlife' ),
) );
		
	// Group Facebook
	// Add section.
	$wp_customize->add_section( 'group_facebook_url' , array(
		'title'    => __('Facebook URL','skillsforlife'),
		'panel'    => 'social_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_facebook'
	);
	$wp_customize->add_control(
		'hide_facebook',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Facebook Social Media icon.',
			'section' => 'group_facebook_url',
		)
	);
	// Add setting
	$wp_customize->add_setting( 'group_facebook', array(
		 'default'           => __( 'https://www.facebook.com/scoutassociation/', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_facebook_url',
		    array(
		        'label'    => __( 'Facebook Address', 'skillsforlife' ),
		        'section'  => 'group_facebook_url',
		        'settings' => 'group_facebook',
		        'type'     => 'text'
		    )
	    )
	);	

	// Group Twitter
	// Add section.
	$wp_customize->add_section( 'group_twitter_url' , array(
		'title'    => __('Twitter URL','skillsforlife'),
		'panel'    => 'social_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_twitter'
	);
	$wp_customize->add_control(
		'hide_twitter',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Twitter Social Media icon.',
			'section' => 'group_twitter_url',
		)
	);
	// Add setting
	$wp_customize->add_setting( 'group_twitter', array(
		 'default'           => __( 'https://twitter.com/UKScouting', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_twitter_url',
		    array(
		        'label'    => __( 'Twitter Address', 'skillsforlife' ),
		        'section'  => 'group_twitter_url',
		        'settings' => 'group_twitter',
		        'type'     => 'text'
		    )
	    )
	);	

	// Group Instagram
	// Add section.
	$wp_customize->add_section( 'group_instagram_url' , array(
		'title'    => __('Instagram URL','skillsforlife'),
		'panel'    => 'social_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_instagram'
	);
	$wp_customize->add_control(
		'hide_instagram',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Instagram Social Media icon.',
			'section' => 'group_instagram_url',
		)
	);
	// Add setting
	$wp_customize->add_setting( 'group_instagram', array(
		 'default'           => __( 'https://www.instagram.com/thescouts/', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_instagram_url',
		    array(
		        'label'    => __( 'Instagram Address', 'skillsforlife' ),
		        'section'  => 'group_instagram_url',
		        'settings' => 'group_instagram',
		        'type'     => 'text'
		    )
	    )
	);	

	// Group LinkedIn
	// Add section.
	$wp_customize->add_section( 'group_linkedin_url' , array(
		'title'    => __('LinkedIn URL','skillsforlife'),
		'panel'    => 'social_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_linkedin'
	);
	$wp_customize->add_control(
		'hide_linkedin',
		array(
			'type' => 'checkbox',
			'label' => 'Hide LinkedIn Social Media icon.',
			'section' => 'group_linkedin_url',
		)
	);
	// Add setting
	$wp_customize->add_setting( 'group_linkedin', array(
		 'default'           => __( 'https://www.linkedin.com/company/the-scout-association/', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_linkedin_url',
		    array(
		        'label'    => __( 'LinkedIn Address', 'skillsforlife' ),
		        'section'  => 'group_linkedin_url',
		        'settings' => 'group_linkedin',
		        'type'     => 'text'
		    )
	    )
	);

	// Group Youtube
	// Add section.
	$wp_customize->add_section( 'group_youtube_url' , array(
		'title'    => __('Youtube URL','skillsforlife'),
		'panel'    => 'social_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_youtube'
	);
	$wp_customize->add_control(
		'hide_youtube',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Youtube Social Media icon.',
			'section' => 'group_youtube_url',
		)
	);
	// Add setting
	$wp_customize->add_setting( 'group_youtube', array(
		 'default'           => __( 'https://www.youtube.com/user/UKScoutAssociation', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_youtube_url',
		    array(
		        'label'    => __( 'Youtube Address', 'skillsforlife' ),
		        'section'  => 'group_youtube_url',
		        'settings' => 'group_youtube',
		        'type'     => 'text'
		    )
	    )
	);

	// Group Pinterest
	// Add section.
	$wp_customize->add_section( 'group_pinterest_url' , array(
		'title'    => __('Pinterest URL','skillsforlife'),
		'panel'    => 'social_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_pinterest'
	);
	$wp_customize->add_control(
		'hide_pinterest',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Pinterest Social Media icon.',
			'section' => 'group_pinterest_url',
		)
	);
	// Add setting
	$wp_customize->add_setting( 'group_pinterest', array(
		 'default'           => __( 'https://www.pinterest.co.uk/ukscouting/', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'group_pinterest_url',
		    array(
		        'label'    => __( 'Pinterest Address', 'skillsforlife' ),
		        'section'  => 'group_pinterest_url',
		        'settings' => 'group_pinterest',
		        'type'     => 'text'
		    )
	    )
	);


// Hide social
// Add section.
$wp_customize->add_section( 'hide_social_control' , array(
	'title'    => __('Hide Social Media Area','skillsforlife'),
	'panel'    => 'social_info',
	'priority' => 10
) );
$wp_customize->add_setting(
	'hide_social'
);
$wp_customize->add_control(
	'hide_social',
	array(
		'type' => 'checkbox',
		'label' => 'Hide social media icons.',
		'section' => 'hide_social_control',
	)
);



	// Hide QAVS
	// Add section.
	$wp_customize->add_section( 'hide_qavs_control' , array(
		'title'    => __('Queens Award for Voluntary Service','skillsforlife'),
		'panel'    => 'group_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_qavs'
	);
	$wp_customize->add_control(
		'hide_qavs',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Queens Award for Voluntary Service logo. 
			Please only show this if this has been awarded to your Group/District/County',
			'section' => 'hide_qavs_control',
		)
	);
	
	
	
	
	// Hide mobile donate
	// Add section.
	$wp_customize->add_section( 'hide_donate_control' , array(
		'title'    => __('Mobile Donate Button','skillsforlife'),
		'panel'    => 'group_info',
		'priority' => 10
	) );
	$wp_customize->add_setting(
		'hide_donate'
	);
	$wp_customize->add_control(
		'hide_donate',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Mobile Donate Button.',
			'section' => 'hide_donate_control',
		)
	);
	// Add setting
	$wp_customize->add_setting( 'donate_url', array(
		 'default'           => __( '/donate/', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'donate_url',
			array(
				'label'    => __( 'Donate URL', 'skillsforlife' ),
				'section'  => 'hide_donate_control',
				'settings' => 'donate_url',
				'type'     => 'text'
			)
		)
	);
	
	// Hide whats happening
	// Add section.
	$wp_customize->add_section( 'hide_news_control' , array(
		'title'    => __('What is happening','skillsforlife'),
		'panel'    => 'group_info',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'wh_title', array(
		 'default'           => __( 'What\'s happening', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'wh_title',
			array(
				'label'    => __( 'News Title', 'skillsforlife' ),
				'section'  => 'hide_news_control',
				'settings' => 'wh_title',
				'type'     => 'text'
			)
		)
	);
	
	// Add setting
	$wp_customize->add_setting( 'wh_subtitle', array(
		 'default'           => __( 'All the latest news for you and your Scouts', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'wh_subtitle',
			array(
				'label'    => __( 'News Subtitle', 'skillsforlife' ),
				'section'  => 'hide_news_control',
				'settings' => 'wh_subtitle',
				'type'     => 'text'
			)
		)
	);
	
	
	// Add setting
	$wp_customize->add_setting( 'news_articles', array(
		 'default'           => __( '6', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'news_articles',
		    array(
		        'label'    => __( 'Number of news articles (multiples of 3)', 'skillsforlife' ),
		        'section'  => 'hide_news_control',
		        'settings' => 'news_articles',
		        'type'     => 'number'
		    )
	    )
	);
	$wp_customize->add_setting(
		'hide_news'
	);
	$wp_customize->add_control(
		'hide_news',
		array(
			'type' => 'checkbox',
			'label' => 'Hide News Section',
			'section' => 'hide_news_control',
		)
	);
	
	//  Safeguarding
	// Add section.
	$wp_customize->add_section( 'hide_safe_control' , array(
		'title'    => __('Safety & Safeguarding','skillsforlife'),
		'panel'    => 'group_info',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'sg_title', array(
		 'default'           => __( 'Young people first: safeguarding and safety in Scouting', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'sg_title',
		    array(
		        'label'    => __( 'Safeguarding Panel Title', 'skillsforlife' ),
		        'section'  => 'hide_safe_control',
		        'settings' => 'sg_title',
		        'type'     => 'text'
		    )
	    )
	);
	// Add setting
	$wp_customize->add_setting( 'sg_description', array(
		 'default'           => __( 'Wherever we go and whatever we do, we put young people’s safety and wellbeing first.', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'sg_description',
		    array(
		        'label'    => __( 'Safeguarding Panel Description', 'skillsforlife' ),
		        'section'  => 'hide_safe_control',
		        'settings' => 'sg_description',
		        'type'     => 'text'
		    )
	    )
	);
	// Add setting
	$wp_customize->add_setting( 'sg_description_url', array(
		 'default'           => __( 'https://www.scouts.org.uk/volunteers/staying-safe-and-safeguarding/reporting-a-concern-to-safeguarding/', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'sg_description_url',
		    array(
		        'label'    => __( 'Safeguarding Panel Description URL', 'skillsforlife' ),
		        'section'  => 'hide_safe_control',
		        'settings' => 'sg_description_url',
		        'type'     => 'text'
		    )
	    )
	);
	$wp_customize->add_setting(
		'hide_safe'
	);
	$wp_customize->add_control(
		'hide_safe',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Safety & Safeguarding panel',
			'section' => 'hide_safe_control',
		)
	);

// Homepage Options
 $wp_customize->add_section( 'sfl_hp_sections' , array(
	'title'    => __('The Homepage Sections','skillsforlife'),
	'panel'    => 'group_info',
	'priority' => 10
) );
	$wp_customize->add_setting(
		'hide_all_hp'
	);
	$wp_customize->add_control(
		'hide_all_hp',
		array(
			'type' => 'checkbox',
			'label' => 'Hide All Sections',
			'section' => 'sfl_hp_sections',
		)
	);
	$wp_customize->add_setting(
		'hide_squ_hp'
	);
	$wp_customize->add_control(
		'hide_squ_hp',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Squirrels',
			'section' => 'sfl_hp_sections',
		)
	);
	$wp_customize->add_setting(
		'hide_bvr_hp'
	);
	$wp_customize->add_control(
		'hide_bvr_hp',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Beavers',
			'section' => 'sfl_hp_sections',
		)
	);
	$wp_customize->add_setting(
		'hide_cub_hp'
	);
	$wp_customize->add_control(
		'hide_cub_hp',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Cubs',
			'section' => 'sfl_hp_sections',
		)
	);
		$wp_customize->add_setting(
		'hide_sct_hp'
	);
	$wp_customize->add_control(
		'hide_sct_hp',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Scouts',
			'section' => 'sfl_hp_sections',
		)
	);
		 $wp_customize->add_setting(
		'hide_exp_hp'
	);
	$wp_customize->add_control(
		'hide_exp_hp',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Explorers',
			'section' => 'sfl_hp_sections',
		)
	);
			$wp_customize->add_setting(
		'hide_net_hp'
	);
	$wp_customize->add_control(
		'hide_net_hp',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Network',
			'section' => 'sfl_hp_sections',
		)
	);
	
	// Add setting
	$wp_customize->add_setting( 'sfl_squirrel_url', array(
		 'default'           => __( '/squirrels', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sfl_squirrel_url',
			array(
				'label'    => __( 'Squirrels Address', 'skillsforlife' ),
				'section'  => 'sfl_hp_sections',
				'settings' => 'sfl_squirrel_url',
				'type'     => 'text'
			)
		)
	);	
	
	// Add setting
	$wp_customize->add_setting( 'sfl_beaver_url', array(
		 'default'           => __( '/beavers', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sfl_beaver_url',
			array(
				'label'    => __( 'Beavers Address', 'skillsforlife' ),
				'section'  => 'sfl_hp_sections',
				'settings' => 'sfl_beaver_url',
				'type'     => 'text'
			)
		)
	);	
	
	// Add setting
	$wp_customize->add_setting( 'sfl_cub_url', array(
		 'default'           => __( '/cubs', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sfl_cub_url',
			array(
				'label'    => __( 'Cubs Address', 'skillsforlife' ),
				'section'  => 'sfl_hp_sections',
				'settings' => 'sfl_cub_url',
				'type'     => 'text'
			)
		)
	);	
	
	// Add setting
	$wp_customize->add_setting( 'sfl_scout_url', array(
		 'default'           => __( '/scouts', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sfl_scout_url',
			array(
				'label'    => __( 'Scouts Address', 'skillsforlife' ),
				'section'  => 'sfl_hp_sections',
				'settings' => 'sfl_scout_url',
				'type'     => 'text'
			)
		)
	);	
	
	// Add setting
	$wp_customize->add_setting( 'sfl_explorer_url', array(
		 'default'           => __( '/explorers', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sfl_explorer_url',
			array(
				'label'    => __( 'Explorers Address', 'skillsforlife' ),
				'section'  => 'sfl_hp_sections',
				'settings' => 'sfl_explorer_url',
				'type'     => 'text'
			)
		)
	);	
	
	// Add setting
	$wp_customize->add_setting( 'sfl_network_url', array(
		 'default'           => __( '/network', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sfl_network_url',
			array(
				'label'    => __( 'Network Address', 'skillsforlife' ),
				'section'  => 'sfl_hp_sections',
				'settings' => 'sfl_network_url',
				'type'     => 'text'
			)
		)
	);	
	
	// Add setting
	$wp_customize->add_setting( 'sfl_volunteer_url', array(
		 'default'           => __( '/volunteer', 'skillsforlife' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'sfl_volunteer_url',
			array(
				'label'    => __( 'Volunteer Address', 'skillsforlife' ),
				'section'  => 'sfl_hp_sections',
				'settings' => 'sfl_volunteer_url',
				'type'     => 'text'
			)
		)
	);	

//  Customise Posts
$wp_customize->add_section( 'sfl_posts_control' , array(
	'title'    => __('Customize Posts','skillsforlife'),
	'panel'    => 'group_info',
	'priority' => 10
) );

$wp_customize->add_setting( 'sfl_post_title',array(
'capability' => 'edit_theme_options',
'default' => 'ud',

)  );

// Add control
$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'sfl_post_title',
	array(
'type' => 'radio',
'section' => 'sfl_posts_control', // Add a default or your own section
'label' => __( 'Post Subtitle' ),
'description' => __( 'Control the post subtitle' ),
'choices' => array(
'ud' => __( 'User and Date' ),
'st' => __( 'Subtitle' ),
),
) )
); // New Control

$wp_customize->add_setting( 'sfl_post_img'  );
// Add control
$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'sfl_post_img',
	array(
		'type' => 'checkbox',
		'label' => 'Featured Image',
		'description' => 'If the post has no images use the featured one.',
		'section' => 'sfl_posts_control',
	) )
);

// Group Picker Widget settings
$wp_customize->add_section( 'sfl_gf_control' , array(
	'title'    => __('Group Finder Setup','skillsforlife'),
	'panel'    => 'group_info',
	'priority' => 10
) );

$wp_customize->add_setting( 'sfl_group_page',array(
'capability' => 'edit_theme_options',
'default' => 'ud',

)  );
$plist = get_pages();
$parray = array();
 foreach ( $plist as $page ) {
  // array_push($parray,$page->post_title);
  $parray[$page->ID] = $page->post_title;
}
$wp_customize->add_control( new WP_Customize_Control(
 $wp_customize, //Pass the $wp_customize object (required)
 'sfl_group_page', //Set a unique ID for the control
 array(
	'label'      => 'Parent Page for Groups',
   
	'priority'   => 10, //Determines the order this control appears in for the specified section
	'section'    => 'sfl_gf_control', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	'type'    => 'select',
	'choices' =>  $parray
)
) );


}
/**
 * Colour Customisations
 */

function skillsforlife_customize_colors() {

/****************************************
styling
****************************************/
?>
<style>
.home-welcome-box-right {
	background: <?php echo get_theme_mod( 'welcome_box_bg_colour', '#490499' ); ?>;
}

.home-mid {background-color: <?php echo get_theme_mod( 'wgt_bg_colour', '#00A794' ); ?>;
}

.footer-social  {background-color: <?php echo get_theme_mod( 'social_bg_colour', '#00A794' ); ?>;
}

.site-footer {
	background: <?php echo get_theme_mod( 'footer_bg_colour', '#490499' ); ?>;
}
.site-notice {
	background-color: <?php echo get_theme_mod( 'sitewide_notice_bg_colour', '#ffe627' ); ?>;
}
.site-notice {
	color: <?php echo get_theme_mod( 'sitewide_notice_font_colour', '#404040' ); ?>;
}
.site-noticetext a {
	color: <?php echo get_theme_mod( 'sitewide_notice_font_colour', '#000000' ); ?>;
}

.fa-warning:before, .fa-exclamation-triangle:before {
	content: <?php echo get_theme_mod( 'sitewide_notice_icon', '"\f071"' ); ?>;
}

.header-widget-area, .header-widget-area a, .header-widget-area p {
	background-color: <?php echo get_theme_mod( 'header_widget_bg_colour', '#003a82' ); ?>;
	color: <?php echo get_theme_mod( 'header_widget_font_colour', '#FFFFFF' ); ?>;
}

.home-welcome-box-left {flex: <?php echo get_theme_mod( 'hide_all_hp', '0.6' ); ?>;}

</style>
     
<?php
 
}
add_action( 'wp_head', 'skillsforlife_customize_colors' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function skillsforlife_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function skillsforlife_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skillsforlife_customize_preview_js() {
	wp_enqueue_script( 'skillsforlife-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'skillsforlife_customize_preview_js' );
