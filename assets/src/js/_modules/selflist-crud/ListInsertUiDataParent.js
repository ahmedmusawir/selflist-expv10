import $ from 'jquery';
import CatSelectDataParent from './CatSelectDataParent';
// require('jquery-validation');

class ListInsertUiDataParent extends CatSelectDataParent {
  constructor() {
    super();

    // this.init();
    // This is the main list insert form container.
    // Common for all Category insert UI/UX
    this.listInsertFormBox = $('#create-new-list-box');
    // The User Validation Box
    this.userValidationBox = $('#list-insert-user-validation-box');
    // Category Selectized dropdowns
    this.catSelectBox = $('#category-choice-box');
    // Category Display UI box that shows up at the top once a new category is created
    this.catDisplayUiBox = $('#cat-display-ui-box');
    // State City Taxonomy Selectized dropdowns
    this.stateCitySelectBox = $('#state-city-choice-box');
    // State City Display Box - after city insert
    this.stateCityDisplayUiBox = $('#city-display-ui-box');
    // Declaring Catagory VARIABLES
    this.currentMainId;
    this.currentMainCatName;
    this.currentPrimoId;
    this.currentPrimoCatName;
    this.currentSecondoId;
    this.currentSecondoCatName;
    this.currentTerzoId;
    this.currentTerzoCatName;
    // Declaring State & City Taxonomy VARIABLES
    this.cityId;
    this.stateId;
    // Declaring rest of the List Form VARIABLES
    this.listDescription;
    this.contactName;
    this.contactPhone;
    this.contactEmail;
    this.contactWebsite;
    this.contactState;
    this.contactCity;
    this.socialFacebook;
    this.socialYelp;
    this.socialYoutube;
    this.socialLinkedin;
    this.socialTwitter;
  }

  init = () => {
    console.log('OOP List INSERT UI...');
  };

  displayValidationBox = () => {
    // GET CATEGORY DATA
    this.getCategoryData();
    // GET STATE & CITY DATA
    this.getStateCity();
    // GET REST OF THE LIST FORM DATA
    this.getListFormData();
    // ADD CAT DATA TO THE VALIDATION SCREEN
    $('#list-user-validation-main-cat').text(this.currentMainCatName);
    $('#list-user-validation-primo-cat').text(this.currentPrimoCatName);
    $('#list-user-validation-secondo-cat').text(this.currentSecondoCatName);
    $('#list-user-validation-terzo-cat').text(this.currentTerzoCatName);
    // ADD CONTACT DATA TO THE VALIDATION SCREEN
    $('#list-user-validation-description').text(this.listDescription);
    $('#list-user-validation-name').text(this.contactName);
    $('#list-user-validation-phone').text(this.contactPhone);
    $('#list-user-validation-website').text(this.contactWebsite);
    $('#list-user-validation-city').text(this.contactCity);
    $('#list-user-validation-state').text(this.contactState);
    // ADD SOCIAL DATA TO THE VALIDATION SCREEN
    $('#list-user-validation-facebook').text(this.socialFacebook);
    $('#list-user-validation-yelp').text(this.socialYelp);
    $('#list-user-validation-instagram').text(this.socialInstagram);
    $('#list-user-validation-linkedin').text(this.socialLinkedin);
    $('#list-user-validation-twitter').text(this.socialTwitter);
    $('#list-user-validation-youtube').text(this.socialYoutube);

    // CHECKING FOR MISSING MAIN CATEGORY
    if (this.currentMainId) {
      // CHECKING FOR MISSING STATE
      if (this.stateId) {
        // CHECKING FOR MISSING CITY
        if (this.cityId) {
          // SCROLL TO TOP
          window.scrollTo(0, 0);
          // REMOVING LIST FORM BOX
          this.listInsertFormBox.addClass('d-none');
          // DISPLAYING USER VALIDATION BOX
          this.userValidationBox.removeClass('d-none');
        } else {
          alert('Please choose a City ...');
          // SCROLL TO TOP
          window.scrollTo(0, 0);
          this.selectAllCityCtrl.focus();
        }
      } else {
        alert('Please choose a State ...');
        // SCROLL TO TOP
        window.scrollTo(0, 0);
        this.selectAllStateCtrl.trigger('focus');
      }
    } else {
      alert('Please choose a Main Category ...');
      // SCROLL TO TOP
      window.scrollTo(0, 0);
      this.selectizeMain.focus();
    }
  };

  getCategoryData = () => {
    // CHECKING FOR CAT SELECT DROPDOWN BOX
    if (this.catSelectBox.hasClass('d-none')) {
      console.log('get cats from local storage');
      const catDataJson = JSON.parse(localStorage.getItem('catData'));
      console.log(catDataJson);
      // COLLECTING MAIN CAT SELECTED ID
      this.currentMainId = catDataJson.main_cat_id;
      this.currentMainCatName = catDataJson.main_cat;

      console.log('Current Main Cat ID: ', this.currentMainId);

      // COLLECTED PRIMO CAT SELECTED ID
      this.currentPrimoId = catDataJson.primo_cat_id;
      this.currentPrimoCatName = catDataJson.primo_cat;

      console.log('Current Primo ID: ', this.currentPrimoId);

      // COLLECTING SECONDO CAT SELECTED ID
      this.currentSecondoId = catDataJson.secondo_cat_id;
      this.currentSecondoCatName = catDataJson.secondo_cat;
      console.log('Current Secondo Cat ID: ', this.currentSecondoId);

      // COLLECTED TERZO CAT SELECTED ID
      this.currentTerzoId = catDataJson.terzo_cat_id;
      this.currentTerzoCatName = catDataJson.terzo_cat;
      console.log('Current Terzo ID: ', this.currentTerzoId);
    }

    // CHECKING FOR CAT DISPLAY BOX
    if (this.catDisplayUiBox.hasClass('d-none')) {
      // COLLECTING MAIN CAT SELECTED ID
      this.currentMainId = this.selectizeMain.getValue();
      if (this.currentMainId) {
        const selectedMainItem = this.selectizeMain.getItem(this.currentMainId);
        this.currentMainCatName = selectedMainItem[0].innerText;
      }
      // console.log('Current Main Cat Name: ', this.currentMainCatName);
      // console.log('Current Main Cat ID: ', this.currentMainId);

      // COLLECTED PRIMO CAT SELECTED ID
      this.currentPrimoId = this.selectizePrimo.getValue();
      if (this.currentPrimoId) {
        const selectedPrimoItem = this.selectizePrimo.getItem(
          this.currentPrimoId
        );
        this.currentPrimoCatName = selectedPrimoItem[0].innerText;
      }

      // console.log('Current Primo Cat Name: ', this.currentPrimoCatName);
      // console.log('Current Primo ID: ', this.currentPrimoId);

      // COLLECTING SECONDO CAT SELECTED ID
      this.currentSecondoId = this.selectizeSecondo.getValue();
      if (this.currentSecondoId) {
        const selectedSecondoItem = this.selectizeSecondo.getItem(
          this.currentSecondoId
        );
        this.currentSecondoCatName = selectedSecondoItem[0].innerText;
      }

      // console.log('Current Secondo Cat Name: ', this.currentSecondoCatName);
      // console.log('Current Secondo Cat ID: ', this.currentSecondoId);

      // COLLECTED TERZO CAT SELECTED ID
      this.currentTerzoId = this.selectizeTerzo.getValue();
      if (this.currentTerzoId) {
        const selectedTerzoItem = this.selectizeTerzo.getItem(
          this.currentTerzoId
        );
        this.currentTerzoCatName = selectedTerzoItem[0].innerText;
      }

      // console.log('Current Terzo Cat Name: ', this.currentTerzoCatName);
      // console.log('Current Terzo ID: ', this.currentTerzoId);
    }
  };

  getStateCity = () => {
    // IF STATE & CITY CHOSEN FROM THE DROPDOWN
    if (this.stateCityDisplayUiBox.hasClass('d-none')) {
      this.stateId = this.selectAllStateCtrl.getValue();
      // GETTING STATE NAME (TEXT FROM SELECTIZE)
      if (this.stateId) {
        const currentStateItem = this.selectAllStateCtrl.getItem(this.stateId);
        this.contactState = currentStateItem[0].innerText;
      }

      this.cityId = this.selectAllCityCtrl.getValue();
      // GETTING CITY NAME (TEXT FROM SELECTIZE)
      if (this.cityId) {
        const currentCityItem = this.selectAllCityCtrl.getItem(this.cityId);
        this.contactCity = currentCityItem[0].innerText;
      }
    }
    // IF NEW CITY IS CREATED
    if (this.stateCitySelectBox.hasClass('d-none')) {
      const stateCityData = JSON.parse(sessionStorage.getItem('stateCityData'));
      this.stateId = stateCityData.state_id;
      this.contactState = stateCityData.state_name;
      this.cityId = stateCityData.new_city_id;
      this.contactCity = stateCityData.new_city_name;
    }
  };

  getListFormData = () => {
    // Collect values for rest of the List Form VARIABLES
    // (non category related)
    this.listDescription = $('#lister-description').val();
    this.contactName = $('#lister-name').val();
    this.contactPhone = $('#lister-phone').val();
    this.contactEmail = $('#lister-email').val();
    this.contactWebsite = $('#lister-website').val();
    this.socialFacebook = $('#lister-facebook').val();
    this.socialYelp = $('#lister-yelp').val();
    this.socialInstagram = $('#lister-instagram').val();
    this.socialLinkedin = $('#lister-linkedin').val();
    this.socialTwitter = $('#lister-twitter').val();
    this.socialYoutube = $('#lister-youtube').val();
  };
}

export default ListInsertUiDataParent;
