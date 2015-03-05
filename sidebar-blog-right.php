<aside class="sidebar aside-blog-right" role="complementary">
	<ul class="widget-area">
		<?php if (!dynamic_sidebar('blog-right-sidebar')) : ?>
		<?php endif; ?>
	</ul>
	<?php get_template_part( 'template-parts/sidebar/blog', 'author' ); ?>
</aside>