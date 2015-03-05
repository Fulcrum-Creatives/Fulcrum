<?php 
// Create Custom Taxonomy Example
function add_snippets_taxonomies() {
	register_taxonomy('example_terms', // Taxonomy Name
		array( 'example' // Post Type for Taxonomy
		), 
		array( 
			'labels'				=> array( 	
									  'name'							=> _x( 'Example', 'taxonomy general name' ), 
									  'singular_name'					=> _x( 'Example', 'taxonomy singular name' ), 
									  'search_items'					=> __( 'Search Examples' ),
									  'popular_items'					=> __( 'Popular Examples'),
									  'all_items'						=> __( 'All Examples' ), 
									  'parent_item'						=> __( 'Parent Example' ), 
									  'parent_item_colon'				=> __( 'Parent Example:' ), 
									  'edit_item'						=> __( 'Edit Examples' ), 
									  'update_item'						=> __( 'Update Examples' ), 
									  'add_new_item'					=> __( 'Add New Examples' ), 
									  'new_item_name'					=> __( 'New Example' ), 
									  'separate_items_with_commas'		=> __( 'Separate Examples with commas' ),
									  'add_or_remove_items' 			=> __( 'Add or Remove Example' ),
									  'choose_from_most_used'			=> __( 'Choose from the most used Examples' ),
									  'menu_name' 						=> __( 'Examples' ), 
									  ),
			'public'				=> true,
			'show_in_nav_menus'		=> true,
			'show_ui'				=> true,
			'show_tagcloud'			=> true,
			'hierarchical'			=> true,
			'update_count_callback'	=> '_update_post_term_count', 
			'query_var'				=> true,
			'rewrite'				=> array( 
											'slug'			=> 'example_terms',
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

add_action( 'init', 'add_snippets_taxonomies', 0 );
?>