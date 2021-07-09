import { get, keys } from 'idb-keyval';

class CatToIndexDbWebWorker {
  constructor() {
    // MAKING WEB WORKER
    this.workerFile =
      selflistData.root_url + '/wp-content/themes/_webworkers/WebWorker.js';
    this.worker = new Worker(this.workerFile);
    // BRINGING CATEGORY DATA ONCE FIRST TIME
    this.startWebWorkerOnce();
    // UPDATING CATEGORY DATA EVERY HOUR
    // this.startWebWorkerAtInterval();
  }
  // UPDATE DATA AT EVERY REFRESH
  startWebWorkerOnce = () => {
    this.worker.postMessage('Fetch Cats');
  };

  startWebWorkerAtInterval = () => {
    // STARTING DATA UPDATE WITH AN INTERVAL [1HR = 3600,000 MLS]
    this.worker.postMessage('Fetch Interval');
  };
}

export default CatToIndexDbWebWorker;
