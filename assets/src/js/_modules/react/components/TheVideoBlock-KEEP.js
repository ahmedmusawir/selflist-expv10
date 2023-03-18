import React, { useEffect } from 'react';
import LiteYouTubeEmbed from 'react-lite-youtube-embed';

const TheVideoBlock = ({
  videoTitle1,
  videoTitle2,
  videoTitle3,
  youtubeId1,
  youtubeId2,
  youtubeId3,
}) => {
  useEffect(() => {
    const buttons = document.querySelectorAll('.lty-playbtn');

    if (!buttons) return;

    function createObserver() {
      let observer;

      let options = {
        rootMargin: '-50%',
        threshold: 1,
      };

      buttons.forEach((button) => {
        observer = new IntersectionObserver(() => button.click(), options);
        observer.observe(button);
      });
    }
    return createObserver();
  }, []);

  return (
    <>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed id={youtubeId1} title='Why SelfLIST' />
        <h4 className='video-title'>{videoTitle1}</h4>
      </div>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed
          id={youtubeId2}
          title='How to List'
          playlist={false}
          adNetwork={true}
        />
        <h4 className='video-title'>{videoTitle2}</h4>
      </div>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed id={youtubeId3} title='How to create an Account' />
        <h4 className='video-title'>{videoTitle3}</h4>
      </div>
    </>
  );
};

export default TheVideoBlock;
