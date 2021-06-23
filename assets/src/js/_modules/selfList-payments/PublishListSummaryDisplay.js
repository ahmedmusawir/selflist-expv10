import $ from 'jquery';

class PublishListSummaryDisplay {
  constructor() {
    // STATUS VARS
    this.listPointStatus;
    this.listPublishStatus;
    this.listPublishDays;
    // COLLECTING ELEMENTS
    this.publishedPostIdBox = $('.published-post-id');
    this.listPointStatusBox = $('#list-point-status');
    this.listPublishStatusBox = $('#list-publish-status');
    this.listPublishForDaysBox = $('#published-for-days');
    // STARTING WEB WORKER
    this.workerFile =
      selflistData.root_url + '/wp-content/themes/_webworkers/WebWorker.js';
    this.worker = new Worker(this.workerFile);
    // UPDATING INDEX DB WITH CAT INFO
    this.init();
    // DISPLAY SUMMARY ON PAGE
    this.displaySummary();
  }

  init = () => {
    // UPDATING INDEX DB DATA VIA WEB WORKER
    if (this.publishedPostIdBox.length) {
      this.worker.postMessage('Fetch Cats');
    }
  };

  displaySummary = () => {
    const publishObject = JSON.parse(
      localStorage.getItem('newListPublishData')
    );

    // DISPLAY POST ID
    if (this.publishedPostIdBox.length && publishObject) {
      this.publishedPostIdBox.html(publishObject.post_id);

      // VERIFY POINT UPDATE STATUS
      if (publishObject.points_update_success === true) {
        this.listPointStatus = '<span class="text-success"> Success!</span>';
      } else {
        this.listPointStatus = '<span class="text-danger"> Failed!</span>';
      }
      // DISPLAY POINT STATUS
      if (
        this.listPointStatusBox.length &&
        publishObject.points_update_success
      ) {
        this.listPointStatusBox.html(this.listPointStatus);
      }

      // VERIFY PUBLISH UPDATE STATUS
      if (publishObject.post_id == publishObject.post_update_status) {
        this.listPublishStatus = '<span class="text-success"> Success!</span>';
      } else {
        this.listPublishStatus = '<span class="text-danger"> Failed!</span>';
      }
      // DISPLAY PUBLISH STATUS
      if (this.listPublishStatusBox.length && publishObject.post_id) {
        this.listPublishStatusBox.html(this.listPublishStatus);
      }

      // VERIFY FINAL STATUS
      if (
        publishObject.points_update_success === true &&
        publishObject.post_id == publishObject.post_update_status
      ) {
        this.listPublishDays = publishObject.publish_days;
      } else {
        this.listPublishDays = 0;
      }
      // DISPLAY FINAL STATUS
      this.listPublishForDaysBox.html(this.listPublishDays);
    } else {
      console.info(
        'List Object not found in LocalStorage : [PublishListSummaryDisplay]'
      );
    }
  };
}

export default PublishListSummaryDisplay;
