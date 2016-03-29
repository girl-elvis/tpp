<?php use Roots\Sage\Titles; ?>

<?php
// Adds subnav to page header

if (is_page("patients") || is_child( 'patients')) {
	$menu = 'Submenu: Patients';
} elseif (is_page("our-services") || is_child( 'our-services')) {
	$menu = 'Submenu: Services';
} elseif (is_page("about-us") || is_child( 'about-us')) {
	$menu = 'Submenu: About';
  } elseif (is_page("gps") || is_child( 'gps')) {
	$menu = 'Submenu: GPs';
}


if($menu){
	$menuParameters = array(		
		'before' => '<div><i></i><h3>', 
		'after'=>'</h3></div>', 
		'echo' => false, 
		'menu_class' => 'uk-grid uk-grid-match uk-grid-width-medium-1-2 uk-grid-width-large-1-4 uk-grid-small pagenav',		
	);  
	$menuParameters['menu'] = $menu;
    if (wp_get_nav_menu_object($menu)) echo (wp_nav_menu( $menuParameters ) );
}

?>



<div class="page-header">
  <h1><?= Titles\title(); ?></h1>



</div>
