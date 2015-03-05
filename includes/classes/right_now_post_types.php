<?php
/**
  * Post Types Right Now
  *
  * Adds post types to the right now dashboard widget
  *
  * @package Kantan Options Framework
  * @since 1.0
  */
class right_now_post_types_class {
	/**
	  * Class Constructor
	  *
	  * @since 1.0
	  */
	function __construct() {
		add_action( 'right_now_content_table_end', array($this, 'post_types'));
	}
	/**
	  * Get the custom post types and
	  * display the post counts for each.
	  *
	  * @uses get_post_types()
	  * @uses wp_count_posts()
	  * @uses number_format_i18n()
	  * @uses _n()
	  * @uses intval()
	  * @uses current_user_can()
	  *
	  * @since 1.0
	  */
	public function post_types() {
		$args = array(
			'public' => true ,
			'_builtin' => false
		);
		$output = 'object';
		$operator = 'and';
		$post_types = get_post_types( $args , $output , $operator );
	 	echo'<tr>';
		foreach( $post_types as $post_type ) {
			$num_posts = wp_count_posts( $post_type->name );
			$num = number_format_i18n( $num_posts->publish );
			$text = _n( $post_type->labels->singular_name, $post_type->labels->name , intval( $num_posts->publish ) );
			if ( current_user_can( 'edit_posts' ) ) {
				$num = "<a href='edit.php?post_type=$post_type->name'>$num</a>";
				$text = "<a href='edit.php?post_type=$post_type->name'>$text</a>";
			}
			echo '<tr><td class="first b b-' . $post_type->name . '">' . $num . '</td><td class="t ' . $post_type->name . '">' . $text . '</td></tr>';
		}
	}
}
?>