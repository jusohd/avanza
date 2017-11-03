<?php

/*-----------------------------------------------------------------------------------*/
/* Register Theme Options */
/*-----------------------------------------------------------------------------------*/


$this->sections['general']      = __( 'General', 'icore' );
$this->sections['appearance']   = __( 'Appearance', 'icore' );
$this->sections['thumbnails']   = __( 'Thumbnails', 'icore' );
$this->sections['social']   = __( 'Social', 'icore' );
$this->sections['themes']   = __( 'Get More Themes', 'icore' );

/* Define Theme Options */

/* General Settings
===========================================*/


$this->settings['colorscheme'] = array(
	'section' => 'general',
	'title'   => __( 'Color Scheme', 'icore' ),
	'desc'    => __( 'Select color scheme', 'icore' ),
	'type'    => 'select',
	'std'     => 'default',
	'choices' => array(
		'default' => 'White'
	)
);

$this->settings['favicon'] = array(
    'title'   => __( 'Custom Favicon ' ),
    'desc'    => __( 'Upload favicon image here.' ),
    'std'     => '',
    'type'    => 'upload',
    'section' => 'general'
);

$this->settings['logo'] = array(
    'title'   => __( 'Logo Image' ),
    'desc'    => __( 'Upload logo image' ),
    'std'     => '',
    'type'    => 'upload',
    'section' => 'general'
);

$this->settings['google_analytics'] = array(
    'title'   => __( 'Google Analytics' ),
    'desc'    => __( 'Paste your <a href="http://www.google.com/analytics/" rel="nofollow" target="_blank" >Google Analytics</a> code above.' ),
    'std'     => '',
    'type'    => 'textarea',
    'section' => 'general'
);


/* Social
===========================================*/
$this->settings['facebook'] = array(
	'title'   => __( 'Facebook Icon' ),
	'desc'    => __( 'enter your Facebook page url' ),
	'std'     => '',
	'type'    => 'text',
	'section' => 'social'
);
$this->settings['twitter'] = array(
	'title'   => __( 'Twitter Icon' ),
	'desc'    => __( 'enter your Twitter page url' ),
	'std'     => '',
	'type'    => 'text',
	'section' => 'social'
);
$this->settings['rss'] = array(
	'title'   => __( 'RSS Icon' ),
	'desc'    => __( 'enter your RSS feed url' ),
	'std'     => '',
	'type'    => 'text',
	'section' => 'social'
);
$this->settings['youtube'] = array(
	'title'   => __( 'YouTube Icon' ),
	'desc'    => __( 'enter your YouTube page url' ),
	'std'     => '',
	'type'    => 'text',
	'section' => 'social'
);
	

/* Appearance
===========================================*/

$this->settings['search'] = array(
	'section' => 'appearance',
	'title'   => __( 'Search Bar' ),
	'desc'    => __( 'display header search bar' ),
	'type'    => 'checkbox',
	'std'     => '1'
);

$this->settings['blog_style'] = array(
	'section' => 'appearance',
	'title'   => __( 'Full Post Content' ),
	'desc'    => __( 'show full post content instead of excerpt' ),
	'type'    => 'checkbox',
	'std'     => ''
);

$this->settings['custom_css'] = array(
	'title'   => __( 'Custom CSS' ),
	'desc'    => __( 'Enter your custom CSS code here.' ),
	'std'     => '',
	'type'    => 'textarea',
	'section' => 'appearance',
	'class'   => 'code'
);

/* Thumbnails
===========================================*/

$this->settings['front-page_thumb'] = array(
	'section' => 'thumbnails',
	'title'   => __( 'Front page thumbnails' ),
	'desc'    => __( 'show thumbnails on Front page' ),
	'type'    => 'checkbox',
	'std'     => '1'
);

$this->settings['category_thumb'] = array(
	'section' => 'thumbnails',
	'title'   => __( 'Category page thumbnails' ),
	'desc'    => __( 'show thumbnails on Category pages' ),
	'type'    => 'checkbox',
	'std'     => '1'
);

$this->settings['author_thumb'] = array(
	'section' => 'thumbnails',
	'title'   => __( 'Author page thumbnails' ),
	'desc'    => __( 'show thumbnails on Author pages' ),
	'type'    => 'checkbox',
	'std'     => '1'
);

$this->settings['single_thumb'] = array(
	'section' => 'thumbnails',
	'title'   => __( 'Single post thumbnail' ),
	'desc'    => __( 'show thumbnails on Single posts' ),
	'type'    => 'checkbox',
	'std'     => '1'
);

$this->settings['page_thumb'] = array(
	'section' => 'thumbnails',
	'title'   => __( 'Single page thumbnail' ),
	'desc'    => __( 'show thumbnails on single page' ),
	'type'    => 'checkbox',
	'std'     => '1'
);

$this->settings['search_thumb'] = array(
	'section' => 'thumbnails',
	'title'   => __( 'Search page thumbnail' ),
	'desc'    => __( 'show thumbnails on search page' ),
	'type'    => 'checkbox',
	'std'     => ''
);


$this->settings['themes_link'] = array(
	'section' => 'themes',
	'title'   => __( 'Find More Awesome Themes', 'icore' ),
	'desc'    => __( 'Click the link above to see more themes by UFO Themes', 'icore' ),
	'type'    => 'html',
	'std'     => '<a href="http://www.ufothemes.com/themes/" target="_blank">Browse Our WordPress Themes</a>'
);
?>