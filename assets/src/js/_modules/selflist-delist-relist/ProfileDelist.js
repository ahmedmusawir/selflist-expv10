import $ from 'jquery';

class ProfileDelist {
  constructor() {
    this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'delist_status_update_ajax';
    // AJAX SUCCESS MESSAGE
    this.ajaxSuccessMessage = `
    <div class='alert alert-success rounded-0' role='alert'>
      New City created successfully! 
    </div>
    `;
    // COLLECTING ELEMENTS
    this.delistId;
    this.delistButton = $('.delist-button-in-user-archive');
    this.delistActionBtn = $('#DELIST-action-btn');
    this.theDelsitModal = $('#the-DELIST-modal');
    this.delistIdInModal = $('#DELIST-list-id');

    this.setEvents();
  }

  init = () => {
    // console.log('Profile Delist Btn ...');
  };

  setEvents = () => {
    this.delistButton.on('click', this.clickModalHandler);
    this.delistActionBtn.on('click', this.deactivationAjaxHandler);
    // NO NEED FOR THIS. MODAL'S DEFAULT CANCEL FUNCTION IS BEING USED
    // this.delistCloseBtn.on('click', this.clickCancelHandler);
  };

  clickModalHandler = (e) => {
    this.delistId = $(e.target).data('list-id');
    this.delistIdInModal.text(this.delistId);

    this.theDelsitModal.modal({
      backdrop: 'static',
      keyboard: false,
    });
  };

  deactivationAjaxHandler = () => {
    console.log('clicked up Delist button ...');

    // DELSIT AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.ajaxFunction,
        delistId: this.delistId,
      },
    })
      .done((res) => {
        console.log(res);

        // CHECKING FOR LIST ID FROM AJAX BACKEND
        if (res == this.delistId) {
          alert(`The List (ID: ${res}) has been Delisted Successfully!
                Please look under NON-ACTIVE LISTS to find your List`);
        } else {
          alert(`${res}`);
        }
        // REFRESHING THE PAGE
        location.reload();

        // if (res.state_id && res.new_city_id) {
        // STORING CAT DATA IN LOCAL STORAGE
        // sessionStorage.setItem('stateCityData', JSON.stringify(res));
        // this.makeUiAfterCityCreation();
        // } else {
        // $('#ajax-failed-message-city').append(res);
        // }
      })
      .fail((xhr, status, error) => {
        alert(`List Update Failure: ${error}
          Please contact support with this message:
          'Ajax Failed! In ${this.ajaxFunction}' 
        `);
        console.log('Ajax Failed! In ' + this.ajaxFunction);
        // REFRESHING THE PAGE
        location.reload();
      })
      .always(() => {
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };
}

export default ProfileDelist;
