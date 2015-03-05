<?php get_header(); ?>

<?php 
  $do_not_duplicate = array();
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $query = new WP_Query(array(
    'post_type' => 'post',
    'paged'     => $paged,
  ));
?>

<div class="main-content blog-index-page">

<ul class="blog-navigation">
  <?php wp_list_categories(array('title_li' => '')); ?>
  <?php wp_get_archives(array('type' => 'yearly')); ?>
</ul>

<div class="blog-list">

<?php
  if (have_posts()) : while ($query->have_posts()) : $query->the_post();
  $do_not_duplicate[] = get_the_ID()
?>

  <a href="<?php the_permalink(); ?>" 
     title="<?php printf( esc_attr__( 'Permalink to %s', DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" 
     rel="bookmark"
     class="blog-list-item">
      <p class="blog-list-date"><?php the_date('F j, Y'); ?></p>
      <h1 class="blog-list-title"><?php the_title(); ?></h1>
      <p class="blog-list-sub-title"><?php echo get_field('post_tagline'); ?></p>
  </a>
  <?php endwhile;?>

  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <br><br><br>
    <div style="clear:both;"></div>
    <div class="block-link blog-list-navigation nav-previous">
      <?php next_posts_link( __( 'Older Posts', DOMAIN ) ); ?>
    </div>
    <div class="block-link blog-list-navigation nav-next">
      <?php previous_posts_link( __( 'Newer Posts', DOMAIN ) ); ?>
    </div>
  <?php endif; ?>

<?php endif; ?>

</div>

</div>

<?php get_footer(); ?>
