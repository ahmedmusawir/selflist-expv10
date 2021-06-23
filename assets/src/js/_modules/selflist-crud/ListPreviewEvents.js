import $ from 'jquery';

class ListPreviewEvents {
  constructor() {
    this.init();
    // COLLECTING AJAX INFO
    this.ajaxUrl = selflistData.ajax_url;
    this.ajaxFunction = 'list_preview_ajax';
    this.previewDisplayBox = $('#list-preview-ajax-data');
    // INVOKE LIST PREVIEW AJAX
    this.newListId;
    this.showListPreview();
  }

  init = () => {
    // console.log('List Preview Ajax ...');
  };

  showListPreview = () => {
    const listObject = JSON.parse(localStorage.getItem('newListData'));
    // console.log('List Obj: ', listObject);
    if (listObject) {
      this.newListId = listObject.data.post_id;
    }

    if (this.previewDisplayBox.length && this.newListId) {
      $.ajax({
        url: this.ajaxUrl,
        type: 'POST',
        data: {
          post_id: this.newListId,
          action: this.ajaxFunction,
        },
      })
        .done((res) => {
          this.previewDisplayBox.html(res);
        })
        .fail((res) => {
          console.error(res);
        });
    } else {
      console.info(
        'List Object Not Fount in LocalStorage : [ListPreviewEvents]'
      );
    }
  };
}

export default ListPreviewEvents;
