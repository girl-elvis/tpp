<header class="banner">
  <div class="container">
  

  

    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><span class="smlogo"></span><?php bloginfo('name'); ?></a>

  <div class="uk-grid uk-grid-small" data-uk-grid-margin > 
    <div class="strapline uk-width-5-6 uk-width-medium-3-4"><?php bloginfo('description'); ?></div>
  

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
  
    <div class="uk-width-medium-1-4 uk-hidden-small"><a class="button cta uk-float-right" href="">Contact us</a></div></div>
    

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

<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs" class="container">You are here: ','</div>');} 


if (is_page("staff") ){ // NEED TO ADD if(royalslider exists)
  echo ("<div class='container'><div class='uk-grid'><div class='cat-half'>");
      //get_template_part('templates/partial', 'magheader'); // MOVE TO partial
  echo do_shortcode ('[new_royalslider id="1"]');

   echo ("</div></div></div>");
}

?>

