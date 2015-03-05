<?php
/*
Template Name: Work
*/
get_header();
/*get_template_part( 'template-parts/nav-carousel/nav', 'carousel' );*/
?>

<br>
<div class="main-content work-page">
<div class="grid grid-thirds">

<?php
  $query = new WP_Query(array(
    'post_type' => 'portfolio',
    'showposts' => '999'
  ));
?>

<?php
  if ($query->have_posts()) :
    while ($query->have_posts()) :
      $query->the_post();

      $item_array = array();
      if ( get_field('portfolio_gallery_image') ):
        while(the_repeater_field('portfolio_gallery_image')):
          $image = get_sub_field('portfolio_images');
          $image_url = $image['url'];
          $image_alt = $image['alt'];
          $item_array[] = '<img src="'.$image_url.'" alt="'.$image_alt.'" class="image-spacer">';
        endwhile;
      endif;
?>

<div class="grid-item">
  <a href="<?php the_permalink(); ?>" class="grid-link">
    <div class="grid-item-hover">
      <div class="grid-item-text"><?php the_title(); ?></div>
    </div>
  </a>
  <img src="<?php the_field('portfolio_thumbnail') ?>" class="image-spacer">
</div>

<?php
    endwhile;
  endif;
  wp_reset_query();
?>

</div>
</div>


<?php /* get_template_part( 'template-parts/portfolio-showcase/portfolio', 'showcase' ); */ ?>

<?php get_footer(); ?>
