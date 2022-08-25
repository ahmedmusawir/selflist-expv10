import $ from 'jquery';
import CatInsertEventAjaxParent from './CatInsertEventAjaxParent.js';

class MainCatInsertEvent extends CatInsertEventAjaxParent {
  constructor() {
    super();
    // this.init();
    // COLLECTING ELEMENTS
    // This is the "Create Categories" button in the User Validation popup
    this.submitMainCatBtn = $('#main-cat-insert-submit-btn');
    // This is the User Validation popup box
    this.mainCatUserValidationBox = $('#main-cat-user-validation-box');
    // This is the main category insert form container
    this.mainCatInsertFormBox = $('#main-cat-insert-box');
    // SETTING EVENTS
    this.setEvents();
  }

  init = () => {
    console.log('Main Cat Insert Events ...');
  };

  setEvents = () => {
    this.submitMainCatBtn.on('click', this.catSubmitHandler);
  };
}

export default MainCatInsertEvent;
