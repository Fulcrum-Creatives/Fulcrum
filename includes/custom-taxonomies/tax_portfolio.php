<?php 
// Create Custom Taxonomy Example
function add_portfolio_type_taxonomies() {
	register_taxonomy('portfolio-type', // Taxonomy Name
		array( 'portfolio' // Post Type for Taxonomy
		), 
		array( 
			'labels'				=> array( 	
									  'name'							=> _x( 'Portfolio Type', 'taxonomy general name' ), 
									  'singular_name'					=> _x( 'Portfolio Type', 'taxonomy singular name' ), 
									  'search_items'					=> __( 'Search Portfolio Type' ),
									  'popular_items'					=> __( 'Popular Portfolio Types'),
									  'all_items'						=> __( 'All Portfolio Types' ), 
									  'parent_item'						=> __( 'Parent Portfolio Type' ), 
									  'parent_item_colon'				=> __( 'Parent Portfolio Type:' ), 
									  'edit_item'						=> __( 'Edit Portfolio Type' ), 
									  'update_item'						=> __( 'Update Portfolio Type' ), 
									  'add_new_item'					=> __( 'Add New Portfolio Type' ), 
									  'new_item_name'					=> __( 'New Portfolio Type' ), 
									  'separate_items_with_commas'		=> __( 'Separate Items with Commas' ),
									  'add_or_remove_items' 			=> __( 'Add or Remove Portfolio Type' ),
									  'choose_from_most_used'			=> __( 'Choose from the most used Portfolio Type' ),
									  'menu_name' 						=> __( 'Portfolio Type' ), 
									  ),
			'public'				=> true,
			'show_in_nav_menus'		=> true,
			'show_ui'				=> true,
			'show_tagcloud'			=> true,
			'hierarchical'			=> true,
			'update_count_callback'	=> '_update_post_term_count', 
			'query_var'				=> true,
			'rewrite'				=> array( 
											'slug'			=> 'portfolio-type',
											'with_front'	=> false,
											'hierarchical'	=> true
										), 
			'capabilities' 				=> array(
											'manage_terms',
											'edit_terms' ,
											'delete_terms',
											'manage_categories',
											'assign_terms'
										)
				)); 
} 

add_action( 'init', 'add_portfolio_type_taxonomies', 0 );
?>