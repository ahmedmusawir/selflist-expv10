import $ from 'jquery';
import { selectize } from 'selectize';
// FOLLOWING NEEDED EVERY TIME ASYNC AWAIT IS USED
import regeneratorRuntime from 'regenerator-runtime';

/**
 This is a Parent class that fetches data from categories.json file from the WP /uploads dir
 This class uses async and await to fetch the data. That's why regenaratorRuntime had to be 
 imported at the top. The selectize library was also imported to handle Catagory Select Inputs. 
 This class is inherited by the following classes due to the usage of the selectize library:

 1. CatSelectionEvents.js - Handles Category selections
 2. ListInsertEventsAjax.js - Inserts the List data by Ajax
 3. CatUiParent.js - This is a Parent class for all the Category UI classes. Needs this 
                   - class for selectize items so that the Cat New Insert buttons can
                   - launch if the Main Cat and others are filled in 
 */

class CatSelectDataParent {
  constructor() {
    this.init();
    // SITE ROOT URL FROM WP LOCALIZE SCRIPT
    this.siteRoot = selflistData.root_url;
    // COLLECTION DATA
    this.theJsonData;
    this.url = this.siteRoot + '/wp-content/uploads/categories.json';
    this.getData();

    // INITIALIZE UP SELECTIZE
    if ($('#select-main-cats').length) {
      this.selectMainCats = $('#select-main-cats').selectize({
        sortField: 'text',
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectizeMain = this.selectMainCats[0].selectize;
    }
    if ($('#select-primo-cats').length) {
      this.selectPrimoCats = $('#select-primo-cats').selectize({
        sortField: 'text',
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectizePrimo = this.selectPrimoCats[0].selectize;
    }
    if ($('#select-secondo-cats').length) {
      this.selectSecondoCats = $('#select-secondo-cats').selectize({
        sortField: 'text',
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectizeSecondo = this.selectSecondoCats[0].selectize;
    }
    if ($('#select-terzo-cats').length) {
      this.selectTerzoCats = $('#select-terzo-cats').selectize({
        sortField: 'text',
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectizeTerzo = this.selectTerzoCats[0].selectize;
    }

    // ADDING STATE & CITY & SETTING UP THE CONTROL ELEMENT
    // Setting up States
    if ($('#select-all-states').length) {
      this.selectAllStates = $('#select-all-states').selectize({
        sortField: 'text',
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectAllStateCtrl = this.selectAllStates[0].selectize;
    }
    // Setting up Cities
    if ($('#select-all-cities').length) {
      this.selectAllCities = $('#select-all-cities').selectize({
        sortField: 'text',
      });

      // ADDING ITEMS DYNAMICALLY & SETTING UP THE CONTROL ELEMENT
      this.selectAllCityCtrl = this.selectAllCities[0].selectize;
    }
  }

  init = () => {
    // console.log('Cat Data Parent ...');
  };

  getData = async () => {
    try {
      let response = await fetch(this.url);
      let data = await response.json();
      this.theJsonData = data;
      // LOADING DATA TO MAIN SELECTIZED DROPDOWN
      this.loadMainCatData();
    } catch (e) {
      console.log(e);
    }
  };

  loadMainCatData = () => {
    this.theJsonData.map((catData) => {
      // ADDING ITEMS DYNAMICALLY
      const selectOptions = {
        value: catData.mainCatId,
        text: catData.mainCatName,
      };
      if (this.selectizeMain) {
        this.selectizeMain.addOption(selectOptions);
      }
    });
  };
}

export default CatSelectDataParent;
