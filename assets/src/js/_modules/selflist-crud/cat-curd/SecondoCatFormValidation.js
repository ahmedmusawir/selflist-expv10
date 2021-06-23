import $ from 'jquery';
import CatFormValdationParent from './CatFormValidationParent';

class SecondoCatFromValidation extends CatFormValdationParent {
  constructor() {
    super();
    // COLLECTING ELEMENTS
    // This is the User Validation Button "Submit" on Main Cat Insert From
    this.secondoCatUserValidationBtn = $('#secondo-cat-user-validation-btn');
    // This is the Cancel button on the Use Validation Popup
    this.secondoCatUserValidationCancelBtn = $(
      '#secondo-cat-insert-cancel-btn'
    );
    // This is the User Validation popup box
    this.secondoCatUserValidationBox = $('#secondo-cat-user-validation-box');
    // This is the secondo category insert form container
    this.secondoCatInsertFormBox = $('#secondo-cat-insert-box');

    // ENABLE FORM VALIDATION
    this.validateSecondoCatForm();
    // SETTING EVENTS
    this.setEvents();
  }

  setEvents = () => {
    // this.secondoCatUserValidationBtn.on('click', this.catValidationHandler);
    this.secondoCatUserValidationCancelBtn.on(
      'click',
      this.catUserValidationCancelHandler
    );
  };
}

export default SecondoCatFromValidation;
