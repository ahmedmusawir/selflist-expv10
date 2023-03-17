import React, { useEffect, useState } from 'react';
import TheImageSlider from './components/TheImageSlider';
import TheVideoBlock from './components/TheVideoBlock';
import { getHomeAjaxData } from './utils/ajaxCalls';
import { ColorRing } from 'react-loader-spinner';

function HomePageBlock() {
  const ajaxGetFunction = 'get_home_data_ajax';
  const [homeData, setHomeData] = useState(null);

  useEffect(() => {
    const getData = async () => {
      await getHomeAjaxData(
        selflistData.ajax_url,
        ajaxGetFunction,
        setHomeData
      );
    };
    getData();
  }, []);

  const handleClick = () => {
    console.log('Running React App Theme on Selflist');
  };

  console.log('Home Data State:', homeData);

  return (
    <>
      <hr className='bg-danger' />
      {/* TOP BTN BLOCK STARTS */}
      <div className='home-react-content container'>
        {!homeData && (
          <div className='d-flex justify-content-center'>
            <ColorRing
              visible={true}
              height='80'
              width='80'
              ariaLabel='blocks-loading'
              wrapperStyle={{}}
              wrapperClass='blocks-wrapper'
              colors={['red', 'black', 'red']}
            />
          </div>
        )}
        {homeData && (
          <>
            <div className='row top-btn-row text-center'>
              <div className='col-sm-4 col-md-4 col-lg-4'>
                <a href='#' className='btn btn-danger btn-lg btn-block'>
                  {homeData.button_1_title}
                </a>
              </div>
              <div className='col-sm-4 col-md-4 col-lg-4'>
                <a href='#' className='btn btn-danger btn-lg btn-block'>
                  {homeData.button_2_title}
                </a>
              </div>
              <div className='col-sm-4 col-md-4 col-lg-4'>
                <a href='#' className='btn btn-danger btn-lg btn-block'>
                  {homeData.button_3_title}
                </a>
              </div>
            </div>
            <hr className='bg-danger' />
            {/* SECOND IMG SLIDER BLOCK STARTS */}
            <div className='second-slider-row text-center'>
              <h3 className='slider-title'>{homeData.slider_block_title}</h3>

              <TheImageSlider
                sliderImg1={homeData.slider_image_1}
                sliderImg2={homeData.slider_image_2}
                sliderImg3={homeData.slider_image_3}
                listingLink1={homeData.listing_1_link}
                listingLink2={homeData.listing_2_link}
                listingLink3={homeData.listing_3_link}
              />
            </div>
            <hr className='bg-danger' />
            {/* THIRD VIDEO BLOCK STARTS */}
            <div className='row third-video-row text-center'>
              <TheVideoBlock />
            </div>
          </>
        )}
        <hr className='bg-danger' />
        {/* HOME REACT BLOCK ENDS HERE */}
      </div>
    </>
  );
}

export default HomePageBlock;
