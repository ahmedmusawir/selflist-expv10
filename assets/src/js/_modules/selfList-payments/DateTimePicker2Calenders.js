import $ from 'jquery';
import datetimepicker from 'jquery-datetimepicker';

class DateTimePicker2Calendars {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    this.dateTimePickerBox = $('.datepicker-box');
    this.dateTimePickerInput = $('.date-time-picker-input');
    this.dateFromInput = $('#list-from-date-time-input');
    this.outputFromDate = $('.list-start-date');
    this.dateToInput = $('#list-to-date-time-input');
    this.outputToDate = $('.list-end-date');
    this.listPublishDays = $('.list-publish-days');
    this.listPaymentAmount = $('.list-payment-amount');
    this.paypalFormLink = $('#paypal-form-link');
    // COLLECTING THE POST ID
    const listObject = JSON.parse(localStorage.getItem('newListData'));
    // console.log('Current List ID', listObject.id);
    this.currentPostId = listObject.id;

    // SETTING DATEPICKER
    $.datetimepicker.setLocale('en');

    // SETTING GLOBALS
    this.selectedStart;
    this.selectedEnd;
    this.today = new Date();
    this.yesterday = this.today.setDate(this.today.getDate() - 1);
    // SETTING EVENTS
    this.setMainDateTimeEvents();
    this.setDateRangeEvents();
  }

  init = () => {
    console.log('Date Time Picker Test ...');
  };

  setMainDateTimeEvents = () => {
    this.dateTimePickerInput
      .datetimepicker({
        onGenerate: function (ct) {
          $(this).find('.xdsoft_date').toggleClass('xdsoft_disabled');
        },
        timepicker: false,
        datepicker: true,
        format: 'M d, Y',
        maxDate: this.yesterday,
        yearStart: 2021,
        // inline: true,
      })
      .on('change', () => {
        const selected = this.dateTimePickerInput.val();
        this.dateTimePickerBox.html(selected);
      });
  };

  setDateRangeEvents = () => {
    // THE START DATE
    this.dateFromInput.datetimepicker({
      onGenerate: function (ct) {
        $(this).find('.xdsoft_date').toggleClass('xdsoft_disabled');
      },
      onChangeDateTime: (dp, $input) => {
        this.selectedStart = $input.val();
        this.displayDateTime();
      },
      timepicker: false,
      datepicker: true,
      format: 'M d, Y',
      maxDate: this.yesterday,
      yearStart: 2021,
      inline: true,
    });

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
      format: 'M d, Y',
      maxDate: this.yesterday,
      yearStart: 2021,
      inline: true,
    });
  };

  displayDateTime = () => {
    if (!this.selectedStart) {
      alert('Please choose a Start Date first');
      this.outputToDate.html('_________');
    } else {
      this.outputFromDate.html(this.selectedStart);
    }
    if (this.selectedStart && this.selectedEnd) {
      this.outputToDate.html(this.selectedEnd);
    }

    this.displayTimeDifference();
  };

  displayTimeDifference = () => {
    // CALCULATING START & END DIFF
    const startDate = new Date(this.selectedStart);
    const endDate = new Date(this.selectedEnd);
    // console.log('Start Date: ', startDate);
    // console.log('End Date: ', endDate);
    const timeDifference = endDate.getTime() - startDate.getTime();
    // console.log('Time Diff: ', timeDifference);

    // TIME CONSTANTS
    const milliSecondsInOneSecond = 1000;
    const secondsInOneHour = 3600;
    const hoursInOneDay = 24;

    const dayDifference =
      timeDifference /
        (milliSecondsInOneSecond * secondsInOneHour * hoursInOneDay) +
      1;

    const paymentAmount = dayDifference * 0.25;

    // DISPLAY PUBLISH SETTINGS & PAYMENT AMOUNT
    if (!this.selectedStart) {
      this.listPublishDays.html('_________');
      this.listPaymentAmount.html('_________');
    } else {
      this.outputFromDate.html(this.selectedStart);
    }
    if (this.selectedStart && this.selectedEnd) {
      if (dayDifference < 0) {
        alert('Your Start Date Must be EARLIER than Your End Date');
        this.listPublishDays.html('_________');
        this.listPaymentAmount.html('_________');
        this.outputFromDate.html(
          'Please Reselect the Start date that is Earlier than the end date...'
        );
      } else {
        this.listPublishDays.html(dayDifference);
        this.listPaymentAmount.html(paymentAmount);

        // MAKING THE PAYPAL FORM URL STRING
        const paypalLinkString = `/payment-form-page/?POST_ID=${this.currentPostId}&PAYMENT_TYPE=SINGLE&NUMBER_OF_DAYS=${dayDifference}`;
        console.log(paypalLinkString);
        // ADD THE HREF TO THE PAYPAL FORM LINK
        this.paypalFormLink.attr('href', paypalLinkString);
      }
    }
  };
}
export default DateTimePicker2Calendars;
