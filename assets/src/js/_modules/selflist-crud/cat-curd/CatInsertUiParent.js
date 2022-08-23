import $ from 'jquery';
import CatSelectDataParent from '../CatSelectDataParent';

class CatInsertUiParent extends CatSelectDataParent {
  constructor() {
    super();

    // this.init();
    // This is the main list insert form container.
    // Common for all Category insert UI/UX
    this.listInsertFormBox = $('#create-new-list-box');
  }

  init = () => {
    console.log('OOP Cat INSERT UI...');
  };

  catNewHandler = () => {
    // COLLECTING THE SELECTIZED IDS
    const currentMainId = this.selectizeMain.getValue();
    const currentPrimoId = this.selectizePrimo.getValue();
    const currentSecondoId = this.selectizeSecondo.getValue();
    const currentTerzoId = this.selectizeTerzo.getValue();

    // REMOVING THE MAIN LIST INSERT FORM BOX, COMMON FOR ALL
    this.listInsertFormBox.addClass('d-none');

    // DISPLAYING MAIN CAT INSERT FORM BOX, NO RESTRICTIONS
    if (this.mainCatInsertFormBox) {
      this.mainCatInsertFormBox.removeClass('d-none');
    }
    // DISPLAYING PRIMO CAT INSERT FORM BOX, MUST: MAIN CAT
    if (this.primoCatInsertFormBox) {
      this.displayPrimoCatInserForm(currentMainId);
    }
    // DISPLAYING SECONDO CAT INSERT FORM, MUST: MAIN & PRIMO
    if (this.secondoCatInsertFormBox) {
      this.displaySecondoCatInsertFormBox(currentMainId, currentPrimoId);
    }
    // DISPLAYING TERZO CAT INSERT FORM, MUST: MAIN, PRIMO & SECONDO
    if (this.terzoCatInsertFormBox) {
      this.displayTerzoCatInsertFormBox(
        currentMainId,
        currentPrimoId,
        currentSecondoId
      );
    }
  };

  displayPrimoCatInserForm = (currentMainId) => {
    if (!currentMainId) {
      alert('List New Grande');
      this.listInsertFormBox.removeClass('d-none');
    } else {
      // DISPLAY PRIMO INSERT FORM
      this.primoCatInsertFormBox.removeClass('d-none');

      // COLLECTING SELECTED TEXT
      const currentMainItem = this.selectizeMain.getItem(currentMainId);
      const currentMainText = currentMainItem[0].innerText;
      // console.log(currentMainId);
      // console.log(currentMainText);

      // ADDING VALUE TO MAIN CATEGORY TEXT IN THE PRIMO INSERT FORM
      $('#primo-main-cat').text(currentMainText);
    }
  };

  displaySecondoCatInsertFormBox = (currentMainId, currentPrimoId) => {
    if (!currentMainId || !currentPrimoId) {
      alert('List Grande & Primo');
      this.listInsertFormBox.removeClass('d-none');
    } else {
      // DISPLAY SECONDO INSERT FORM
      this.secondoCatInsertFormBox.removeClass('d-none');

      // COLLECTING SELECTED TEXT
      const currentMainItem = this.selectizeMain.getItem(currentMainId);
      const currentMainText = currentMainItem[0].innerText;
      const currentPrimoItem = this.selectizePrimo.getItem(currentPrimoId);
      const currentPrimoText = currentPrimoItem[0].innerText;

      // ADDING VALUE TO MAIN CATEGORY TEXT IN THE PRIMO INSERT FORM
      $('#secondo-main-cat').text(currentMainText);
      $('#secondo-primo-cat').text(currentPrimoText);
    }
  };

  displayTerzoCatInsertFormBox = (
    currentMainId,
    currentPrimoId,
    currentSecondoId
  ) => {
    if (!currentMainId || !currentPrimoId || !currentSecondoId) {
      alert('List Grande, Primo & Secondo');
      this.listInsertFormBox.removeClass('d-none');
    } else {
      // DISPLAY TERZO INSERT FORM
      this.terzoCatInsertFormBox.removeClass('d-none');

      // COLLECTING SELECTED TEXT
      const currentMainItem = this.selectizeMain.getItem(currentMainId);
      const currentMainText = currentMainItem[0].innerText;
      const currentPrimoItem = this.selectizePrimo.getItem(currentPrimoId);
      const currentPrimoText = currentPrimoItem[0].innerText;
      const currentSecondoItem =
        this.selectizeSecondo.getItem(currentSecondoId);
      const currentSecondoText = currentSecondoItem[0].innerText;

      // ADDING VALUE TO MAIN CATEGORY TEXT IN THE PRIMO INSERT FORM
      $('#terzo-main-cat').text(currentMainText);
      $('#terzo-primo-cat').text(currentPrimoText);
      $('#terzo-secondo-cat').text(currentSecondoText);
    }
  };

  catValidationCancelHandler = () => {
    this.listInsertFormBox.removeClass('d-none');

    if (this.mainCatInsertFormBox) {
      this.mainCatInsertFormBox.addClass('d-none');
    }
    if (this.primoCatInsertFormBox) {
      this.primoCatInsertFormBox.addClass('d-none');
    }
    if (this.secondoCatInsertFormBox) {
      this.secondoCatInsertFormBox.addClass('d-none');
    }
    if (this.terzoCatInsertFormBox) {
      this.terzoCatInsertFormBox.addClass('d-none');
    }
  };
}

export default CatInsertUiParent;
