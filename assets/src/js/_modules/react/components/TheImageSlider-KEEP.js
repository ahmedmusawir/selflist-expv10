import React, { useCallback } from 'react';
import SimpleImageSlider from 'react-simple-image-slider';

const TheImageSlider = ({
  sliderImg1,
  sliderImg2,
  sliderImg3,
  listingLink1,
  listingLink2,
  listingLink3,
}) => {
  const images = [
    {
      url: sliderImg1,
    },
    {
      url: sliderImg2,
    },
    {
      url: sliderImg3,
    },
  ];

  const onClick = useCallback((idx, event) => {
    // console.log(`[App onClick] ${idx} ${event.currentTarget}`);
    if (idx === 0) {
      window.location.href = listingLink1;
    }
    if (idx === 1) {
      window.location.href = listingLink2;
    }
    if (idx === 2) {
      window.location.href = listingLink3;
    }
  }, []);

  const sliderStyles = {
    rsisContainer: {
      backgroundColor: 'blue',
      border: '1rem dotted red',
    },
    img: {
      border: '1rem dotted red',
      backgroundColor: 'blue !important',
    },
    button: {
      backgroundColor: 'blue !important',
      background: 'black !important',
    },
  };

  return (
    <div className='d-flex justify-content-center'>
      <SimpleImageSlider
        width={'100%'}
        height={504}
        images={images}
        showBullets={true}
        showNavs={true}
        onClick={onClick}
        autoPlay={true}
        autoPlayDelay={5}
        navStyle={2}
        bgColor={'#000000'}
        style={sliderStyles}
      />
    </div>
  );
};

export default TheImageSlider;
