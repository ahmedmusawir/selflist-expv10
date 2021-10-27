import $ from 'jquery';
import { get, set } from 'idb-keyval';

class ListFormAutoFiller {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    this.listInsertMainForm = $('#list-insert-main-form');
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
    // GETTING PROFILE DATA FROM INDEXED DB
    this.memberProfileInfo;
    this.getProfileData();
  }

  init = () => {
    // console.log('List Auto Filler...');
  };

  getProfileData = () => {
    // Making sure that the Data load only happens when the following
    // Form element is present and nowhere else
    if (this.listInsertMainForm.length) {
      get('info')
        .then((data) => {
          // console.log('rawData: ', data);
          this.memberProfileInfo = data;
          // FILLING THE INSERT FORM
          this.fillListInsertForm();
        })
        .catch((err) => {
          console.error(
            'Failed to get Profile Data from indexedDb: [ListFormAutoFiller.js]',
            err
          );
        });
    }
  };

  fillListInsertForm = () => {
    // console.log('Form Filler: ', this.memberProfileInfo.name);
    // ADD CONTACT DATA TO THE VALIDATION SCREEN
    this.contactName.val(this.memberProfileInfo.name);
    this.contactPhone.val(this.memberProfileInfo.phone);
    this.contactEmail.val(this.memberProfileInfo.email);
    this.contactWebsite.val(this.memberProfileInfo.site);
    // ADD SOCIAL DATA TO THE VALIDATION SCREEN
    this.socialFacebook.val(this.memberProfileInfo.facebook);
    this.socialYelp.val(this.memberProfileInfo.yelp);
    this.socialInstagram.val(this.memberProfileInfo.instagram);
    this.socialLinkedin.val(this.memberProfileInfo.linkedin);
    this.socialYoutube.val(this.memberProfileInfo.youtube);
    this.socialTwitter.val(this.memberProfileInfo.twitter);
  };
}

export default ListFormAutoFiller;
