<?php get_template_part('templates/page', 'header'); 

query_posts($query_string . '&orderby=title&order=ASC&showposts=-1');
$tax = get_query_var( 'taxonomy' ); // Get the taxonomy name
$term = get_term_by( 'slug', get_query_var( 'term' ), $tax ); // get the term by slug
$term_id = $term->term_id; // get the term ID
$termchildren = get_term_children( $term_id, $tax  );

echo "<ul>";

	 while (have_posts()) : the_post();



		$file = get_field('file');
		
		if( $file ): 
	      // vars
		      $url = $file['url'];
		      $title = $file['title'];

			?>
				<li>
					<a href="<?php echo $url; ?>" title="download document" target="_blank"><?php the_title(); ?></a>
				</li>
			<?php endif; 
	

	endwhile; 

	echo '</ul>';

	

if (sizeof($termchildren)>0) { // If this category has sub categories
	
	//Alphabetise the list of terms
	$children = array();
	foreach ($termchildren as $child) {
	  $term = get_term_by( 'id', $child, $tax);
	  $children[$term->name] = $term;
	}
	ksort($children);

	// print out the child terms
	echo '<ul>';
	foreach ( $children as $child ) {
		$term = get_term_by( 'id', $child->term_id, $tax  );
		echo '<li><h3>' . $term->name . '</h3></li>';

		$args = array(
		 'posts_per_page' => -1,
		 'orderby' => 'title',
		 'order' => ASC,
		 'post_type' => 'document',
		 $tax => $term->name,
		 'post_status' => 'publish'
		);

		$myposts = get_posts( $args ); // get the docs in child terms
		echo '<ul>';
		foreach ( $myposts as $post ) : setup_postdata( $post ); 

			$file = get_field('file');
			if( $file ): 
		      // vars
		      $url = $file['url'];
		      $title = $file['title'];

			?>
			<li>
				<a href="<?php echo $url; ?>" title="download document" target="_blank"><?php the_title(); ?></a>
			</li>
			<?php endif; ?>

		<?php endforeach; 
		echo '</ul>';
		wp_reset_postdata();

		
	}
	
} 



?>