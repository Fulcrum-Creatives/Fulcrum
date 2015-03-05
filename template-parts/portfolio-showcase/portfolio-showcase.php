<div class="home-page-showcase">
  <?php
  remove_all_filters('posts_orderby');
  $query = new WP_Query(array(
              'post_type'   => 'portfolio',
              'orderby'   => 'rand',
              'showposts'   => '1'
            ));
  if (have_posts()) : while ($query->have_posts()) : $query->the_post();
    ?>
  <div class="showcase-image">
    <?php 
    $item_array = array();
    if ( get_field('portfolio_gallery_image') ):
      while(the_repeater_field('portfolio_gallery_image')):
        $image = get_sub_field('portfolio_images');
        $image_url = $image['url'];
        $image_alt = $image['alt'];
        $item_array[] = '<img src="'.$image_url.'" alt="'.$image_alt.'" />';
      endwhile;
    endif;
    if ( get_field('portfolio_video') ):
      while(the_repeater_field('portfolio_video')):
        $video_source = get_sub_field('video_source');
        $video_url = get_sub_field('video_url');
        if($video_source == 'Vimeo'){
          $item_array[] = '<div class="fitvid"><iframe src="http://player.vimeo.com/video/'.$video_url.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
        }
        if($video_source == 'YouTube'){
          $item_array[] = '<div class="fitvid"><iframe src="//www.youtube.com/embed/'.$video_url.'?autoplay=1&vq=hd720" frameborder="0" allowFullScreen></iframe></div>';
        }
      endwhile;
    endif;
    echo $item_array[array_rand($item_array)];
    ?>
    <div class="showcase-title">
      <h2>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
          <span class="no-underline">[</span><?php the_title(); ?><span class="no-underline">]</span><div class="arrow"></div>
        </a>
      </h2>
    </div>
  </div>
  <?php endwhile; endif; wp_reset_query(); ?>
</div>
