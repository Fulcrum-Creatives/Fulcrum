<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}
?>

<?php
$default_comment_form = false;
if($default_comment_form == true){
	comment_form();
} else {
?>
<section id="respond" class="comment-form">
	<header class="comments-form-header">
		<h3 role="heading"><?php comment_form_title( 'Comments:', 'Comments:' ); ?></h3>
		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>
	</header>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" role="form">
		<?php if ( !is_user_logged_in() ) : ?>
		<div class="comment-form-author-lable">
			<label for="author">Name: <?php if ($req) echo "*"; ?></label>
		</div>
		<div class="comment-form-author">
			<input id="author" name="author" type="text" value="<?php echo esc_attr($comment_author); ?>" role="textbox" placeholder="Name"/>
		</div>
		<div class="comment-form-email-lable">
			<label for="email" >Email: <?php if ($req) echo "*"; ?></label>
		</div>
		<div class="comment-form-email">
			<input id="email" name="email" type="text" value="<?php echo esc_attr($comment_author_email); ?>" role="textbox" placeholder="Email Address"/>
		</div>
		<?php endif; ?>
		<div class="comment-form-comment-lable">
			<label for="comment">Comment: </label>
		</div>
		<div class="comment-form-comment">
			<textarea id="comment" name="comment"></textarea>
		</div>
		<div class="form-submit">
			<input name="submit" type="submit" id="submit" value="Submit" role="button"/>
			<?php comment_id_fields(); ?>
		</div>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
</section>
<nav class="comment-navigation">
	<div class="older"><?php previous_comments_link() ?></div>
	<div class="newer"><?php next_comments_link('More Comments >>') ?></div>
</nav>
<?php };  // if you delete this the sky will fall on your head ?>
<?php 
if ( comments_open() ) : 
	if ( have_comments() ) : ?>
		<section class="entry-comment">
			<ol class="commentlist">
				<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
			</ol>
		</section>
		<?php else : if ( comments_open() ) : else : ?>
		<p class="nocomments">Comments are closed.</p>
<?php endif; endif; endif;?>