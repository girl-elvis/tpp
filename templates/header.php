<header class="banner">
  <div class="container">
  

  

    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><span class="uk-visible-small"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/sm-logo.png" /></span><span class="uk-visible-medium"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/med-logo.png" /></span><span class="uk-visible-large"><?php bloginfo('name'); ?></span></a>

  <div class="uk-grid uk-grid-small" data-uk-grid-margin > 
    <div class="strapline uk-width-5-6 uk-width-medium-3-4"><span class="uk-visible-large"><?php bloginfo('description'); ?></span></div>
  

      <div class="uk-width-1-6 uk-visible-small"><button class="uk-button uk-float-right" data-uk-offcanvas="{target:'#mobmenu'}">Menu</button></div>

   <!-- Phone menu --> 
      <div class="uk-offcanvas" id="mobmenu">
      <nav class="uk-offcanvas-bar uk-offcanvas-bar-flip">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'items_wrap' => '<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>%3$s</ul>']);
        endif;
        ?>
  
        <?php
        if (has_nav_menu('right_navigation')) :
          wp_nav_menu(['theme_location' => 'right_navigation',  'items_wrap' => '<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>%3$s</ul>']);
        endif;
        ?>
      </nav>
  
    </div>
  <!-- Phone menu -->
  
    <div class="uk-width-medium-1-4 uk-hidden-small"><a class="button cta uk-float-right" href="<?= esc_url(home_url('/')); ?>contact-us">Contact us</a></div></div>
    

    <nav class="nav-primary uk-navbar">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
<!--<div class="uk-width-medium-1-4">-->
      <?php
      if (has_nav_menu('right_navigation')) :
        wp_nav_menu(['theme_location' => 'right_navigation', 'menu_class' => 'uk-navbar-flip nav']);
      endif;
      ?>
      <!--<div class="uk-width-medium-1-4">-->
    </nav>

  </div>
</header>
<div class="container">
<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">You are here: ','</div>');} 

echo '</div>';

// ABOVE MAIN 

if (is_page("staff") ){ // NEED TO ADD if(royalslider exists)
  echo ("<div class='container staffnav pagenav'><div class='uk-grid uk-grid-match uk-grid-width-medium-1-2 uk-grid-width-large-1-4 uk-grid-small'  data-uk-grid-margin  data-uk-grid-match=\"{target:'.uk-panel'}\"><div class='uk-panel cat-half '>");
      //get_template_part('templates/partial', 'magheader'); // MOVE TO partial

  echo do_shortcode ('[new_royalslider id="1"]');

   echo ("</div>"); // close .cat-half
   
  $menu = 'Submenu: Staff';
  $menuParameters = array(  
    'before' => '<div class="uk-panel uk-panel-box uk-panel-box-secondary  uk-grid uk-grid-small" ><div class=" uk-width-1-4"><i class="uk-icon-cog"></i></div><h3 class="uk-width-3-4">', 
    'after'=>'</h3></div>', 
    'echo' => false, 
    'container' => "",
    'items_wrap' => '%3$s', 
  );  
  $menuParameters['menu'] = $menu;
    if (wp_get_nav_menu_object($menu)) {
     echo (wp_nav_menu( $menuParameters ) );

    }



   echo ("</div></div>"); // close grid & container
}

?>

