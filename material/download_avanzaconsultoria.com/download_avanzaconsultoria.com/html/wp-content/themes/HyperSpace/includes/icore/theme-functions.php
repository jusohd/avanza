<?php

/*-----------------------------------------------------------------------------------*/
/* Setup Theme */
/*-----------------------------------------------------------------------------------*/  

if ( ! isset( $content_width ) ) $content_width = 920; 

add_action( 'after_setup_theme', 'icore_theme_setup' );

if ( ! function_exists( 'icore_theme_setup' ) ):

function icore_theme_setup() {
	
	// Load Theme Text Domain
	load_theme_textdomain( 'HyperSpace', get_template_directory() . '/lang' );

	// Add WordPress theme support
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	//add_theme_support( 'post-formats', array( 'aside', ) );
	
	$background = array(
		'default-color'          => 'F9F9F9',
		'default-image'          => get_template_directory_uri(). '/images/body_bg.png',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	
	add_theme_support( 'custom-background', $background );
	add_editor_style();

	// Update Image Sizes
	update_option( 'thumbnail_size_w', 53, true );
	update_option( 'thumbnail_size_h', 53, true );
	update_option( 'medium_size_w', 620, true );
	update_option( 'medium_size_h', '', true );
	update_option( 'large_size_w', 920, true );
	update_option( 'large_size_h', '', true );
	
	// Add additional image sizes
	set_post_thumbnail_size( 53, 53, true ); // default square thumbnail
	add_image_size( 'entry-thumb', 600, 227, true ); // vertical images
	add_image_size( 'gallery-thumb', 460, 240, true ); // vertical images

	// Register Custom Menus
	register_nav_menus( array(
		'primary-menu' => __( 'Primary Menu', 'HyperSpace' )
	) );

}
endif; // icore_theme_setup 

// Load Theme CSS files
add_action( 'wp_enqueue_scripts', 'icore_load_theme_styles' );

if ( ! function_exists( 'icore_load_theme_styles' ) ):
	function icore_load_theme_styles() {
		global $options;
	
		// load style.css file
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style( 'Lobster-font', 'http://fonts.googleapis.com/css?family=Lobster&v1' );

	
		if ( isset ( $options['colorscheme'] ) && 'default' != $options['colorscheme'] ) {
	        wp_enqueue_style( 'alt-style', get_template_directory_uri() . '/css/' . $options['colorscheme'] . '.css', array( 'style' ) );
		}	
}
endif; // icore_load_theme_styles

add_action( 'et_header_menu', 'et_add_mobile_navigation' );

function et_add_mobile_navigation(){
	echo '<a href="#" id="mobile_nav" class="closed">' . '<span></span>' . esc_html__( 'Navigation Menu', 'HyperSpace' ) . '</a>';
}
/*-----------------------------------------------------------------------------------*/
/* Additional Theme Functions */
/*-----------------------------------------------------------------------------------*/
  
?>