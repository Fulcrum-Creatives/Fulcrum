<?php
/*
Template Name: Home
*/
get_header();
// get_template_part( 'template-parts/our-areas/our', 'areas' );
// get_template_part( 'template-parts/portfolio-showcase/portfolio', 'showcase' );
?>

<div class="hero hero-bokeh">
  <div class="hero-text">
    <h1 class="home-hero-title"><span>We create, elevate, and sustain brands</span> that positively impact their communities.</h1>
    <a href="/work" class="home-see-link">See for yourself</a>
  </div>
  <img src="/wp-content/images/spacer-20x17.gif" class="image-spacer home-hide-large">
  <img src="/wp-content/images/spacer-20x12.gif" class="image-spacer home-hide-small">
</div>

<div class="grid grid-thirds">

<?php
  remove_all_filters('posts_orderby');

  $query = new WP_Query(array(
    'post_type' => 'portfolio',
    'showposts' => '999'
  ));
?>

<?php
  if ($query->have_posts()) :
    while ($query->have_posts()) :
      $query->the_post();

      $the_title = get_the_title();

      if($the_title == "The Nature Conservancy" || $the_title == "Columbus Museum of Art" || $the_title == "Every Kid Healthy") {
?>
        <div class="grid-item">
          <a href="<?php the_permalink(); ?>" class="grid-link">
            <div class="grid-item-hover">
              <div class="grid-item-text"><?php echo $the_title; ?></div>
            </div>
          </a>
          <?php //echo $item_array[array_rand($item_array)]; ?>
          <?php //echo $item_array[0]; ?>
          <img src="<?php the_field('portfolio_thumbnail') ?>" class="image-spacer">
        </div>
<?php
      }
    endwhile;
  endif;
  wp_reset_query();
?>

</div>

<div class="home-work-together-form">
  <h1 class="large-banner">Let's work together</h1>
  <?php echo gravity_form(1 , false, false, false, '', true); ?>
</div>

<?php get_footer(); ?>
