import $ from 'jquery';

class CiteStateUiEvents {
  constructor() {
    this.init();
    // COLLECTING ELEMENTS
    this.stateFlterMenu = $('#state-filter-menu');
    this.singleStateBox = $('.single-state-box');
    this.topFilterBtn = $('#filter-by-state-city-btn');
    this.stateBtns = $('.state-btn');
    this.setEvents();
  }

  init = () => {
    // console.log('City & State Ui/Ux ...');
  };

  setEvents = () => {
    this.topFilterBtn.on('click', this.clickFilterHandler);
    this.stateBtns.on('click', this.clickStateBtnHandler);
  };

  clickFilterHandler = () => {
    this.stateFlterMenu.toggleClass('d-none');
  };

  clickStateBtnHandler = (e) => {
    // console.log($(e.target));
    // Get the clicked Btn and turn into jQuery obj
    const clickedStateBtn = $(e.target);
    // Get the State name from the data attribute
    const theState = clickedStateBtn.data('state');
    // console.log(theState);
    // Remove all Single State Boxes
    this.singleStateBox.addClass('d-none');
    // Remove d-none class from Single State Box for specific State
    $(`#${theState}`).removeClass('d-none');
  };
}

export default CiteStateUiEvents;
