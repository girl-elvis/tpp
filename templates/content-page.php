
<?php // ADD Section header if needed  ?>
<?php the_content(); ?>
<?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>




<?php if (is_page("a-z-of-tests") ){
	$post_type = "jargon";
	include(locate_template('templates/partial-atoz.php'));
	 
}
?>