import React, { useCallback } from 'react';
import Carousel from 'react-bootstrap/Carousel';

const TheImageSlider = ({
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
        <img className='d-block w-100' src={sliderImg1} alt='First slide' />
      </Carousel.Item>
      <Carousel.Item onClick={redirectImg2}>
        <img className='d-block w-100' src={sliderImg2} alt='Second slide' />
      </Carousel.Item>
      <Carousel.Item onClick={redirectImg3}>
        <img className='d-block w-100' src={sliderImg3} alt='Third slide' />
      </Carousel.Item>
    </Carousel>
  );
};

export default TheImageSlider;
