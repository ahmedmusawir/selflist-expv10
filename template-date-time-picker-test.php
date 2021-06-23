<?php
/**
 * The template for displaying all pages
 * Template Name: Date Time Picker Test
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
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"
  integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g=="
  crossorigin="anonymous" />
<main id="primary" class="site-main container">

  <header id="header-test" class="site-header container py-5 text-center">

    <h1>Date Time Picker Test</h1>

    <div class="datepicker-box"></div>
    <input type="text" class="date-time-picker-input">

    <section class="datepicker-range-box">
      <div class="row">
        <div class="col-sm-6">
          <h3>List From:</h3>
          <div class="outputFromDateTime"></div>
          <input type="text" id="list-from-date-time-input">
        </div>
        <div class="col-sm-6">
          <h3>List Till:</h3>
          <div class="outputToDateTime"></div>
          <input type="text" id="list-to-date-time-input">
        </div>
      </div>
    </section>
    <section class="message-display-box p-4 bg-light">
      <h4>List Starts in: <span class="list-start-date text-success">_______</span> & List Ends in: <span
          class="list-end-date text-info">_______</span></h4>
    </section>
    <section class="payment-display-box p-4 bg-dark text-light">
      <h5 class="text-light">Your List will be published for: <span
          class="list-publish-days text-warning">_______</span> Days & Your Payment Amount (1 day x .25C): $<span
          class="list-payment-amount text-warning">_______</span></h5>
    </section>
    <section class="btn-holder mt-5">
      <a href="#" class="btn btn-outline-danger float-left">Go Back</a>
      <a href="#" id="paypal-form-link" class="btn btn-outline-danger float-right">Go to PayPal</a>
      <!-- <a href="/payment-form-page/?POST_ID=[post_id]&PAYMENT_TYPE=SINGLE&NUMBER_OF_LISTS=[number_of_days]" type="button"
        class="btn btn-outline-danger float-right">Go to PayPal</a> -->
    </section>




  </header><!-- #masthead -->

</main><!-- #main -->

<?php
get_footer();