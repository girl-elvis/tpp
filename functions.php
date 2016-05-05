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
<<<<<<< .merge_file_tCZo2D
  'lib/customizer.php' // Theme customizer
=======
  'lib/customizer.php',  // Theme customizer
  'lib/uikit-menu-walker.php',   // Walker class for uikit
  //'lib/uikit-menu-walker-offcanvas.php'  // Walker class for uikit
>>>>>>> .merge_file_BMhGca
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
<<<<<<< .merge_file_tCZo2D
    }

=======
    } else if(is_tax("doc_category")) {
        $from = 'document/" rel="v:url" property="v:title">Documents';   
        $to     = 'hr" rel="v:url" property="v:title">HR</a>';
        $output = str_replace( $from, $to, $output );
      }
>>>>>>> .merge_file_BMhGca
    return $output;

}


<<<<<<< .merge_file_tCZo2D

  




=======
// Give editors access to the menus but hide 'themes'
/**
 * @var $roleObject WP_Role
 */
$roleObject = get_role( 'editor' );
if (!$roleObject->has_cap( 'edit_theme_options' ) ) {
    $roleObject->add_cap( 'edit_theme_options' );
}

function hide_menu() {
  if ( !current_user_can ('activate_plugins') ) {
  remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
  }
}

add_action('admin_head', 'hide_menu');




// ADD DOCS TO ARCHIVE PAGES
add_action( 'pre_get_posts', 'add_docs_to_archive' );

function add_docs_to_archive( $query ) {
  if ( $query->is_tax('doc_category')  )
    $query->set( 'post_type', array( 'post', 'document' ) );
  return $query;
}


// Filter Category/Taxonomy title
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    } else if( is_tax()) {
      $title = single_term_title( '', false ) ;
    }
    return $title;

});


>>>>>>> .merge_file_BMhGca
?>