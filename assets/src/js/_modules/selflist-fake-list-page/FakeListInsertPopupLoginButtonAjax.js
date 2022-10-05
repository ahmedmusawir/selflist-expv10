import $ from 'jquery';
// import { selectize } from 'selectize';
import FakeListInsertValidationEvents from './FakeListInsertValidationEvents';

class FakeListInsertPopupLoginButtonAjax extends FakeListInsertValidationEvents {
  constructor() {
    super();
    // this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'make_cookie_and_redirect_ajax';
    // COLLECTING ELEMENTS
    this.listInsertButton = $('#fake-list-insert-popup-login-btn');
    this.catDisplayUiBox = $('#cat-display-ui-box');
    this.catSelectBox = $('#category-choice-box');
    // SETTING SPINNER
    this.loadingSpinner = $('#LOADING-SPINNER');
    // SETTING EVENTS
    this.setEvents();
  }

  init = () => {
    console.log('FakeListInsertPopupLoginButtonAjax - Insert Post');
  };

  setEvents = () => {
    this.listInsertButton.on('click', this.clickInsertListHandler);
  };

  insertListHandler = () => {
    console.log('Fake List Modal Login Clicked');

    // COLLECTING FORM DATA
    // this.getCategoryData();
    // this.getStateCity();
    // this.getListFormData();

    // Categories List
    // const mainCatId = this.currentMainId;
    // const mainCatName = this.currentMainCatName;
    // const primoCatId = this.currentPrimoId;
    // const primoCatName = this.currentPrimoCatName;
    // const secondoCatId = this.currentSecondoId;
    // const secondoCatName = this.currentSecondoCatName;
    // const terzoCatId = this.currentTerzoId;
    // const terzoCatName = this.currentTerzoCatName;

    // Contact Info Vars
    // const name = this.contactName;
    // const listTitle = `This List Posted by: ${name}`;
    // const description = this.listDescription;
    // const phone = this.contactPhone;
    // const email = this.contactEmail;
    // const site = this.contactWebsite;

    // State & City Taxonomy IDs
    // const stateId = this.cityId;
    // const stateName = this.contactState;
    // const cityId = this.stateId;
    // const cityName = this.contactCity;

    // Social Media URLs
    // const facebook = this.socialFacebook;
    // const yelp = this.socialYelp;
    // const instagram = this.socialInstagram;
    // const linkedin = this.socialLinkedin;
    // const twitter = this.socialTwitter;
    // const youtube = this.socialYoutube;

    // UNIT TESTNG Debugging Output
    // console.log(`DESCRIPTION: ${description}`);
    // console.log(`NAME: ${name}`);
    // console.log(`PHONE: ${phone}`);
    // console.log(`EMAIL: ${email}`);
    // console.log(`WEBSITE: ${site}`);
    // console.log(`FACEBOOK: ${facebook}`);
    // console.log(`YELP: ${yelp}`);
    // console.log(`INSTAGRAM: ${instagram}`);
    // console.log(`LINKEDIN: ${linkedin}`);
    // console.log(`TWITTER: ${twitter}`);
    // console.log(`YOUTUBE: ${youtube}`);

    // PREPARING FORM DATA FOR REST API
    let newPostData = {
      title: listTitle,
      content: description,
      status: 'pending',
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
    // sessionStorage.setItem('fakeListPageUserData', JSON.stringify(newPostData));

    // UNIT TESTING debugging info
    // console.log('newPostData: ', newPostData);
    // this.loadingSpinner.removeClass('d-none');

    // RESET FORM (NOT NECESSARY CUZ NOW THERE IS A PAGE REFRESH)
    this.selectizeMain.clear();
    this.selectizePrimo.clear();
    this.selectizeSecondo.clear();
    this.selectizeTerzo.clear();
    // $('#lister-name').val('');
    $('#lister-description').val('');
  };
}

export default FakeListInsertPopupLoginButtonAjax;
