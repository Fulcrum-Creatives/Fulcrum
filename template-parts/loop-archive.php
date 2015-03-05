  <a href="<?php the_permalink(); ?>" 
     title="<?php printf( esc_attr__( 'Permalink to %s', DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" 
     rel="bookmark"
     class="blog-list-item">
      <p class="blog-list-date"><?php the_date('F j, Y'); ?></p>
      <h1 class="blog-list-title"><?php the_title(); ?></h1>
      <p class="blog-list-sub-title"><?php echo get_field('post_tagline'); ?></p>
  </a>
