import $ from 'jquery';
import CatFormValdationParent from './CatFormValidationParent';

class MainCatFromValidation extends CatFormValdationParent {
  constructor() {
    super();
    // COLLECTING ELEMENTS
    // This is the User Validation Button "Submit" on Main Cat Insert From
    this.mainCatUserValidationBtn = $('#main-cat-user-validation-btn');
    // This is the Cancel button on the Use Validation Popup
    this.mainCatUserValidationCancelBtn = $('#main-cat-insert-cancel-btn');
    // This is the User Validation popup box
    this.mainCatUserValidationBox = $('#main-cat-user-validation-box');
    // This is the main category insert form container
    this.mainCatInsertFormBox = $('#main-cat-insert-box');

    // ENABLE FORM VALIDATION
    this.validateMainCatForm();

    // SETTING EVENTS
    this.setEvents();
  }

  setEvents = () => {
    // this.mainCatUserValidationBtn.on('click', this.catValidationHandler);
    this.mainCatUserValidationCancelBtn.on(
      'click',
      this.catUserValidationCancelHandler
    );
  };
}

export default MainCatFromValidation;
