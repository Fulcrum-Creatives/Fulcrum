<?php 
function register_our_areas_cpt() {
	$labels = array( 
		'name' 					=> 'Our Areas',
		'singular_name'			=> 'Our Areas',
		'add_new' 				=> 'Add New',
		'all_items' 			=> 'All Items',
		'add_new_item' 			=> 'Add New Item',
		'edit_item'				=> 'Edit Item',
		'new_item' 				=> 'New Item',
		'view_item' 			=> 'View Item',
		'search_items' 			=> 'Search Our Areas',
		'not_found' 			=> 'No Items Found',
		'not_found_in_trash' 	=> 'No Items Found in Trash',
		'parent_item_colon' 	=> 'Parent Items Post:',
		'menu_name' 			=> 'Our Area',
	);
	$args = array( 
		'labels' 				=> $labels,
		'description' 			=> 'Our Areas',
		'public' 				=> true,
		'exclude_from_search' 	=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'show_in_nav_menus' 	=> true,
		'show_in_menu' 			=> true,
		'show_in_admin_bar' 	=> true,
		'menu_position' 		=> 7,
		/*
		  5 - below Posts
		 10 - below Media
		 15 - below Links
		 20 - below Pages
		 25 - below comments
		 60 - below first separator
		 65 - below Plugins
		 70 - below Users
		 75 - below Tools
		 80 - below Settings
		100 - below second separator
		*/
		'menu_icon' 			=> NULL, /*get_stylesheet_directory_uri().'/images/your-image.png', */
		'capability_type' 		=> 'post',
		'capabilities' 			=> array(	
										'edit_post', 
										'read_post', 
										'delete_post',
										'edit_posts',
										'edit_others_posts',
										'publish_posts',
										'read_private_posts'
									),
		'map_meta_cap' 			=> true,
		'hierarchical' 			=> false,
		'supports' 				=> array( 	
										'title',
										//'editor',
										//'author',
										//'thumbnail',
										//'excerpt',
										//'trackbacks',
										//'custom-fields',
										//'comments' ,
										//'revisions',
										//'page-attributes',
										//'post-formats'
									),
		/* 
		'register_meta_box_cb' => 'add_custom_meta_box',
		 */
		'taxonomies' 			=> array( 'category', 'tag'),
		'has_archive'			=> true,
		'permalink_epmask' 		=> EP_PERMALINK,
		'rewrite' 				=> array( 	
										'slug' 			=> 'our-areas', 
										'with_front' 	=> false,
										'feeds' 		=> true,
										'pages' 		=> true,
										'ep_mask' 		=> EP_PERMALINK
									),
		'query_var' 			=> true,
		'can_export' 			=> true,
	);
	register_post_type( 'our-areas', $args );
}
add_action( 'init', 'register_our_areas_cpt' );
?>