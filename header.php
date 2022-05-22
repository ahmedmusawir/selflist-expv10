<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cyberize-app-dev
 */
$current_user = wp_get_current_user();
$user_firstname = $current_user->user_firstname;
$user_lastname = $current_user->user_lastname;
$user_id = $current_user->ID;
$user_email = $current_user->user_email;

?>
<!doctype html>
<html <?php language_attributes();?>>

<head>

    <!-- Google Tag Manager provided by Laura-->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5CNX4WX');
    </script>
    <!-- End Google Tag Manager -->

    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head();?>
</head>

<body <?php body_class();?>>

    <!-- Google Tag Manager (noscript)  provided by Laura -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CNX4WX" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php wp_body_open();?>
    <div class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e('Skip to content', 'cyberize-app-dev');?></a>

        <header id="" class="site-header">
            <!-- Moose_Framework_2 NAVIGATION GOES HERE -->

            <div class="main-navigation">
                <div class="main-navbar container-fluid">

                    <?php
          wp_nav_menu(array(
              'theme_location' => 'menu-1', // Defined when registering the menu
              'menu_id' => 'primary-menu',
              'container' => 'div',
              'container_class' => 'main-nav',
              // 'menu_class'     => 'mx-auto', //CENTER ALIGN
              'menu_class' => 'ml-auto', //RIGHT ALIGN
              // 'menu_class'     => 'mr-auto', //LEFT ALIGN
          ));
          ?>
                    <style>
                    a#logout-btn,
                    a#support-btn {
                        width: 70px;
                    }
                    </style>
                    <section>
                        <?php // if (is_user_logged_in()) : ?>
                        <a id="logout-btn" class="float-left badge badge-primary"
                            href="<?php echo wp_logout_url(get_permalink()); ?>" style="margin-top: -31px;">
                            Exit
                        </a>
                        <a id="support-btn" class="float-left badge badge-success"
                            href="/selflist-support/?FIRST_NAME=<?php echo $user_firstname; ?>&LAST_NAME=<?php echo $user_lastname; ?>&MEMBER_EMAIL=<?php echo $user_email; ?>&MEMBER_ID=<?php echo $user_id; ?>"
                            style="margin-top: -31px; margin-left: 75px">
                            Support
                        </a>
                        <?php // endif;?>
                    </section>
                </div>
            </div>


            <!-- Moose_Framework_2 NAVIGATION ENDS HERE -->

        </header><!-- #masthead -->

        <!-- SELFLIST LOGO HEADER -->
        <header id="header-list-preview" class="site-header container mt-5 mb-2 text-center">

            <figure class="logo-container">

                <!-- KEEPING THE FOLLOWING IN CASE HOME LINK IS WANTED BY CLIENT -->
                <a href="/list-customer-home/" rel="home">
                    <!-- <a href="<?php //echo esc_url(home_url('/')); ?>" rel="home"> -->
                    <!-- FOLLOWING IS VISIBLE ON XS ONLY -->
                    <img class="mx-auto w-50 mt-4 d-block d-lg-none" src="/wp-content/uploads/2020/07/SelfListLogo.png"
                        alt="">
                    <!-- FOLLOWING IS HIDDEN ON XS ONLY -->
                    <img class="mx-auto w-25 mt-4 d-none d-lg-block" src="/wp-content/uploads/2020/07/SelfListLogo.png"
                        alt="">
                </a>

            </figure>

        </header><!-- #masthead -->
        <hr class="bg-danger">