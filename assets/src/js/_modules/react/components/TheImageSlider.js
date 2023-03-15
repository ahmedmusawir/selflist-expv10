import React, { useCallback } from 'react';
import SimpleImageSlider from 'react-simple-image-slider';

const TheImageSlider = () => {
  const images = [
    {
      url: 'http://selflist-v9.local/wp-content/uploads/2020/08/vintage-harley-desktop-background-wallpaper-640x360-1.jpg',
    },
    {
      url: 'http://selflist-v9.local/wp-content/uploads/2020/08/tattoo-artist-widescreen-wallpapers-640x360-1.jpg',
    },
    {
      url: 'http://selflist-v9.local/wp-content/uploads/2020/08/tattoo-machine-phone-wallpaper-640x360-1.png',
    },
  ];

  const onClick = useCallback((idx, event) => {
    console.log(`[App onClick] ${idx} ${event.currentTarget}`);
    if (idx === 0) {
      window.location.href = '/373-2/';
    }
    if (idx === 1) {
      window.location.href = '/361-2/';
    }
    if (idx === 2) {
      window.location.href = '/377-2/';
    }
  }, []);

  return (
    <div className='d-flex justify-content-center'>
      <SimpleImageSlider
        width={896}
        height={504}
        images={images}
        showBullets={true}
        showNavs={true}
        onClick={onClick}
        autoPlay={true}
        autoPlayDelay={5}
        navStyle={2}
        bgColor={'#000000'}
      />
    </div>
  );
};

export default TheImageSlider;
