<section id="our-areas" class="our-areas-wrapper">
	<div class="our-area-header">
		<div id="main-content" class="our-areas-main-title">
			<?php
			$query = new WP_Query(array(
									'post_type'			=>'our-areas',
									'showposts' 		=> '1'
								));
			if (have_posts()) : while ($query->have_posts()) : $query->the_post();
			?>
				<h2><?php the_field('our_areas_description', 208); ?></h2>
			<?php endwhile; else : endif; wp_reset_query(); ?>
		</div>
		<div id="our-area-menu" class="our-area-menu">
			<ul>
				<?php
				$query = new WP_Query(array(
									'post_type'			=>'our-areas',
									'order' 			=> 'DESC',
									'post__not_in' 		=> array(208),
									'showposts' 		=> '3'
								));
				if (have_posts()) : while ($query->have_posts()) : $query->the_post();
				?>
				<li><?php the_title(); ?></li>
				<?php endwhile; else : endif; wp_reset_query(); ?>
			</ul>
		</div>
	</div>
	<?php
		$query = new WP_Query(array(
								'post_type'			=>'our-areas',
								'order' 			=> 'DESC',
								'post__not_in' 		=> array(208),
								'showposts' 		=> '3'
							));
		$section_num = 1;
		if (have_posts()) : while ($query->have_posts()) : $query->the_post();
	?>
	<div class="our-area-title section-<?php echo $section_num; ?>" data-section="<?php echo $section_num; ?>">
		<h2><?php the_title(); ?></h2>
	</div>
	<div id="our-area-section-wrap-<?php echo $section_num; ?>" class="our-area-sections">
		<div class="our-area-description">
			<p><?php the_field('our_areas_description'); ?></p>
		</div>
		<div class="our-area-content clearfix">
			<?php the_field('our_areas_content'); ?>
		</div>
	</div>
	<?php $section_num++; endwhile; else : endif; wp_reset_query(); ?>
</section>
