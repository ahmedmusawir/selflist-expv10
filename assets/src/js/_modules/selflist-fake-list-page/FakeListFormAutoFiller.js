import $ from 'jquery';
import CatSelectDataParent from '../selflist-crud/CatSelectDataParent';

class FakeListFormAutoFiller extends CatSelectDataParent {
  constructor() {
    super();
    this.init();
    // COLLECTING ELEMENTS
    this.button = $('#univ-load-more-btn');
    this.fillListInsertForm();
  }

  init = () => {
    console.log('Fake List Form Autofiller ...');
    // FAKE LIST PAGE VARS
    this.fakeMainCatId;
    this.fakeMainCatText;
    this.fakePrimoCatId;
    this.fakePrimoCatText;
    this.fakeSecondoCatId;
    this.fakeSecondoCatText;
    this.fakeTerzoCatId;
    this.fakeTerzoCatText;

    // FAKE CITY & STATE VARS
    this.fakeStateId;
    this.fakeState;
    this.fakeCityId;
    this.fakeCity;

    // COLLECTING ELEMENTS
    this.listInsertMainForm = $('#list-insert-main-form');
    this.content = $('#lister-description');
    this.contactName = $('#lister-name');
    this.contactPhone = $('#lister-phone');
    this.contactEmail = $('#lister-email');
    this.contactWebsite = $('#lister-website');
    this.socialFacebook = $('#lister-facebook');
    this.socialYelp = $('#lister-yelp');
    this.socialInstagram = $('#lister-instagram');
    this.socialLinkedin = $('#lister-linkedin');
    this.socialYoutube = $('#lister-youtube');
    this.socialTwitter = $('#lister-twitter');
  };

  fillCatsStateCity = () => {
    // FILLING GRANDE
    if (this.selectizeMain) {
      // ADD OPTIONS FOR MAIN SELECT NEED TO RE-DECLARE CUZ ...
      // The dropdown options are not loaded until the input is clicked. So,
      // the setValue() function cannot find any options to display
      const selectMainOptions = {
        value: this.fakeMainCatId,
        text: this.fakeMainCatText,
      };
      this.selectizeMain.addOption(selectMainOptions);
      // SETTING THE VALUES TO MAIN SELECT
      // The 'true' means in silent mode which doesn't invoke any selectize event
      // When I used it without the 'true' it caused error by invoking CatSelectionEvents.js
      this.selectizeMain.setValue(this.fakeMainCatId, true);
    }

    // SELECTIZE PRIMO
    // Also, checking for the ID so that undefined doesn't show up in the form
    if (this.selectizePrimo && this.fakePrimoCatId) {
      // ADD OPTIONS FOR PRIMO SELECT NEED TO RE-DECLARE CUZ ...
      const selectPrimoOptions = {
        value: this.fakePrimoCatId,
        text: this.fakePrimoCatText,
      };
      this.selectizePrimo.addOption(selectPrimoOptions);
      // SETTING THE VALUES TO PRIMO SELECT
      this.selectizePrimo.setValue(this.fakePrimoCatId, true);
    }

    // SELECTIZE SECONDO
    // Also, checking for the ID so that undefined doesn't show up in the form
    if (this.selectizePrimo && this.fakeSecondoCatId) {
      // ADD OPTIONS FOR SECONDO SELECT NEED TO RE-DECLARE CUZ ...
      const selectSecondoOptions = {
        value: this.fakeSecondoCatId,
        text: this.fakeSecondoCatText,
      };
      this.selectizeSecondo.addOption(selectSecondoOptions);
      // SETTING THE VALUES TO SECONDO SELECT
      this.selectizeSecondo.setValue(this.fakeSecondoCatId, true);
    }

    // SELECTIZE TERZO
    // Also, checking for the ID so that undefined doesn't show up in the form
    if (this.selectizeTerzo && this.fakeTerzoCatId) {
      // ADD OPTIONS FOR TERZO SELECT NEED TO RE-DECLARE CUZ ...
      const selectTerzoOptions = {
        value: this.fakeTerzoCatId,
        text: this.fakeTerzoCatText,
      };
      this.selectizeTerzo.addOption(selectTerzoOptions);
      // SETTING THE VALUES TO TERZO SELECT
      this.selectizeTerzo.setValue(this.fakeTerzoCatId, true);
    }
    // SELECTIZE STATE
    // console.log('FAKE SELECTIZE STATE:', this.selectAllStateCtrl);

    if (this.selectAllStateCtrl && this.fakeStateId) {
      // SETTING THE VALUES TO TERZO SELECT
      // This time adding options is not necessary cuz the state data is already
      // present since it's hard coded data. But for the others where data is
      // dynamic, adding option is a must
      // ADD OPTIONS FOR STATE SELECT NEED TO RE-DECLARE CUZ ...
      const selectStateOptions = {
        value: this.fakeStateId,
        text: this.fakeState,
      };
      this.selectAllStateCtrl.addOption(selectStateOptions);
      // SETTING THE VALUES TO STATE SELECT
      this.selectAllStateCtrl.setValue(this.fakeStateId, true);
    }
    // SELECTIZE CITY
    // console.log('FAKE SELECTIZE CITY:', this.selectAllCityCtrl);

    if (this.selectAllCityCtrl && this.fakeCityId) {
      // ADD OPTIONS FOR CITY SELECT NEED TO RE-DECLARE CUZ ...
      const selectCityOptions = {
        value: this.fakeCityId,
        text: this.fakeCity,
      };
      this.selectAllCityCtrl.addOption(selectCityOptions);
      // SETTING THE VALUES TO CITY SELECT
      this.selectAllCityCtrl.setValue(this.fakeCityId, true);
    }
  };

  fillListInsertForm = () => {
    const fakeListPageUserData = JSON.parse(
      sessionStorage.getItem('fakeListPageUserData')
    );
    // console.log('FAKE LIST PAGE DATA: ', fakeListPageUserData);

    // FILLING INSERT FORM FROM CONTENT TO SOCIAL
    if (fakeListPageUserData) {
      // FILLING VARIABLES FOR CATS TO CITY
      this.fakeMainCatId = fakeListPageUserData.mainCatId;
      this.fakeMainCatText = fakeListPageUserData.mainCatName;
      this.fakePrimoCatId = fakeListPageUserData.primoCatId;
      this.fakePrimoCatText = fakeListPageUserData.primoCatName;
      this.fakeSecondoCatId = fakeListPageUserData.secondoCatId;
      this.fakeSecondoCatText = fakeListPageUserData.secondoCatName;
      this.fakeTerzoCatId = fakeListPageUserData.terzoCatId;
      this.fakeTerzoCatText = fakeListPageUserData.terzoCatName;

      this.fakeStateId = fakeListPageUserData.stateId;
      this.fakeState = fakeListPageUserData.stateName;
      this.fakeCityId = fakeListPageUserData.cityId;
      this.fakeCity = fakeListPageUserData.cityName;

      // FILLING FORM FROM CATS TO CITY
      this.fillCatsStateCity();

      // FILLING FORM FROM CONTENT TO SOCIAL
      this.content.val(fakeListPageUserData.content);
      this.contactName.val(fakeListPageUserData.name);
      this.contactPhone.val(fakeListPageUserData.phone);
      this.contactEmail.val(fakeListPageUserData.email);
      this.contactWebsite.val(fakeListPageUserData.site);
      this.socialFacebook.val(fakeListPageUserData.facebook);
      this.socialYelp.val(fakeListPageUserData.yelp);
      this.socialInstagram.val(fakeListPageUserData.instagram);
      this.socialLinkedin.val(fakeListPageUserData.linkedin);
      this.socialTwitter.val(fakeListPageUserData.twitter);
      this.socialYoutube.val(fakeListPageUserData.youtube);
    }
  };
}

export default FakeListFormAutoFiller;
