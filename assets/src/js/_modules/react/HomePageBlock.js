import React, { useEffect, useState } from 'react';
import TheImageSlider from './components/TheImageSlider';
import TheVideoBlock from './components/TheVideoBlock';
import $ from 'jquery';

function HomePageBlock() {
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
    <>
      <hr className='bg-danger' />
      {/* TOP BTN BLOCK STARTS */}
      <div className='home-react-content container'>
        {/* <h3 className='slider-title'>Don't miss these most recent listings!</h3> */}
        <div className='row top-btn-row text-center'>
          <div className='col-sm-4 col-md-4 col-lg-4'>
            <a href='#' className='btn btn-danger btn-lg btn-block'>
              GIGS
            </a>
          </div>
          <div className='col-sm-4 col-md-4 col-lg-4'>
            <a href='#' className='btn btn-danger btn-lg btn-block'>
              STUFF
            </a>
          </div>
          <div className='col-sm-4 col-md-4 col-lg-4'>
            <a href='#' className='btn btn-danger btn-lg btn-block'>
              PEOPLE
            </a>
          </div>
        </div>
        <hr className='bg-danger' />
        {/* SECOND IMG SLIDER BLOCK STARTS */}
        <div className='second-slider-row text-center'>
          <h3 className='slider-title'>
            Don't miss these most recent listings!
          </h3>

          <TheImageSlider />
        </div>
        <hr className='bg-danger' />
        {/* THIRD VIDEO BLOCK STARTS */}
        <div className='row third-video-row text-center'>
          <TheVideoBlock />
        </div>
        <hr className='bg-danger' />
        {/* HOME REACT BLOCK ENDS HERE */}
      </div>
    </>
  );
}

export default HomePageBlock;
