<?php
// TABs from ACF to UIkit tabs section
// check if the repeater field has rows of data

if( have_rows('tabs') ):  $i = 1;
 	// loop through the rows of data
    while ( have_rows('tabs') ) : the_row();
    	${'tab_' . $i} = get_sub_field('tab_title');
    	${'text_' . $i} = get_sub_field('tab_text');
    	$i++;
    endwhile;
?>
	<ul class="uk-tab" data-uk-tab data-uk-switcher="{connect:'#blood'}">
		<?php // Loop thru print tab titles
	for ($k = 1; $k < ($i-1); $k++ ) {
		   echo ('<li><a href="">' . ${'tab_' . $k} . '</a></li>') ; 
	}	

	echo '</ul><ul class="uk-switcher" id="blood">'; // finish tab titles, start tab contents
	for ($k = 1; $k < ($i-1); $k++ ) {
		   echo ('<li><p>' . ${'text_' . $k} . '</p></li>') ; 
	}
	echo '</ul>';


else :
    // no rows found
endif;

?>