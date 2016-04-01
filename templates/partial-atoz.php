<?php
// Display the a to z list in accordion, alphabetically
// this version curently bails out of the loop at the last entry, alphabetically
// so for example if the last entry is X you get no Y and Z entry.

    /* Prepare and print the index-letters */
    echo '<div class="name_directory_index">';

    $index_letters = range('A', 'Z');

    foreach($index_letters as $index_letter)
    {
        echo ' <a class="accordion_opener" href="#">' . strtoupper($index_letter) . '</a> ';
    }
    echo '</div>';
?>

<div class="uk-accordion" data-uk-accordion>
<?php

$args = array(
	'posts_per_page'=> -1,
	'post_type' 		=> $post_type,
	'status' 			=> 'publish',
	'order' 			=> 'ASC',
	'orderby' 			=> 'name'
);

$state = array(
	'letter'  	 => "",
	'nextLetter' => "A",
    'needsclose' => false  // boolean set to true if the accordion content div is open so we know to close it before writiing a new accordion title
);

$lastposts = get_posts( $args );

foreach ( $lastposts as $post ) {
    setup_postdata( $post );

    $this_char = strtoupper(mb_substr($post->post_title, 0, 1, 'UTF-8'));

    if ( $this_char != $state['letter'] ) {	 // the post title first letter has changed!
        $state['letter'] = $this_char;		 // so update the current letter to the new one

        // Loop to handle occasions when you have no entries for a letter
        while ( $state['letter'] > $state['nextLetter'] ) {  // is the current letter beyond the next letter we were expecting (alphabetically) ?
            if($state['needsclose'] == true) { echo '</div>'; $state['needsclose'] = false; } // yes, close the accordion content if it was open
            echo "<h3 class='uk-accordion-title' name='entry_{$state['nextLetter']}'>" . $state['nextLetter'] . "</h3>\r";  // then print the accordion title for the current letter
        	echo '<div class="uk-accordion-content">'; // print accordion content saying 'nothing here'
            echo '  <div class="data-definition"> </div>';
            $state['needsclose'] = true; // remember to say that you just opened the accordion content div
        	$state['nextLetter']++;  // increment the next expected letter and go back to the top of this loop
        } // we've looped enough times and created an 'nothing here' box for the expected next letters that were not there

        if($state['letter'] == $state['nextLetter'] ) {
        	$state['nextLetter']++;  // if the while loop just ran we need to increment the next expected letter 1 more...
            // in some languages this is called a while...else loop. The reason is: we need letter and nextletter to be equal to
            // exit the while loop (when we're cought up accounting for letters that have no entries) but then we need to move
            // the next letter on one to use it for the next occasion
        }

        // normal situation when new first letter matches expected next letter
        if($state['needsclose'] == true) { echo '</div>'; $state['needsclose'] = false; } // close the accordion content if it is open
        echo "<h3 class='uk-accordion-title' name='entry_{$this_char}'>" . $this_char . '</h3>';  // print accordion title
        echo '<div class="uk-accordion-content">';                      // open the accordion content div
        $state['needsclose'] = true;
    }
    // keep printing the post title and content in the loop until the letter changes again
?>
    <div class="data-title">     <?php the_title();   ?></div><!-- close title-->
    <div class="data-definition"><?php the_content(); ?></div><!-- close content -->
<?php

}

wp_reset_postdata();
?>

</div>