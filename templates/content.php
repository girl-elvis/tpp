<article <?php post_class(); ?>>
	
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
<?php 
                if ( has_post_thumbnail() ) {
                		echo "<div class='featuredimg'>";
                        the_post_thumbnail( 'thumbnail' );
                        echo "</div>";
                    }                     ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
