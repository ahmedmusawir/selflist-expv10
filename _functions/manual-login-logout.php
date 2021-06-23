<?php 
/**
 * THIS FILTER ADDS LOGIN LOGOUT BUTTON TO MAIN MENU PROGRAMMATICALLY
 */
add_filter( 'wp_nav_menu_items', function( $items, $args ) {

	// Only used on main menu
	if ( 'menu-1' != $args->theme_location ) {
		return $items;
	}

	// Add custom item
	$items .= '<li class="mmy-custom-login-logout-link menu-button menu-item">';

		// Log-out link
		if ( is_user_logged_in() ) {

			$text            = 'Logout-CODE';
			$logout_redirect = home_url( '/' ); // Change logout redirect URl here

			$items .= '<a href="'. wp_logout_url( $logout_redirect ) .'" title="'. esc_attr( $text ) .'" class="wpex-logout"><span class="link-inner">'. strip_tags( $text ) .'</span></a>';

		}

		// Log-in link
		else {

			$text      = 'Login';
			$login_url = wp_login_url(); // Change if you want a custom login url

			$items .= '<a href="'. esc_url( $login_url ) .'" title="'. esc_attr( $text ) .'"><span class="link-inner">'. strip_tags( $text ) .'</span></a>';

		}

	$items .= '</li>';

	// Return nav $items
	return $items;

}, 20, 2 );