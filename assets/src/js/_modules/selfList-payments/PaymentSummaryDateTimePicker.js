import $ from 'jquery';
import datetimepicker from 'jquery-datetimepicker';

class PaymentSummaryDateTimePicker {
  constructor() {
    // COLLECTING ELEMENTS
    this.dateTimePickerBox = $('.datepicker-box');
    this.dateTimePickerInput = $('.date-time-picker-input');
    this.dateFromInput = $('#list-from-date-time-input');
    this.outputFromDate = $('.list-start-date');
    this.dateToInput = $('#list-to-date-time-input');
    this.outputToDate = $('.list-end-date');
    this.listPublishDays = $('.list-publish-days');
    this.listPaymentPoints = $('.list-payment-points');
    this.listPaymentAmount = $('.list-payment-amount');
    this.paypalFormLink = $('#paypal-form-link');
    this.paymentSummaryPostIdBox = $('.current-post-id');
    // COLLECTING THE POST ID
    const listObject = JSON.parse(localStorage.getItem('newListData'));
    // console.log('Current List ID', listObject.id);
    if (listObject) {
      this.currentPostId = listObject.data.post_id;
    } else {
      console.info(
        'List Object not found in LocalStorage : [PaymentSummaryDateTimePicker]'
      );
    }

    // SETTING DATEPICKER
    $.datetimepicker.setLocale('en');

    // SETTING GLOBALS
    this.selectedStart;
    this.selectedEnd;
    // JS today GIVES YESTERDAY'S DATE SEE FOLLOWING LINK
    // https://stackoverflow.com/questions/21264396/javascript-new-datedatestr-giving-yesterdays-date-in-certain-formats
    this.today = new Date();
    // NEED yesterday TO SET jQuery DateTime'S maxDate
    this.yesterday = this.today.setDate(this.today.getDate() - 1);
    // FOLLOWING GIVES US TODAY'S DATE BUT WITH CURRENT TIME
    this.tomorrow = this.today.setDate(this.today.getDate() + 1);
    // INIT FUNCTION
    this.init();
    // SETTING EVENTS
    this.setDateRangeEvents();
  }

  init = () => {
    // DISPLAYING CURRENT POST ID FROM LOCAL STORAGE
    this.paymentSummaryPostIdBox.html(this.currentPostId);
  };

  setDateRangeEvents = () => {
    // THE END DATE
    this.dateToInput.datetimepicker({
      onGenerate: function (ct) {
        $(this).find('.xdsoft_date').toggleClass('xdsoft_disabled');
      },
      onChangeDateTime: (dp, $input) => {
        this.selectedEnd = $input.val();
        this.displayDateTime();
      },
      timepicker: false,
      datepicker: true,
      format: 'm.d.y',
      // format: 'M d, Y',
      maxDate: this.yesterday,
      yearStart: 2021,
      inline: true,
    });
  };

  displayDateTime = () => {
    this.outputToDate.html(this.selectedEnd);
    // TIME CALCULATION & DISPLAY
    this.displayTimeDifference();
  };

  displayTimeDifference = () => {
    // CALCULATING START & END DIFF
    // Following is getting the today's date into Date() format for calculation. Because, this.tomorrow is a string
    const newToday = new Date(this.tomorrow);
    // Following is resetting the time to 0 so that it matches with the selected time from the calandar
    const startDate = newToday.setHours(0, 0, 0, 0);
    const endDate = new Date(this.selectedEnd);
    // console.log('Start Date: ', startDate);
    // console.log('End Date: ', endDate);
    const timeDifference = endDate.getTime() - startDate;
    // console.log('Time Diff: ', timeDifference);
    // TIME CONSTANTS
    const milliSecondsInOneSecond = 1000;
    const secondsInOneHour = 3600;
    const hoursInOneDay = 24;

    const dayDifference =
      timeDifference /
        (milliSecondsInOneSecond * secondsInOneHour * hoursInOneDay) +
      1;
    // console.log('Day Diff: ', dayDifference);
    const paymentAmount = dayDifference * 0.25;

    // DISPLAY PUBLISH SETTINGS & PAYMENT AMOUNT
    if (!this.selectedStart) {
      this.listPublishDays.html('_________');
      this.listPaymentAmount.html('_________');
    } else {
      this.outputFromDate.html(this.selectedStart);
    }

    this.listPublishDays.html(dayDifference);
    this.listPaymentPoints.html(dayDifference);
    this.listPaymentAmount.html(paymentAmount);
  };
}
export default PaymentSummaryDateTimePicker;
