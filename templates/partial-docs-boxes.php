<?php
// Display docs in boxes

$custom_tax = "doc_category";
$custom_terms = get_terms($custom_tax);
echo '<div class="uk-grid uk-grid-match uk-grid-width-medium-1-2 uk-grid-width-large-1-4 uk-grid-small" data-uk-grid-margin data-uk-grid-match="{target:\'.uk-panel\'}">';


foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'document',
        'tax_query' => array(
            array(
                'taxonomy' => $custom_tax,
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<div class=""><div class="uk-panel uk-panel-box uk-panel-box-secondary uk-align-center" >'; 

        echo '<div class="uk-panel-title">'.$custom_term->name.'</div><ul> ';
       
         while($loop->have_posts()) : $loop->the_post();
            
            ?>

           
                <?php 
                
                $file = get_field('file');
               
               // if( $file ): 
                  // vars
                  $url = $file['url'];
                  $doctitle = $file['title'];
                  // $type = $file['mime_type'];
                  // $type = (substr(strrchr($type, "/"), 1));

                  //  switch  ($type) { // ADD FILE TYPES IF NEEDED
                  //       case "pdf": $doctype = "-pdf-o";
                  //       break;
                  //       case "vnd.openxmlformats-officedocument.wordprocessingml.document": $doctype = "-word-o";
                  //       break;
                  //       case "vnd.ms-powerpoint": $doctype  = "-powerpoint-o";
                  //       break;
                  //       case "vnd.ms-excel": $doctype  = "-excel-o";
                  //       break;
                  //       case "zip": $doctype = "-zip-o";
                  //  }
                ?>
                  
                
                  <li>
                  <a href="<?php echo $url; ?>" title="download document">
                     <?php the_title(); ?></a> 
                  </li>
                    <!-- <a href="<?php echo $url; ?>" title="download document">
                    <i class="uk-icon-file<?php echo $doctype ?>"></i>
                    Download File
                  </a>   -->

                 
                <?php //endif; ?>
            

        <?php
        
        endwhile;
        echo '</ul></div></div>'; // close panel & col
     }
}

echo' </div>'; // close grid
?>

     