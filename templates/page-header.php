<?php use Roots\Sage\Titles; ?>

<div class="page-header">
  <h1><?= Titles\title(); ?></h1>


<?php
if (is_page("patients") || is_child( 'patients')) {
	
	 $menuParameters = array(

		'menu' => 'Patients',
		'before' => '<h3>',
		'after'=>'</h3>',
		//'items_wrap' => '%3$s', // removes UL
		'echo' => false,

	 	'menu_class' => 'cat-grid pagenav',		
		);     
    echo (wp_nav_menu( $menuParameters ) );
}

?>

</div>
