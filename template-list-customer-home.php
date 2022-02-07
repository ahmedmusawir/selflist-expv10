<?php
/**
 * The template for displaying all pages
 * Template Name: List Customer Home
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

get_header();
?>
<?php
/**
 * CUSOMER/USER PROFILE
 */
$current_user = wp_get_current_user();
$user_points = get_field('selflist_points', 'user_' . $current_user->ID);
$user_registered = $current_user->user_registered;
$user_email = $current_user->user_email;
$user_name = $current_user->display_name;
$user_total_list_count = count_user_posts($current_user->ID, 'post'); // false for all posts
$user_published_list_count = count_user_posts($current_user->ID, 'post', true); // true for public only
?>
<!-- DO NOT DELETE - THESE ARE HIDDEN ITEMS ONLY TO BE USED WITH JAVASCRIPT -->
<span class="d-none"
    id="current-member-name"><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></span>
<span class="d-none" id="current-member-email"><?php echo $user_email; ?></span>
<!-- DO NOT DELETE - END THESE ARE HIDDEN ITEMS ONLY TO BE USED WITH JAVASCRIPT -->
<style>
.error {
    color: red;
    font-size: .8rem;
    font-weight: bold;
}

input {
    color: red;
    font-size: .8rem;
    font-weight: bold;
}

textarea {
    color: red;
    font-size: .8rem;
    font-weight: bold;
}

input::placeholder {
    font-size: .8rem !important;
}


textarea::placeholder {
    font-size: .8rem !important;
}

#lister-facebook-error,
#lister-twitter-error,
#lister-instagram-error,
#lister-yelp-error,
#lister-linkedin-error,
#lister-google-plus-error,
#lister-youtube-error {
    position: absolute;
    top: 110%;
    left: 0%;
}
</style>


<main id="primary" class="site-main container customer-profile-page">

    <div class="row">
        <!-- LEFT PROFILE MENU COLUMN -->
        <div class="col-sm-12 col-md-4">
            <?php
        wp_nav_menu(
            array(
                'theme_location' => 'customer-profile-menu',
                'menu_id' => 'profile-menu',
            )
        );
      ?>

            <style>
            #sale-image-square:hover {
                box-shadow: 2px 2px 6px gray;
            }
            </style>
            <section>
                <figure>
                    <a href="/list-customer-add-points/">
                        <img class="mx-auto d-block" id="sale-image-square" src="/wp-content/uploads/Square.jpg" alt="">
                    </a>
                </figure>
            </section>

        </div>
        <!-- LEFT PROFILE MENU COLUMN ENDS -->
        <!-- RIGHT PROFILE CONTENT COLUMN -->
        <div class="col-sm-12 col-md-8">
            <a href="/list-insert/" class="btn btn-danger float-right btn-lg d-none d-lg-block">List</a>
            <a href="/list-insert/" class="btn btn-danger float-right d-none d-sm-block d-lg-none">List</a>
            <a href="/list-insert/" class="btn btn-danger float-right btn-sm d-block d-sm-none">List</a>
            <h3 class="text-uppercase"><small class="font-weight-bold">Manage My Listing Auto Links</small></h3>
            <!-- <h3 class="text-uppercase"><small class="font-weight-bold">My Profile</small></h3> -->
            <h2 class="h2">Welcome, <?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?>
            </h2>

            <!-- <h6 class="h6 text-uppercase font-weight-bold">
                ID:
                <strong class="text-danger">
                    <span class="current-user-id">
                        <?php //echo $current_user->ID; ?>
                    </span>
                </strong>
            </h6> -->

            <!-- <h6 class="h6 text-uppercase font-weight-bold">
                USER NAME:
                <strong class="text-danger">
                    <span class="current-user-id text-lowercase">
                        <?php echo $current_user->user_login; ?>
                    </span>
                </strong>
            </h6> -->

            <!-- <h6 class="h6 text-uppercase font-weight-bold">
                Available Points:
                <strong class="text-danger">
                    <span id="payment-summary-avail-points">
                        <?php echo $user_points; ?>
                    </span>
                </strong>
            </h6> -->
            <!-- <h6 class="h6 text-uppercase font-weight-bold">
                Email:
                <strong class="text-danger">
                    <span id="payment-summary-avail-points" class="text-lowercase">
                        <?php //echo $user_email; ?>
                    </span>
                </strong>
            </h6> -->
            <!-- <h6 class="h6 text-uppercase font-weight-bold">
        Your Total List Count:
        <strong class="text-danger">
          <span id="payment-summary-avail-points">
            <?php echo $user_total_list_count; ?>
          </span>
        </strong>
      </h6> -->
            <!-- <h6 class="h6 text-uppercase font-weight-bold">
                Active Listings:
                <strong class="text-danger">
                    <span id="payment-summary-avail-points">
                        <?php echo $user_published_list_count; ?>
                    </span>
                </strong>
            </h6> -->
            <div class="row">
                <div class="col-6 col-sm-3">
                    <h6 class="h6 text-uppercase font-weight-bold">
                        Listing Since:
                    </h6>
                </div>
                <style>
                #date-box {
                    margin-left: -2rem;
                    margin-top: -.15rem;
                }

                @media (max-width: 575px) {
                    #date-box {
                        margin-left: 0rem;
                        margin-top: -.15rem;
                    }
                }
                </style>
                <div class="col-6 col-sm-9">
                    <?php echo '<span id="date-box" class="bg-danger text-light font-weight-bold float-left py-2 px-4"
                    style="font-size: .8rem;">';
                    printf('%s<br>', date("m", strtotime($user_registered)));
                    printf('%s<br>', date("d", strtotime($user_registered)));
                    printf('%s<br>', date("y", strtotime($user_registered)));
                    echo '</span>'; 
            ?>
                </div>
            </div>
            <!-- <strong class="text-danger">
                    <span id="payment-summary-avail-points">
                        <?php printf('%s<br>', date("M d, Y", strtotime($user_registered)));?>
                    </span>
                </strong> -->
            <!-- <hr class="bg-danger"> -->

            <div class="mt-5">
                <button id="password-cancel-btn" class="btn btn-primary btn-sm float-right ml-2"
                    disabled>Cancel</button>
                <button id="password-edit-btn" class="btn btn-dark btn-sm float-right">Edit</button>
            </div>
            <h3 class="text-uppercase"><small class="font-weight-bold">My Password</small></h3>
            <!-- <p class="text-danger">Reset Your Login Password Here... </p> -->

            <!-- MEMBER PASSWORK RESET FORM -->
            <form action="" name="password-reset-form" id="password-reset-form" class="form">
                <!-- PASSWORD -->
                <div class="form-group">
                    <input type="password" class="form-control" id="lister-password" name="lister-password"
                        aria-describedby="textHelp" placeholder="Password"
                        value="<?php echo $current_user->user_pass ?>" readonly>
                    <small id="textHelp" class="form-text text-muted">Ex: 8 Characters Minimum</small>
                </div>

                <!-- PASSWORD CONFIRMATION -->
                <div class="form-group">
                    <input type="password" class="form-control" id="lister-password-confirm"
                        name="lister-password-confirm" aria-describedby="textHelp" placeholder="Confirm Password"
                        value="<?php echo $current_user->user_pass ?>" readonly>
                    <small id="textHelp" class="form-text text-muted">Confirm</small>
                </div>

                <!-- PASSWORD SUBMIT BUTTON -->
                <button id="profile-password-update-button" type="submit" class="btn btn-secondary btn-block" disabled>
                    Update
                </button>

            </form> <!-- END MEMBER PASSWORK RESET FORM -->

            <hr class="bg-danger">

            <div class="mt-5">
                <button id="additional-info-cancel-btn" class="btn btn-primary btn-sm float-right ml-2"
                    disabled>Cancel</button>
                <button id="additional-info-edit-btn" class="btn btn-dark btn-sm float-right">Edit</button>
            </div>
            <h3 class="text-uppercase"><small class="font-weight-bold">My Listing Auto Links</small></h3>
            <!-- <p>The following information will be included in my listings automatically</p> -->
            <!-- LIST INSERT BLOCK -->
            <section class="additional-data-container">

                <article id="additional-profile-data-box" class="">

                    <?php

          // echo '<pre>';
          // print_r($current_user);
          // echo '</pre>';

          // COLLECTION ADDITIONAL INFO FROM ACF
          $user_id_ACF = 'user_' . $current_user->ID;
          $user_phone = get_field('your_profile_phone', $user_id_ACF);
          $user_website = get_field('your_profile_site', $user_id_ACF);
          $user_facebook = get_field('your_profile_facebook', $user_id_ACF);
          $user_yelp = get_field('your_profile_yelp', $user_id_ACF);
          $user_instagram = get_field('your_profile_instagram', $user_id_ACF);
          $user_linkedin = get_field('your_profile_linkedin', $user_id_ACF);
          $user_twitter = get_field('your_profile_twitter', $user_id_ACF);
          $user_youtube = get_field('your_profile_youtube', $user_id_ACF);
          

          ?>
                    <!-- MEMBER PROFILE ADDITIONAL INFO FORM -->
                    <!-- <form action="" name="list-insert-main-form" id="list-insert-main-form" class="form"> -->
                    <form action="" name="additional-info-form" id="additional-info-form" class="form">

                        <!-- PHONE -->
                        <div class="form-group">
                            <!-- <label class="font-weight-bold" for="lister-phone">Phone:</label> -->
                            <input type="tel" class="form-control" id="lister-phone" name="lister-phone"
                                aria-describedby="textHelp" placeholder="Phone" value="<?php echo $user_phone; ?>"
                                readonly>
                            <!-- <small id="textHelp" class="form-text text-muted">Phone Ex: 6781231234</small> -->
                        </div>
                        <!-- WEBSITE -->
                        <div class="form-group">
                            <!-- <label class="font-weight-bold" for="lister-website">Website:</label> -->
                            <input type="text" class="form-control" id="lister-website" name="lister-website"
                                aria-describedby="textHelp" placeholder="Website" value="<?php echo $user_website; ?>"
                                readonly>
                            <!-- <small id="textHelp" class="form-text text-muted">Website Ex:
                                https://your-website.com</small> -->
                        </div>
                        <div class="form-group">
                            <!-- <label class="font-weight-bold" for="lister-website">Website:</label> -->
                            <input type="text" class="form-control" id="lister-email" name="lister-website"
                                aria-describedby="textHelp" placeholder="Email" value="<?php echo $user_email; ?>"
                                readonly disabled>
                            <!-- <small id="textHelp" class="form-text text-muted">Website Ex:
                                https://your-website.com</small> -->
                        </div>

                        <!-- SOCIAL MEDIA  -->
                        <!-- Facebook -->
                        <div class="form-group">
                            <!-- <label class="font-weight-bold" for="exampleFormControlTextarea1">My Social Media:</label> -->
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="text-danger fab fa-facebook-f"></i></div>
                                </div>
                                <input type="url" class="form-control" id="lister-facebook" name="lister-facebook"
                                    placeholder="https://facebook.com/mypage" value="<?php echo $user_facebook; ?>"
                                    readonly>
                            </div>
                            <!-- <small id="textHelp" class="form-text text-muted">Example:
                                https://facebook.com/mypage</small> -->
                        </div>
                        <!-- Yelp -->
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="text-danger fab fa-yelp"></i></div>
                                </div>
                                <input type="url" class="form-control" id="lister-yelp" name="lister-yelp"
                                    placeholder="https://yelp.com/mypage" value="<?php echo $user_yelp; ?>" readonly>
                            </div>
                            <!-- <small id="textHelp" class="form-text text-muted">Example: https://yelp.com/mypage</small> -->
                        </div>
                        <!-- Instagram -->
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="text-danger fab fa-instagram"></i></div>
                                </div>
                                <input type="url" class="form-control" id="lister-instagram" name="lister-instagram"
                                    placeholder="https://instagram.com/mypage" value="<?php echo $user_instagram; ?>"
                                    readonly>
                            </div>
                            <!-- <small id="textHelp" class="form-text text-muted">Example:
                                https://instagram.com/mypage</small> -->
                        </div>
                        <!-- LinkedIn -->
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="text-danger fab fa-linkedin-in"></i></div>
                                </div>
                                <input type="url" class="form-control" id="lister-linkedin" name="lister-linkedin"
                                    placeholder="https://linkedin.com/mypage" value="<?php echo $user_linkedin; ?>"
                                    readonly>
                            </div>
                            <!-- <small id="textHelp" class="form-text text-muted">Example:
                                https://linkedin.com/mypage</small> -->
                        </div>

                        <!-- Twitter -->
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="text-danger fab fa-twitter"></i></div>
                                </div>
                                <input type="url" class="form-control" id="lister-twitter" name="lister-twitter"
                                    placeholder="https://twitter.com/mypage" value="<?php echo $user_twitter; ?>"
                                    readonly>
                            </div>
                            <!-- <small id="textHelp" class="form-text text-muted">Example:
                                https://twitter.com/mypage</small> -->
                        </div>

                        <!-- YourTube -->
                        <div class="form-group">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="text-danger fab fa-youtube"></i></div>
                                </div>
                                <input type="url" class="form-control" id="lister-youtube" name="lister-youtube"
                                    placeholder="https://www.youtube.com/channel/UCYawRfyYRTbS3Q-AGSrr52w"
                                    value="<?php echo $user_youtube; ?>" readonly>
                            </div>
                            <!-- <small id="textHelp" class="form-text text-muted">Example:
                                https://twitter.com/mypage</small> -->
                        </div>


                        <!-- THE SUBMIT BUTTON -->
                        <button id="profile-info-update-button" type="submit" class="btn btn-secondary btn-block"
                            disabled>
                            Update
                        </button>

                    </form>


                </article> <!-- END OF id="additional-profile-data-box" -->

            </section> <!-- END OF class="additional-data-container" -->

        </div>
        <!-- RIGHT PROFILE CONTENT COLUMN ENDS -->

    </div> <!-- END ROW -->

    <hr>

</main><!-- #main -->

<?php
get_footer();