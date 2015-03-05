<?php
/**
 * Example Widget Class
 */
class news_letter_sign_up extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function news_letter_sign_up() {
        parent::WP_Widget(false, $name = 'News Letter Sign Up');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $header_text = $instance['news_letter_header_text'];
    		$form_id = $instance['news_letter_form_id'];
    		$footer_text = $instance['news_letter_footer_text'];
    		echo $before_widget;
    		echo $before_title;
    		echo $after_title; 
        ?>
    		<div class="sidebar-news-letter-sign-up">
      			<div class="news-letter-header"><?php echo $header_text ?></div>
      			<?php echo gravity_form($form_id , false, false, false, '', true); ?>
      			<div class="news-letter-footer"><?php echo $footer_text ?></div>
    		</div>
    		<?php 
        echo $after_widget;
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
    		$instance = $old_instance;
    		$instance['news_letter_header_text'] = strip_tags($new_instance['news_letter_header_text']);
    		$instance['news_letter_form_id'] = strip_tags($new_instance['news_letter_form_id']);
    		$instance['news_letter_footer_text'] = strip_tags($new_instance['news_letter_footer_text']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
        $header_text = $instance['news_letter_header_text'];
  		  $form_id = $instance['news_letter_form_id'];
		    $footer_text = $instance['news_letter_footer_text'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('news_letter_header_text'); ?>"><?php _e('Header Text:'); ?></label> 
            <textarea class="widefat" id="<?php echo $this->get_field_id('news_letter_header_text'); ?>" name="<?php echo $this->get_field_name('news_letter_header_text'); ?>" rows="5" type="text"><?php echo $header_text; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('news_letter_form_id'); ?>"><?php _e('Form ID'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('news_letter_form_id'); ?>" name="<?php echo $this->get_field_name('news_letter_form_id'); ?>" type="text" value="<?php echo $form_id; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('news_letter_footer_text'); ?>"><?php _e('Footer Text:'); ?></label> 
            <textarea class="widefat" id="<?php echo $this->get_field_id('news_letter_footer_text'); ?>" name="<?php echo $this->get_field_name('news_letter_footer_text'); ?>" rows="5" type="text"><?php echo $footer_text; ?></textarea>
        </p>
        <?php 
    }
 
 
} // end class example_widget
add_action('widgets_init', create_function('', 'return register_widget("news_letter_sign_up");'));
?>