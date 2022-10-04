<?php

/**
 * LOCKING PAGES FROM NON-LOGGEDIN USERS
 * The following did not work! Had to disabled it
 */

function redirect_to_wp_login_page()
{

 if (is_page('list-insert') && !is_user_logged_in()) {

  wp_redirect(wp_login_url(), 301);
  // wp_redirect('http://www.example.dev/your-page/', 301);
  exit;
 }
}

// DISABLED CUZ PAGE PROTECTION IS BEING HANDLED BY WOOCOM MEMBERSHIP
// add_action('template_redirect', 'redirect_to_wp_login_page');

/**
 * REMOVING ADMIN BAR FOR ALL BUT ADMINS
 */

function remove_admin_bar()
{
 if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
 }
 if (current_user_can('editor')) {
  show_admin_bar(true);
 }
}

add_action('after_setup_theme', 'remove_admin_bar');

/**
 * LOGIN REDIRECT SUBSCRIBERS & LISTING MANAGERS
 */

function selflist_login_redirect($redirect_to, $request, $user)
{
 // FOLLOWING WORKS ONLY FOR LOGINS
 // For Signups look at _functions/selflist/wp-admin/signup-redirection.php

 //validating user login and roles
 if (isset($user->roles) && is_array($user->roles)) {
  //is this a gold plan subscriber?
  if (in_array('editor', $user->roles)) {
   // redirect editors to their admin page
   $redirect_to = "/wp-admin";
  } elseif (in_array('subscriber', $user->roles)) {
   // checking for cookie
   $cookie_name = 'origin_page';

   if (isset($_COOKIE[$cookie_name])) {
    // echo "Cookie '" . $cookie_name . "' is set!<br>";
    // echo "Value is: " . $_COOKIE[$cookie_name];
    $redirect_target = $_COOKIE[$cookie_name];

    // REMOVING COOKIE
    unset($_COOKIE[$cookie_name]);
    setcookie($cookie_name, '', time() - 3600, '/'); // empty value and old timestamp

   }

   // ALL SUBSCRIBERS REDIRECTION BY COOKIE
   if ($redirect_target == 'fake-list-page') {
    // IF COMING FROM FAKE LIST PAGE REDIRECTING TO THE REAL LIST PAGE
    $redirect_to = "/list-insert";
   } else {
    // IF COMING FROM ANY OTHER PAGE REDIRECTING TO THE MEMBER PROFILE PAGE
    $redirect_to = "/list-customer-home";
    // $redirect_to = "/category-search-index-members";
   }

  } else {
   //all other members
   $redirect_to = "/wp-admin";
  }
 }
 return $redirect_to;
 // echo $redirect_to;
 // die();
}

// WAS DISABLED CUZ THIS IS BEING HANDLED BY WOOCOM MEMBERSHIP
// But brough back to redirect all subscribers even without a membership
// May not need when goes to production, but recommended.
add_filter('login_redirect', 'selflist_login_redirect', 10, 3);

/**
 * LOG OUT REDIRECTION TO HOME
 */

function selflist_redirect_after_logout()
{
 wp_redirect('/');
 exit();

}

add_action('wp_logout', 'selflist_redirect_after_logout');

/*
 * LOG IN / LOG OUT BUTTON IN THE PRIMARY NAV
 */

// function wti_loginout_menu_link($items, $args)
// {
//     if ($args->theme_location == 'menu-1') {
//         if (is_user_logged_in()) {
//             $items .= '<li class="right"><a href="' . wp_logout_url() . '">' . __("Log Out") . '</a></li>';
//         } else {
//             $items .= '<li class="right"><a href="' . wp_login_url(get_permalink()) . '">' . __("Log In") . '</a></li>';
//         }
//     }
//     return $items;
// }
// DISABLING THIS SINCE THIS IS CONFLICTING WITH THE USER MENU PLUGIN
// add_filter('wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2);