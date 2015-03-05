<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!-- Entry Header -->

    <!-- Entry-title
    <h3 class="entry-title">
      <?php the_title(); ?>
    </h3>.entry-title -->

  <?php the_content(); ?>

  <!-- Entry Footer -->
  <footer class="entry-footer">
    <!-- Page Navigation -->
    <nav id="page-navigation">
      <?php 
        $args = array(
          'before'           => '<div class="nav-pages">' . __('Pages:', DOMAIN).'',
          'after'            => '</div>',
          'link_before'      => '',
          'link_after'       => '',
          'next_or_number'   => 'number',
          'nextpagelink'     => __( 'Previous', DOMAIN ),
          'previouspagelink' => __( 'Next', DOMAIN ),
          'pagelink'         => '%',
          'echo'             => 1
        ); 
        wp_link_pages($args)
      ?>
    </nav><!-- .page-navigation -->

  </footer><!-- .entry-footer -->

</article><!-- #post-{ID} -->

<?php endwhile; else : ?>

<?php get_template_part( 'template-parts/no', 'entry' ); ?>

<?php endif; wp_reset_query(); ?>

<?php get_sidebar('sidebar'); ?>

<?php get_footer(); ?>
