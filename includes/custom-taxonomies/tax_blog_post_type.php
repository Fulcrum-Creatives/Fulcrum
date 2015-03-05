<?php 
// Create Custom Taxonomy Example
function add_blog_post_type_taxonomies() {
	register_taxonomy('blog-post-type', // Taxonomy Name
		array( 'post' // Post Type for Taxonomy
		), 
		array( 
			'labels'				=> array( 	
									  'name'							=> _x( 'Blog Post Type', 'taxonomy general name' ), 
									  'singular_name'					=> _x( 'Blog Post Type', 'taxonomy singular name' ), 
									  'search_items'					=> __( 'Search Blog Post Type' ),
									  'popular_items'					=> __( 'Popular Blog Post Types'),
									  'all_items'						=> __( 'All Blog Post Types' ), 
									  'parent_item'						=> __( 'Parent Blog Post Type' ), 
									  'parent_item_colon'				=> __( 'Parent Blog Post Type:' ), 
									  'edit_item'						=> __( 'Edit Blog Post Type' ), 
									  'update_item'						=> __( 'Update Blog Post Type' ), 
									  'add_new_item'					=> __( 'Add New Blog Post Type' ), 
									  'new_item_name'					=> __( 'New Blog Post Type' ), 
									  'separate_items_with_commas'		=> __( 'Separate Items with Commas' ),
									  'add_or_remove_items' 			=> __( 'Add or Remove Blog Post Type' ),
									  'choose_from_most_used'			=> __( 'Choose from the most used Blog Post Type' ),
									  'menu_name' 						=> __( 'Blog Post Type' ), 
									  ),
			'public'				=> true,
			'show_in_nav_menus'		=> true,
			'show_ui'				=> true,
			'show_tagcloud'			=> true,
			'hierarchical'			=> true,
			'update_count_callback'	=> '_update_post_term_count', 
			'query_var'				=> true,
			'rewrite'				=> array( 
											'slug'			=> 'blog-post-type',
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

add_action( 'init', 'add_blog_post_type_taxonomies', 0 );
?>