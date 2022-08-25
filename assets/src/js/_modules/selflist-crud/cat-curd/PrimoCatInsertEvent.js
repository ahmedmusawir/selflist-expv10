import $ from 'jquery';
import CatInsertEventAjaxParent from './CatInsertEventAjaxParent.js';

class PrimoCatInsertEvent extends CatInsertEventAjaxParent {
  constructor() {
    super();
    // this.init();
    // COLLECTING ELEMENTS
    // This is the "Create Categories" button in the User Validation popup
    this.submitPrimoCatBtn = $('#primo-cat-insert-submit-btn');
    // This is the User Validation popup box
    this.primoCatUserValidationBox = $('#primo-cat-user-validation-box');
    // This is the primo category insert form container
    this.primoCatInsertFormBox = $('#primo-cat-insert-box');

    // SETTING EVENTS
    this.setEvents();
  }

  init = () => {
    console.log('Primo Cat Insert Events ...');
  };

  setEvents = () => {
    this.submitPrimoCatBtn.on('click', this.catSubmitHandler);
  };
}

export default PrimoCatInsertEvent;
