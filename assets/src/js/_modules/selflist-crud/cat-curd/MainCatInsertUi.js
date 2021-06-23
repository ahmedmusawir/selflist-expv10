import $ from 'jquery';
import CatInsetUiParent from './CatInsertUiParent';

class MainCatInsertUi extends CatInsetUiParent {
  constructor() {
    super();
    // COLLECTING ELEMENTS FROM PAGE
    // This is the new Main Category Insert button. Top input right button "New Catetory"
    this.mainCatNewBtn = $('#main-cat-new-btn');
    // This is the main category insert form container
    this.mainCatInsertFormBox = $('#main-cat-insert-box');
    // This is the Cancel button on the Main Cat Insert Form (at the bottom)
    this.mainCatValidationCancelBtn = $('#main-cat-validation-cancel-btn');

    // SETTING EVENTS
    this.setEvents();
  }

  setEvents = () => {
    this.mainCatNewBtn.on('click', this.catNewHandler);
    this.mainCatValidationCancelBtn.on(
      'click',
      this.catValidationCancelHandler
    );
  };
}

export default MainCatInsertUi;
