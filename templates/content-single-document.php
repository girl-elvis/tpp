<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">

<?php 

$file = get_field('file');


if( $file ): 
  // vars
  $url = $file['url'];
  $title = $file['title'];
  $type = $file['mime_type'];
?>
  
<div >
  <a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
    <i></i>
    <span><?php echo $title; ?></span>
  </a>  
  </div>



<?php endif; ?>


      <?php the_content(); ?>

    </div>
    <footer>
      <?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  
  </article>
<?php endwhile; ?>
