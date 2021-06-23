import $ from 'jquery';
import { get, set } from 'idb-keyval';
import ProfileDataToDbAjax from './ProfileDataUpdateAjax';

class ProfileDataToIndexDb extends ProfileDataToDbAjax {
  constructor() {
    super();
    // COLLECTING UNIQUE PAGE ELEMENT
    // This is done so that the Data re-write doesn't happen with
    // every other page load. This limits it to only the Profile Page
    this.infoContainer = $('#additional-profile-data-box');
    this.init();
  }

  init = () => {
    // LOADING INITIAL DATA INTO INDX DB AS SOON AS THE PROFILE PAGE LOADS
    // This is mainly to keep the data handy in case there is no data update.
    // Data will be ready to be loaded into the List Insert Page automatically.

    // Contact Info Vars
    const name = this.contactName.text();
    const email = this.contactEmail.text();
    const phone = this.contactPhone.val();
    const site = this.contactWebsite.val();

    // Social Media URLs
    const facebook = this.socialFacebook.val();
    const yelp = this.socialYelp.val();
    const instagram = this.socialInstagram.val();
    const linkedin = this.socialLinkedin.val();
    const googlePlus = this.socialGooglePlus.val();
    const twitter = this.socialTwitter.val();

    const profileObj = {
      name,
      email,
      phone,
      site,
      facebook,
      googlePlus,
      instagram,
      linkedin,
      twitter,
      yelp,
    };

    // console.info(profileObj);

    // UPLOADING INTO INDEX DB
    // Adding profile data into IndexedDB only when the Profile page is loaded
    if (this.infoContainer.length) {
      set('info', profileObj)
        .then(() => {
          console.log(
            'saved info into IndexedDB ... first time [ProfileDataToIndexDb.js]'
          );
        })
        .catch((err) => {
          console.error(
            'Failed to insert Profile Data into indexedDb: [ProfileDataToIndexDb.js]',
            err
          );
        });
    }

    // UNIT TESTNG Debugging Output
    // console.log(`NAME: ${name}`);
    // console.log(`PHONE: ${phone}`);
    // console.log(`EMAIL: ${email}`);
    // console.log(`WEBSITE: ${site}`);
    // console.log(`FACEBOOK: ${facebook}`);
    // console.log(`YELP: ${yelp}`);
    // console.log(`INSTAGRAM: ${instagram}`);
    // console.log(`LINKEDIN: ${linkedin}`);
    // console.log(`GOOGLEPLUS: ${googlePlus}`);
    // console.log(`TWITTER: ${twitter}`);
  };
}

export default ProfileDataToIndexDb;
