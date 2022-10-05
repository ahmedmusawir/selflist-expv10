import $ from 'jquery';
import { selectize } from 'selectize';

class FakeListPopupLogin {
  constructor() {
    this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'make_cookie_and_redirect_ajax';
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

    // INITIALIZE UP SELECTIZE
    if ($('#select-main-cats').length) {
      this.selectMainCats = $('#select-main-cats').selectize({
        sortField: 'text',
        onType: function (text) {
          if (!this.currentResults.items.length) {
            alert('Make NEW GRANDE');
            // alert('List not found! Please create new Grande');
          }
        },
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectizeMain = this.selectMainCats[0].selectize;
    }
    if ($('#select-primo-cats').length) {
      this.selectPrimoCats = $('#select-primo-cats').selectize({
        sortField: 'text',
        onType: function (text) {
          // console.log($('#select-main-cats').text());
          if ($('#select-main-cats').text() === '') {
            alert('List GRANDE');
          } else if (!this.currentResults.items.length) {
            alert('Make NEW PRIMO');
          }
        },
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectizePrimo = this.selectPrimoCats[0].selectize;
    }
    if ($('#select-secondo-cats').length) {
      this.selectSecondoCats = $('#select-secondo-cats').selectize({
        sortField: 'text',
        onType: function (text) {
          if ($('#select-primo-cats').text() === '') {
            alert('List Grande & Primo');
          } else if (!this.currentResults.items.length) {
            alert('Make NEW SECONDO');
          }
        },
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectizeSecondo = this.selectSecondoCats[0].selectize;
    }
    if ($('#select-terzo-cats').length) {
      this.selectTerzoCats = $('#select-terzo-cats').selectize({
        sortField: 'text',
        onType: function (text) {
          if ($('#select-secondo-cats').text() === '') {
            alert('List Grande, Primo & Secondo');
          } else if (!this.currentResults.items.length) {
            alert('Make NEW TERZO');
          }
        },
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectizeTerzo = this.selectTerzoCats[0].selectize;
    }

    // ADDING STATE & CITY & SETTING UP THE CONTROL ELEMENT
    // Setting up States
    if ($('#select-all-states').length) {
      this.selectAllStates = $('#select-all-states').selectize({
        sortField: 'text',
        onType: function (text) {
          if (!this.currentResults.items.length) {
            alert('List Situs');
          }
        },
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectAllStateCtrl = this.selectAllStates[0].selectize;
    }
    // Setting up Cities
    if ($('#select-all-cities').length) {
      this.selectAllCities = $('#select-all-cities').selectize({
        sortField: 'text',
        onType: function (text) {
          if ($('#select-all-states').text() === '') {
            alert('List Situs');
          } else if (!this.currentResults.items.length) {
            alert('List NEW MARKET');
          }
        },
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectAllCityCtrl = this.selectAllCities[0].selectize;
    }

    // COLLECTING ELEMENTS
    this.button = $('#fake-list-insert-popup-login-btn');
    this.setEvents();
  }

  getListCats = () => {
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
  };

  getListStateCity = () => {
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

  init = () => {
    console.log('Fake List Popup Login ...');
  };

  setEvents = () => {
    this.button.on('click', this.clickHandler);
  };

  clickHandler = () => {
    console.log('clicked up Fake List Login');
    // COLLECTING FORM DATA
    this.getListCats();
    this.getListStateCity();
    this.getListFormData();

    // Categories List
    const mainCatId = this.currentMainId;
    const mainCatName = this.currentMainCatName;
    const primoCatId = this.currentPrimoId;
    const primoCatName = this.currentPrimoCatName;
    const secondoCatId = this.currentSecondoId;
    const secondoCatName = this.currentSecondoCatName;
    const terzoCatId = this.currentTerzoId;
    const terzoCatName = this.currentTerzoCatName;

    // Contact Info Vars
    const name = this.contactName;
    const listTitle = `This List Posted by: ${name}`;
    const description = this.listDescription;
    const phone = this.contactPhone;
    const email = this.contactEmail;
    const site = this.contactWebsite;

    // State & City Taxonomy IDs
    const stateId = this.cityId;
    const stateName = this.contactState;
    const cityId = this.stateId;
    const cityName = this.contactCity;

    // Social Media URLs
    const facebook = this.socialFacebook;
    const yelp = this.socialYelp;
    const instagram = this.socialInstagram;
    const linkedin = this.socialLinkedin;
    const twitter = this.socialTwitter;
    const youtube = this.socialYoutube;

    // PREPARING FORM DATA FOR REST API
    let newPostData = {
      title: listTitle,
      content: description,
      mainCatId,
      mainCatName,
      primoCatId,
      primoCatName,
      secondoCatId,
      secondoCatName,
      terzoCatId,
      terzoCatName,
      stateId,
      stateName,
      cityId,
      cityName,
      name, // ACF Item
      phone, // ACF Item
      email, // ACF Item
      site, // ACF Item
      facebook, // ACF Item
      yelp, // ACF Item
      instagram, // ACF Item
      linkedin, // ACF Item
      twitter, // ACF Item
      youtube, // ACF Item
    };

    // ADDING FAKE LIST PAGE USER DATA INTO SESSION STORAGE TO FILL UP
    // LIST PAGE AFTER SIGNUP
    sessionStorage.setItem('fakeListPageUserData', JSON.stringify(newPostData));

    // AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.ajaxFunction,
        newPostData,
      },
    })
      .done((res) => {
        console.info(res);
        console.log('Awesome! ... Ajax Success');
      })
      .fail((res) => {
        console.error('Sorry ... Ajax failed');
        console.error(res);
      })
      .always(() => {
        // REDIRECT TO PREVIEW PAGE
        // window.location.href = '/list-signup/';
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };
}

export default FakeListPopupLogin;
