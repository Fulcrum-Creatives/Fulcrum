<div class="team-members">
	<?php
		$query = new WP_Query(array(
					'post_type'		=> 'team-member',
					'order' 		=> 'ASC',
					'showposts' 	=> '99'
				));
		$j= 0;
		if (have_posts()) : while ($query->have_posts()) : $query->the_post();
	?>
	<div class="team-members-wrapper <?php  echo (++$j % 2 == 0) ? 'even' : 'odd'; ?>">
			<div class="team-member-image">
				<?php 
					if ( has_post_thumbnail()) {
						the_post_thumbnail('full');
					}
				?>
			</div>
			<div class="team-member-content">
				<div class="team-member-info">
					<div class="team-member-toggle"></div>
					<h2 class="team-member-name"><?php the_title(); ?></h2>
					<h3 class="team-member-title"><?php the_field('company_title') ?></h3>
				</div>
				<div class="team-member-bio">
					<?php the_content(); ?>
					<div class="tem-member-contact">
						<?php if( get_field('email') ):
						?>
						    <p>
						   		<?php the_field('email'); ?>
						    </p>
						<?php endif;?>
						<?php if( get_field('facebook') ):
						?>
						    <p>
						   		<?php the_field('facebook'); ?>
						    </p>
						<?php endif;?>
						<?php if( get_field('twitter') ):
						?>
						    <p>
						   		<?php the_field('twitter'); ?>
						    </p>
						<?php endif;?>
						<?php if( get_field('linkedin') ):
						?>
						    <p>
						   		<?php the_field('linkedin'); ?>
						    </p>
						<?php endif;?>
					</div>
				</div>
			</div>
			<div class="team-member-image-mobile">
				<?php 
					if ( has_post_thumbnail()) {
						the_post_thumbnail('full');
					}
				?>
			</div>
	</div>
	<?php endwhile; else : endif; wp_reset_query(); ?>
</div>