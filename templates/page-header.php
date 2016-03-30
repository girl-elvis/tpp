<?php use Roots\Sage\Titles; ?>

<?php
// Adds subnav to page header

if (is_page("patients") || is_child( 'patients')) {
	$page ="patients";
	$menu = 'Submenu: Patients';
} elseif (is_page("our-services") || is_child( 'our-services')) {
	$menu = 'Submenu: Services';
} elseif (is_page("about-us") || is_child( 'about-us')) {
	// EXTRA BLOCKS TO FILL SECOND ROW
	$menu = 'Submenu: About';
  } elseif (is_page("gps") || is_child( 'gps')) {
	$menu = 'Submenu: GPs';
} 


if($menu){
	$menuParameters = array(	
		'before' => '<div class="uk-panel uk-panel-box uk-panel-box-primary" ><i></i><h3>', 
		'after'=>'</h3></div>', 
		'echo' => false, 
		'container' => "",
		'items_wrap' => '%3$s',
		//'menu_class' => '',		
	);  
	$menuParameters['menu'] = $menu;
    if (wp_get_nav_menu_object($menu)) {
    	echo '<ul class="uk-grid uk-grid-match uk-grid-width-medium-1-2 uk-grid-width-large-1-4 uk-grid-small pagenav" data-uk-grid-margin data-uk-grid-match="{target:\'.uk-panel\'}">';
    	echo (wp_nav_menu( $menuParameters ) );
    	echo '</ul>';
    }


}


?>



<div class="page-header">
  <h1><?= Titles\title(); ?></h1>



</div>
