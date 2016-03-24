
<?php // ADD Section header if needed  ?>
<?php the_content(); ?>
<?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>




<?php if (is_page("staff") ){ ?>
	

<ul class="newspanels uk-grid uk-grid-match uk-grid-width-medium-1-3">
<?php


$args = array( 'posts_per_page' => 6, 'category' => 5 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li><div class="cat-panel">
		<div class="uk-panel-teaser">
				<?php 
		        if ( has_post_thumbnail() ) {

					    the_post_thumbnail( 'cat-double' );
					} 
					

	    echo ("</div><h4><a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h4>");
	    ?>
	</div></li>
<?php endforeach; 
wp_reset_postdata();?>

</ul>




	 
<?php } ?>