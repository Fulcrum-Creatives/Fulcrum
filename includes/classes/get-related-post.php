<?php 
 
	
	class related_posts_class {
		
		function __construct() {
			$functions_array = array(
				$this->related_posts()
			);
			return $functions_array;
			echo'asdasdasdasd';
		}
		
	/**
	  *
	  * Get Related Posts
	  *
	  * Display posts that contain the same tags as the current posts
	  * <?php do_action( 'show_getRelatedPosts'); ?>
	  */

	private function related_posts(){
		function get_relatedPosts(){
	  
			global $post;
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
			
				$args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>5, 
					'ignore_sticky_posts'=>1
				);
				$tags = wp_get_post_tags($post->ID);
				
				if ($tags) {
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				
					$args=array(
						'tag__in' => $tag_ids,
						'post__not_in' => array($post->ID),
						'showposts'=>5, 
						'ignore_sticky_posts'=>1
					);
					$my_query = new wp_query($args);
					if( $my_query->have_posts() ) {
						ob_start();?>
<?php printf( __('<h2>Related Posts</h2>', DOMAIN ) ); ?>
<ul>
						<?php
						echo ob_get_clean();
						while ($my_query->have_posts()) {
							$my_query->the_post();
							ob_start();?>
	<li>
		<a href="<?php the_permalink(); ?>" title="<?php printf( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" itemprop="url">
					<?php the_title(); ?>
		</a>
	</li>
							<?php
				echo ob_get_clean();
						}
						ob_start();?>
</ul>
			  <?php
			  echo ob_get_clean();
					}
				}
			}  
		}
	
		add_action( 'show_getRelatedPosts', 'get_relatedPosts' );
	
		}
	}	


?>