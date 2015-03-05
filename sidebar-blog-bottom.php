<aside class="sidebar aside-blog-bottom" role="complementary">
	<div class="full">
		<ul class="widget-area">
			<li><?php get_template_part( 'template-parts/sidebar/portfolio', 'widget' ); ?></li>
			<li><?php get_template_part( 'template-parts/sidebar/portfolio', 'widget' ); ?></li>
		</ul>
	</div>
	<div class="mobile">
		<div class="authors-mobile">
			<?php get_template_part( 'template-parts/sidebar/blog', 'author' ); ?>
		</div>
		<ul class="widget-area">
			<?php if (!dynamic_sidebar('blog-bottom-sidebar')) : ?>
			<?php endif; ?>
			<li><?php get_template_part( 'template-parts/sidebar/facebook', 'like' ); ?></li>
		</ul>
		<ul class="widget-area">
			<li><?php get_template_part( 'template-parts/sidebar/twitter', 'timeline' ); ?></li>
			<li><?php get_template_part( 'template-parts/sidebar/portfolio', 'widget' ); ?></li>
		</ul>
	</div>
</aside>