import React, { useEffect, useState } from 'react';
import $ from 'jquery';

function ReactAppTheme() {
  const ajaxGetFunction = 'get_home_data_ajax';
  const [catName, setCatName] = useState('');
  const [catUrl, setCatUrl] = useState('');

  useEffect(() => {
    //GETTING RAPID API KEY
    const getRapidKey = () => {
      $.ajax({
        url: selflistData.ajax_url,
        type: 'get',
        data: {
          action: ajaxGetFunction,
        },
      })
        .done((res) => {
          console.log('AJAX OUTPUT: SELFLIST HOME', res);
          setCatName(res.data.catOneName);
          setCatUrl(res.data.catOneLink);
          console.log('Ajax with WP Ajax PHP function Success!');
        })
        .fail((res) => {
          console.log('Ajax Failed');
          console.log(res);
        });
    };

    getRapidKey();
  }, []);

  const handleClick = () => {
    console.log('Running React App Theme on Selflist');
  };
  return (
    <div className='app-content container'>
      <h1 className='jumbotron'>React App on SelfList Home!</h1>
      <h5 className='font-weight-bold'>
        Category Name from WPDB: <span className='text-dark'>{catName}</span>
      </h5>
      <h5 className='font-weight-bold'>
        Category Link from WPDB: <span className='text-dark'>{catUrl}</span>
      </h5>
      <article>
        <h3>This is coming from SelfList Theme</h3>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate
          eos fugiat vel necessitatibus dolores molestiae quas, praesentium
          similique, est minima consequatur sit aspernatur nostrum nulla et
          maxime maiores distinctio possimus!
        </p>
        <button className='btn btn-danger' onClick={handleClick}>
          Click Works!
        </button>
      </article>
    </div>
  );
}

export default ReactAppTheme;
