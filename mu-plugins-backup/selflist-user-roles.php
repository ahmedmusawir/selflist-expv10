<?php
/*
Plugin Name: SelfLIST User Roles
Plugin URI: https://cyberizegroup.com/
Description: This creates & manages all the custom user roles and permissions for SelfLIST
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

// CREATING LISTING MANAGER (CUSTOMER) ROLE

function selflist_register_listing_manager_role() {

  add_role( 'listing_manager', 'Listing Manager' );

  $roles = array( 'listing_manager' );

  foreach( $roles as $the_role ) {

		$role = get_role( $the_role );
    $role->add_cap( 'read' );
    $role->add_cap( 'edit_listingss' );
    $role->add_cap( 'publish_listingss' );
    $role->add_cap( 'edit_published_listingss' );
    $role->add_cap( 'delete_published_listingss' );
    
  }


}

add_action( 'after_setup_theme', 'selflist_register_listing_manager_role' );

// CREATING APP MANAGER ROLE

function selflist_register_app_manager_role() {

  $app_manager_caps = get_role('administrator')->capabilities;

  $removed_caps = [
    'activate_plugins' => 1,
    'delete_plugins' => 1,
    'install_plugins' => 1,
    'update_plugins'  => 1,
    'switch_themes' => 1,
    'edit_themes' => 1,
    'edit_plugins' => 1,
    'edit_users' => 1
  ];

  $app_manager_caps = array_diff_key($app_manager_caps, $removed_caps);

  // remove_role( 'app_manager', 'App Manager', $app_manager_caps );
  add_role( 'app_manager', 'App Manager', $app_manager_caps );

  // print_r($app_manager_caps); 

  // die();

}  


add_action( 'after_setup_theme', 'selflist_register_app_manager_role' );