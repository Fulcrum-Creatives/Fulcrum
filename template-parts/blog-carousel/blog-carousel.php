<div class="blog-slider-container">
    <div class="blog-slider-wrapper">
        <div class="overlay left"></div>
        <div class="overlay right"></div>
        <div class="caption-wrapper"></div>
        <ul class="slider">
        	<?php 
			$query = new WP_Query(array(
				'post_type'		=> 'post',
				'paged'			=> $paged
			));
				if (have_posts()) : while ($query->have_posts()) : $query->the_post(); 
				if(get_field('blog_gallery')): while(the_repeater_field('blog_gallery')):
					$image = get_sub_field('blog_gallery_image'); 
					$caption = get_sub_field('blog_image_caption')
			?>
			<li>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                <div class="slider-caption">
                    <p><?php echo $caption; ?></p>
                </div>
            </li>
            <?php endwhile; endif; endwhile; endif; wp_reset_query(); ?>
   		</ul>
   	</div>
</div>