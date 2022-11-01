import $ from 'jquery';
import Bootstrap from 'bootstrap';

class PaymentSummaryUiEvents {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    this.payByPointsBtn = $('#pay-by-points-btn');
    this.paymentByPointsCloseBtn = $('#payment-by-point-close-btn');
    this.paymentFailByPoingsCloseBtn = $('#payment-fail-by-point-close-btn');
    this.thePaymentModal = $('#the-payment-modal');
    this.thePaymentFailModal = $('#the-payment-fail-modal');
    this.dayTimePickerLabels = $('.xdsoft_datetimepicker');
    this.currentPaymentPoints = $('.list-payment-points');
    this.paymentSummaryAvailPoints = $('#payment-summary-avail-points');
    this.confirmPaymentPoints = $('#confirm-payment-points');
    this.confirmCurrentPoints = $('#confirm-current-points');
    this.confirmPublishDays = $('#confirm-publish-days');
    this.failedPaymentPoints = $('#failed-payment-points');
    this.failedCurrentPoints = $('#failed-current-points');
    // SETTING EVENTS
    this.setEvents();
  }

  init = () => {
    // console.log('Payment Summary UI Events ...');
  };

  setEvents = () => {
    this.payByPointsBtn.on('click', this.clickModalHandler);
    this.paymentByPointsCloseBtn.on('click', this.clickCancelHandler);
    this.paymentFailByPoingsCloseBtn.on('click', this.clickCancelHandler);
  };

  clickModalHandler = () => {
    // COLLECTING POINTS DATA FROM PAYMENT SUMMARY PAGE
    const paymentPoints = parseInt($.trim(this.currentPaymentPoints.html()));
    const availPoints = parseInt($.trim(this.paymentSummaryAvailPoints.html()));
    console.log('PAYMENT POINTS', paymentPoints);
    console.log('AVAILABLE POINTS', availPoints);
    // CHECKING FOR END DATE
    if (!paymentPoints) {
      alert(`Please pick an End Date from the Calendar ...`);
      return;
    }
    // CHECKING FOR AVAIL POINTS VS PUBLISH DAYS
    if (availPoints < paymentPoints) {
      this.dayTimePickerLabels.addClass('d-none');
      this.thePaymentFailModal.modal({
        backdrop: 'static',
        keyboard: false,
      });
    } else {
      // HIDING THE DATE TIME PICKER DUE TO:
      // Evertime the modal opens there are some elements in the daytime picker
      // shows up thru the modal no matter how high the z-index of the modal is set
      this.dayTimePickerLabels.addClass('d-none');
      this.thePaymentModal.modal({
        backdrop: 'static',
        keyboard: false,
      });
    }

    // DISPLAY DATA IN MODAL
    this.confirmPaymentPoints.html(paymentPoints);
    this.confirmCurrentPoints.html(availPoints);
    this.confirmPublishDays.html(paymentPoints);
    this.failedPaymentPoints.html(paymentPoints);
    this.failedCurrentPoints.html(availPoints);
  };

  clickCancelHandler = () => {
    // SHOWING DATE TIME BACK AFTER MODAL IS CANCELLED
    this.dayTimePickerLabels.removeClass('d-none');
  };
}

export default PaymentSummaryUiEvents;
