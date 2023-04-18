import $ from 'jquery';

//GETTING SELFLIST ACF HOME KEY
export const getHomeAjaxData = (ajaxUrl, ajaxFunction, setHomeData) => {
  $.ajax({
    url: ajaxUrl,
    type: 'get',
    data: {
      action: ajaxFunction,
    },
  })
    .done((res) => {
      // console.log('AJAX OUTPUT: SELFLIST HOME', res);
      setHomeData(res.data);
      console.log('Ajax with WP Ajax PHP function Success!');
    })
    .fail((res) => {
      console.log('Ajax Failed');
      console.log(res);
    });
};
