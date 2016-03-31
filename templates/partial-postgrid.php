<?php // list of news for Staff landing page  ?>


<ul class="newspanels uk-grid uk-grid-match uk-grid-width-medium-1-3">
<?php

if (is_page("staff")) {
	$pt="staff_news";
} elseif(is_page("people")){
	$pt="person";	
}

$args = array( 'posts_per_page' => 6, 'post_type' => $pt);
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li><div class="uk-panel">
		<div class="uk-panel-teaser">
				<?php 
		        if ( has_post_thumbnail() ) {

					    the_post_thumbnail( 'cat-single' );
					} 
					

	    echo ("</div><h4><a href='" . get_the_permalink() . "'>" . get_the_title() . "</a></h4>");
	    ?>
	</div></li>
<?php endforeach; 
wp_reset_postdata();?>
</ul>