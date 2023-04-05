import React, { useCallback } from 'react';
import Carousel from 'react-bootstrap/Carousel';

const TestimonialSlider = ({
  sliderImg1,
  sliderImg2,
  sliderImg3,
  listingLink1,
  listingLink2,
  listingLink3,
}) => {
  const redirectImg1 = () => {
    // window.location.href = listingLink1;
    window.open(listingLink1, '_blank');
  };
  const redirectImg2 = () => {
    // window.location.href = listingLink2;
    window.open(listingLink2, '_blank');
  };
  const redirectImg3 = () => {
    // window.location.href = listingLink3;
    window.open(listingLink3, '_blank');
  };

  return (
    <Carousel variant='dark'>
      <Carousel.Item onClick={redirectImg1}>
        <div className='w-100 border p-5 bg-danger text-center'>
          <div
            className='quote text-center display-3'
            style={{ color: '#e3e3e3', opacity: '.5' }}
          >
            <i className='fas fa-quote-left'></i>
          </div>
          <p className='text-white p-sm-3 w-75 mx-auto'>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio
            laborum deleniti quasi non alias magni sunt. Reprehenderit, ipsam
            quod corrupti sint hic labore autem, similique, ipsum nisi doloribus
            quam fugit?
          </p>
        </div>
      </Carousel.Item>
      <Carousel.Item onClick={redirectImg1}>
        <div className='w-100 border p-5 bg-danger text-center'>
          <div
            className='quote text-center display-3'
            style={{ color: '#e3e3e3', opacity: '.5' }}
          >
            <i className='fas fa-quote-left'></i>
          </div>
          <p className='text-white p-sm-3 w-75 mx-auto'>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio
            laborum deleniti quasi non alias magni sunt. Reprehenderit, ipsam
            quod corrupti sint hic labore autem, similique, ipsum nisi doloribus
            quam fugit?
          </p>
        </div>
      </Carousel.Item>
      <Carousel.Item onClick={redirectImg1}>
        <div className='w-100 border p-5 bg-danger text-center'>
          <div
            className='quote text-center display-3'
            style={{ color: '#e3e3e3', opacity: '.5' }}
          >
            <i className='fas fa-quote-left'></i>
          </div>
          <p className='text-white p-sm-3 w-75 mx-auto'>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio
            laborum deleniti quasi non alias magni sunt. Reprehenderit, ipsam
            quod corrupti sint hic labore autem, similique, ipsum nisi doloribus
            quam fugit?
          </p>
        </div>
      </Carousel.Item>
    </Carousel>
  );
};

export default TestimonialSlider;
