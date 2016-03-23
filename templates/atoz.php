<?php
// Display the a to z list in accordian, alphabetically
?>

<?php


$args = array( 'posts_per_page' => -1, 'post_type' => 'jargon', 'status' => 'publish', 'order' => 'ASC', 'orderby' => 'name');

$lastposts = get_posts( $args );

foreach ( $lastposts as $post ) :
  setup_postdata( $post ); ?>
	<div class="data-title"> <?php the_title(); ?></div>
	<div class="data-definition"><?php the_content(); ?></div>

<?php endforeach; 
wp_reset_postdata(); 


?>
