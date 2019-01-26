<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
  $args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
  ) );
  $posts = get_posts( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts as $post ) {
      $post_options [ $post->ID ] = $post->post_title;
    }
  }
  return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */

   $post_meta = new_cmb2_box( array(
		'id'            => $prefix . 'post_metabox',
		'title'         => esc_html__( 'Post Metadata', 'cmb2' ),
		'object_types'  => array( 'post' ),
	) );

	$post_meta->add_field( array(
		'name'       => esc_html__( 'Video thumbnail (webm)', 'cmb2' ),
		'desc'       => esc_html__( 'File for video thumbnail in .webm format', 'cmb2' ),
		'id'         => $prefix . 'webm',
		'type'       => 'file',
	) );

	$post_meta->add_field( array(
		'name'       => esc_html__( 'Video thumbnail (mp4/mov)', 'cmb2' ),
		'desc'       => esc_html__( 'File for video thumbnail in .mp4 format', 'cmb2' ),
		'id'         => $prefix . 'mp4',
		'type'       => 'file',
	) );

	$post_meta->add_field( array(
		'name'             => esc_html__( 'Ratio', 'cmb2' ),
		'id'               => $prefix . 'ratio',
		'type'             => 'radio_inline',
		'show_option_none' => 'No Selection',
		'options'          => array(
			'1-1' => esc_html__( '1:1', 'cmb2' ),
			'4-3' => esc_html__( '4:3', 'cmb2' ),
			'16-9' => esc_html__( '16:9', 'cmb2' ),
		),
	) );

	$post_meta->add_field( array(
		'name'       => esc_html__( 'Vimeo URL', 'cmb2' ),
		'desc'       => esc_html__( 'The direct url to the Vimeo.', 'cmb2' ),
		'id'         => $prefix . 'vimeo',
		'type'       => 'text_url',
	) );

  $post_credits = $post_meta->add_field( array(
  	'id'          => $prefix . 'credits',
  	'type'        => 'group',
  	'description' => __( 'Video credits', 'cmb2' ),
  	'options'     => array(
  		'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
  		'add_button'    => __( 'Add Another Entry', 'cmb2' ),
  		'remove_button' => __( 'Remove Entry', 'cmb2' ),
  		'sortable'      => true,
  	),
  ) );

  $post_meta->add_group_field( $post_credits, array(
  	'name' => 'Role',
  	'id'   => 'role',
  	'type' => 'text',
  ) );

  $post_meta->add_group_field( $post_credits, array(
  	'name' => 'Credit',
  	'id'   => 'credit',
  	'type' => 'text',
  ) );

  // Private pages meta

  $private_page_meta = new_cmb2_box( array(
		'id'            => $prefix . 'private_page_metabox',
		'title'         => esc_html__( 'Privage Page Metadata', 'cmb2' ),
		'object_types'  => array( 'private' ),
	) );

  $private_page_embeds = $private_page_meta->add_field( array(
  	'id'          => $prefix . 'private_embeds',
  	'type'        => 'group',
  	'description' => __( 'Video embeds', 'cmb2' ),
  	'options'     => array(
  		'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
  		'add_button'    => __( 'Add Another Entry', 'cmb2' ),
  		'remove_button' => __( 'Remove Entry', 'cmb2' ),
  		'sortable'      => true,
  	),
  ) );

  $private_page_meta->add_group_field( $private_page_embeds, array(
  	'name' => 'Vimeo URL',
  	'id'   => 'vimeo',
  	'type' => 'text_url',
  ) );

  $private_page_meta->add_group_field( $private_page_embeds, array(
  	'name' => 'Title',
  	'id'   => 'title',
  	'type' => 'text',
  ) );

  // About page meta

  function igv_is_about_page( $cmb ) {
    $about = get_page_by_path('about');

    // the ID is an int but the object_id from cmb is a string!
  	if ( $about->ID !== intval($cmb->object_id) ) {
  		return false;
  	}

  	return true;
  }

  $about_meta = new_cmb2_box( array(
		'id'           => $prefix . 'about_metabox',
		'title'        => esc_html__( 'About Page Metabox', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'show_on_cb'   => 'igv_is_about_page',
	) );

	$about_meta->add_field( array(
		'name'       => esc_html__( 'Pull quote', 'cmb2' ),
		'desc'       => esc_html__( 'The big quote', 'cmb2' ),
		'id'         => $prefix . 'pullquote',
		'type'       => 'textarea',
	) );

	$about_meta->add_field( array(
		'name'       => esc_html__( 'Selected clients & publications', 'cmb2' ),
		'desc'       => esc_html__( '...', 'cmb2' ),
		'id'         => $prefix . 'selected',
		'type'       => 'textarea',
	) );

	$about_meta->add_field( array(
		'name'       => esc_html__( 'Email', 'cmb2' ),
		'desc'       => esc_html__( '...', 'cmb2' ),
		'id'         => $prefix . 'email',
		'type'       => 'text_email',
	) );

	$about_meta->add_field( array(
		'name'       => esc_html__( 'Telephone', 'cmb2' ),
		'desc'       => esc_html__( 'with country code e.g. +44', 'cmb2' ),
		'id'         => $prefix . 'tel',
		'type'       => 'text',
	) );

  $about_links = $about_meta->add_field( array(
  	'id'          => $prefix . 'links',
  	'type'        => 'group',
  	'description' => __( 'Links to social media etc', 'cmb2' ),
  	'options'     => array(
  		'group_title'   => __( 'Link {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
  		'add_button'    => __( 'Add Another Link', 'cmb2' ),
  		'remove_button' => __( 'Remove Link', 'cmb2' ),
  		'sortable'      => true,
  	),
  ) );

  $about_meta->add_group_field( $about_links, array(
  	'name' => 'Name',
  	'id'   => 'name',
  	'type' => 'text',
  ) );

  $about_meta->add_group_field( $about_links, array(
  	'name' => 'Link',
  	'id'   => 'link',
  	'type' => 'text_url',
  ) );

  // Showreel page meta

  function igv_is_showreel_page( $cmb ) {
    $showreel = get_page_by_path('showreel');

    // the ID is an int but the object_id from cmb is a string!
  	if ( $showreel->ID !== intval($cmb->object_id) ) {
  		return false;
  	}

  	return true;
  }

  $showreel_meta = new_cmb2_box( array(
		'id'           => $prefix . 'showreel_metabox',
		'title'        => esc_html__( 'Showreel Page Metabox', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'show_on_cb'   => 'igv_is_showreel_page',
	) );

  $showreels = $showreel_meta->add_field( array(
  	'id'          => $prefix . 'showreels',
  	'type'        => 'group',
  	'description' => __( 'Showreels', 'cmb2' ),
  	'options'     => array(
  		'group_title'   => __( 'Showreel {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
  		'add_button'    => __( 'Add Another Showreel', 'cmb2' ),
  		'remove_button' => __( 'Remove Showreel', 'cmb2' ),
  		'sortable'      => true,
  	),
  ) );

  $showreel_meta->add_group_field( $showreels, array(
  	'name' => 'Title',
  	'id'   => 'title',
  	'type' => 'text',
  ) );

  $showreel_meta->add_group_field( $showreels, array(
		'name'       => esc_html__( 'Vimeo URL', 'cmb2' ),
		'desc'       => esc_html__( 'The direct url to the Vimeo.', 'cmb2' ),
		'id'         => 'vimeo',
		'type'       => 'text_url',
  ) );

}
?>
