<?php
remove_all_filters('posts_orderby');
global $do_not_duplicate;
$query = new WP_Query(array(
	'post_type'		=> 'portfolio',
    'orderby'       => 'rand',
    'post__not_in'  => $do_not_duplicate,
    'posts_per_page'=> 1
));
if (have_posts()) : while ($query->have_posts()) : $query->the_post();
$do_not_duplicate[] = get_the_ID();
?>
    <div class="aside-widget clearfix">
        <div class="aside-widget-header">
            [ Work ]
        </div>
        <div class="aside-widget-body">
            <div class="aside-widge-image">
                <?php $image = get_field('widget_image'); ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
            <h3>
                <a href="<?php the_permalink(); ?>" class="aside-widget-title-link">
                    <?php the_title(); ?>
                </a>
            </h3>
            <div class="content">
                <?php the_excerpt(); ?> 
            </div>
        </div>
        <div class="aside-widget-footer clearfix">
            <a href="<?php the_permalink(); ?>" class="aside-widget-footer-link">
                <?php the_field('widget_footer_link_text'); ?>
            </a>
        </div>
    </div>
<?php  endwhile; endif; ?>