<div class="carousel-wrapper">
  <div id="portfolio-piece-menu" class="carousel-container">
    <div id="menuWrap" class="portfolio-nav-wrapper">
        <div id="menuSwipe" class="portfolio-nav-container">
        <?php
          $nav_query = new WP_Query(array(
                'post_type'   => 'portfolio',
                'order'     => 'DESC',
                'posts_per_page'  => '999'
              ));
          if (have_posts()) : while ($nav_query->have_posts()) : $nav_query->the_post();
        ?>
        <div class="panel">
          <a href="<?php the_permalink(); ?>" class="workpiece">
            <img src="<?php the_field('portfolio_thumbnail'); ?>" alt="<?php the_title(); ?>">
            <span class="img-caption-wrap">
              <span class="img-caption-inner hover-only">
                <span class="img-caption"><?php the_title(); ?></span>
              </span>
            </span>
          </a>
        </div>
        <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </div>
    <div class="nav left">
        <div class="slider-arrow"></div>
    </div>
    <div class="nav right">
        <div class="slider-arrow"></div>
    </div>
  </div>
</div>
<div id="portfolio-toggle-wrap" class="portfolio-nav-toggle-wrapper">
  <div id="portfolio-toggle-button" class="portfolio-toggle-button"></div>
</div>
