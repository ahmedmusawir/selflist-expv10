import $ from 'jquery';

class PaymentSubmitAjaxEvents {
  constructor() {
    // this.init();
    // AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'list_payment_and_publish_ajax';
    // COLLECTING ELEMENTS
    this.confirmPaymentPoints = $('#confirm-payment-points');
    this.currentPostId = $('.current-post-id');
    this.paymentByPointSubmitBtn = $('#payment-by-point-submit-btn');
    this.setEvents();
  }

  init = () => {
    // console.log('Payment Submit Ajax Event ...');
  };

  setEvents = () => {
    this.paymentByPointSubmitBtn.on('click', this.PaymentSubmitHandler);
  };

  PaymentSubmitHandler = () => {
    const newPaymentPoints = parseInt($.trim(this.confirmPaymentPoints.html()));
    const currentPostId = $.trim(this.currentPostId.html());

    // AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.ajaxFunction,
        newPaymentPoints,
        currentPostId,
      },
    })
      .done((res) => {
        // console.log('Publish Summary', res);
        // ADDING INSERTED DATA INTO LOCALSTORAGE FOR PREVIEW PAGE
        localStorage.setItem('newListPublishData', JSON.stringify(res));

        // REDIRECTING TO LIST PUBLISH SUMMARY PAGE
        // window.location.href = '/list-publish-summary/';
        // REDIRECTING TO THE BRAND NEW PUBLISHED LIST
        window.location.href = `/?p=${res.post_id}&CLASS=d-none`;
      })
      .fail(() => {
        console.log('Ajax Failed! In ' + this.ajaxFunction);
      })
      .always(() => {
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };
}

export default PaymentSubmitAjaxEvents;
