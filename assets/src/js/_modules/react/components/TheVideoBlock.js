import React from 'react';
import LiteYouTubeEmbed from 'react-lite-youtube-embed';

const TheVideoBlock = ({
  videoTitle1,
  videoTitle2,
  videoTitle3,
  youtubeId1,
  youtubeId2,
  youtubeId3,
}) => {
  return (
    <>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed id={youtubeId1} title='Why SelfLIST' />
        <h4 className='video-title'>{videoTitle1}</h4>
        <article className='bullet-content'>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Complete transparency
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Global reach
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Fully democratized market
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Very cheap
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Fastest new listing set up
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Any language
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Reverse auctions on demand
          </li>
        </article>
      </div>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed
          id={youtubeId2}
          title='How to List'
          playlist={false}
          adNetwork={true}
        />
        <h4 className='video-title'>{videoTitle2}</h4>
        <article className='bullet-content'>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Create an account
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Use an existing category or
            make new
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Use existing market or create
            new
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> 140 character description
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Choose your social media links
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Choose number of listing days
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Share on any social media
          </li>
        </article>
      </div>
      <div className='col-sm-4 col-md-4 col-lg-4'>
        <LiteYouTubeEmbed id={youtubeId3} title='How to create an Account' />
        <h4 className='video-title'>{videoTitle3}</h4>
        <article className='bullet-content'>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Click to sign on
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Click JOIN
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> List first and last name
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> List phone
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> List email address
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Create password/conform
          </li>
          <li className='bullet-point'>
            <i className='far fa-dot-circle'></i> Automatic social media links
          </li>
        </article>
      </div>
    </>
  );
};

export default TheVideoBlock;
