import $ from 'jquery';
import axios from 'axios';

class CreateWPUsersInChatEngine {
  constructor() {
    this.userName = selflistData.currentWPUserEmail;
    this.userFirstName = selflistData.currentWPUserFirstName;
    this.userLastName = selflistData.currentWPUserLastName;
    this.init();
  }

  init = () => {
    console.log('SELFLIST THEME: Sync WP USERS W/ CHAT ENGINE ...');
    const user = {
      username: this.userName,
      secret: 'pass1234',
      first_name: this.userFirstName,
      last_name: this.userLastName,
    };

    this.createUser(user);
  };

  createUser = async (user) => {
    // put IS FOR GET OR CREATE ACCORDING TO DOC
    // console.log('SELFLIST THM USER: ', user);
    if (user.username) {
      await axios
        .put('https://api.chatengine.io/users/', user, {
          headers: { 'Private-Key': '185fb2d8-e5d1-4e14-afe2-32eb8e0ed93a' },
        })
        .then((r) => {
          // console.log('get or create user from Selflist Theme', r);
        })
        .catch((e) => console.log('SELFLIST THEME: USER SYNC ERROR: ', e));
    }
  };
}

export default CreateWPUsersInChatEngine;
