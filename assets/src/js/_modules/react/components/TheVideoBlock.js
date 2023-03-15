import React from 'react';
import LiteYouTubeEmbed from 'react-lite-youtube-embed';
// import 'react-lite-youtube-embed/dist/LiteYouTubeEmbed.css';

const TheVideoBlock = () => {
  return (
    <>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed
          id='L2vS_050c-M'
          title='What’s new in Material Design for the web (Chrome Dev Summit 2019)'
        />
        <h4 className='video-title'>Why SelfLIST</h4>
      </div>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed
          id='L2vS_050c-M'
          title='What’s new in Material Design for the web (Chrome Dev Summit 2019)'
        />
        <h4 className='video-title'>How to List</h4>
      </div>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed
          id='L2vS_050c-M'
          title='What’s new in Material Design for the web (Chrome Dev Summit 2019)'
        />
        <h4 className='video-title'>How to Create an Account</h4>
      </div>
    </>
  );
};

export default TheVideoBlock;
