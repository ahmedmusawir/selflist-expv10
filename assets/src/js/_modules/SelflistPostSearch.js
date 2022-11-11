import $ from 'jquery';

class SelflistPostSearch {
  constructor() {
    // COLLECTING SEARCH INPUT
    this.searchInput = $('#post-search-input');

    // this.listResultContainer = $('#search-result-header');
    this.typingTimer;

    // SETTING EVENTS
    this.setEvents();
    this.init();
  }

  init = () => {
    // console.log('Selflist post search ...');
    // console.log(this.listResultContainer);
    // this.listResultContainer.append('<h1>WTF</h1>');
  };

  setEvents = () => {
    // this.searchInput.on('keyup', this.typeTimeLogic.bind(this));
    this.searchInput.on('keyup', this.searchHandler.bind(this));
  };

  // typeTimeLogic(e) {
  //   // console.log('type logic');
  //   clearTimeout(this.typingTimer);
  //   this.typingTimer = setTimeout(() => {
  //     // console.log(this.searchInput.val().toLowerCase());
  //     const searchText = this.searchInput.val().toLowerCase();
  //     // console.log(searchText);
  //     this.searchHandler(searchText);

  //     // console.log('type logic set time out');
  //   }, 1000);
  // }

  searchHandler() {
    // SETTING SEARCH INPUT TEXT TO LOWER CASE
    const inputText = this.searchInput.val().toLowerCase();

    // COLLECTING DATA CARDS
    const cards = $('.post-item');
    const cardCount = $('.post-item').length;
    // console.log('Card Count', cardCount);

    let closeCount = 0;
    //NEWLY CREATED ELEMENT JUST FOR THE WORDS NOT FOUND ERROR MESSAGE
    const listResultContainer = $('#NOT-FUCKING-FOUND');

    cards.each(function (i, elm) {
      const postContent = $(elm).find('#post-content').text().toLowerCase();
      const inviteButton = $('#start-hmu-btn');

      // console.log(test);
      if (postContent.indexOf(inputText) != -1) {
        $(elm).removeClass('d-none');
        $(elm).removeClass('animate__zoomOut');
        $(elm).addClass('animate__zoomIn');

        // const elmCount = $(elm).hasClass('d-none');
        // console.log('Elm count: ', elmCount);
      } else {
        $(elm).removeClass('animate__zoomIn');
        $(elm).addClass('animate__zoomOut');
        // console.log(notFound);

        setTimeout(() => {
          $(elm).addClass('d-none');
          // CHECKING FOR POST ITEM WITH D-NONE CLASS AND COUNTING
          if ($(elm).hasClass('post-item') && $(elm).hasClass('d-none')) {
            closeCount++;
          }

          if (cardCount === closeCount) {
            // THIS WILL ADD THE NOT FOUND ERROR
            listResultContainer.html(
              '<h5 class="font-weight-bold"><a href="/list-insert/">List</h5>'
            );
            // THIS WILL REMOVE THE INVITE BUTTON
            inviteButton.addClass('d-none');
          } else {
            // THIS WILL BRING BACK THE INVITE BUTTON
            inviteButton.removeClass('d-none');
          }
        }, 500);
      }

      // THIS IS TO REMOVE THE NOT FOUND ERROR MESSAGE
      if (cardCount !== closeCount) {
        listResultContainer.html('');
      }
    });
  }
}

export default SelflistPostSearch;
