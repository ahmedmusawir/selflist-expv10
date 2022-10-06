import $ from 'jquery';
import FakeListPopupLogin from './FakeListPopupLogin';

class FakeListPopupSignup extends FakeListPopupLogin {
  constructor() {
    super();
    this.init();

    // COLLECTING ELEMENTS
    this.buttonSignup = $('#fake-list-insert-popup-signup-btn');
    this.setEvents();
  }

  init = () => {
    // console.log('Fake List Popup Signup ...');
  };

  setEvents = () => {
    this.buttonSignup.on('click', this.clickHandler);
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
    // const listTitle = `This List Posted by: ${name}`;
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
        window.location.href = '/list-signup/';
      });
  };
}

export default FakeListPopupSignup;
