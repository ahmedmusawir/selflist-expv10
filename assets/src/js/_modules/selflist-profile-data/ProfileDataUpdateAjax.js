import $ from 'jquery';
import { get, set } from 'idb-keyval';

class ProfileDataUpdateAjax {
  constructor() {
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'profile_data_insert_ajax';
    // COLLECTING ELEMENTS
    this.ProfileDataInsertButton = $('#profile-info-update-button');
    this.contactName = $('#current-member-name');
    this.contactEmail = $('#current-member-email');
    this.contactPhone = $('#lister-phone');
    this.contactWebsite = $('#lister-website');
    this.socialFacebook = $('#lister-facebook');
    this.socialYelp = $('#lister-yelp');
    this.socialInstagram = $('#lister-instagram');
    this.socialLinkedin = $('#lister-linkedin');
    this.socialTwitter = $('#lister-twitter');
    this.socialYoutube = $('#lister-youtube');
  }

  profileDataAjaxHandler = () => {
    // console.log('List Submit Clicked');

    // Contact Info Vars
    const phone = this.contactPhone.val();
    const site = this.contactWebsite.val();

    // Social Media URLs
    const facebook = this.socialFacebook.val();
    const yelp = this.socialYelp.val();
    const instagram = this.socialInstagram.val();
    const linkedin = this.socialLinkedin.val();
    const youtube = this.socialYoutube.val();
    const twitter = this.socialTwitter.val();

    // UNIT TESTNG Debugging Output
    console.log(`PHONE: ${phone}`);
    console.log(`WEBSITE: ${site}`);
    console.log(`FACEBOOK: ${facebook}`);
    console.log(`YELP: ${yelp}`);
    console.log(`INSTAGRAM: ${instagram}`);
    console.log(`LINKEDIN: ${linkedin}`);
    console.log(`YOUTUBE: ${youtube}`);
    console.log(`TWITTER: ${twitter}`);

    // PREPARING FORM DATA FOR REST API
    let newPostData = {
      phone, // ACF Item
      site, // ACF Item
      facebook, // ACF Item
      yelp, // ACF Item
      instagram, // ACF Item
      linkedin, // ACF Item
      youtube, // ACF Item
      twitter, // ACF Item
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
        // REMOVEING FAKE LIST PAGE DATA
        sessionStorage.removeItem('fakeListPageUserData');
        // ADDING DATA INTO INDEXED DB
        set('info', res)
          .then(() => {
            console.log('saved info into IndexedDB ... After update');
          })
          .catch(console.warn);
        // PAGE RELOAD TO REFLECT DATA UPDATE
        location.reload();
      })
      .fail((res) => {
        alert('Sorry update not successful ... Ajax failed');
        console.error('Sorry ... Ajax failed');
        console.error(res);
      })
      .always(() => {
        // REDIRECT TO PREVIEW PAGE
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };
}

export default ProfileDataUpdateAjax;
