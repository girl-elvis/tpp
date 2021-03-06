<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php if(get_field("job_title"))
              echo ("<h2>" . get_field("job_title") . "</h2>");
      
            if ( has_post_thumbnail() ) {
              echo "<div class='featuredimg uk-align-medium-left uk-margin-large-right'>";
              the_post_thumbnail( 'cat-double' );
              echo "</div>";
            }                     ?>
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
