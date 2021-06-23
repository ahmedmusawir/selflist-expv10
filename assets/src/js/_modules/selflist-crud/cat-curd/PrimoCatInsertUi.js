import $ from 'jquery';
import CatInsertUiParent from './CatInsertUiParent';

class PrimoCatInsertUi extends CatInsertUiParent {
  constructor() {
    super();
    // COLLECTING ELEMENTS FROM PAGE
    // This is the new Primo Category Insert button. Top input right button "New Catetory"
    this.primoCatNewBtn = $('#primo-cat-new-btn');
    // This is the primo category insert form container
    this.primoCatInsertFormBox = $('#primo-cat-insert-box');
    // This is the Cancel button on the Main Cat Insert Form (at the bottom)
    this.primoCatValidationCancelBtn = $('#primo-cat-validation-cancel-btn');

    // SETTING EVENTS
    this.setEvents();
  }

  setEvents = () => {
    this.primoCatNewBtn.on('click', this.catNewHandler);
    this.primoCatValidationCancelBtn.on(
      'click',
      this.catValidationCancelHandler
    );
  };
}

export default PrimoCatInsertUi;
