<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);



// Add function so have a conditional on "is_child()"
function is_child( $page_id_or_slug ) { // $page_id_or_slug = The ID of the page we're looking for pages underneath
    global $post; // load details about this page

    if ( !is_numeric( $page_id_or_slug ) ) { // Used this code to change a slug to an ID, but had to change is_int to is_numeric for it to work.
        $page = get_page_by_path( $page_id_or_slug );
        $page_id_or_slug = $page->ID;
    }

    if ( is_page() && ( $post->post_parent == $page_id_or_slug ) )
        return true; // we're at the page or at a sub page
    else
        return false; // we're elsewhere
};


add_filter( 'wpseo_breadcrumb_output', 'custom_wpseo_breadcrumb_output' );
function custom_wpseo_breadcrumb_output( $output ){

  if (is_singular("person")) {
        $from = '/person/';   
        $to     = '/about-us/people/';
        $output = str_replace( $from, $to, $output );
    }

    return $output;

}
?>