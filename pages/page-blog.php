<?php
/*
Template Name: Blog
*/
get_header();
get_template_part( 'template-parts/blog-carousel/blog', 'blog-carousel' );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query = new WP_Query(array(
  'post_type' => 'post',
  'paged'     => $paged,
));
?>

<div class="main-content blog-index-page">


  <div class="blog-entry">
    <?php if (have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <section class="entry-content">
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="featured-image">
          <?php the_post_thumbnail();?>
        </div>
        <?php } ?>
      </section>

      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" 
           title="<?php printf( esc_attr__( 'Permalink to %s', DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" 
           rel="bookmark">
          <?php the_title(); ?>
        </a>
      </h2>

      <section class="blog-meta">
        <div class="entry-author vcard">
              <p class="author me">
                  <?php 
                    printf( __('By: <span class="fn n">', DOMAIN ) ) .the_author_meta( 'display_name' ); 
                    printf( __('</span>', DOMAIN ) ); 
                  ?>
                   |&nbsp;
              </p>
          </div>
          <div class="entry-date" datetime="<?php the_time( 'j/n/Y' ); ?>">
          <p><?php echo the_time('j/n/y'); ?> |&nbsp;</p>
        </div>
        <?php if (get_the_category()) { ?>
        <div class="entry-categories">
          <?php the_category( ', ' ); ?>
        </div><!-- .entry-categories -->
        <?php } ?>
      </section>

      <section class="entry-content">
        <?php the_content(''); ?>
      </section>

    </article>
    <?php endwhile;?>

    <nav class="nav-below">
    <?php //if (  $wp_query->max_num_pages > 1 ) : ?>

        <div class="nav-previous">
          <?php next_posts_link( __( '&larr; Older', DOMAIN ) ); ?>
        </div>
        <div class="nav-next">
          <?php previous_posts_link( __( 'Newer &rarr;', DOMAIN ) ); ?>
        </div>

    <?php //endif; ?>
    </nav><!-- #nav-below -->

    <?php endif; wp_reset_query(); ?>
  </div>

</div>


<?php get_footer(); ?>
