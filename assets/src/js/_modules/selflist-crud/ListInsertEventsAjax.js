import $ from 'jquery';
import { selectize } from 'selectize';
import ListInsertUiDataParent from './ListInsertUiDataParent';

/**
 This is a child class of ListInsertUiEvents and uses the selectize library. This one
 Inserts the the List Insert Form data into the WP DB via the REST API. This inserts selectize data, normal form data and ACF data into the WP DB
 */

class ListInsertEventsAjax extends ListInsertUiDataParent {
  constructor() {
    super();
    // this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'list_insert_ajax';
    // COLLECTING ELEMENTS
    this.listInsertButton = $('#list-insert-submit-btn');
    this.catDisplayUiBox = $('#cat-display-ui-box');
    this.catSelectBox = $('#category-choice-box');
    // SETTING EVENTS
    this.setEvents();
  }

  init = () => {
    console.log('ListInsertEventsAjax - Insert Post');
  };

  setEvents = () => {
    this.listInsertButton.on('click', this.clickInsertListHandler);
  };

  clickInsertListHandler = () => {
    // console.log('List Submit Clicked');

    // COLLECTING FORM DATA
    this.getCategoryData();
    this.getStateCity();
    this.getListFormData();

    // Categories List
    const mainCatId = this.currentMainId;
    const primoCatId = this.currentPrimoId;
    const secondoCatId = this.currentSecondoId;
    const terzoCatId = this.currentTerzoId;

    // Contact Info Vars
    const name = this.contactName;
    const listTitle = `This List Posted by: ${name}`;
    const description = this.listDescription;
    const phone = this.contactPhone;
    const email = this.contactEmail;
    const site = this.contactWebsite;

    // State & City Taxonomy IDs
    const stateId = this.cityId;
    const cityId = this.stateId;

    // Social Media URLs
    const facebook = this.socialFacebook;
    const yelp = this.socialYelp;
    const instagram = this.socialInstagram;
    const linkedin = this.socialLinkedin;
    const twitter = this.socialTwitter;
    const youtube = this.socialYoutube;

    // UNIT TESTNG Debugging Output
    console.log(`DESCRIPTION: ${description}`);
    console.log(`NAME: ${name}`);
    console.log(`PHONE: ${phone}`);
    console.log(`EMAIL: ${email}`);
    console.log(`WEBSITE: ${site}`);
    console.log(`FACEBOOK: ${facebook}`);
    console.log(`YELP: ${yelp}`);
    console.log(`INSTAGRAM: ${instagram}`);
    console.log(`LINKEDIN: ${linkedin}`);
    console.log(`TWITTER: ${twitter}`);
    console.log(`YOUTUBE: ${youtube}`);

    // PREPARING FORM DATA FOR REST API
    let newPostData = {
      title: listTitle,
      content: description,
      status: 'pending',
      mainCatId,
      primoCatId,
      secondoCatId,
      terzoCatId,
      stateId,
      cityId,
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

    // UNIT TESTING debugging info
    // console.log('newPostData: ', newPostData);

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
        // REMOVING CAT DATA FROM THE LOCAL STORAGE FOR CLEANUP
        localStorage.removeItem('catData');
        // ADDING INSERTED DATA INTO LOCALSTORAGE FOR PREVIEW PAGE
        localStorage.setItem('newListData', JSON.stringify(res));
        // REMOVING RELIST DATA FROM SESSION STORAGE
        sessionStorage.removeItem('relistData');
      })
      .fail((res) => {
        console.error('Sorry ... Ajax failed');
        console.error(res);
      })
      .always(() => {
        // REDIRECT TO PREVIEW PAGE
        window.location.href = '/list-preview/';
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });

    // RESET FORM (NOT NECESSARY CUZ NOW THERE IS A PAGE REFRESH)
    this.selectizeMain.clear();
    this.selectizePrimo.clear();
    this.selectizeSecondo.clear();
    this.selectizeTerzo.clear();
    $('#lister-name').val('');
    $('#lister-address').val('');
    $('#lister-description').val();
  };
}

export default ListInsertEventsAjax;
