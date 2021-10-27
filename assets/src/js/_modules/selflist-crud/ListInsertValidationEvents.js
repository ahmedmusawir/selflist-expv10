import $ from 'jquery';
import ListInsertUiDataParent from './ListInsertUiDataParent';
// Using commonjs
// require('jquery-validation');
// require('jquery-validation/dist/additional-methods.js');
// Using ESM
import 'jquery-validation';
import 'jquery-validation/dist/additional-methods.js';

class ListInsertValidationEvents extends ListInsertUiDataParent {
  constructor() {
    super();
    this.init();
    // The List Form
    this.theListForm = $('#list-insert-main-form');
    // The Form Submit button is now list-user-validation-button
    this.userValidationButton = $('#list-user-validation-button');
    // The Cancel button
    this.userValidationCancellButton = $('#list-insert-cancel-btn');
    // BUG FIX
    // Checking for City Insert form open or not. Cuz if it is open then clicking
    // the Submit button throws an error
    this.cityInsertFormBox = $('#city-insert-form-box');
    // The following is to focus on the City Insert Input
    this.cityInsertInput = $('#city-input-element');
    // Lister Terms & Conditions Input - Accept
    this.listerTerms = $('#lister-terms');
    // Setting up events
    this.setEvents();
    // ADDING LETTERS & SPACES ONLY METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'letters_and_space_only',
      function (value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
      },
      'Letters and spaces only please'
    );
    // ADDING LETTERS ONLY METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'letters_only',
      function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
      },
      'Letters only please'
    );
    // ADDING FACEBOOK URL ONLY METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'facebook',
      function (value, element) {
        return (
          this.optional(element) ||
          /^(http|https)\:\/\/(www.|)facebook.com\/.*/i.test(value)
        );
      },
      'Your Facebook Page URL please...'
    );
    // ADDING YELP URL ONLY METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'yelp',
      function (value, element) {
        return (
          this.optional(element) ||
          /^(http|https)\:\/\/(www.|)yelp.com\/.*/i.test(value)
        );
      },
      'Your Yelp Page URL please...'
    );
    // ADDING TWITTER URL ONLY METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'twitter',
      function (value, element) {
        return (
          this.optional(element) ||
          /^(http|https)\:\/\/(www.|)twitter.com\/.*/i.test(value)
        );
      },
      'Your Twitter Page URL please...'
    );
    // ADDING INSTAGRAM URL ONLY METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'instagram',
      function (value, element) {
        return (
          this.optional(element) ||
          /^(http|https)\:\/\/(www.|)instagram.com\/.*/i.test(value)
        );
      },
      'Your Instagram Page URL please...'
    );
    // ADDING LINKEDIN URL ONLY METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'linkedin',
      function (value, element) {
        return (
          this.optional(element) ||
          /^(http|https)\:\/\/(www.|)linkedin.com\/.*/i.test(value)
        );
      },
      'Your Linkedin Page URL please...'
    );

    // ADDING PROPER EMAIL VAIDATION
    $.validator.addMethod(
      'validate_email',
      function (value, element) {
        if (
          /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(
            value
          )
        ) {
          return true;
        } else {
          return false;
        }
      },
      'Please enter a valid Email.'
    );
    // RUNNING VALIDATE
    this.validateMainInsertForm();
  }

  init = () => {
    // console.log('LIST Form Validation New Loaded ...');
  };

  setEvents = () => {
    this.userValidationCancellButton.on('click', this.goBackToFormBox);
  };

  // MAIN FORM VALIDATION
  validateMainInsertForm = () => {
    this.theListForm.validate({
      onkeyup: function (element, event) {
        if (event.keyCode === 9 && this.elementValue(element) === '') {
          return;
        } else {
          this.element(element);
        }
      },
      rules: {
        'lister-description': {
          required: true,
          maxlength: 140,
          minlength: 3,
        },
        'lister-name': {
          required: true,
          maxlength: 20,
          minlength: 3,
        },
        'lister-phone': {
          required: true,
          phoneUS: true,
        },
        'lister-email': {
          required: true,
          validate_email: true,
          maxlength: 50,
          minlength: 1,
        },
        'lister-website': {
          url: true,
        },
        'lister-city': {
          required: true,
          letters_and_space_only: true,
          maxlength: 20,
          minlength: 3,
        },
        'lister-zip': {
          required: true,
          digits: true,
          maxlength: 5,
          minlength: 5,
        },
        'lister-state': {
          required: true,
          letters_only: true,
          maxlength: 2,
          minlength: 2,
        },
        'lister-facebook': {
          facebook: true,
        },
        'lister-yelp': {
          yelp: true,
        },
        'lister-twitter': {
          twitter: true,
        },
        'lister-instagram': {
          instagram: true,
        },
        'lister-linkedin': {
          linkedin: true,
        },
      },
      submitHandler: (form, event) => {
        event.preventDefault();
        this.getListFormData();
        // console.log(this.socialFacebook);
        if (
          !this.socialFacebook &&
          !this.socialYelp &&
          !this.socialInstagram &&
          !this.socialLinkedin &&
          !this.socialTwitter
        ) {
          alert('You must have at least one Social Link');
        } else if (!this.cityInsertFormBox.hasClass('d-none')) {
          alert('Please insert a City or hit cancel!');
          // SCROLL TO TOP
          window.scrollTo(0, 0);
          this.cityInsertInput.trigger('focus');
          // this.cityInsertInput.focus();
        } else if (this.listerTerms.prop('checked') !== true) {
          alert('Please Accept Our Terms & Conditions!');
          // SCROLL TO TOP
          this.listerTerms.trigger('focus');
        } else {
          // OPEN THE USER VALIDATION SCREEN
          this.displayValidationBox();
        }
      },
    });
  };

  goBackToFormBox = () => {
    // SCROLL TO TOP
    window.scrollTo(0, 0);
    // REMOVING LIST FORM BOX
    this.listInsertFormBox.removeClass('d-none');
    // DISPLAYING USER VALIDATION BOX
    this.userValidationBox.addClass('d-none');
  };
}

export default ListInsertValidationEvents;
