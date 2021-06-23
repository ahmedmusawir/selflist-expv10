import $ from 'jquery';
import CatFormValdationParent from './CatFormValidationParent';

class TerzoCatFromValidation extends CatFormValdationParent {
  constructor() {
    super();
    // COLLECTING ELEMENTS
    // This is the User Validation Button "Submit" on Main Cat Insert From
    this.terzoCatUserValidationBtn = $('#terzo-cat-user-validation-btn');
    // This is the Cancel button on the Use Validation Popup
    this.terzoCatUserValidationCancelBtn = $('#terzo-cat-insert-cancel-btn');
    // This is the User Validation popup box
    this.terzoCatUserValidationBox = $('#terzo-cat-user-validation-box');
    // This is the terzo category insert form container
    this.terzoCatInsertFormBox = $('#terzo-cat-insert-box');

    // ENABLING FORM VALIDATION
    this.validateTerzoCatForm();

    // SETTING EVENTS
    this.setEvents();
  }

  setEvents = () => {
    // this.terzoCatUserValidationBtn.on('click', this.catValidationHandler);
    this.terzoCatUserValidationCancelBtn.on(
      'click',
      this.catUserValidationCancelHandler
    );
  };
}

export default TerzoCatFromValidation;
