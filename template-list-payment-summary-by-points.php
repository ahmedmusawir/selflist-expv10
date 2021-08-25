<?php
/**
 * The template for displaying all pages
 * Template Name: Payment Summary by Points
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on My WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */
// LOGIN REDIRECT START

// if ( $current_user->ID == )
// if ( !is_user_logged_in() ) {
//   echo '<h1>You are Not Logged in</h1>';
//   wp_redirect( wp_login_url() );
//   exit;
// } else {
//   echo '<h1>You are Logged in</h1>';
// }
// LOGIN REDIRECT END

get_header();
?>
<?php 
// COLLECTING USER INFO 
$current_user_id = get_current_user_id();
$user_points = get_field('selflist_points', 'user_' . $current_user_id);
?>
<style>
/* STYLES FOR DATE TIME PICKER   */

.xdsoft_datetimepicker {
    border: 1px solid red !important;
}

.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_today {
    color: red !important;
}

.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_default,
.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_current,
.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box>div>div.xdsoft_current {
    background: red !important;
    box-shadow: #178fe5 0 1px 3px 0 !important;
    color: #fff !important;
    font-weight: 700;
}

.xdsoft_datetimepicker .xdsoft_calendar td:hover,
.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box>div>div:hover {
    color: #fff !important;
    background-color: red !important;
    box-shadow: none !important;
}
</style>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"
    integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g=="
    crossorigin="anonymous" />
<main id="primary" class="site-main container">

    <section class="datepicker-range-box text-center">
        <h3 class="text-uppercase mt-5"><small class="font-weight-bold">List & Pay</small></h3>
        <h6 class="text-uppercase">
            <small>
                Lister ID:
                <strong class="text-danger">
                    <span class="current-user-id">
                        <?php echo $current_user_id; ?>
                    </span>
                </strong>
                &nbsp; Available Points:
                <strong class="text-danger">
                    <span id="payment-summary-avail-points">
                        <?php echo $user_points; ?>
                    </span>
                </strong>
            </small>
        </h6>
        <h6 class="text-uppercase font-weight-bold">Listing #<span class="current-post-id"></span></h6>
        <p class="text-uppercase font-weight-bold"><small>List today for <strong>1 Point</strong> per day</small></p>

        <div class="row">

            <div class="col-sm-12">
                <h6 class="text-uppercase"><small class="font-weight-bold">Pick an end date:</small></h6>
                <div class="outputToDateTime"></div>
                <input type="text" id="list-to-date-time-input">
                <section class="message-display-box p-2">
                    <h6><small class="font-weight-bold text-uppercase">List Ends on: </small> <span
                            class="list-end-date text-danger">_______</span></h6>
                </section>
                <section class="payment-display-box text-center p-4">
                    <h6 class="text-uppercase"><small class="font-weight-bold">My List will be published for:
                        </small>&nbsp;<span class="list-publish-days text-danger font-weight-bold">_______</span>
                        &nbsp;<small class="font-weight-bold">Days</small>
                    </h6>
                    <!-- <p class="text-uppercase"><small class="font-weight-bold">My Payment Amount (1 day x .25C):
              &nbsp;$</small><span class="list-payment-amount text-danger font-weight-bold">_______</span>
          </p> -->
                    <p class="text-uppercase"><small class="font-weight-bold">My Payment Points (1 day x 1 point):
                            &nbsp;</small><span class="list-payment-points text-danger font-weight-bold">_______</span>
                        <small class="font-weight-bold">Points</small>
                    </p>
                </section>
            </div>

        </div>

    </section>


    <section class="btn-holder mt-5">
        <a href="#" class="btn btn-outline-danger float-left">Go Back</a>
        <a href="#" id="pay-by-points-btn" class="btn btn-outline-danger float-right">Pay by Points</a>
    </section>

</main><!-- #main -->

<!-- THE PAYMENT MODAL -->

<!-- Modal -->
<div class="modal fade text-center" id="the-payment-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog" role="document"> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <h5 class="modal-title text-success" id="exampleModalLabel">Listing Confirmation</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <p class="text-uppercase mt-4"><small class="font-weight-bold">My Payment Points:
                        &nbsp;</small><span id="confirm-payment-points"
                        class="text-danger font-weight-bold">_______</span> <small class="font-weight-bold"></small>
                </p>
                <p class="text-uppercase"><small class="font-weight-bold">My Current Points:
                        &nbsp;</small><span id="confirm-current-points"
                        class="text-danger font-weight-bold">_______</span> <small class="font-weight-bold"></small>
                </p>
                <p>* My List Will Be Published for <strong><span id="confirm-publish-days">_________</span></strong>
                    Days</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button id="payment-by-point-close-btn" type="button" class="btn btn-secondary" data-dismiss="modal">
                    Go Back
                </button>
                <button id="payment-by-point-submit-btn" type="button" class="btn btn-primary">
                    Publish
                </button>
            </div>
        </div>
    </div>
</div>

<!-- THE PAYMENT FAIL MODAL -->

<!-- Modal -->
<div class="modal fade text-center" id="the-payment-fail-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog" role="document"> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">More Points Needed!</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <p class="text-uppercase mt-4"><small class="font-weight-bold">My Payment Points:
                        &nbsp;</small><span id="failed-payment-points"
                        class="text-danger font-weight-bold">_______</span>
                    <small class="font-weight-bold"></small>
                </p>
                <p class="text-uppercase"><small class="font-weight-bold">My Current Points:
                        &nbsp;</small><span id="failed-current-points"
                        class="text-danger font-weight-bold">_______</span>
                    <small class="font-weight-bold"></small>
                </p>
                <p class="p-4 text-danger font-weight-bold">
                    * You don't have enough available points for this. Please, add more points to My account!
                </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button id="payment-fail-by-point-close-btn" type="button" class="btn btn-secondary"
                    data-dismiss="modal">
                    Pick A New Date
                </button>

                <a href="/list-customer-add-points/" class="btn btn-primary">Add More Points</a>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();