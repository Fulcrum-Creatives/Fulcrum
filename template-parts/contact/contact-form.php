<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="contact-container">
	<?php the_content(); ?>
</div>
<?php endwhile; endif; wp_reset_query(); ?>