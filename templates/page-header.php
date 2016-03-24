<?php use Roots\Sage\Titles; ?>

<?php
// Adds subnav to page header
if (is_page("patients") || is_child( 'patients')) {
	 $menuParameters = array(
		'menu' => 'Submenu Patients', 'before' => '<i></i><h3>', 'after'=>'</h3>', 'echo' => false, 'menu_class' => 'cat-grid pagenav',		
		);     
    echo (wp_nav_menu( $menuParameters ) );
}

?>



<div class="page-header">
  <h1><?= Titles\title(); ?></h1>



</div>
