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
<style>
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

/**
 * iOS Toggle
 */
#toggles {
  width: 80px;
  /* width: 60px; */
  margin: 50px auto;
  text-align: center;
}

.ios-toggle,
.ios-toggle:active {
  position: absolute;
  top: -5000px;
  height: 0;
  width: 0;
  opacity: 0;
  border: none;
  outline: none;
}

.checkbox-label {
  display: block;
  position: relative;
  padding: 10px;
  margin-bottom: 20px;
  font-size: 12px;
  line-height: 16px;
  width: 100%;
  height: 36px;
  /*border-radius*/
  -webkit-border-radius: 18px;
  -moz-border-radius: 18px;
  border-radius: 18px;
  background: #f8f8f8;
  cursor: pointer;
}

.checkbox-label:before {
  content: '';
  display: block;
  position: absolute;
  z-index: 1;
  line-height: 34px;
  text-indent: 40px;
  height: 36px;
  width: 36px;
  /*border-radius*/
  -webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  border-radius: 100%;
  top: 0px;
  left: 0px;
  right: auto;
  background: white;
  /*box-shadow*/
  -webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, .2), 0 0 0 2px #dddddd;
  -moz-box-shadow: 0 3px 3px rgba(0, 0, 0, .2), 0 0 0 2px #dddddd;
  box-shadow: 0 3px 3px rgba(0, 0, 0, .2), 0 0 0 2px #dddddd;
}

.checkbox-label:after {
  content: attr(data-off);
  display: block;
  position: absolute;
  z-index: 0;
  top: 0;
  left: -300px;
  padding: 10px;
  height: 100%;
  width: 300px;
  text-align: right;
  color: black;
  /* color: #bfbfbf; */
  white-space: nowrap;
}

.ios-toggle:checked+.checkbox-label {
  /*box-shadow*/
  -webkit-box-shadow: inset 0 0 0 20px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
  -moz-box-shadow: inset 0 0 0 20px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
  box-shadow: inset 0 0 0 20px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
}

.ios-toggle:checked+.checkbox-label:before {
  left: calc(100% - 36px);
  /*box-shadow*/
  -webkit-box-shadow: 0 0 0 2px transparent, 0 3px 3px rgba(0, 0, 0, .3);
  -moz-box-shadow: 0 0 0 2px transparent, 0 3px 3px rgba(0, 0, 0, .3);
  box-shadow: 0 0 0 2px transparent, 0 3px 3px rgba(0, 0, 0, .3);
}

.ios-toggle:checked+.checkbox-label:after {
  content: attr(data-on);
  left: 80px;
  /* left: 60px; */
  width: 36px;
}

/* GREEN CHECKBOX */

#checkbox1+.checkbox-label {
  /*box-shadow*/
  /* -webkit-box-shadow: inset 0 0 0 0px rgba(19, 191, 17, 1), 0 0 0 2px #dddddd;
  -moz-box-shadow: inset 0 0 0 0px rgba(19, 191, 17, 1), 0 0 0 2px #dddddd;
  box-shadow: inset 0 0 0 0px rgba(19, 191, 17, 1), 0 0 0 2px #dddddd; */
}

#checkbox1:checked+.checkbox-label {
  /*box-shadow*/
  /* -webkit-box-shadow: inset 0 0 0 18px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
  -moz-box-shadow: inset 0 0 0 18px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1);
  box-shadow: inset 0 0 0 18px rgba(19, 191, 17, 1), 0 0 0 2px rgba(19, 191, 17, 1); */
}

#checkbox1:checked+.checkbox-label:after {
  /* color: rgba(19, 191, 17, 1); */
}

/* RED CHECKBOX */

#checkbox2+.checkbox-label {
  /*box-shadow*/
  -webkit-box-shadow: inset 0 0 0 0px red, 0 0 0 2px #dddddd;
  -moz-box-shadow: inset 0 0 0 0px red, 0 0 0 2px #dddddd;
  box-shadow: inset 0 0 0 0px red, 0 0 0 2px #dddddd;
}

#checkbox2:checked+.checkbox-label {
  /*box-shadow*/
  -webkit-box-shadow: inset 0 0 0 20px red, 0 0 0 2px red;
  -moz-box-shadow: inset 0 0 0 20px red, 0 0 0 2px red;
  box-shadow: inset 0 0 0 20px red, 0 0 0 2px red;
}

#checkbox2:checked+.checkbox-label:after {
  color: red;
}
</style>
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"
  integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g=="
  crossorigin="anonymous" />
<main id="primary" class="site-main container">

  <section class="datepicker-range-box text-center">
    <h3 class="text-uppercase mt-5"><small class="font-weight-bold">List Payment Summary</small></h3>
    <h6 class="text-uppercase font-weight-bold">Listing #<span class="current-post-id"></span></h6>
    <p class="text-uppercase font-weight-bold"><small>List today for $0.25 per day</small></p>
    <section class="transaction-type-choice-box">

      <div id="toggles">
        <!-- <input type="checkbox" name="checkbox1" id="checkbox1" class="ios-toggle" checked />
        <label for="checkbox1" class="checkbox-label" data-off="off" data-on="on"></label> -->
        <input type="checkbox" name="checkbox1" id="checkbox2" class="ios-toggle" checked />
        <label for="checkbox2" class="checkbox-label" data-off="List with no End Date"
          data-on="List with End Date"></label>
        <!-- <label for="checkbox2" class="checkbox-label" data-off="no" data-on="yes"></label> -->
      </div>

    </section>
    <div class="row">

      <div class="col-sm-12">
        <h6 class="text-uppercase"><small class="font-weight-bold">Please Pick a End Date:</small></h6>
        <div class="outputToDateTime"></div>
        <input type="text" id="list-to-date-time-input">
        <section class="message-display-box p-2">
          <h6><small class="font-weight-bold text-uppercase">List Ends on: </small> <span
              class="list-end-date text-danger">_______</span></h6>
        </section>
        <section class="payment-display-box text-center p-4">
          <h6 class="text-uppercase"><small class="font-weight-bold">Your List will be published for:
            </small>&nbsp;<span class="list-publish-days text-danger font-weight-bold">_______</span> &nbsp;<small
              class="font-weight-bold">Days</small></h6>
          <p class="text-uppercase"><small class="font-weight-bold">Your Payment Amount (1 day x .25C):
              &nbsp;$</small><span class="list-payment-amount text-danger font-weight-bold">_______</span></p>
        </section>
      </div>

    </div>

  </section>


  <section class="btn-holder mt-5">
    <a href="#" class="btn btn-outline-danger float-left">Go Back</a>
    <a href="#" id="paypal-form-link" class="btn btn-outline-danger float-right">Go to PayPal</a>
    <!-- <a href="/payment-form-page/?POST_ID=[post_id]&PAYMENT_TYPE=SINGLE&NUMBER_OF_LISTS=[number_of_days]" type="button"
        class="btn btn-outline-danger float-right">Go to PayPal</a> -->
  </section>





</main><!-- #main -->

<?php
get_footer();