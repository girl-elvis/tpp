<footer class="content-info">
  <div class="container">
  	<div class="strapline"><?php bloginfo('title'); ?> is <?php bloginfo('description'); ?></div>
  	<div class="cat-grid uk-grid" data-uk-grid-match="{target:'.cat-panel'}">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
    <span class=""><?php printf( __( 'Copyright &copy; %s %s. All Rights Reserved.', 'sage' ), date( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ); ?></span>
Website by <a href="http://iwantcat.com/" title="I Want Cat">I Want Cat</a>
  </div>
</footer>
