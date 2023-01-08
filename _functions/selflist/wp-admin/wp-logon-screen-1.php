<?php

/**
 * MAKE LOGIN IN (EMPTY USER & PASS) ERROR MESSAGE DISAPPEAR
 * Tried to following it works but you have figure out each message and their 
 * associated number ($pos) ... too much work. I'll choose SCSS. And SCSS didn't work
 * So I did it with CSS via the FUNCTION FOR LOGO CHANGE ... below...
 */
// add_filter('login_errors','login_error_message');

// function login_error_message($error){
//     echo $error;
//     //check if that's the error you are looking for
//     $pos = strpos($error, 'The username field is empty');
//     echo $pos;
//     if (is_int($pos) == 25) {
//         //its the right error so you can overwrite it
//         $error = "Wrong information";
//     }
//     return $error;
// }

/**
 * CUSTOM REGISTER URL SETUP
 */
function custom_register_url($register_url)
{
    $register_url = get_permalink($register_page_id = 778);
    return $register_url;
}
add_filter('register_url', 'custom_register_url');

/**
 * CUSTOM REGISTER TEXT CHANGE
 */
add_filter('gettext', 'register_text');
function register_text($translated)
{
    $translated = str_ireplace('Register', 'JOIN', $translated);
    return $translated;
}
/**
 * CUSTOM LOST YOUR PASSWORD TEXT CHANGE
 */
add_filter('gettext', 'lostPass_text');
function lostPass_text($text)
{
    if ($text == 'Lost your password?') {
        
        $text = 'RESET';

    }
    return $text;
}

/**
 * CUSTOM LOST YOUR PASSWORD & REMEMBER ME TEXT CHANGE
 */
function custom_login_btn(){
    add_filter('gettext', 'custom_login_btn_text', 10, 2);
}

function custom_login_btn_text($translation, $text){
    if ('Log In' == $text) {
        return 'ENTER';
    }
    if ('Remember Me' == $text) {
        return '';
    }
    return $translation;
}

add_action( 'login_form', 'custom_login_btn' );

/**
 * LOST PASSWORD PAGE
 */
add_filter('gettext', 'change_lost_password' );
function change_lost_password($translated) {
   if( is_lost_password_page() && 'Username or email' === $translated) {
      return 'Email';
   } else {
      return $translated; 
   }
}
// RESET PASSWORD FORM ABOVE TEXT
add_filter('woocommerce_lost_password_message', 'change_lost_password_message');
function change_lost_password_message() {
    return '';
}


/**
 * FUNCTION FOR LOGO CHANGE
 */
function cy_login_logo()
{?>
<style type="text/css">
/* .login *:focus {
    border: 1rem dotted red;
    outline: none !important;
    outline: 0 !important;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-appearance: none;
    outline-color: coral;
    outline-style: dotted;
} */

#login h1 a,
.login h1 a {
    background-image: url('/wp-content/uploads/2020/07/SelfListLogo.png');
    /* background-image: url('/wp-content/uploads/SelfListLogo-login.png'); */

    /* height: 43px; */
    width: 75%;
    /* width: 240px; */
    /* width: 323px; */
    background-size: 75%;
    /* background-size: 240px 43px; */
    /* background-size: 323px 60px; */
    background-repeat: no-repeat;
    padding-bottom: 30px;
}

#login h1:focus-visible {
    outline: none !important;
}

#login a:focus {
    outline: none !important;
    box-shadow: none !important;
    /* WP Bug: they didn't use outline on focus, instead used box-shadow. I will kill that
    asshole who did this when I find him */
}





#login_error {
    display: none;
}
</style>
<?php }

add_action('login_enqueue_scripts', 'cy_login_logo');

/**
 * FUNCTION FOR LOGO URL and TEXT CHANGE
 */

function my_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
    return 'SelfLIST';
}
add_filter('login_headertext', 'my_login_logo_url_title');

/**
 * FUNCTION FOR LOGIN PAGE STYLES
 */

function my_login_stylesheet()
{
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/assets/dist/css/style-login.min.css');
    // wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/assets/admin-styles/style-login.css');
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action('login_enqueue_scripts', 'my_login_stylesheet');