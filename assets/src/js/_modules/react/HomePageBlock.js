import React, { useEffect, useState } from 'react';
import TheImageSlider from './components/TheImageSlider';
import TestimonialSlider from './components/TestimonialSlider';
import TheVideoBlock from './components/TheVideoBlock';
import { getHomeAjaxData } from './utils/ajaxCalls';
import { ColorRing } from 'react-loader-spinner';

function HomePageBlock() {
  const ajaxGetFunction = 'get_home_data_ajax';
  const [homeData, setHomeData] = useState(null);

  useEffect(() => {
    getHomeAjaxData(selflistData.ajax_url, ajaxGetFunction, setHomeData);
  }, []);

  const handleClick = () => {
    console.log('Running React App Theme on Selflist');
  };

  // console.log('Home Data State:', homeData);

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
                <a
                  // href={`${homeData.button_1_link}?HOME_CLASS='d-none'`}
                  href={homeData.button_1_link}
                  className='btn btn-danger btn-lg btn-block'
                  target={'_blank'}
                >
                  {homeData.button_1_title}
                </a>
              </div>
              <div className='col-sm-4 col-md-4 col-lg-4'>
                <a
                  href={homeData.button_2_link}
                  // href={`${homeData.button_2_link}?HOME_CLASS='d-none'`}
                  className='btn btn-danger btn-lg btn-block'
                  target={'_blank'}
                >
                  {homeData.button_2_title}
                </a>
              </div>
              <div className='col-sm-4 col-md-4 col-lg-4'>
                <a
                  href={homeData.button_3_link}
                  // href={`${homeData.button_3_link}?HOME_CLASS='d-none'`}
                  className='btn btn-danger btn-lg btn-block'
                  target={'_blank'}
                >
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
                listingLink1={`${homeData.listing_1_link}?HOME_CLASS=d-none`}
                listingLink2={`${homeData.listing_2_link}?HOME_CLASS=d-none`}
                listingLink3={`${homeData.listing_3_link}?HOME_CLASS=d-none`}
              />
            </div>
            <hr className='bg-danger' />

            {/* ADDED TESTIMONIAL SLIDER BLOCK STARTS */}
            <div className='testimonial-slider-row text-center'>
              {/* <h3 className='slider-title'>{homeData.slider_block_title}</h3> */}
              <h3 className='slider-title'>"Future Testimonials"</h3>
              <p
                className='testimonial-subtitle'
                style={{ marginTop: '-1.5rem' }}
              >
                (...that haven't happened yet... but who knows??)
              </p>

              <TestimonialSlider
                customer1={homeData.customer_1}
                customer2={homeData.customer_2}
                customer3={homeData.customer_3}
                customer4={homeData.customer_4}
                comment1={homeData.comment_1}
                comment2={homeData.comment_2}
                comment3={homeData.comment_3}
                comment4={homeData.comment_4}
              />
            </div>
            <hr className='bg-danger' />

            {/* THIRD VIDEO BLOCK STARTS */}
            <div className='row third-video-row text-center'>
              <TheVideoBlock
                videoTitle1={homeData.video_title_1}
                videoTitle2={homeData.video_title_2}
                videoTitle3={homeData.video_title_3}
                youtubeId1={homeData.youtube_video_id_1}
                youtubeId2={homeData.youtube_video_id_2}
                youtubeId3={homeData.youtube_video_id_3}
              />
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
