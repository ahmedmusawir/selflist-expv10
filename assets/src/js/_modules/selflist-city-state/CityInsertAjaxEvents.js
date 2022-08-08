import $ from 'jquery';

class CityInsertAjaxEvents {
  constructor() {
    this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'city_insert_ajax';
    // AJAX SUCCESS MESSAGE
    this.ajaxSuccessMessage = `
    <div class='alert alert-success rounded-0' role='alert'>
      Success! 
    </div>
    `;
  }

  init = () => {
    // console.log('City Insert Ajax ...');
  };

  insertCityAjaxHandler = () => {
    const stateId = $('#state-id-value').data('state-id');
    const newCityName = $('#city-input-element').val().trim();

    // AJAX FUNCTION
    $.ajax({
      url: this.ajaxUrl,
      type: 'post',
      data: {
        action: this.ajaxFunction,
        stateId,
        newCityName,
      },
    })
      .done((res) => {
        console.log(res);

        if (res.state_id && res.new_city_id) {
          // STORING CAT DATA IN LOCAL STORAGE
          sessionStorage.setItem('stateCityData', JSON.stringify(res));
          this.makeUiAfterCityCreation();
        } else {
          $('#ajax-failed-message-city').append(res);
        }
      })
      .fail(() => {
        console.log('Ajax Failed! In ' + this.ajaxFunction);
      })
      .always(() => {
        // console.log('Ajax Dynamic Loaction Filter Complete');
      });
  };

  makeUiAfterCityCreation = () => {
    // $('#ajax-failed-message').append(this.ajaxSuccessMessage);
    // $(this.ajaxSuccessMessage).html('#city-insert-success');
    $('#city-insert-success').html(this.ajaxSuccessMessage);
    // COLLECTING CAT DATA FROM LOCAL STORAGE
    const stateCityData = JSON.parse(sessionStorage.getItem('stateCityData'));
    // DISPLAY DATA IN THE MAIN CAT DISPLAY UI BOX
    $('#state-display-box').text(stateCityData.state_name);
    $('#city-display-box').text(stateCityData.new_city_name);

    // DISPLAY THE DISPLAY BOX
    $('#city-insert-form-box').addClass('d-none');
    $('#city-display-ui-box').removeClass('d-none');
  };
}

export default CityInsertAjaxEvents;
