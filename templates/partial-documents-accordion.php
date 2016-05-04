<?php
// Display docs in accordian NOT IN USE

$custom_tax = "doc_category";
$custom_terms = get_terms($custom_tax);
echo '<div class="uk-accordion" data-uk-accordion>';

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

        echo '<div class="uk-accordion-title">'.$custom_term->name.'</div> ';
        echo '<div class="uk-accordion-content uk-grid uk-grid-match uk-grid-width-medium-1-2 uk-grid-width-large-1-4 uk-grid-small" data-uk-grid-margin data-uk-grid-match="{target:\'.uk-panel\'}">';
        while($loop->have_posts()) : $loop->the_post();
            echo '<div class=""><div class="uk-panel uk-panel-box uk-panel-box-primary uk-align-center" >'; ?>

           
                <?php 
                
                $file = get_field('file');
               
                if( $file ): 
                  // vars
                  $url = $file['url'];
                  $title = $file['title'];
                  $type = $file['mime_type'];
                  $type = (substr(strrchr($type, "/"), 1));

                   switch  ($type) { // ADD FILE TYPES IF NEEDED
                        case "pdf": $doctype = "-pdf-o";
                        break;
                        case "vnd.openxmlformats-officedocument.wordprocessingml.document": $doctype = "-word-o";
                        break;
                        case "vnd.ms-powerpoint": $doctype  = "-powerpoint-o";
                        break;
                        case "vnd.ms-excel": $doctype  = "-excel-o";
                        break;
                        case "zip": $doctype = "-zip-o";
                   }
                ?>
                  
                <div class="docu-content uk-grid">
                   
                  <a href="<?php echo $url; ?>" title="download document">
                    <h4 class="uk-panel-title"> <?php the_title(); ?></h4></a> 
               
                    <a href="<?php echo $url; ?>" title="download document">
                    <i class="uk-icon-file<?php echo $doctype ?>"></i>
                    Download File
                  </a>  

                  </div>
                <?php endif; ?>
            

        <?php
        echo '</div></div>'; // close panel & col
        endwhile;
        echo "</div>"; // close uk-accordion-content
     }
}

echo' </div>'; // close accordion
?>

     