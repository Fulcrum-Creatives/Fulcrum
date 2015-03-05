<aside class="sidebar aside-blog-left" role="complementary">
  <ul class="widget-area">
    <?php if (!dynamic_sidebar('blog-left-sidebar')) : ?>
    <?php endif; ?>
    <li><?php get_template_part( 'template-parts/sidebar/facebook', 'like' ); ?></li>
    <li><?php get_template_part( 'template-parts/sidebar/twitter', 'timeline' ); ?></li>
    <li><?php get_template_part( 'template-parts/sidebar/post', 'widget' ); ?></li>
    <li><?php get_template_part( 'template-parts/sidebar/portfolio', 'widget' ); ?></li>
    <li><?php get_template_part( 'template-parts/sidebar/post', 'widget' ); ?></li>
  </ul>
</aside>
