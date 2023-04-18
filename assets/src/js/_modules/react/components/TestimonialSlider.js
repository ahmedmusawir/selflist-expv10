import React, { useCallback } from 'react';
import Carousel from 'react-bootstrap/Carousel';

const TestimonialSlider = ({
  customer1,
  customer2,
  customer3,
  customer4,
  comment1,
  comment2,
  comment3,
  comment4,
}) => {
  return (
    <Carousel variant='dark'>
      <Carousel.Item>
        <div className='w-100 border p-5 bg-danger text-center'>
          <div
            className='quote text-center display-3'
            style={{ color: '#e3e3e3', opacity: '.5' }}
          >
            <i className='fas fa-quote-left'></i>
          </div>
          <p className='text-white p-sm-3 w-75 mx-auto'>{comment1}</p>
          <h3 className='text-center font-weight-bold text-white'>
            {customer1}
          </h3>
        </div>
      </Carousel.Item>
      <Carousel.Item>
        <div className='w-100 border p-5 bg-danger text-center'>
          <div
            className='quote text-center display-3'
            style={{ color: '#e3e3e3', opacity: '.5' }}
          >
            <i className='fas fa-quote-left'></i>
          </div>
          <p className='text-white p-sm-3 w-75 mx-auto'>{comment2}</p>
          <h3 className='text-center font-weight-bold text-white'>
            {customer2}
          </h3>
        </div>
      </Carousel.Item>
      <Carousel.Item>
        <div className='w-100 border p-5 bg-danger text-center'>
          <div
            className='quote text-center display-3'
            style={{ color: '#e3e3e3', opacity: '.5' }}
          >
            <i className='fas fa-quote-left'></i>
          </div>
          <p className='text-white p-sm-3 w-75 mx-auto'>{comment3}</p>
          <h3 className='text-center font-weight-bold text-white'>
            {customer3}
          </h3>
        </div>
      </Carousel.Item>
      <Carousel.Item>
        <div className='w-100 border p-5 bg-danger text-center'>
          <div
            className='quote text-center display-3'
            style={{ color: '#e3e3e3', opacity: '.5' }}
          >
            <i className='fas fa-quote-left'></i>
          </div>
          <p className='text-white p-sm-3 w-75 mx-auto'>{comment4}</p>
          <h3 className='text-center font-weight-bold text-white'>
            {customer4}
          </h3>
        </div>
      </Carousel.Item>
    </Carousel>
  );
};

export default TestimonialSlider;
