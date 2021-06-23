import { get, keys } from 'idb-keyval';

class CatToIndexDbWebWorker {
  constructor() {
    this.worker;
    this.workerFile = selflistData.root_url + '/WebWorker.js';
    this.setEvents();
  }

  setEvents = () => {
    document.addEventListener('DOMContentLoaded', this.startWebWorker);
  };

  startWebWorker = () => {
    // MAKING WEB WORKER

    this.worker = new Worker(this.workerFile);
    // SENDING WORK MESSAGES
    // this.worker.postMessage('Get Started');
    // this.worker.postMessage('Fetch');
    this.worker.postMessage('Fetch Cats');
  };
}

export default CatToIndexDbWebWorker;
