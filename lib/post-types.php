<?php
// Menu icons for Custom Post Types
// https://developer.wordpress.org/resource/dashicons/
function add_menu_icons_styles(){
?>

<style>
#menu-posts-private .dashicons-admin-post:before {
    content: '\f319';
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


//Register Custom Post Types
add_action( 'init', 'register_cpt_private' );

function register_cpt_private() {

  $labels = array(
    'name' => _x( 'Private pages', 'private' ),
    'singular_name' => _x( 'Private Page', 'private' ),
    'add_new' => _x( 'Add New', 'private' ),
    'add_new_item' => _x( 'Add New Private Page', 'private' ),
    'edit_item' => _x( 'Edit Private Page', 'private' ),
    'new_item' => _x( 'New Private Page', 'private' ),
    'view_item' => _x( 'View Private Pages', 'private' ),
    'search_items' => _x( 'Search Private Pages', 'private' ),
    'not_found' => _x( 'No Private Pages found', 'private' ),
    'not_found_in_trash' => _x( 'No Private Pages found in Trash', 'private' ),
    'parent_item_colon' => _x( 'Parent Private Page:', 'private' ),
    'menu_name' => _x( 'Private Pages', 'private' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => false,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'private', $args );
}
