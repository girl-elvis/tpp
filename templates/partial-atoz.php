<?php
// Display the a to z list in accordian, alphabetically
?>

<div class="uk-accordion" data-uk-accordion>
<?php
$args = array( 'posts_per_page' => -1, 'post_type' => $post_type, 'status' => 'publish', 'order' => 'ASC', 'orderby' => 'name');
$alphab = "A";
$alphabprint = false;
$lastposts = get_posts( $args );

foreach ( $lastposts as $post ) :
	setup_postdata( $post ); 
	$this_char = strtoupper(mb_substr($post->post_title, 0, 1, 'UTF-8'));

	if (!$alphabprint){
			if ($alphab != "A") echo "</div>";
			echo '<h3 class="uk-accordion-title">' . $alphab . '</h3>';
			if ($alphab != "Z") echo '<div class="uk-accordion-content">';
			$alphabprint = true;
	}

	if ($alphab == $this_char ) { ?>

	<div class="data-title"> <?php the_title(); ?></div>
	<div class="data-definition"><?php the_content(); ?></div>

	<?php
	} else {
		 $alphab++;
		 $alphabprint = false;
	}
		



	
		
		 

?>
	


<?php endforeach; 
wp_reset_postdata(); 
?>

</div>