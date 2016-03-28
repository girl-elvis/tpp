<header class="banner">
  <div class="container">

    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <div class="strapline uk-push-width-3-4"><?php bloginfo('description'); ?></div>
    <div class="cat-grid"><div class="uk-pull-width-1-4"><a class="uk-button button secondary uk-float-right" href="">Contact us</a></div></div>
    

<!-- Phone menu -->
    <button class="uk-button uk-float-right uk-visible-small" data-uk-offcanvas="{target:'#mobmenu'}">Menu</button>
    <div class="uk-offcanvas" id="mobmenu">
    <nav class="uk-offcanvas-bar uk-offcanvas-bar-flip">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'items_wrap' => '<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>%3$s</ul>']);
      endif;
      ?>

      <?php
      if (has_nav_menu('right_navigation')) :
        wp_nav_menu(['theme_location' => 'right_navigation', 'menu_class' => 'uk-offcanvas-bar']);
      endif;
      ?>
    </nav>
  </div>
<!-- Phone menu -->


    <nav class="nav-primary uk-navbar">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>

      <?php
      if (has_nav_menu('right_navigation')) :
        wp_nav_menu(['theme_location' => 'right_navigation', 'menu_class' => 'uk-navbar-flip nav']);
      endif;
      ?>
    </nav>

  </div>
</header>

<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<div id="breadcrumbs" class="container">','</div>');} ?>