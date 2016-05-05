<footer class="content-info">
  
  	<div class="strapline"><?php bloginfo('title'); ?> is an <span class="hide-text nhs">NHS</span> Pathology provider</div>
  	<div class="container">
  	<div class="cat-grid uk-grid" data-uk-grid-match="{target:'.cat-panel'}">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
    <span class="credits"><?php printf( __( 'Copyright &copy; %s %s. All Rights Reserved', 'sage' ), date( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ); ?>
<br />Website by <a href="http://iwantcat.com/" title="I Want Cat">I Want Cat</a></span>
  </div>
</footer>
