<?php
/**
 * Example Widget Class
 */
class posts_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function posts_widget() {
        parent::WP_Widget(false, $name = 'Posts Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $do_not_duplicate_posts = array();
        global $do_not_duplicate_posts,
                $post_id;
        echo $before_widget; 
        remove_all_filters('posts_orderby');
        $query = new WP_Query(array(
			'post_type'		=> 'post',
            'orderby'       => 'rand',
            'post__not_in'  => array($do_not_duplicate_posts)
		));
        if (have_posts()) : while ($query->have_posts()) : $query->the_post(); 
        $do_not_duplicate_posts[] = get_the_ID();
        ?>
            <div class="aside-widget clearfix">
                <div class="aside-widget-header">
                    [ <?php the_field('blog_post_type'); ?> ]
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
		<?php 
            endwhile; endif; wp_reset_query(); var_dump($do_not_duplicate_posts);
    		echo $after_widget;
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['posttype'] = $new_instance['posttype'];
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
    }
 
 
} // end class posts_widget
add_action('widgets_init', create_function('', 'return register_widget("posts_widget");'));
?>