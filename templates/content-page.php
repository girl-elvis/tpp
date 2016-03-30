
<?php // ADD Section header if needed  ?>
<?php the_content(); ?>
<?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>


<?php

if (is_page("a-z-of-tests") ){
    	$post_type = "jargon";
    	include(locate_template('templates/partial-atoz.php'));
}

if (is_page("about-us") ){
	 $menuParameters = array(
		'menu' => 'Partners', 'before' => '<i></i><h3>', 'after'=>'</h3>', 'echo' => false, 'menu_class' => 'partners',		
		);     
    echo (wp_nav_menu( $menuParameters ) );
}

if (is_page("staff") ){ // Adds Staff News to page. 	
   	include(locate_template('templates/partial-staffnews.php'));
} elseif (is_page("people")){
   	include(locate_template('templates/partial-people.php'));	
}

if (is_page("going-for-a-bloodtest") ){ // Adds Staff News to page. 
   	//include(locate_template('templates/partial-tabs.php'));
   	get_template_part('templates/partial', 'tabs');
} 



?>