import $ from 'jquery';
import CatInsertEventAjaxParent from './CatInsertEventAjaxParent.js';

class SecondoCatInsertEvent extends CatInsertEventAjaxParent {
  constructor() {
    super();
    // this.init();
    // COLLECTING ELEMENTS
    // This is the "Create Categories" button in the User Validation popup
    this.submitSecondoCatBtn = $('#secondo-cat-insert-submit-btn');
    // This is the User Validation popup box
    this.secondoCatUserValidationBox = $('#secondo-cat-user-validation-box');
    // This is the secondo category insert form container
    this.secondoCatInsertFormBox = $('#secondo-cat-insert-box');

    // SETTING EVENTS
    this.setEvents();
  }

  init = () => {
    console.log('Secondo Cat Insert Events ...');
  };

  setEvents = () => {
    this.submitSecondoCatBtn.on('click', this.catSubmitHandler);
  };
}

export default SecondoCatInsertEvent;
