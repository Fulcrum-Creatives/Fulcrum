<?php get_header(); ?>

<div class="main-content blog-detail-page">

  <?php $do_not_duplicate = array(); ?>

  <p class="blog-post-meta">
    <span class="blog-post-date"><?php the_date('F j, Y'); ?></span>
    |
    <span class="blog-post-author"><?php the_author_meta('display_name'); ?></span>
  </p>


  <h1 class="blog-post-title"><?php the_title(); ?></h1>

  <?php if (get_the_category()) { ?>
    <h2 class="blog-post-tags-title">Categorized:</h2>
    <ul class="blog-post-tags-list">
      <?php
        $categories = get_the_category();
        $separator = ' ';
        $output = '';
        if($categories){
          foreach($categories as $category) {
            $output .= '<li><a class="block-link" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a></li>'.$separator;
          }
        echo trim($output, $separator);
        }
      ?>
    </ul>
  <?php } ?>

  <div class="blog-post-section-left">
    <div class="blog-post-content">
      <?php
      if (has_post_thumbnail()) {
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_name');
        echo '<img src="' . $thumb[0] . '" style="display:block; max-width:100%;"><br><br>';
      }
      ?>
      <?php the_content(''); ?>

      <br><br>
      <div class="blog-list">
	      <h2>Similar blog posts from our archives:</h2>
        <?php 
          if (have_posts()) : while (have_posts()) : the_post();
            $do_not_duplicate[] = get_the_ID();
            display_related_posts_via_taxonomies();
          endwhile; endif; wp_reset_query();
        ?>
      </div>

      <?php /* comments_template( '', true ); */ ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>

