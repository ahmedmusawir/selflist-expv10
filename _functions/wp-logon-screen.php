<?php
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
// add_filter(  'ngettext',  'register_text'  );
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
        
        $text = 'Password Reset?';

    }
    return $text;
}
/**
 * CUSTOM LOST YOUR PASSWORD TEXT CHANGE
 */
function custom_login_btn(){
    add_filter('gettext', 'custom_login_btn_text', 10, 2);
}

function custom_login_btn_text($translation, $text){
    if ('Log In' == $text) {
        return 'ENTER';
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
#login h1 a,
.login h1 a {
    background-image: url('/wp-content/uploads/SelfListLogo-login.png');
    height: 60px;
    width: 323px;
    background-size: 323px 60px;
    background-repeat: no-repeat;
    padding-bottom: 30px;
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