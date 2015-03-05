<?php
/**
 * Example Widget Class
 */
class teaser_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function teaser_widget() {
        parent::WP_Widget(false, $name = 'Teaser Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        global $do_not_duplicate,
                $post;
        $post_type = $instance['posttype'];
        echo $before_widget; 
        $query = new WP_Query(array(
			'post_type'		=> $post_type,
            'post__not_in'  => $duplicate_posts,
            'orderby'       => 'rand',
            'posts_per_page' => 1
		));
        if (have_posts()) : while ($query->have_posts()) : $query->the_post(); 
        $do_not_duplicate[] = $post->ID;
        ?>
            <div class="aside-widget clearfix">
                <div class="aside-widget-header">
                    <?php if ('portfolio' == get_post_type()){ ?>
                        [ Work ]
                    <?php } else { ?>
                        [ <?php the_field('blog_post_type'); ?> ]
                    <?php } ?>
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
            <?php var_dump($do_not_duplicate);?>
		<?php 
            endwhile; endif; wp_reset_query();
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
        $post_type = esc_attr($instance['posttype']);
        ?>
        <p>
        	<label for="<?php echo $this->get_field_id('posttype'); ?>"><?php _e('Type:'); ?></label>
        	<br />
        	<input 	id="<?php echo $this->get_field_id('posttype'); ?>"
        			name=" <?php echo $this->get_field_name('posttype'); ?>" 
        			type="radio" 
        			<?php if($post_type === 'post'){ echo 'checked="checked"'; } ?> value="post" /> Blog Post 
        	<br />
        	<input 	id="<?php echo $this->get_field_id('posttype'); ?>"
        			name=" <?php echo $this->get_field_name('posttype'); ?>" 
        			type="radio" 
        			<?php if($post_type === 'portfolio'){ echo 'checked="checked"'; } ?> value="portfolio" /> Portfolio 
        </p>
        <?php
    }
 
 
} // end class teaser_widget
add_action('widgets_init', create_function('', 'return register_widget("teaser_widget");'));
?>