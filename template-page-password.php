<?php
/**
 * The template for displaying all pages
 * Template Name: Password Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

if (is_user_logged_in()) {
  get_header();
} else {
  get_header('loggedout');
}
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



<main id="primary" class="site-main container">

    <h2 class="text-center font-weight-bold mt-5">Manage My Password</h2>

    <section class="PASSWORD-BOX">
        <div class="mt-5">
            <button id="password-cancel-btn" class="btn btn-primary btn-sm float-right ml-2" disabled>Cancel</button>
            <button id="password-edit-btn" class="btn btn-dark btn-sm float-right">Edit</button>
        </div>
        <h3 class="text-uppercase"><small class="font-weight-bold">My Password</small></h3>
        <!-- <p class="text-danger">Reset Your Login Password Here... </p> -->

        <!-- MEMBER PASSWORK RESET FORM -->
        <form action="" name="password-reset-form" id="password-reset-form" class="form">
            <!-- PASSWORD -->
            <div class="form-group">
                <input type="password" class="form-control" id="lister-password" name="lister-password"
                    aria-describedby="textHelp" placeholder="Password" value="<?php echo $current_user->user_pass ?>"
                    readonly>
                <small id="textHelp" class="form-text text-muted">8 Characters or more</small>
            </div>

            <!-- PASSWORD CONFIRMATION -->
            <div class="form-group">
                <input type="password" class="form-control" id="lister-password-confirm" name="lister-password-confirm"
                    aria-describedby="textHelp" placeholder="Confirm Password"
                    value="<?php echo $current_user->user_pass ?>" readonly>
                <small id="textHelp" class="form-text text-muted">Confirm</small>
            </div>

            <!-- PASSWORD SUBMIT BUTTON -->
            <button id="profile-password-update-button" type="submit" class="btn btn-secondary btn-block" disabled>
                Update
            </button>

        </form> <!-- END MEMBER PASSWORK RESET FORM -->

        <hr class="bg-danger">

    </section>

</main><!-- #main -->

<?php
get_footer();