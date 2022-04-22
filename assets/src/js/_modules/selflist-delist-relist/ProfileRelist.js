import $ from 'jquery';

class ProfileRelist {
  constructor() {
    this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'relist_data_update_ajax';
    // AJAX SUCCESS MESSAGE
    this.ajaxSuccessMessage = `
    <div class='alert alert-success rounded-0' role='alert'>
      New City created successfully! 
    </div>
    `;
    // COLLECTING ELEMENTS
    this.relistId;
    this.relistButton = $('.relist-button-in-user-archive');
    this.relistActionBtn = $('#RELIST-action-btn');
    this.theRelistModal = $('#the-RELIST-modal');
    this.relistIdInModal = $('#RELIST-list-id');

    this.setEvents();
  }

  init = () => {
    // console.log('Profile Relist Btn ...');
  };

  setEvents = () => {
    this.relistButton.on('click', this.clickModalHandler);
    this.relistActionBtn.on('click', this.reactivationAjaxHandler);
    // NO NEED FOR THIS. MODAL'S DEFAULT CANCEL FUNCTION IS BEING USED
    // this.relistCloseBtn.on('click', this.clickCancelHandler);
  };

  clickModalHandler = (e) => {
    this.relistId = $(e.target).data('list-id');
    this.relistIdInModal.text(this.relistId);

    this.theRelistModal.modal({
      backdrop: 'static',
      keyboard: false,
    });
  };

  reactivationAjaxHandler = () => {
    // console.log('clicked up Relist button ...');

    // DELSIT AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.ajaxFunction,
        relistId: this.relistId,
      },
    })
      .done((res) => {
        // console.info(res);
        // CHECKING FOR LIST ID FROM AJAX BACKEND
        if (res.ID == this.relistId) {
          // STORING CAT DATA IN LOCAL STORAGE
          sessionStorage.setItem('relistData', JSON.stringify(res));
          // MESSAGE BEFORE REDIRECTION
          // alert(
          //   `The List (ID: ${res.ID}) is ready to Relist! Click Ok to be redirected to the Add List Page`
          // );
          // REDIRECTING TO LIST INSERT PAGE
          window.location.href = '/list-insert/';
        } else {
          alert(`List ID ${res} did not match! Relist failed...
          Please contact support with the message above.
          `);
          // REFRESHING THE PAGE
          // location.reload();
        }
      })
      .fail((xhr, status, error) => {
        alert(`Relist Failure: ${error}
          Please contact support with this message:
          'Ajax Failed! In ${this.ajaxFunction}' 
        `);
        console.log('Ajax Failed! In ' + this.ajaxFunction);
        // REFRESHING THE PAGE
        // location.reload();
      })
      .always(() => {
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };
}

export default ProfileRelist;
