<div id="portfolio-piece-images" class="portfolio-slider">
	<div id="portfolio-toggle-wrap">
		<div id="portfolio-toggle-button"></div>
	</div>
	<div id="left-control" class="left-control slider-controls firstOne">
    	<div class="slider-arrow"></div>
	</div>
	<div id="right-control" class="right-control slider-controls">
    	<div class="slider-arrow"></div>
	</div>
	<div id="portfolio-piece-images-wrap" class="portfolio-piece-images-wrap">
    	<ul>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php
				$item_array = array();
				if ( get_field('portfolio_gallery_image') ):
					while(the_repeater_field('portfolio_gallery_image')):
						$image = get_sub_field('portfolio_images');
						$image_url = $image['url'];
						$image_alt = $image['alt'];
						$item_array[] = '<li><img src="'.$image_url.'" alt="'.$image_alt.'" /></li>';
					endwhile;
				endif;
				if ( get_field('portfolio_video') ):
					while(the_repeater_field('portfolio_video')):
						$video_source = get_sub_field('video_source');
						$video_url = get_sub_field('video_url');
						if($video_source == 'Vimeo'){
							$item_array[] = '<li class="fitvid"><iframe src="http://player.vimeo.com/video/'.$video_url.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></li>';
						}
						if($video_source == 'YouTube'){
							$item_array[] = '<li class="fitvid"><iframe src="//www.youtube.com/embed/'.$video_url.'?&hd=1&ap=%2526fmt%3D18" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></li>';
						}
					endwhile;
				endif;
				shuffle($item_array);
				foreach($item_array as $value){
					echo $value;
				}
			?>
			<?php endwhile; endif; wp_reset_query(); ?>
    	</ul>
	</div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="portfolio-intro" class="portfolio-intro">
        <div id="btn-info" class="btn-info"></div>
        <div id="btn-close" class="btn-close"></div>
        <h1><?php the_title(); ?></h1>
	</div>
	<div id="portfolio-content-wrap" class="portfolio-content-wrap">
        <?php the_content(); ?>
	</div>
	<?php endwhile; endif; wp_reset_query(); ?>
</div>