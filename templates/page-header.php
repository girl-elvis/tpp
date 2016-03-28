<?php use Roots\Sage\Titles; ?>

<?php
// Adds subnav to page header
if (is_page("patients") || is_child( 'patients')) {
	 $menuParameters = array(
		'menu' => 'Submenu: Patients', 'before' => '<i></i><h3>', 'after'=>'</h3>', 'echo' => false, 'menu_class' => 'cat-grid uk-grid pagenav',		
		);     
    if (wp_get_nav_menu_object("Submenu Patients" )) echo (wp_nav_menu( $menuParameters ) );
} elseif (is_page("our-services") || is_child( 'our-services')) {
	 $menuParameters = array(
		'menu' => 'Submenu: Services', 'before' => '<i></i><h3>', 'after'=>'</h3>', 'echo' => false, 'menu_class' => 'cat-grid uk-grid pagenav',		
		);     
    if (wp_get_nav_menu_object("Submenu services" )) echo (wp_nav_menu( $menuParameters ) );
} elseif (is_page("about-us") || is_child( 'about-us')) {
	 $menuParameters = array(
		'menu' => 'Submenu: About', 'before' => '<i></i><h3>', 'after'=>'</h3>', 'echo' => false, 'menu_class' => 'cat-grid uk-grid pagenav',		
		);     
    if (wp_get_nav_menu_object("Submenu about" )) echo (wp_nav_menu( $menuParameters ) );
} elseif (is_page("gps") || is_child( 'gps')) {
	 $menuParameters = array(
		'menu' => 'Submenu GPs', 'before' => '<i></i><h3>', 'after'=>'</h3>', 'echo' => false, 'menu_class' => 'cat-grid uk-grid pagenav', 	
		);     
    if (wp_get_nav_menu_object("Submenu: GPs" )) echo (wp_nav_menu( $menuParameters ) );
}


?>



<div class="page-header">
  <h1><?= Titles\title(); ?></h1>



</div>
