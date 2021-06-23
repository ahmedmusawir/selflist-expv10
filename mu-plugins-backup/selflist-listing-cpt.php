<?php

/*
Plugin Name: SelfLIST Listings CPT
Plugin URI: https://cyberizegroup.com/
Description: This creates the Listings Custom Post Type
Version: 1.0
Author: Cyberize Group
Author URI: https://cyberizegroup.com/
License: GPLv2 or later
Text Domain: cyberizeframework
*/



// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

/**
 *
 * Adding Custom Listing post type
 *
 */
 /**
   * Register a Listing post type, with REST API support
   *
   * Based on example at: http://codex.wordpress.org/Function_Reference/register_post_type
   */
  function Listing_cpt() {

  	$labels = array(
  		'name'               => _x( 'Listings', 'post type general name', 'cyberize-framework' ),
  		'singular_name'      => _x( 'Listing', 'post type singular name', 'cyberize-framework' ),
  		'menu_name'          => _x( 'Listings', 'admin menu', 'cyberize-framework' ),
  		'name_admin_bar'     => _x( 'Listing', 'add new on admin bar', 'cyberize-framework' ),
  		'add_new'            => _x( 'Add New', 'Listing', 'cyberize-framework' ),
  		'add_new_item'       => __( 'Add New Listing', 'cyberize-framework' ),
  		'new_item'           => __( 'New Listing', 'cyberize-framework' ),
  		'edit_item'          => __( 'Edit Listing', 'cyberize-framework' ),
  		'view_item'          => __( 'View Listing', 'cyberize-framework' ),
  		'all_items'          => __( 'All Listings', 'cyberize-framework' ),
  		'search_items'       => __( 'Search Listings', 'cyberize-framework' ),
  		'parent_item_colon'  => __( 'Parent Listings:', 'cyberize-framework' ),
  		'not_found'          => __( 'No Listing found.', 'cyberize-framework' ),
  		'not_found_in_trash' => __( 'No Listing found in Trash.', 'cyberize-framework' )
  	);
  
  	$args = array(
  		'labels'             => $labels,
  		'description'        => __( 'This is a Listing Custom Post Type', 'cyberize-framework' ),
  		'public'             => true,
  		'publicly_queryable' => true,
  		'show_ui'            => true,
  		'show_in_menu'       => true,
  		'query_var'          => true,
  		'rewrite'            => array( 'slug' => 'listing', 'with_front' => true ),
  		'capability_type'    => 'post',
  		'has_archive'        => true,
  		'hierarchical'       => true,
  		'menu_position'      => null,
      'menu_icon'          => 'dashicons-welcome-widgets-menus',
  		'show_in_rest'       => true,
  		'rest_base'          => 'listings',
  		// 'rest_controller_class' => 'WP_REST_Posts_Controller',
      // 'taxonomies'          => array( 'property-type', 'listing-status' ),
  		'supports'           => array( 'title', 'editor', 'author' )
  	);
  
  	register_post_type( 'listing', $args );
}

add_action( 'init', 'Listing_cpt' );


/**
 * THE FOLLOWING ARE TO CREATE CUSTOM TAXONIMIES. CURRENTLY DISABLED FOR LISTINGS
 */

// create two taxonomies, Product Types and writers for the post type "book"
function create_Listing_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Listing Types', 'taxonomy general name', 'cyberize-framework' ),
    'singular_name'     => _x( 'Listing Type', 'taxonomy singular name', 'cyberize-framework' ),
    'search_items'      => __( 'Search Listing Types', 'cyberize-framework' ),
    'all_items'         => __( 'All Listing Types', 'cyberize-framework' ),
    'parent_item'       => __( 'Parent Listing Type', 'cyberize-framework' ),
    'parent_item_colon' => __( 'Parent Listing Type:', 'cyberize-framework' ),
    'edit_item'         => __( 'Edit Listing Type', 'cyberize-framework' ),
    'update_item'       => __( 'Update Listing Type', 'cyberize-framework' ),
    'add_new_item'      => __( 'Add New Listing Type', 'cyberize-framework' ),
    'new_item_name'     => __( 'New Listing Type Name', 'cyberize-framework' ),
    'menu_name'         => __( 'Listing Types', 'cyberize-framework' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'property-type' ),
  );

  register_taxonomy( 'property-type', array( 'properties' ), $args );


    // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Listing Status', 'taxonomy general name', 'cyberize-framework' ),
    'singular_name'     => _x( 'Listing Status', 'taxonomy singular name', 'cyberize-framework' ),
    'search_items'      => __( 'Search Listing Status', 'cyberize-framework' ),
    'all_items'         => __( 'All Listing Status', 'cyberize-framework' ),
    'parent_item'       => __( 'Parent Listing Status', 'cyberize-framework' ),
    'parent_item_colon' => __( 'Parent Listing Status:', 'cyberize-framework' ),
    'edit_item'         => __( 'Edit Listing Status', 'cyberize-framework' ),
    'update_item'       => __( 'Update Listing Status', 'cyberize-framework' ),
    'add_new_item'      => __( 'Add New Listing Status', 'cyberize-framework' ),
    'new_item_name'     => __( 'New Listing Status Name', 'cyberize-framework' ),
    'menu_name'         => __( 'Listing Status', 'cyberize-framework' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'listing-status' ),
  );

  register_taxonomy( 'listing-status', array( 'properties' ), $args );
 
}

// hook into the init action and call create_book_taxonomies when it fires
// TAXONOMIES ARE DISABLED
// add_action( 'init', 'create_Listing_taxonomies', 0 );