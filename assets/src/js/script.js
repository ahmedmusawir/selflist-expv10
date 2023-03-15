// PRODUCTION CODE HERE
import ReactDOM from 'react-dom';
import React from 'react';
import HomePageBlock from './_modules/react/HomePageBlock';

// import ReactAppTheme from './_modules/react/ReactAppTheme';

// LIST OR CATEGORY SEARCH RELATED
import SelflistPostSearch from './_modules/SelflistPostSearch';
// import SelflistCatSearchJson from './_modules/SelflistCatSearchJson';
import SelflistCatSearchIndxDb from './_modules/SelflistCatSearchIndxDb';
// LIST INSERT RELATED
import CatSelectDataParent from './_modules/selflist-crud/CatSelectDataParent';
import CatSelectionEvents from './_modules/selflist-crud/CatSelectionEvents';
import ListInsertUiDataParent from './_modules/selflist-crud/ListInsertUiDataParent';
import ListInsertValidationEvents from './_modules/selflist-crud/ListInsertValidationEvents';
import ListInsertEventsAjax from './_modules/selflist-crud/ListInsertEventsAjax';
import ListPreviewEvents from './_modules/selflist-crud/ListPreviewEvents';
import ListFormAutoFiller from './_modules/selflist-crud/ListFormAutoFiller';
// LIST PAYMENT RELATED
import PaymentSummaryDateTimePicker from './_modules/selfList-payments/PaymentSummaryDateTimePicker';
import PaymentSummaryUiEvents from './_modules/selfList-payments/PaymentSummaryUiEvents';
import PaymentSubmitAjaxEvents from './_modules/selfList-payments/PaymentSubmitAjaxEvent';
// LIST PUBLISH RELATED
import PublishListSummaryDisplay from './_modules/selfList-payments/PublishListSummaryDisplay';
// CATEGORY DATA LOCALIZED VIA INDEXED DB AND WEB WORKER FROM REST
import CatToIndexDbWebWorker from './_modules/selflist-webworker/CatToIndexDbWebWorker';
// CATEGORY INSERT UI RELATED
import CatInsertUiParent from './_modules/selflist-crud/cat-curd/CatInsertUiParent';
import MainCatInsertUi from './_modules/selflist-crud/cat-curd/MainCatInsertUi';
import PrimoCatInsertUi from './_modules/selflist-crud/cat-curd/PrimoCatInsertUi';
import SecondoCatInsertUi from './_modules/selflist-crud/cat-curd/SecondoCatInsertUi';
import TerzoCatInsertUi from './_modules/selflist-crud/cat-curd/TerzoCatInsertUi';
// CATEGORY FORM VALIDATION RELATED
import CatFormValidationParent from './_modules/selflist-crud/cat-curd/CatFormValidationParent';
import MainCatFormValidation from './_modules/selflist-crud/cat-curd/MainCatFormValidation';
import PrimoCatFormValidation from './_modules/selflist-crud/cat-curd/PrimoCatFormValidation';
import SecondoCatFormValidation from './_modules/selflist-crud/cat-curd/SecondoCatFormValidation';
import TerzoCatFormValidation from './_modules/selflist-crud/cat-curd/TerzoCatFormValidation';
// CATEGORY INSERT EVENT AJAX RELATED
import CatInsertEventAjaxParent from './_modules/selflist-crud/cat-curd/CatInsertEventAjaxParent';
import MainCatInsertEvent from './_modules/selflist-crud/cat-curd/MainCatInsertEvent';
import PrimoCatInsertEvent from './_modules/selflist-crud/cat-curd/PrimoCatInsertEvent';
import SecondoCatInsertEvent from './_modules/selflist-crud/cat-curd/SecondoCatInsertEvent';
import TerzoCatInsertEvent from './_modules/selflist-crud/cat-curd/TerzoCatInsertEvent';
// CITY STATE FILTER RELATED
import CiteStateUiEvents from './_modules/selflist-city-state/CityStateUiEvents';
import CityStateAjaxEvents from './_modules/selflist-city-state/CityStateAjaxEvents';
import CityLoadRestApiEvents from './_modules/selflist-city-state/CityLoadRestApiEvents';
import CiteStateInsertUiEvents from './_modules/selflist-city-state/CityStateInsertUiEvents';
import CityFormValidationEvents from './_modules/selflist-city-state/CityFormValidationEvents';
import CityInsertAjaxEvents from './_modules/selflist-city-state/CityInsertAjaxEvents';
// DELIST, RELIST & DELETE ON USER PROFILE LIST ARCHIVE
import ProfileDelist from './_modules/selflist-delist-relist/ProfileDelist';
import ProfileRelist from './_modules/selflist-delist-relist/ProfileRelist';
import ProfileListDelete from './_modules/selflist-delist-relist/ProfileListDelete';
import ListInsertRelist from './_modules/selflist-delist-relist/ListInsertRelist';
// MEMBER PROFILE ADDITIONAL INFO
import ProfileAdditionalDataUi from './_modules/selflist-profile-data/ProfileAdditionalDataUi';
import ProfileDataUpdateAjax from './_modules/selflist-profile-data/ProfileDataUpdateAjax';
import ProfileAdditionalDataValidation from './_modules/selflist-profile-data/ProfileAdditionalDataValidation';
import ProfileDataToIndexDb from './_modules/selflist-profile-data/ProfileDataToIndexDb';
import ProfilePassReset from './_modules/selflist-profile-data/ProfilePassReset';
// HMU RELATED
import HmuLinkMaker from './_modules/selflist-hmu/HmuLinkMaker';
// FLAG RELATED
import FlagListButtonUi from './_modules/selflist-flag/FlagListButtonUi';
import FlagListFormAjax from './_modules/selflist-flag/FlagListFormAjax';
// SYNC WP USERS WITH CHAT ENGINE
import CreateWPUsersInChatEngine from './_modules/chat-engine/CreateWPUsersInChatEngine';
// SIGNUP REDIRECT COOKIE CREATION FOR NON-LOGGED IN USERS TO TRACK THE ORIGIN PAGE
// import SignupRedirect from './_modules/selflist-signup-redirect/SignupRedirect';
// THE FAKE LIST PAGE FOR THE NON MEMBERS
import FakeListInsertEventsAjax from './_modules/selflist-fake-list-page/FakeListInsertEventsAjax';
import FakeListInsertUiDataParent from './_modules/selflist-fake-list-page/FakeListInsertUiDataParent';
import FakeListInsertValidationEvents from './_modules/selflist-fake-list-page/FakeListInsertValidationEvents';
import FakeListBtnModalPopup from './_modules/selflist-fake-list-page/FakeListBtnModalPopup';
import FakeListPopupLogin from './_modules/selflist-fake-list-page/FakeListPopupLogin';
import FakeListPopupSignup from './_modules/selflist-fake-list-page/FakeListPopupSignup';
import FakeListFormAutoFiller from './_modules/selflist-fake-list-page/FakeListFormAutoFiller';

class App {
  constructor() {
    console.info('ES6 Script Initialized!');

    /**
     * REACT ON SELFLIST FRONTEND
     */
    // LUNCHING REACT APP THEME ONE
    const appThemeOne = document.getElementById(
      'SELFLIST-HOME-PAGE-DETAIL-BLOCK'
    );
    if (appThemeOne) {
      ReactDOM.render(<HomePageBlock />, appThemeOne);
      // ReactDOM.render(<ReactAppTheme />, appThemeOne);
    }

    /**
     * LIST OR CATEGORY SEARCH RELATED CLASSES
     */

    // Selflist Search Module
    // new SelflistSearch();
    // Selflist Category Search Filter - non REST
    // new SelflistCatSearch();
    // Post Item Search Filter - non REST
    new SelflistPostSearch();
    // List Category Search from JSON file
    // new SelflistCatSearchJson();
    // List or Category Search from Indx Db
    new SelflistCatSearchIndxDb();

    // SELFLIST LIST INSERT PAGE CAT SELECT DROPDOWNS
    new CatSelectDataParent();
    new CatSelectionEvents();

    /**
     * LIST INSERT RELATED CLASSES
     */
    // LIST FORM AUTO FILLER W/ PROFILE DATA
    new ListFormAutoFiller();
    // LIST INSERT PAGE MAIN POST INSERT EVENTS (a child of ListInsertUiEvents)
    new ListInsertEventsAjax();
    // LIST INSERT VALIDATION EVENTS (a child of CatSelectionEvents)
    new ListInsertValidationEvents();
    // LIST INSERT UI DATA EVENTS (a child of CatSelectionEvents)
    new ListInsertUiDataParent();
    // LIST PREVIEW EVENTS
    new ListPreviewEvents();

    /**
     * LIST PAYMENT & PUBLISH RELATED CLASSES
     */
    // LIST PAYMENT SUMMARY PAGE
    new PaymentSummaryDateTimePicker();
    new PaymentSummaryUiEvents();
    new PaymentSubmitAjaxEvents();
    // LIST PUBLISH SUMMARY PAGE
    new PublishListSummaryDisplay();

    /**
     * CATEGORY RELATED CLASSES
     */
    // Category Data load to Indexed DB via
    // [WORDPRESS_FOLDER]/WebWorker.js
    // We can send different message to it to launch different tasks
    new CatToIndexDbWebWorker();
    // Category UI/UX
    new CatInsertUiParent();
    new MainCatInsertUi();
    new PrimoCatInsertUi();
    new SecondoCatInsertUi();
    new TerzoCatInsertUi();

    // Category Form Validation
    new CatFormValidationParent();
    new MainCatFormValidation();
    new PrimoCatFormValidation();
    new SecondoCatFormValidation();
    new TerzoCatFormValidation();

    // Category Insert Ajax
    new CatInsertEventAjaxParent();
    new MainCatInsertEvent();
    new PrimoCatInsertEvent();
    new SecondoCatInsertEvent();
    new TerzoCatInsertEvent();

    // City State Related
    new CiteStateUiEvents();
    new CityStateAjaxEvents();
    new CityLoadRestApiEvents();
    new CiteStateInsertUiEvents();
    new CityFormValidationEvents();
    new CityInsertAjaxEvents();

    // Delist, Relist & Delete
    new ProfileDelist();
    new ProfileRelist();
    new ProfileListDelete();
    new ListInsertRelist();

    // Member Profile Additional Info
    new ProfileAdditionalDataUi();
    new ProfileDataUpdateAjax();
    new ProfileAdditionalDataValidation();
    new ProfileDataToIndexDb();
    new ProfilePassReset();

    // HMU Email Link Maker
    new HmuLinkMaker();

    // Flag Related
    new FlagListButtonUi();
    new FlagListFormAjax();

    // Creating WP Users in Chat Engine
    // new CreateWPUsersInChatEngine();

    // Signup Redirect for List Creation page for non-members
    // new SignupRedirect();

    // Fake List Page For Non Members
    new FakeListInsertEventsAjax();
    new FakeListInsertUiDataParent();
    new FakeListInsertValidationEvents();
    new FakeListBtnModalPopup();
    new FakeListPopupLogin();
    new FakeListPopupSignup();
    new FakeListFormAutoFiller();
  }
}

const app = new App();
