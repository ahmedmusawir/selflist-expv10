import $ from 'jquery';

class LoginRedirect {
  constructor() {
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'make_cookie_and_redirect_ajax_test';

    this.init();
    // COLLECTING ELEMENTS
    this.button = $('#join-page-redirect-btn');
    this.setEvents();
  }

  init = () => {
    // console.log('Login Redirect us up ...');
  };

  setEvents = () => {
    this.button.on('click', this.clickHandler);
  };

  clickHandler = () => {
    // console.log('clicked Go To Join Page ...');

    //COLLECTING FORM DATA
    const userName = $('#user-name').val();
    const userEmail = $('#user-email').val();
    const userPhone = $('#user-phone').val();

    // STORING DATA INTO SESSION STORAGE
    const userData = {
      userName: userName,
      userEmail: userEmail,
      userPhone: userPhone,
    };
    sessionStorage.setItem('fakeListPageUserData', JSON.stringify(userData));

    // COLLECTING ORIGIN PAGE DATA FROM BUTTON
    let newPostData = this.button.data('origin');
    console.log('newPostData: ', newPostData);
    // this.loadingSpinner.removeClass('d-none');
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
        // SCROLL TO TOP
        // window.scrollTo(0, 0);
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

export default LoginRedirect;
