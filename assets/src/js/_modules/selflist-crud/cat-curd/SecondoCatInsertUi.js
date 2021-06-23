import $ from 'jquery';
import CatInsertUiParent from './CatInsertUiParent';

class SecondoCatInsertUi extends CatInsertUiParent {
  constructor() {
    super();
    // COLLECTING ELEMENTS FROM PAGE
    // This is the new Secondo Category Insert button. Top input right button "New Catetory"
    this.secondoCatNewBtn = $('#secondo-cat-new-btn');
    // This is the secondo category insert form container
    this.secondoCatInsertFormBox = $('#secondo-cat-insert-box');
    // This is the Cancel button on the Main Cat Insert Form (at the bottom)
    this.secondoCatValidationCancelBtn = $(
      '#secondo-cat-validation-cancel-btn'
    );

    // SETTING EVENTS
    this.setEvents();
  }

  setEvents = () => {
    this.secondoCatNewBtn.on('click', this.catNewHandler);
    this.secondoCatValidationCancelBtn.on(
      'click',
      this.catValidationCancelHandler
    );
  };
}

export default SecondoCatInsertUi;
