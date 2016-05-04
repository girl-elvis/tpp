<?php
// Display docs in boxes

$custom_tax = "doc_category";
$custom_terms = get_terms($custom_tax, 'parent=0');




 echo '<div class="uk-grid uk-grid-match uk-grid-width-medium-1-2 uk-grid-width-large-1-4 uk-grid-small" data-uk-grid-margin data-uk-grid-match="{target:\'.uk-panel\'}">';


 foreach($custom_terms as $custom_term) {
    echo '<div class=""><div class="uk-panel uk-panel-box uk-panel-box-secondary uk-align-center" >'; 
    $x = esc_url( get_term_link( $custom_term ) ) ;
    //$y =esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $custom_term->name ) );
    echo '<div class="uk-panel-title"> <a href="'. $x .'" >' . $custom_term->name . ' </a></div> ';
    echo '</div></div>'; // close panel & col
      }


 echo ' </div>'; // close grid
 ?>

     