import React from 'react';

export function formatSelfList(sentence) {
  const selfListIndex = sentence.indexOf('SelfLIST');

  if (selfListIndex === -1) {
    return sentence;
  }

  const [selfText, listText] = sentence.split('SelfLIST');

  return (
    <React.Fragment>
      {selfText}
      <span className='text-danger'>Self</span>
      <span className='text-dark'>LIST</span>
      {listText}
    </React.Fragment>
  );
}
