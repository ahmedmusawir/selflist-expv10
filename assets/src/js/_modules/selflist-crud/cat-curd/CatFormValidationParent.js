import $ from 'jquery';
// Using commonjs
// require('jquery-validation');
// require('jquery-validation/dist/additional-methods.js');
// Using ES6
import 'jquery-validation';
import 'jquery-validation/dist/additional-methods.js';

class CatFormValdationParent {
  constructor() {
    // this.init();
    // ADDING LETTERS & SPACES ONLY METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'lettersonly',
      function (value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
      },
      'Letters and spaces only please'
    );
    // ADDING LETTERS & NUMBERS ONLY + NO NUMBER TO START -- METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'lettersnumbersonly',
      function (value, element) {
        return (
          this.optional(element) || /^[A-Za-z][a-z0-9 ]+$/i.test(value)
          // this.optional(element) || /^[A-Za-z\-d ][a-z0-9 ]+$/i.test(value)
        );
      },
      'Letters and numbers only please ... cannot begin with numbers.'
    );
  }

  init = () => {
    console.log('MAIN CAT Form Val Test Loaded ...');
  };

  catUserValidationCancelHandler = () => {
    // console.log('main cancel');

    if (this.mainCatInsertFormBox) {
      // Displaying the insert form
      this.mainCatInsertFormBox.removeClass('d-none');
      // Maing the main cat user validation popup invisible
      this.mainCatUserValidationBox.addClass('d-none');
    }
    if (this.primoCatInsertFormBox) {
      // Displaying the insert form
      this.primoCatInsertFormBox.removeClass('d-none');
      // Maing the primo cat user validation popup invisible
      this.primoCatUserValidationBox.addClass('d-none');
    }
    if (this.secondoCatInsertFormBox) {
      // Displaying the insert form
      this.secondoCatInsertFormBox.removeClass('d-none');
      // Maing the secondo cat user validation popup invisible
      this.secondoCatUserValidationBox.addClass('d-none');
    }
    if (this.terzoCatInsertFormBox) {
      // Displaying the insert form
      this.terzoCatInsertFormBox.removeClass('d-none');
      // Maing the terzo cat user validation popup invisible
      this.terzoCatUserValidationBox.addClass('d-none');
    }
  };

  // MAIN FORM VALIDATION
  validateMainCatForm = () => {
    $('#main-cat-insert-form').validate({
      onkeyup: function (element, event) {
        if (event.keyCode === 9 && this.elementValue(element) === '') {
          return;
        } else {
          this.element(element);
        }
      },
      rules: {
        'main-input-main-cat': {
          maxlength: 25,
          minlength: 3,
          lettersnumbersonly: false,
        },
        'main-input-primo-cat': {
          maxlength: 20,
          minlength: 3,
          lettersnumbersonly: false,
        },
        'main-input-secondo-cat': {
          maxlength: 20,
          minlength: 3,
          lettersnumbersonly: false,
        },
        'main-input-terzo-cat': {
          maxlength: 20,
          minlength: 3,
          lettersnumbersonly: false,
        },
      },
      submitHandler: (form, event) => {
        event.preventDefault();
        // OPEN THE USER VALIDATION SCREEN
        this.getMainUserValidationScreen();
      },
    });
  };

  // MAIN USER VALIDATION
  getMainUserValidationScreen = () => {
    // Hiding the insert form
    this.mainCatInsertFormBox.addClass('d-none');
    // Maing the main cat user validation popup visible
    this.mainCatUserValidationBox.removeClass('d-none');

    // COLLECTING CAT INPUT DATA
    const mainCatInputValue = $('#main-input-main-cat').val();
    const primoCatInputValue = $('#main-input-primo-cat').val();
    const secondoCatInputValue = $('#main-input-secondo-cat').val();
    const terzoCatInputValue = $('#main-input-terzo-cat').val();

    // INSERTING INTO USER VALIDATION PAGE
    $('#main-input').text(mainCatInputValue);
    $('#primo-input').text(primoCatInputValue);
    $('#secondo-input').text(secondoCatInputValue);
    $('#terzo-input').text(terzoCatInputValue);
    // CLEANING UP AJAX ERROR MESSAGES
    $('#ajax-failed-message-1').html('');
  };

  // PRIMO FORM VALIDATION
  validatePrimoCatForm = () => {
    // console.log('Validating Primo Cat Form...');
    $('#primo-cat-insert-form').validate({
      onkeyup: function (element, event) {
        if (event.keyCode === 9 && this.elementValue(element) === '') {
          return;
        } else {
          this.element(element);
        }
      },
      rules: {
        // 'primo-input-main-cat': { lettersnumbersonly: false, maxlength: 25, minlength: 3 },
        'primo-input-primo-cat': {
          lettersnumbersonly: false,
          maxlength: 20,
          minlength: 3,
        },
        'primo-input-secondo-cat': {
          lettersnumbersonly: false,
          maxlength: 20,
          minlength: 3,
        },
        'primo-input-terzo-cat': {
          lettersnumbersonly: false,
          maxlength: 20,
          minlength: 3,
        },
      },
      submitHandler: (form, event) => {
        event.preventDefault();
        // OPEN THE USER VALIDATION SCREEN
        this.getPrimoUserValidationScreen();
      },
    });
  };

  // PRIMO USER VALIDATION
  getPrimoUserValidationScreen = () => {
    // Hiding the insert form
    this.primoCatInsertFormBox.addClass('d-none');
    // Maing the primo cat user validation popup visible
    this.primoCatUserValidationBox.removeClass('d-none');

    // COLLECTING CAT INPUT DATA
    const mainCatValue = $('#primo-main-cat').text();
    console.log(mainCatValue);
    const primoCatInputValue = $('#primo-input-primo-cat').val();
    console.log(primoCatInputValue);
    const secondoCatInputValue = $('#primo-input-secondo-cat').val();
    console.log(secondoCatInputValue);
    const terzoCatInputValue = $('#primo-input-terzo-cat').val();
    console.log(terzoCatInputValue);

    // INSERTING INTO USER VALIDATION PAGE
    $('#main-display-primo').text(mainCatValue);
    $('#primo-display-primo').text(primoCatInputValue);
    $('#secondo-display-primo').text(secondoCatInputValue);
    $('#terzo-display-primo').text(terzoCatInputValue);
    // CLEANING UP AJAX ERROR MESSAGES
    $('#ajax-failed-message-2').html('');
  };

  // SECONDO FORM VALIDATION
  validateSecondoCatForm = () => {
    // console.log('Validating Primo Cat Form...');
    $('#secondo-cat-insert-form').validate({
      onkeyup: function (element, event) {
        if (event.keyCode === 9 && this.elementValue(element) === '') {
          return;
        } else {
          this.element(element);
        }
      },
      rules: {
        'secondo-input-secondo-cat': {
          lettersnumbersonly: false,
          maxlength: 20,
          minlength: 3,
        },
        'secondo-input-terzo-cat': {
          lettersnumbersonly: false,
          maxlength: 20,
          minlength: 3,
        },
      },
      submitHandler: (form, event) => {
        event.preventDefault();
        // OPEN THE USER VALIDATION SCREEN
        this.getSecondoUserValidationScreen();
      },
    });
  };

  // SECONDO USER VALIDATION
  getSecondoUserValidationScreen = () => {
    // Hiding the insert form
    this.secondoCatInsertFormBox.addClass('d-none');
    // Maing the secondo cat user validation popup visible
    this.secondoCatUserValidationBox.removeClass('d-none');

    // COLLECTING CAT INPUT DATA
    const mainCatValue = $('#secondo-main-cat').text();
    // console.log(mainCatValue);
    const primoCatInputValue = $('#secondo-primo-cat').text();
    // console.log(primoCatInputValue);
    const secondoCatInputValue = $('#secondo-input-secondo-cat').val();
    // console.log(secondoCatInputValue);
    const terzoCatInputValue = $('#secondo-input-terzo-cat').val();
    // console.log(terzoCatInputValue);

    // INSERTING INTO USER VALIDATION PAGE
    $('#main-display-secondo').text(mainCatValue);
    $('#primo-display-secondo').text(primoCatInputValue);
    $('#secondo-display-secondo').text(secondoCatInputValue);
    $('#terzo-display-secondo').text(terzoCatInputValue);
    // CLEANING UP AJAX ERROR MESSAGES
    $('#ajax-failed-message-3').html('');
  };

  // TERZO FORM VALIDATION
  validateTerzoCatForm = () => {
    // console.log('Validating Primo Cat Form...');
    $('#terzo-cat-insert-form').validate({
      onkeyup: function (element, event) {
        if (event.keyCode === 9 && this.elementValue(element) === '') {
          return;
        } else {
          this.element(element);
        }
      },
      rules: {
        'terzo-input-terzo-cat': {
          lettersnumbersonly: false,
          maxlength: 20,
          minlength: 3,
        },
      },
      submitHandler: (form, event) => {
        event.preventDefault();
        // OPEN THE USER VALIDATION SCREEN
        this.getTerzoUserValidationScreen();
      },
    });
  };

  // TERZO USER VALIDATION
  getTerzoUserValidationScreen = () => {
    // Hiding the insert form
    this.terzoCatInsertFormBox.addClass('d-none');
    // Maing the terzo cat user validation popup visible
    this.terzoCatUserValidationBox.removeClass('d-none');

    // COLLECTING CAT INPUT DATA
    const mainCatValue = $('#terzo-main-cat').text();
    console.log(mainCatValue);
    const primoCatInputValue = $('#terzo-primo-cat').text();
    console.log(primoCatInputValue);
    const secondoCatInputValue = $('#terzo-secondo-cat').text();
    console.log(secondoCatInputValue);
    const terzoCatInputValue = $('#terzo-input-terzo-cat').val();
    console.log(terzoCatInputValue);

    // INSERTING INTO USER VALIDATION PAGE
    $('#main-display-terzo').text(mainCatValue);
    $('#primo-display-terzo').text(primoCatInputValue);
    $('#secondo-display-terzo').text(secondoCatInputValue);
    $('#terzo-display-terzo').text(terzoCatInputValue);
    // CLEANING UP AJAX ERROR MESSAGES
    $('#ajax-failed-message-4').html('');
  };
}

export default CatFormValdationParent;
