<?php
/**
 * The template for displaying all pages
 * Template Name: List Preview FAKE
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

// get_header();
get_header('loggedout');

// CURRENT DATE
$CURRENT_DATE = date('m.d.Y', time());
$date = date('m/d/Y h:i:s a', time());

/*
  * HANDLING URL PARAMETER 
  */
//  echo '<pre>';
//  print_r($wp->query_vars);
//  echo '</pre>';


 // Test if the query exists at the URL
 if (get_query_var('GRANDE')) {

  // echo get_query_var('GRANDE');
  $GRANDE = get_query_var('GRANDE');

 }
 if (get_query_var('PRIMO')) {

  $PRIMO = get_query_var('PRIMO');

 }
 if (get_query_var('SECONDO')) {

  $SECONDO = get_query_var('SECONDO');

 }
 if (get_query_var('TERZO')) {

  $TERZO = get_query_var('TERZO');

 }
 if (get_query_var('STATE')) {

  $STATE = get_query_var('STATE');

 }
 if (get_query_var('CITY')) {

  $CITY = get_query_var('CITY');

 }
 if (get_query_var('CONTENT')) {

  $CONTENT = get_query_var('CONTENT');
//   echo get_query_var('CONTENT');

 }
 if (get_query_var('PHONE')) {

  $PHONE = get_query_var('PHONE');
//   echo get_query_var('PHONE');

 }
 if (get_query_var('WEBSITE')) {

  $WEBSITE = get_query_var('WEBSITE');
//   echo get_query_var('WEBSITE');


 }
 if (get_query_var('EMAIL')) {

  $EMAIL = get_query_var('EMAIL');
//   echo get_query_var('EMAIL');
  
}
 if (get_query_var('FB')) {

  $FB = get_query_var('FB');
//   echo get_query_var('FB');


 }
 if (get_query_var('YELP')) {

  $YELP = get_query_var('YELP');

 }
 if (get_query_var('INSTA')) {

  $INSTA = get_query_var('INSTA');

 }
 if (get_query_var('LINKEDIN')) {

  $LINKEDIN = get_query_var('LINKEDIN');

 }
 if (get_query_var('TWITTER')) {

  $TWITTER = get_query_var('TWITTER');

 }
 if (get_query_var('YOUTUBE')) {

  $YOUTUBE = get_query_var('YOUTUBE');

 }

?>

<h3 class="text-center pt-3">PREVIEW<h3>
        <!-- <h6 class="text-center">(Links are functional on active listing)</h6> -->
        <!-- <h6 class="text-center">(List Status: Pending)</h6> -->

        <style>
        input[type=checkbox] {
            /* Double-sized Checkboxes */
            -ms-transform: scale(2.2);
            /* IE */
            -moz-transform: scale(2.2);
            /* FF */
            -webkit-transform: scale(2.2);
            /* Safari and Chrome */
            -o-transform: scale(2.2);
            /* Opera */
            transform: scale(2.2);
            /* padding: 10px; */
            margin-top: .5rem;
        }

        input[type="checkbox"]:checked:before {
            font-family: "FontAwesome";
            font-size: .9rem;
            color: black;
            content: "\f14a";
            background: transparent;
            position: absolute;
            border-radius: 2px;
            width: 12px;
            height: 12px;
            left: 45%;
            top: 5px;
            /* top: 19.35%; */
            transform: translate(-50%, -50%);
        }
        </style>


        <section class="category">
            <main id="list-preview" class="site-main container category">
                <article id="" class="category animate__animated  animate__zoomIn">
                    <header class="entry-header">

                        <section class="post-item-cat-list">

                            <span class="bg-danger text-light font-weight-bold float-right py-2 px-4"
                                style="font-size: .8rem;">
                                <?php 
                                printf('%s<br>', date("m", strtotime($date)));
                                printf('%s<br>', date("d", strtotime($date)));
                                printf('%s<br>', date("y", strtotime($date)));
                                echo '</span>';
                                ?>



                                <!-- CATEGORY LIST -->
                                <p class="text-dark text-uppercase" style="font-size: 1rem; margin-bottom: 0;">
                                    <small class="font-weight-bold text-danger">
                                        <span class="text-danger"><?php echo $GRANDE ?></span>&nbsp;
                                        <?php if ($PRIMO != undefined): ?>

                                        <i class="fas fa-arrow-right text-dark"></i>&nbsp;
                                        <span class="text-danger"><?php echo $PRIMO ?></span>&nbsp;

                                        <?php endif;?>
                                        <?php if ($SECONDO != undefined): ?>

                                        <i class="fas fa-arrow-right text-dark"></i>&nbsp;
                                        <span class="text-danger"><?php echo $SECONDO ?></span>&nbsp;

                                        <?php endif;?>

                                        <?php if ($TERZO != undefined): ?>

                                        <i class="fas fa-arrow-right text-dark"></i>&nbsp;
                                        <span class="text-danger"><?php echo $TERZO ?></span>

                                        <?php endif;?>


                                    </small>
                                </p>
                                <!-- END CATEGORY LIST -->

                                <!-- LOCATION -->
                                <p class="text-dark text-uppercase font-weight-bold"
                                    style="font-size: .75rem; margin-bottom: 0;">
                                    <!-- <small class="font-weight-bold"> -->
                                    <span class="text-info"><?php echo $STATE ?>,</span>&nbsp; <span
                                        class="text-info"><?php echo $CITY ?></span>
                                    <!-- </small> -->
                                </p>
                                <!-- END LOCATION -->

                                <!-- LIST ID -->
                                <p class="font-weight-bold" style="margin-bottom: -.25rem; font-size: .8rem">#0000</p>
                                <!-- END LIST ID -->

                                <div class="entry-meta">
                                    <span class="posted-on"> <time
                                            class="entry-date published updated"><?php echo $CURRENT_DATE; ?></time></span>
                                </div><!-- .entry-meta -->
                    </header><!-- .entry-header -->


                    <div id="post-content" class="entry-content">
                        <p>
                            <?php echo $CONTENT; ?>
                        </p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">

                        <section class="flex-icon-five">
                            <?php if ($FB): ?>
                            <div class="flex-icon-item">
                                <a href="<?php echo $FB; ?>" target="_blank">
                                    <img title="Your Facebook Page" src="/wp-content/uploads/fb-icon.png"
                                        alt="Facebook Link">
                                </a>
                            </div>
                            <?php endif;?>

                            <?php if ($TWITTER): ?>
                            <div class="flex-icon-item">
                                <a href="<?php echo $TWITTER; ?>" target="_blank">
                                    <img title="Your Twitter Page" src="/wp-content/uploads/Twitter-Icon.png"
                                        alt="Twitter Link">
                                </a>
                            </div>
                            <?php endif;?>

                            <?php if ($YELP): ?>
                            <div class="flex-icon-item">
                                <a href="<?php echo $YELP; ?>" target="_blank">
                                    <img title="Your Yelp Page" src="/wp-content/uploads/Yelp-icon.png" alt="Yelp Link">
                                </a>
                            </div>
                            <?php endif;?>

                            <?php if ($INSTA): ?>
                            <div class="flex-icon-item">
                                <a href="<?php echo $INSTA ?>" target="_blank">
                                    <img title="Your Instagram Page" src="/wp-content/uploads/Instagram-icon.png"
                                        alt="Instagram Link">
                                </a>
                            </div>
                            <?php endif;?>

                            <?php if ($LINKEDIN): ?>
                            <div class="flex-icon-item">
                                <a href="<?php echo $LINKEDIN ?>" target="_blank">
                                    <img title="Your Linkedin Page" src="/wp-content/uploads/Linkedin-Icon.png"
                                        alt="Linkedin Link">
                                </a>
                            </div>
                            <?php endif;?>

                            <?php if ($YOUTUBE): ?>
                            <div class="flex-icon-item">
                                <a href="<?php echo $YOUTUBE ?>" target="_blank">
                                    <img title="Your Youtube Page" src="/wp-content/uploads/Youtube-Icon.png"
                                        alt="youtube Link">
                                </a>
                            </div>
                            <?php endif;?>

                        </section>

                        <section class="flex-icon-five">

                            <div class="flex-icon-item">
                                <a href="tel:<?php echo $PHONE; ?>">
                                    <img title="Phone: <?php echo $PHONE; ?>" src="/wp-content/uploads/Cell-icon.png"
                                        alt="Phone Number">
                                </a>
                            </div>
                            <div class="flex-icon-item">
                                <!-- <a href="mailto:webmaster@example.com"> -->
                                <a href="mailto:<?php echo $EMAIL; ?>" target="_blank">
                                    <img title="Email: <?php echo $EMAIL; ?>" src="/wp-content/uploads/Email-icon.png"
                                        alt="Email Address">
                                </a>
                            </div>
                            <div class="flex-icon-item">
                                <a href="<?php echo $WEBSITE; ?>" target="_blank">
                                    <img title="Site: <?php echo $WEBSITE; ?>"
                                        src="/wp-content/uploads/Website-icon.png" alt="Website Link">
                                </a>
                            </div>

                            <!-- <div class="flex-icon-item">
                                <a href="/list-chat/" target="_blank">
                                    <img title="Chat Page" src="/wp-content/uploads/Instant-Messaging-icon.png"
                                        alt="Chat Link">
                                </a>
                            </div> -->
                            <!-- <div class="flex-icon-item mr-3">
                        <div class="form-group" id="flag-btn">
                            <div class="input-group mb-2 mt-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fab fa-font-awesome-flag text-danger"></i>
                                    </div>
                                    <button class="btn btn-primary btn-sm flag-form-btn"
                                        data-key="flag-<?php echo get_the_ID(); ?>"
                                        data-list-id="<?php echo $post_id; ?>"
                                        data-flag-email="<?php echo get_field('your_email'); ?>">
                                        Flag
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                            <div class="flex-icon-item">
                                <style>
                                .btn-outline-primary.flag-form-btn {
                                    padding-top: .25rem !important;
                                    padding-bottom: .10rem !important;
                                    padding-left: 1rem;
                                    padding-right: 1rem;
                                }

                                .btn-outline-primary.flag-form-btn:hover {
                                    background: white;
                                }

                                .btn-outline-primary.flag-form-btn.disabled {
                                    background: #e3e3e3;
                                    /* border: 1rem dotted red; */
                                }

                                .list-hmu-checkbox {
                                    margin-left: 1.8rem;
                                }

                                i.fab {
                                    font-size: 1rem;
                                }
                                </style>

                                <button id="flag-btn" class="btn btn-outline-primary btn-sm flag-form-btn"
                                    data-key="flag-<?php echo get_the_ID(); ?>" data-list-id="<?php echo $post->ID; ?>"
                                    data-flag-email="<?php echo get_field('your_email'); ?>">
                                    <i class="fab fa-font-awesome-flag text-primary"></i>
                                </button>

                            </div>
                            <div class="flex-icon-item ml-3">
                                <input type="checkbox" name="list-hmu-checkbox" id="list-hmu-checkbox"
                                    class="list-hmu-checkbox ml-2" autocomplete="off"
                                    data-hmu="<?php echo get_field('your_email'); ?>" style="background: black;">
                                <span class="checkmark"></span>
                                <!-- <small class="" style="margin-left: 2.5rem;">&nbsp;&nbsp;RA</small> -->
                            </div>

                        </section>

                    </footer><!-- .entry-footer -->


                </article><!-- #post-ENDS -->
            </main>
        </section>
        <style>
        .btn.btn-outline-danger {
            width: 150px;
        }
        </style>
        <div class="navigation-box container">
            <a href="/list-insert-non-members/" class="btn btn-outline-danger float-left">BACK</a>
            <a href="/list-signup/" class="btn btn-outline-danger float-right">LIST</a>
        </div>
        <script>
        jQuery(function($) {
            $('#list-hmu-checkbox').on('click', function() {
                alert('Use Invite on active listings');
                $(this).prop("checked", false);
            });
            $('#flag-btn').on('click', function() {
                alert('Use Flagging on active listings');
            });
        });
        </script>

        <?php
 
 get_footer();