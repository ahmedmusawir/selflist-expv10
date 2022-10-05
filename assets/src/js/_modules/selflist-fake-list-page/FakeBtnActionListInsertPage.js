import $ from 'jquery';

class FakeBtnActionListInsertPage {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    this.buttonGrande = $('#fake-main-cat-new-btn');
    this.buttonPrimo = $('#fake-primo-cat-new-btn');
    this.buttonSecondo = $('#fake-secondo-cat-new-btn');
    this.buttonTerzo = $('#fake-terzo-cat-new-btn');
    this.buttonSitus = $('#fake-city-new-btn');
    // THE MODAL
    this.fakeListBtnModal = $('#the-FAKE-LIST-BTN-modal');
    this.setEvents();
  }

  init = () => {
    // console.log('Fake Buttons for Fake List page ...');
  };

  setEvents = () => {
    this.buttonGrande.on('click', this.clickHandler);
    this.buttonPrimo.on('click', this.clickHandler);
    this.buttonSecondo.on('click', this.clickHandler);
    this.buttonTerzo.on('click', this.clickHandler);
    this.buttonSitus.on('click', this.clickHandler);
  };

  clickHandler = () => {
    this.fakeListBtnModal.modal({
      // backdrop: 'static',
      // keyboard: false,
    });
  };
}

export default FakeBtnActionListInsertPage;
