<?php use Roots\Sage\Titles; ?>

<?php
<<<<<<< .merge_file_GhEuLI
// Adds subnav to page header
=======
//Adds subnav to page header
>>>>>>> .merge_file_JnE1qM


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
		'before' => '<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-grid uk-grid-small" ><div class=" uk-width-1-4"><i class="uk-icon-cog"></i></div><h3 class="uk-width-3-4">', 
		'after'=>'</h3></div>', 
		'echo' => false, 
		'container' => "",
		'items_wrap' => '%3$s',
	);  
	$menuParameters['menu'] = $menu;
    if (wp_get_nav_menu_object($menu)) {
    	echo '<ul class="uk-grid uk-grid-match uk-grid-width-medium-1-4 uk-grid-small pagenav" data-uk-grid-margin data-uk-grid-match="{target:\'.uk-panel\'}">';
    	echo (wp_nav_menu( $menuParameters ) );
    	echo '</ul>';
    }


}


?>



<div class="page-header">
  <h1><?= Titles\title(); ?></h1>



</div>
