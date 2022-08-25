import $ from 'jquery';
import CatInsertEventAjaxParent from './CatInsertEventAjaxParent.js';

class TerzoCatInsertEvent extends CatInsertEventAjaxParent {
  constructor() {
    super();
    // this.init();
    // COLLECTING ELEMENTS
    // This is the "Create Categories" button in the User Validation popup
    this.submitTerzoCatBtn = $('#terzo-cat-insert-submit-btn');
    // This is the User Validation popup box
    this.terzoCatUserValidationBox = $('#terzo-cat-user-validation-box');
    // This is the terzo category insert form container
    this.terzoCatInsertFormBox = $('#terzo-cat-insert-box');

    // SETTING EVENTS
    this.setEvents();
  }

  init = () => {
    console.log('Terzo Cat Insert Events ...');
  };

  setEvents = () => {
    this.submitTerzoCatBtn.on('click', this.catSubmitHandler);
  };
}

export default TerzoCatInsertEvent;
