import $ from 'jquery';
import 'jquery-validation';
import 'jquery-validation/dist/additional-methods.js';

class ProfilePassReset {
  constructor() {
    this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'profile_pass_update_ajax';

    // COLLECTING ELEMENTS
    this.passResetForm = $('#password-reset-form');
    this.passConfirmInput = $('#lister-password-confirm');

    // CALLING TO VALIDATE
    this.validatePassResetForm();
  }

  init = () => {
    // console.log('Pass Reset ...');
  };

  // MAIN FORM VALIDATION
  validatePassResetForm = () => {
    this.passResetForm.validate({
      onkeyup: function (element, event) {
        if (event.keyCode === 9 && this.elementValue(element) === '') {
          return;
        } else {
          this.element(element);
        }
      },
      rules: {
        'lister-password': {
          required: true,
          minlength: 8,
        },
        'lister-password-confirm': {
          required: true,
          minlength: 8,
          equalTo: '#lister-password',
        },
      },
      submitHandler: (form, event) => {
        event.preventDefault();
        // PASS UPDATE AJAX CALLED
        this.updatePassAjax();
      },
    });
  };

  updatePassAjax = () => {
    // GET PASS VALUE
    const newPassword = this.passConfirmInput.val();
    // AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.ajaxFunction,
        newPassword,
      },
    })
      .done((res) => {
        console.info(res);
        console.log('Awesome! ... Ajax Success');

        // PAGE RELOAD TO REFLECT DATA UPDATE
        alert('Password Update Successful! You have to log back in...');
        location.reload();
      })
      .fail((res) => {
        alert('Sorry update not successful ... Ajax failed');
        console.error('Sorry ... Ajax failed');
        console.error(res);
      })
      .always(() => {
        // REDIRECT TO PREVIEW PAGE
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };
}

export default ProfilePassReset;
