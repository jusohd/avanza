<?php

/*-----------------------------------------------------------------------------------*/
/* Register Theme Taxonomies */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'ps_gallery_create_type' );

function ps_gallery_create_type() {

	register_post_type('gallery',
		array(
			'labels' => array(
				'name'						=> __('Galleries','HyperSpace'),
				'singular_name' 			=> __('Gallery','HyperSpace'),
				'add_new'					=> __('Add New', 'HyperSpace'),
				'add_new_item'				=> __('Add Gallery', 'HyperSpace'),
				'new_item'					=> __('Add Gallery', 'HyperSpace'),
				'view_item'					=> __('View Gallery', 'HyperSpace'),
				'search_items' 				=> __('Search Gallery', 'HyperSpace'),
				'edit_item' 				=> __('Edit Gallery', 'HyperSpace'),
				'all_items'					=> __('All Galleries', 'HyperSpace'),
				'not_found'					=> __('No Galleries found', 'HyperSpace'),
				'not_found_in_trash'		=> __('No Galleries found in Trash', 'HyperSpace')
			),
			'taxonomies'	=> array('pcategory', 'ptag'),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array( 'slug' => 'gallery', 'with_front' => false ),
			'query_var' => true,
			'supports' => array('title','revisions','thumbnail','author','editor','post-formats', 'excerpt'),
			'menu_position' => 5,
			'has_archive' => true
		)
	);
}

/*-----------------------------------------------------------------------------------*/
/* Register taxonomy for new post type */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'ps_gallery_taxonomy', 0 );

function ps_gallery_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name', 'HyperSpace' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name', 'HyperSpace' ),
    'search_items' =>  __( 'Search Categories', 'HyperSpace' ),
    'all_items' => __( 'All Categories', 'HyperSpace' ),
    'parent_item' => __( 'Parent Category', 'HyperSpace' ),
    'parent_item_colon' => __( 'Parent Category:', 'HyperSpace' ),
    'edit_item' => __( 'Edit Category', 'HyperSpace' ),
    'update_item' => __( 'Update Category', 'HyperSpace' ),
    'add_new_item' => __( 'Add New Category', 'HyperSpace' ),
    'new_item_name' => __( 'New Category Name', 'HyperSpace' ),
    'menu_name' => __( 'Categories', 'HyperSpace' )
  );
	register_taxonomy('pcategory','gallery',array(
				'hierarchical' => true,
				'labels' => $labels,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'pcategory' )
	));
}

add_action( 'init', 'ps_gallery_tags', 1 );

function ps_gallery_tags() {
	register_taxonomy( 'ptag', 'gallery', array(
				'hierarchical' => false,
				'update_count_callback' => '_update_post_term_count',
				'label' => __('Tags', 'HyperSpace'),
				'query_var' => true,
				'rewrite' => array( 'slug' => 'ptags' )
	)) ;
}

// Flush rewrite rules for custom post type and taxonomies added in theme
function icore_flush_rewrite_rules() {
    global $pagenow, $wp_rewrite;

    if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
        $wp_rewrite->flush_rules();
}

add_action( 'load-themes.php', 'icore_flush_rewrite_rules' );

?>