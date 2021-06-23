import $ from 'jquery';

class ProfileListDelete {
  constructor() {
    this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'delete_list_permanently_ajax';
    // AJAX SUCCESS MESSAGE
    this.ajaxSuccessMessage = `
    <div class='alert alert-success rounded-0' role='alert'>
      New City created successfully! 
    </div>
    `;
    // COLLECTING ELEMENTS
    this.deleteId;
    this.deleteButton = $('.delete-button-in-user-archive');
    this.deleteActionBtn = $('#DELETE-action-btn');
    this.theDeleteModal = $('#the-DELETE-modal');
    this.deleteIdInModal = $('#DELETE-list-id');

    this.setEvents();
  }

  init = () => {
    // console.log('Profile List Delete ...');
  };

  setEvents = () => {
    this.deleteButton.on('click', this.clickModalHandler);
    this.deleteActionBtn.on('click', this.reactivationAjaxHandler);
    // NO NEED FOR THIS. MODAL'S DEFAULT CANCEL FUNCTION IS BEING USED
    // this.deleteCloseBtn.on('click', this.clickCancelHandler);
  };

  clickModalHandler = (e) => {
    this.deleteId = $(e.target).data('list-id');
    this.deleteIdInModal.text(this.deleteId);

    this.theDeleteModal.modal({
      backdrop: 'static',
      keyboard: false,
    });
  };

  reactivationAjaxHandler = () => {
    console.log('clicked up Relist button ...');

    // DELSIT AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.ajaxFunction,
        delistId: this.deleteId,
      },
    })
      .done((res) => {
        console.log(res.ID);

        // CHECKING FOR LIST ID FROM AJAX BACKEND
        if (res.ID == this.deleteId) {
          alert(`The List (ID: ${res.ID}) has been Deleted Successfully!`);
        } else {
          alert(`${res}`);
        }
        // REFRESHING THE PAGE
        location.reload();
      })
      .fail((xhr, status, error) => {
        alert(`List Delete Failure: ${error}
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

export default ProfileListDelete;
