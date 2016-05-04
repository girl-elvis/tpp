<?php
// Display People by Position

$custom_tax = "position";
$custom_terms = get_terms($custom_tax);
echo '<div class="uk-accordion" data-uk-accordion>';

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'person',
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
            echo '<div class=""><div class="uk-panel uk-panel-box uk-panel-box-secondary uk-align-center" >'; ?>
            <div class="uk-panel-img">
                <?php 
                if ( has_post_thumbnail() ) {
                    echo '<a href="'.get_permalink().'">' . get_the_post_thumbnail( $loop->ID,'portrait-sq' ) . "</a>";
                    }                     ?>
            </div>
        <?php
        echo '<h3 class="uk-panel-title"><a href="'.get_permalink().'">' . get_the_title(). '</a></h3>';
        echo "<h4>" . get_field('job_title') . "</h4></div></div>";

        endwhile;
        echo "</div>";
     }
}

echo' </div>';
?>   