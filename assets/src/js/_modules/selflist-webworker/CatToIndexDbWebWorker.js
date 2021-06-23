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
    this.startWebWorkerAtInterval();
  }

  startWebWorkerOnce = async () => {
    // CHECKING FOR THE KEY IN INDEXED DB
    await keys()
      .then((keys) => {
        keys.forEach((key) => {
          if (key == 'catInfo') {
            this.keyExists = true;
          }
        });
      })
      .catch((err) =>
        console.log('Key Check Failed [CatToIndexDbWebWorker.js]', err)
      );

    // WHEN THE KEY NOT PRESENT
    if (this.keyExists != true) {
      // SENDING WORK MESSAGES
      // this.worker.postMessage('Get Started');
      this.worker.postMessage('Fetch Cats');
    } else {
      console.log('DB not updated... [CatToIndexDbWebWorker.js]');
    }
  };

  startWebWorkerAtInterval = () => {
    // STARTING DATA UPDATE WITH AN INTERVAL [1HR = 3600,000 MLS]
    this.worker.postMessage('Fetch Interval');
  };
}

export default CatToIndexDbWebWorker;
