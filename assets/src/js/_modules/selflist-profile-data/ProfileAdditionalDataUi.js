import $ from 'jquery';

class ProfileAdditionalDataUi {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    this.infoEditBtn = $('#additional-info-edit-btn');
    this.infoCancelBtn = $('#additional-info-cancel-btn');
    this.infoForm = $('#additional-info-form');

    this.infoUpdateBtn = $('#profile-info-update-button');
    this.passResetForm = $('#password-reset-form');
    this.passEditBtn = $('#password-edit-btn');
    this.passCancelBtn = $('#password-cancel-btn');
    this.passUpdateBtn = $('#profile-password-update-button');
    // SETTING EVENTS
    this.setEvents();
  }

  init = () => {
    // console.log('ProfileAdditionalDataUi...');
  };

  setEvents = () => {
    this.infoEditBtn.on('click', this.clickEditHandler);
    this.infoCancelBtn.on('click', this.clickCancelHandler);
    this.passEditBtn.on('click', this.clickPassEditHandler);
    this.passCancelBtn.on('click', this.clickPassCancelHandler);
  };

  clickPassEditHandler = () => {
    // this.passResetForm.css('border', '4px solid red');
    this.passResetForm.find('input').removeAttr('readonly');
    this.passCancelBtn.removeAttr('disabled');
    this.passEditBtn.attr('disabled', 'disabled');
    this.passUpdateBtn.removeAttr('disabled');
  };

  clickPassCancelHandler = () => {
    let yes = confirm('Did You Save?');

    if (yes) {
      this.passResetForm.find('input').attr('readonly', 'readonly');
      this.passCancelBtn.attr('disabled', 'disabled');
      this.passEditBtn.removeAttr('disabled');
      this.passUpdateBtn.attr('disabled', 'disabled');
    } else {
      return;
    }
  };

  clickEditHandler = () => {
    //  console.log('Additional Info Edit button ...');
    this.infoForm.find('input').removeAttr('readonly');
    this.infoCancelBtn.removeAttr('disabled');
    this.infoEditBtn.attr('disabled', 'disabled');
    this.infoUpdateBtn.removeAttr('disabled');
  };

  clickCancelHandler = () => {
    // console.log('Additional Info Cancel button ...');
    let yes = confirm('Did You Save?');

    if (yes) {
      this.infoForm.find('input').attr('readonly', 'readonly');
      this.infoCancelBtn.attr('disabled', 'disabled');
      this.infoEditBtn.removeAttr('disabled');
      this.infoUpdateBtn.attr('disabled', 'disabled');
    } else {
      return;
    }
  };
}

export default ProfileAdditionalDataUi;
