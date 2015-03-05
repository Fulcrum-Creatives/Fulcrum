<div class="blog-author">
	<div class="articles-by">
		<h3>Articles By:</h3>
	</div>
	<div class="blog-author-team-members">
		<?php
			$query = new WP_Query(array(
						'post_type'		=> 'team-member',
						'order' 		=> 'ASC',
						'showposts' 	=> '99',
						'post__not_in' => array(379,384)
					));
			if (have_posts()) : while ($query->have_posts()) : $query->the_post();
		?>
		<div class="blog-author-team-members-wrapper <?php echo (++$j % 2 == 0) ? 'even' : 'odd'; ?>">
			<div class="blog-author-team-member-image">
				<?php 
					if ( has_post_thumbnail()) {
						the_post_thumbnail('full');
					}
				?>
			</div>
			<div class="blog-author-team-member-content">
				<div class="blog-author-team-member-info">
					<h2 class="blog-author-team-member-name"><?php the_title(); ?></h2>
					<h3 class="blog-author-team-member-title"><?php the_field('company_title') ?></h3>
				</div>
			</div>
		</div>
		<?php endwhile; else : endif; wp_reset_query(); ?>
	</div>
</div>