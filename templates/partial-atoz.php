<?php
// Display the a to z list in accordian, alphabetically
?>

<div class="uk-accordion" data-uk-accordion>
<?php

$args = array(
	'posts_per_page'=> -1,
	'post_type' 		=> $post_type,
	'status' 				=> 'publish',
	'order' 				=> 'ASC',
	'orderby' 			=> 'name'
);

$state = array(
	'letter'  	 => "",
	'nextLetter' => "B",
	'printed' 	 => false
);

$lastposts = get_posts( $args );

foreach ( $lastposts as $post ) :
    setup_postdata( $post );

    $this_char = strtoupper(mb_substr($post->post_title, 0, 1, 'UTF-8'));

    if ( $this_char != $state['letter'] ) {					// letter has changed

        $state['letter'] = $this_char;							// update the letter to the new one


        while ( $state['letter'] > $state['nextLetter'] ) {  // is the letter the next letter in the alphabet?
        	echo '</div><h3 class="uk-accordion-title">' . $state['nextLetter'] . '</h3>';  // no, then print the accordian title
        	echo '<div class="uk-accordion-content"><div class="data-definition">There is nothing here</div>'; // and accordian content saying nothing here
        	$state['nextLetter']++;  // increment the next expected letter and go back to the top of this loop
        } // PHP does not have while...else
        if($state['letter'] == $state['nextLetter'] ) {
        	$state['nextLetter']++;  // increment the next expected letter
        }

    		if ($this_char != "A") echo "</div>";   		// so close div unless it's the first change (!="A")
        echo '<h3 class="uk-accordion-title">' . $this_char . '</h3>';  // print accordian title
        echo '<div class="uk-accordion-content">';  // open the accordian content div


    }
?>

    <div class="data-title"> <?php the_title(); ?></div>
    <div class="data-definition"><?php the_content(); ?></div>

<?php

endforeach;

wp_reset_postdata();
?>

</div>