import $ from 'jquery';

class CatInsertEventAjaxParent {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    // This is the main list insert form container
    this.listInsertFormBox = $('#create-new-list-box');
    // This is the final categories display in the Main List Insert Form
    this.createdCategoriesDisplayBox = $('#cat-display-ui-box');
    // This is the category select dropdown on the main List Insert Page
    this.listInsertCatChoiceBox = $('#category-choice-box');
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = '';
    // AJAX SUCCESS MESSAGE
    this.ajaxSuccessMessage = `
    <div class='alert alert-success rounded-0' role='alert'>
      Success!
    </div>
    `;
  }

  init = () => {
    // STARTING WEB WORKER
    this.workerFile =
      selflistData.root_url + '/wp-content/themes/_webworkers/WebWorker.js';
    this.worker = new Worker(this.workerFile);
  };

  catSubmitHandler = (e) => {
    e.stopImmediatePropagation();

    // AJAX DATA POINTS DECLARED
    let mainCat;
    let primoCat;
    let secondoCat;
    let terzoCat;

    // MAIN CAT DATA SET
    if (this.mainCatUserValidationBox) {
      this.ajaxFunction = 'main_cat_insert_ajax';

      mainCat = $('#main-input-main-cat').val();
      primoCat = $('#main-input-primo-cat').val();
      secondoCat = $('#main-input-secondo-cat').val();
      terzoCat = $('#main-input-terzo-cat').val();
      // LOWER CASING THE CAT VALUES
      // mainCat = $('#main-input-main-cat').val().toLowerCase();
      // primoCat = $('#main-input-primo-cat').val().toLowerCase();
      // secondoCat = $('#main-input-secondo-cat').val().toLowerCase();
      // terzoCat = $('#main-input-terzo-cat').val().toLowerCase();
    }
    // PRIMO CAT DATA SET
    if (this.primoCatUserValidationBox) {
      this.ajaxFunction = 'primo_cat_insert_ajax';

      mainCat = $('#primo-main-cat').text();
      primoCat = $('#primo-input-primo-cat').val();
      secondoCat = $('#primo-input-secondo-cat').val();
      terzoCat = $('#primo-input-terzo-cat').val();
    }
    // SECONDO CAT DATA SET
    if (this.secondoCatUserValidationBox) {
      this.ajaxFunction = 'secondo_cat_insert_ajax';

      mainCat = $('#secondo-main-cat').text();
      primoCat = $('#secondo-primo-cat').text();
      secondoCat = $('#secondo-input-secondo-cat').val();
      terzoCat = $('#secondo-input-terzo-cat').val();
    }
    // TERZO CAT DATA SET
    if (this.terzoCatUserValidationBox) {
      this.ajaxFunction = 'terzo_cat_insert_ajax';

      mainCat = $('#terzo-main-cat').text();
      primoCat = $('#terzo-primo-cat').text();
      secondoCat = $('#terzo-secondo-cat').text();
      terzoCat = $('#terzo-input-terzo-cat').val();
    }

    // CATEGORY DATA ENTRY INTO DB VIA AJAX
    // console.log(this.ajaxFunction);

    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        mainCat,
        primoCat,
        secondoCat,
        terzoCat,
        action: this.ajaxFunction,
      },
    })
      .done((res) => {
        // console.log(res);
        if (res.main_cat || res.primo_cat || res.secondo_cat || res.terzo_cat) {
          console.log(res);
          console.log('Ajax Main Cat Insert Success!');
          // STORING CAT DATA IN LOCAL STORAGE
          localStorage.setItem('catData', JSON.stringify(res));
          // UPDATING INDEX DB DATA VIA WEB WORKER
          this.worker.postMessage('Fetch Cats');
          // MAKING THE UI AFTER CATEGORY CREATION
          this.makeUiAfterCatCreation();
        } else {
          $('#ajax-failed-message-1').append(res);
          $('#ajax-failed-message-2').append(res);
          $('#ajax-failed-message-3').append(res);
          $('#ajax-failed-message-4').append(res);
        }
      })
      .fail((err) => {
        console.log('Ajax Failed With...:');
        console.log(err);
      })
      .always(() => {
        // console.log('Ajax Cat Insert Complete');
      });
  };

  makeUiAfterCatCreation = () => {
    // $('#ajax-failed-message').append(this.ajaxSuccessMessage);
    $(this.ajaxSuccessMessage).insertBefore('#cat-display-ui-box');
    // COLLECTING CAT DATA FROM LOCAL STORAGE
    const catData = JSON.parse(localStorage.getItem('catData'));
    // DISPLAY DATA IN THE MAIN CAT DISPLAY UI BOX
    // Display Main Cat after Cat Insert Success
    if (catData.main_cat) {
      const grandeMessage = `${catData.main_cat} [Grande]`;
      $('#main-cat-display').text(grandeMessage);
    } else {
      const mainCatMissingMessage = '[No Grande]';
      $('#main-cat-display').text(mainCatMissingMessage);
    }
    // Display Primo Cat after Cat Insert Success
    if (catData.primo_cat) {
      const primoMessage = `${catData.primo_cat} [Primo]`;
      $('#primo-cat-display').text(primoMessage);
    } else {
      const primoCatMissingMessage = '[No Primo]';
      $('#primo-cat-display').text(primoCatMissingMessage);
    }
    // Display Secondo Cat after Cat Insert Success
    if (catData.secondo_cat) {
      const secondoMessage = `${catData.secondo_cat} [Secondo]`;
      $('#secondo-cat-display').text(secondoMessage);
    } else {
      const secondoCatMissingMessage = '[No Secondo]';
      $('#secondo-cat-display').text(secondoCatMissingMessage);
    }
    // Display Terzo Cat after Cat Insert Success
    if (catData.terzo_cat) {
      const terzoMessage = `${catData.terzo_cat} [Terzo]`;
      $('#terzo-cat-display').text(terzoMessage);
    } else {
      const terzoCatMissingMessage = '[No Terzo]';
      $('#terzo-cat-display').text(terzoCatMissingMessage);
    }
    // REMOVE VALIDATION BOX
    // Main Category Validation Box Check
    if (this.mainCatUserValidationBox) {
      this.mainCatUserValidationBox.addClass('d-none');
    }
    // Primo Category Validation Box Check
    if (this.primoCatUserValidationBox) {
      this.primoCatUserValidationBox.addClass('d-none');
    }
    // Secondo Category Validation Box check
    if (this.secondoCatUserValidationBox) {
      this.secondoCatUserValidationBox.addClass('d-none');
    }
    // Terzo Cetory Validation Box check
    if (this.terzoCatUserValidationBox) {
      this.terzoCatUserValidationBox.addClass('d-none');
    }
    // DISPLAY THE DISPLAY BOX
    this.listInsertFormBox.removeClass('d-none');
    this.createdCategoriesDisplayBox.removeClass('d-none');
    this.listInsertCatChoiceBox.addClass('d-none');
  };
}

export default CatInsertEventAjaxParent;
