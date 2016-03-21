
<?php // ADD Section header if needed ?>

<?php if (is_front_page()){
	// Get homepage boxes
?>
<div class="cat-grid" data-uk-grid-match="{target:'.uk-panel'}">

<?php 

$image = get_field('image');
$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

}

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

<h2>News</h2><div class="cat-grid" data-uk-grid-match="{target:'.uk-panel'}">

<?php
	$args = array( 'posts_per_page' => 4, 'order'=> 'ASC', 'category_name' => 'news', 'post_status' => 'publish' );
	$postslist = get_posts( $args );
	foreach ( $postslist as $post ) :
	  setup_postdata( $post ); ?> 
	<div class="">
		<div class="uk-panel uk-panel-box uk-panel-box-primary">
			<div class="uk-panel-teaser">
				<?php 
		        if ( has_post_thumbnail() ) {
					    the_post_thumbnail();
					} 
					?>

	    </div>
		
			<?php the_title(); ?>   
			
		</div></div>
	<?php
	endforeach; 
	wp_reset_postdata();

	
}
?>
</div>


