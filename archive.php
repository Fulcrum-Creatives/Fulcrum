<?php get_header(); ?>

<div class="main-content blog-index-page">

  <?php if (is_category()) { ?>
    <h3 class="blog-archives-title"><?php _e("Posts Categorized:", DOMAIN); single_cat_title(); ?></h3>
  <?php } elseif (is_tag()) { ?>
    <h3 class="blog-archives-title"><?php _e("Posts Tagged:", DOMAIN); single_tag_title(); ?></h3>
  <?php } elseif (is_author()) {
    global $post;
    $author_id = $post->post_author;
  ?>
    <h3 class="blog-archives-title"><?php _e("Posts By:", DOMAIN); the_author_meta('display_name', $author_id); ?></h3>
  <?php } elseif (is_day()) { ?>
    <h3 class="blog-archives-title"><?php _e("Daily Archives:", DOMAIN);  the_time('l, F j, Y'); ?></h3>

  <?php } elseif (is_month()) { ?>
    <h3 class="blog-archives-title"><?php _e("Monthly Archives:", DOMAIN); the_time('F Y'); ?></h3>

  <?php } elseif (is_year()) { ?>
    <h3 class="blog-archives-title"><?php _e("Yearly Archives:", DOMAIN); the_time('Y'); ?></h3>
  <?php } ?>

  <ul class="blog-navigation">
    <?php wp_list_categories(array('title_li' => '')); ?>
    <?php wp_get_archives(array('type' => 'yearly')); ?>
  </ul>

  <div class="blog-list">
	  
   <!-- Begin old archive code -->
   <!--  
	   
	   <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;\
    query_posts( array('post_type'=>array(
                  'post',
                  ),
              'paged'=>$paged ) );
    if (have_posts()) : while (have_posts()) : the_post(); 
    ?>

    <?php get_template_part( 'template-parts/loop', 'archive' ); ?>

    <?php endwhile; ?>

    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
      <br><br><br>
      <div style="clear:both;"></div>
      <div class="block-link blog-list-navigation nav-previous">
        <?php next_posts_link( __( 'Older Posts', DOMAIN ) ); ?>
      </div>
      <div class="block-link blog-list-navigation nav-next">
        <?php previous_posts_link( __( 'Newer Posts', DOMAIN ) ); ?>
      </div>
    <?php endif; ?>

    <?php else : ?>

    <?php get_template_part( 'template-parts/no', 'entry' ); ?>

    <?php endif; wp_reset_query(); ?> -->
    
    <!-- End old archive code -->
    
    	<?php if ( have_posts() ) : ?>

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						 get_template_part( 'template-parts/loop', 'archive' );

					endwhile;
					// Previous/next page navigation.
					

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'template-parts/no', 'entry' );

				endif;
			?>
			
			
    
    

  </div>

</div>

<?php get_footer(); ?>
