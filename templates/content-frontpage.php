
<?php // ADD Section header if needed ?>

<?php if (is_front_page()){
	// Get homepage boxes
?>
<div class="cat-grid" data-uk-grid-match="{target:'.cat-panel'}">
	<div class="cat-half">
		<div class="cat-panel">

			<?php 

			$image = get_field('image');
			$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}

			?>	    

		</div>
	</div>		

<?php

		// check if the repeater field has rows of data
		if( have_rows('boxes') ):

		 	// loop through the rows of data
		    while ( have_rows('boxes') ) : the_row();
			echo "<div><div class='cat-panel'>";
		        // display a sub field value
		        the_sub_field('title');

		  //       if( get_field( 'menu' ) ) : 
				// 	echo "menu" ; //the_field( 'menu' ); 
				// endif; 

			echo "</div></div>";
		    endwhile;

		else :

		    // no rows found

		endif;

		?>


</div>
	<?php

}

?>


<?php the_content(); ?>

<?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

<?php if (is_front_page()){
	// News Loop of 4
	?>

<h2>News</h2><div class="cat-grid" data-uk-grid-match="{target:'.cat-panel'}">

<?php
	$args = array( 'posts_per_page' => 4, 'order'=> 'ASC', 'category_name' => 'news', 'post_status' => 'publish' );
	$postslist = get_posts( $args );
	foreach ( $postslist as $post ) :
	  setup_postdata( $post ); ?> 
	<div class="">
		<div class="cat-panel">
			<div class="uk-panel-teaser">
				<?php 
		        if ( has_post_thumbnail() ) {

					    the_post_thumbnail();
					} 
					?>

	    </div>
			
			<?php 
			echo ("<a href='" . get_the_permalink() . "'>" . get_the_title() . "</a>");
			
			?>   
			
		</div></div>
	<?php
	endforeach; 
	wp_reset_postdata();

	
}
?>
</div>

