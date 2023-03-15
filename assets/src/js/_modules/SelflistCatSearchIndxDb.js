import $ from 'jquery';
import { get, keys } from 'idb-keyval';
// FOLLOWING NEEDED EVERY TIME ASYNC AWAIT IS USED
import regeneratorRuntime from 'regenerator-runtime';

class SelflistCatSearchIndxDb {
  constructor() {
    // COLLECTING ELEMENTS
    this.typingTimer;
    this.spinnerVisible;
    this.previousValue;
    this.keyExists = false;
    this.search = $('#cat-search-input-json');
    this.searchResultBox = $('#category-search-json-result');
    // SITE ROOT URL FROM WP LOCALIZE SCRIPT
    this.siteRoot = selflistData.root_url;
    // COLLECTION DATA
    this.theJsonData;
    // SITE ROOT URL FROM WP LOCALIZE SCRIPT
    this.siteRoot = selflistData.root_url;
    // COLLECTION DATA FORM REST AS A FALLBACK
    this.theJsonData;
    this.url = this.siteRoot + '/wp-json/selflist/v1/catInfo';
    // CHECKING LOCAL INDEXED DB FOR CATINFO DATA KEY
    this.checkData();
    // SETTING EVENTS
    this.setEvents();
    // this.init();
  }

  init = () => {
    // console.log('Search from Indx DB ...');
  };

  checkData = async () => {
    // CHECKING FOR THE KEY IN INDEXED DB
    await keys().then((keys) => {
      keys.forEach((key) => {
        // console.info('The Key is: ', key);
        if (key == 'catInfo') {
          // GETTING DATA FROM LOCAL INDEXED DB
          this.getData();
          this.keyExists = true;
          // console.log('From checkData', this.keyExists);
        }
      });
    });

    // console.log('Key Exists: ', this.keyExists);
    if (!this.keyExists) {
      this.getRestData();
    }
  };

  getData = async () => {
    // GETTING DATA (catInfo) FROM INDEXED DB
    await get('catInfo')
      .then((catData) => {
        // console.log('CatInfo: ', catData);
        this.theJsonData = catData.filter((main) => main.mainCount != 0);
        // console.info('theJsonData (Filtered)', this.theJsonData);
      })
      .catch((err) =>
        console.log(
          'Failed to Read Indx Db: catInfo [SelflistCatSearchIndxDb.js]',
          err
        )
      );
  };

  getRestData = async () => {
    try {
      let response = await fetch(this.url);
      let data = await response.json();
      // CLEARING THE ZERO LIST COUNT ONES
      this.theJsonData = data.filter((main) => main.mainCount != 0);
      console.info(this.theJsonData);
    } catch (e) {
      console.log(e);
    }
  };

  setEvents = () => {
    this.search.on('keyup', this.searchHandler);
  };

  searchHandler = () => {
    // SETTING SEARCH INPUT TEXT TO LOWER CASE
    const inputText = this.search.val().toLowerCase();
    // MAKING ARROW KEYS, CTRL, ATL ETC. HAVE NO IMPACT ON THE SEARCH INPUT
    if (inputText != this.previousValue) {
      // CLEARING PREVIOUS TIME OUT FOR KEY PRESS
      clearTimeout(this.typingTimer);
      // LOADING SPINNER
      if (!this.spinnerVisible) {
        this.searchResultBox.html(
          '<div><span class="loading-spinner"></span></div>'
        );
        this.spinnerVisible = true;
      }
      // SETTING TIME OUT FOR KEY PRESS
      this.typingTimer = setTimeout(() => {
        // CALLING SEARCH FUNCTION
        this.searchJsonData(inputText);
      }, 500);
    }

    this.previousValue = inputText;
  };

  searchJsonData = (inputText) => {
    this.searchResultBox.html('');
    let catetoryHtmlItem = '';

    if (inputText) {
      this.theJsonData.map((mainCat) => {
        const mainCatTitle = mainCat.mainCatName;
        const mainCatTitleJson = mainCatTitle.toLowerCase();

        if (mainCatTitleJson.indexOf(inputText) != -1) {
          catetoryHtmlItem += `
          <a href="${mainCat.mainLink}">
            <div class="card card-moose border-danger mb-3 animate__animated animate__zoomIn">
              <div class="card-header bg-danger">
                <span class="text-light font-weight-bold">${mainCat.mainCatName}</span>
                <span class="badge badge-pill badge-light">
                  ${mainCat.mainCount}              
                </span>
              </div>
          `;
          // console.log(`
          // Main Cat: ${mainCat.mainCatName}
          // ---------------------------------------
          // `);

          // COLLECTING ALL PRIMO CATS
          const primoCats = mainCat[0].primo;
          // CLEARING THE ZERO LIST COUNT ONES
          const primoCatsWithList = primoCats.filter(
            (primo) => primo.primoCount != 0
          );
          // console.info('PRIMO CATS W LIST', primoCatsWithList);
          // LAYOUT BUTFIX
          // This part added so that the layout is not broken when there is on subcategory added
          if (primoCatsWithList.length == 0) {
            const newCatObj = {
              parentId: 0,
              primoCount: 0,
              primoId: 0,
              primoLink: '#',
              primoName: 'No Primo Added',
              primoSlug: 'THIS-IS-NOT-VISIBLE', // This is being hardcoded to be an ID at the bottom
              // So that it can be used to style the block all white
              // making everything invisible when there is no Primo
            };
            primoCatsWithList.push(newCatObj);
          }

          catetoryHtmlItem += `
          <div class="card-body text-danger">
          <ul class="primo">`;

          // LOOPING THRU ALL PRIMO CATS UNDER A MAIN CAT
          primoCatsWithList.map((primo) => {
            // console.info('PRIMO NAME', primo.primoName);

            catetoryHtmlItem += `
              <li class="primo-item" id="${primo.primoSlug}">
                <a href="${primo.primoLink}" class="btn btn-outline-danger btn-sm">&nbsp;
                  ${primo.primoName}
                  <span class="badge badge-pill badge-dark">${primo.primoCount}</span>
                </a>
              </li>
            `;

            // COLLECTING ALL THE SECONDO CATS
            const secondoCats = mainCat[0].secondo;
            // CLEARING THE ZERO LIST COUNT ONES
            const secondoCatsWithList = secondoCats.filter(
              (secondo) => secondo.secondoCount != 0
            );
            // FILTERING SECONDO CATS ACCORDING TO PRIMO CATS
            const childSecondo = secondoCatsWithList.filter(
              (secondo) => secondo.parentId == primo.primoId
            );
            // console.info(childSecondo);

            // COLLECTING ALL THE TERZO CATS
            const terzoCats = mainCat[0].terzo;
            // CLEARING THE ZERO LIST COUNT ONES
            const terzoCatsWithList = terzoCats.filter(
              (terzo) => terzo.terzoCount != 0
            );
            // LOOPING THRU ALL SECONDO TO GET THE TERZOS
            childSecondo.map((secondo) => {
              // console.info(secondo.secondoName);
              catetoryHtmlItem += `
              <ul class="secondo">
                <li>
                  <a href="${secondo.secondoLink}" class="btn btn-outline-danger btn-sm">&nbsp;
                    ${secondo.secondoName}
                    <span class="badge badge-pill badge-dark">${secondo.secondoCount}</span>
                  </a>
                </li>
              </ul>
              `;

              // FILTERING SECONDO CATS ACCORDING TO PRIMO CATS
              const childTerzo = terzoCatsWithList.filter(
                (terzo) => terzo.parentId == secondo.secondoId
              );
              // console.info(childTerzo);
              childTerzo.map((terzo) => {
                // console.info(terzo.terzoName);
                catetoryHtmlItem += `
                <ul class="terzo">
                  <li>
                    <a href="${terzo.terzoLink}" class="btn btn-outline-danger btn-sm">&nbsp;
                      ${terzo.terzoName}
                      <span class="badge badge-pill badge-dark">${terzo.terzoCount}</span>
                    </a>
                  </li>
                </ul>
                `;
              });
            });
          });
          catetoryHtmlItem += `
                  </ul> <!-- end of primo -->
                </div> <!-- end of card-body -->
                </div> <!-- end of card : both divs need to be kept-->
              </div> <!-- end of card : this is wrong but this works-->
            </a> <!-- end of Main Categoty Link -->
          `;
        }
      });
      this.displaySearchResults(catetoryHtmlItem);
      // console.log(catetoryHtmlItem);
    } else {
      this.spinnerVisible = false;
      this.searchResultBox.html('');
    }
  };

  displaySearchResults = (catetoryHtmlItem) => {
    if (catetoryHtmlItem) {
      this.searchResultBox.append(catetoryHtmlItem);
    } else {
      this.searchResultBox.append(
        '<a class="font-weight-bold text-danger">No category match. Keep searching.</a>'
        // '<a href="/list-insert/" class="font-weight-bold">List NEW GRANDE</a>'
        // '<h4 class="d-block">No Result Found ... </h4>'
      );
    }
    this.spinnerVisible = false;
  };
}

export default SelflistCatSearchIndxDb;
