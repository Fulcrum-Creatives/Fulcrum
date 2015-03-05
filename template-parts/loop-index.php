<!-- Entry Header -->
<header class="entry-header">

	<!-- Entry-title -->
	<h3 class="entry-title">
		<a href="<?php the_permalink(); ?>" 
		   title="<?php printf( esc_attr__( 'Permalink to %s', DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" 
		   rel="bookmark">
			<?php the_title(); ?>
		</a>
	</h3><!-- .entry-title -->

</header><!-- .entry-header -->

<!-- Entry Meta -->
<section class="entry-meta">

	<!-- Author VCard -->
    <div class="entry-author vcard">
        <p class="author me">
            <?php 
            	printf( __('Witten by <span class="fn n">', DOMAIN ) ) .the_author_meta( 'display_name' ); 
            	printf( __('</span>', DOMAIN ) ); 
            ?>
        </p>
    </div><!-- .entry-author -->

    <!-- Entry Date -->
	<div class="entry-date" datetime="<?php the_time( 'Y-m-d' ); ?>">
		<?php printf( __('Posted on ', DOMAIN ) ); echo the_time('F j, Y'); ?>
	</div><!-- .entry-date -->

	<!-- Entry Categories -->
	<?php if (get_the_category()) { ?>
	<div class="entry-categories">
		<?php _e( 'Categories ', DOMAIN ); ?><?php the_category( ', ' ); ?>
	</div><!-- .entry-categories -->
	<?php } ?>

	<!-- Entry Tags -->
	<?php if (get_the_tags()) { ?>
	<div class="entry-tags">
		<?php _e( 'Tags ', DOMAIN ); ?><?php the_tags( '', ', ', '' ); ?>
	</div><!-- .entry-tags -->
	<?php } ?>

</section><!-- .enty-meta -->

<!-- Entry Content -->
<section class="entry-content">
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="featured-image">
		<?php the_post_thumbnail();?>
	</div>
	<?php } ?>
	<?php the_content(''); ?>
</section><!-- .entry-content -->

<!-- Entry Footer -->
<footer class="entry-footer">
	<!-- Entry Link -->
	<?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
	    <div class="entry-link">
	    	<a href="<?php the_permalink(); ?>"  title="<?php printf( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	            <?php printf( __('More', DOMAIN ) ); ?>
	        </a>
	    </div><!-- .entry-link -->
	<?php else : endif; ?>
</footer><!-- .entry-footer -->