<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <br><br><br><br>

  <?php $hero_image = get_field('portfolio_hero_image'); ?>

  <?php if($hero_image) { ?>
    <div class="hero">
      <img src="<?php echo $hero_image['url']; ?>" class="image-spacer">
    </div>
  <?php } ?>

  <header class="work-detail-header">
    <h1><?php the_title(); ?></h1>
    <!-- <p>Type Goes Here</p> -->
    <a href="/work">close project</a>
  </header>

  <div class="grid grid-halfs grid-work-copy">
    <div class="grid-item">
      <hr>
      <?php the_content(); ?>
    </div>
    <div class="grid-item">
      <hr>
      <?php
        $art_direction   = get_field('art_direction');
        $design          = get_field('design');
        $project_manager = get_field('project_manager');
        $partners        = get_field('partners');
        $photography     = get_field('photography');
        $videography     = get_field('videography');
        $web_development = get_field('web_development');
        $marketing_strategy = get_field('marketing_strategy');
      ?>

      <?php if($art_direction) { ?>
        <h2>Creative Direction</h2>
        <p><?php echo $art_direction ?></p>
      <?php } ?>

      <?php if($design) { ?>
        <h2>Design</h2>
        <p><?php echo $design ?></p>
      <?php } ?>

      <?php if($project_manager) { ?>
        <h2>Project Manager</h2>
        <p><?php echo $project_manager ?></p>
      <?php } ?>

      <?php if($photography) { ?>
        <h2>Photography</h2> 
        <p><?php echo $photography ?></p>
      <?php } ?>
      
      <?php if($videography) { ?>
        <h2>Videography</h2> 
        <p><?php echo $videography ?></p>
      <?php } ?>
      
      <?php if($web_development) { ?>
        <h2>Web Development</h2> 
        <p><?php echo $web_development ?></p>
      <?php } ?>
      
      <?php if($marketing_strategy) { ?>
        <h2>Marketing Strategy</h2> 
        <p><?php echo $marketing_strategy ?></p>
      <?php } ?>
      
      <?php if($partners) { ?>
        <h2>Partners</h2> 
        <p><?php echo $partners ?></p>
      <?php } ?>

    </div>
  </div>

<?php endwhile; endif; ?>

<div class="grid grid-halfs">
  <?php if (have_posts()) : while (have_posts()) : the_post();
    $item_array = array();
    if ( get_field('portfolio_gallery_image') ):
      while(the_repeater_field('portfolio_gallery_image')):
        $image = get_sub_field('portfolio_images');
        $image_url = $image['url'];
        $image_alt = $image['alt'];
        $item_array[] = '<div class="grid-item"><img src="'.$image_url.'" alt="'.$image_alt.'" class="image-spacer"></div>';
      endwhile;
    endif;
    if ( get_field('portfolio_video') ):
       while(the_repeater_field('portfolio_video')):
         $video_source = get_sub_field('video_source');
         $video_url = get_sub_field('video_url');
         if($video_source == 'Vimeo'){
           $item_array[] = '<div class="grid-item video-wrapper [vimeo, widescreen]"><iframe src="http://player.vimeo.com/video/'.$video_url.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
         }
         if($video_source == 'YouTube'){
           $item_array[] = '<div class="grid-item video-wrapper"><iframe src="//www.youtube.com/embed/'.$video_url.'?&hd=1&ap=%2526fmt%3D18" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
         }
       endwhile;
    endif;
    //shuffle($item_array);
    foreach( $item_array as $value ){
      echo $value;
    }
  ?>
  <?php endwhile; endif; wp_reset_query(); ?>
</div>

<?php wp_reset_query(); ?>
<div style="clear:both"></div>
<div class="close-project">
  <a href="/work">close project</a>
</div>