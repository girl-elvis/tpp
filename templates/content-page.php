
<?php // ADD Section header if needed  ?>
<?php the_content(); ?>
<?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>


<?php

if (is_page("login") ){

		$args = array(
      'remember'       => true,
      'redirect'       => (is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . htmlspecialchars($_GET['redirect_to']),
      'form_id'        => 'loginform',
      'id_username'    => 'user_login',
      'id_password'    => 'user_pass',
      'id_remember'    => 'rememberme',
      'id_submit'      => 'wp-submit',
      'label_username' => __( 'Username' ),
      'label_password' => __( 'Password' ),
      'label_remember' => __( 'Remember Me' ),
      'label_log_in'   => __( 'Log In' ),
      'value_username' => '',
      'value_remember' => false
    );

		wp_login_form($args);
}

if (is_page("a-to-z-of-terms") ){
    	$post_type = "jargon";
    	include(locate_template('templates/partial-atoz.php'));
}

// if (is_page("about-us") ){
// 	 $menuParameters = array(
// 		'menu' => 'Partners', 'before' => $item->ID, 'after'=>'', 'echo' => false, 'menu_class' => 'partners',
// 		);
//     echo (wp_nav_menu( $menuParameters ) );
// }
 
if (is_page("staff") ){ // Adds Staff News to page.
      include(locate_template('templates/partial-postgrid.php'));
 } elseif (is_page("people")){
     include(locate_template('templates/partial-people.php'));
 }elseif (is_page("hr")){
     include(locate_template('templates/partial-docs.php'));
 }
  

if (is_page("going-for-a-bloodtest") ){ 
   	//include(locate_template('templates/partial-tabs.php'));
   	get_template_part('templates/partial', 'tabs');
}



?>