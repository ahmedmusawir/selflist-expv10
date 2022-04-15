import $ from 'jquery';
import { get, set } from 'idb-keyval';
import 'jquery-validation';
import 'jquery-validation/dist/additional-methods.js';
// import FlagListFormValidation from './FlagListFormValidation';

// class FlagListFormAjax extends FlagListFormValidation {
class FlagListFormAjax {
  constructor() {
    // super();
    this.init();
    // GLOBALS
    this.flagKey;
    this.flagListId;
    this.flagEmail;
    this.flagTitle;
    this.flagContent;
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'list_flag_ajax';
    // COLLECTING BUTTON
    this.flagListBtn = $('.flag-form-btn');
    this.flagAjaxSubmitBtn = $('.flag-ajax-submit-btn');
    this.flagTextArea = $('#flag-textarea');
    // COLLECTING FLAG FORM ELEMENT
    this.flagInsertForm = $('#flag-insert-form');
    // RUNNING METHODS
    // ADDING LETTERS & NUMBERS ONLY + NO NUMBER TO START -- METHOD TO JQ VALIDATION
    $.validator.addMethod(
      'lettersnumbersdotsonly',
      function (value, element) {
        return this.optional(element) || /^[A-Za-z][a-z0-9\. ]+$/i.test(value);
      },
      'Letters and numbers only please ... <br>(cannot begin with numbers.)'
    );
    this.validateFlagForm();
    // DISABLE ENTER KEY FOR FLAG FORM
    // Cuz Enter key invokes validation error
    this.disableEnterKeyInForm();
  }

  init = () => {
    // console.log('Flag submit Ajax');
  };

  disableEnterKeyInForm = () => {
    // THIS IS SO THAT IT WORKS FOR ALL BROWSERS
    $('form').on('keypress', (event) => {
      if (event.key == 13) {
        return false;
      } else if (event.keyIdentifier == 13) {
        return false;
      } else if (event.keyCode == 13) {
        return false;
      }
    });
  };

  // MAIN FORM VALIDATION
  validateFlagForm = () => {
    this.flagInsertForm.validate({
      onkeyup: function (element, event) {
        if (event.keyCode === 9 && this.elementValue(element) === '') {
          return;
        } else {
          this.element(element);
        }
      },
      rules: {
        'flag-textarea': {
          // required: true,
          maxlength: 140,
          minlength: 1,
          // lettersnumbersdotsonly: true,
        },
      },
      submitHandler: (form, event) => {
        event.preventDefault();
        // INSERT CITY WITH AJAX
        this.insertFlagDataAjaxHandler(event);
        // alert('Running Validation ... remove me');
      },
    });
  };

  insertFlagDataAjaxHandler = (e) => {
    this.flagKey = e.target.dataset.key;
    // JQUERY BUG!!
    // the following doesn't work! Use JS
    // let flagKey = $(e.target).data('key');

    // GET FLAG INFO DATA FROM INDEXED DB
    get(this.flagKey)
      .then((data) => {
        // PREPING LIST DATA
        this.flagTitle = `Flagged List ID: ${data.listId}`;
        this.flagContent = this.flagTextArea.val();
        this.flagListId = data.listId;
        this.flagEmail = data.email;

        // SETTING FLAG BTN STATUS FOR INDEX DB
        const flaggedList = {
          listId: this.flagListId,
          email: this.flagEmail,
          disabled: true,
        };

        // GETTING DATA READY FOR AJAX
        let newListData = {
          title: this.flagTitle,
          content: this.flagContent,
          email: this.flagEmail,
          listId: this.flagListId,
        };
        // AJAX CALL TO WP DB BEGINS
        $.ajax({
          url: this.ajaxUrl,
          type: 'POST',
          data: {
            action: this.ajaxFunction,
            newListData,
          },
        })
          .done((response) => {
            console.info(response);
            console.log('Awesome! ... Ajax Success');
            // ADDING INFO TO INDEX DB
            set(this.flagKey, flaggedList)
              .then(() => {
                console.log('Updated Disabled Status: ', this.flagKey);
                location.reload();
              })
              .catch(console.error);
          })
          .fail((response) => {
            console.error('Sorry ... Ajax failed');
            console.error('[FlagListFormAjax.js]', response);
          })
          .always(() => {
            // console.info('Ajax finished as always...');
          });
      })
      .catch(console.error);
  };
}

export default FlagListFormAjax;
