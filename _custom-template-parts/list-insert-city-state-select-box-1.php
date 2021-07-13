 <!-- * LIST INSERT PAGE - CATEGORY SELECTIZE INPUT FORM -->

 <section id="state-city-choice-box" class="mt-5 animate__animated animate__zoomIn">
     <label class="font-weight-bold" for="exampleFormControlTextarea1">Pick a State & Pick or Create a New
         Market:</label>

     <div class="row">
         <!-- THE STATE DROPDOWN -->

         <div class="col-sm-12">
             <article class="main-cat-box">
                 <select id="select-all-states" class="select-all-states" placeholder="Pick A State...">
                     <option value="">Select a State...</option>
                     <option value="482">ALABAMA</option>
                     <option value="483">ALASKA</option>
                     <option value="484">ARIZONA</option>
                     <option value="485">ARKANSAS</option>
                     <option value="476">CALIFORNIA</option>
                     <option value="486">COLORADO</option>
                     <option value="487">CONNECTICUT</option>
                     <option value="488">DELAWARE</option>
                     <option value="466">FLORIDA</option>
                     <option value="458">GEORGIA</option>
                     <option value="490">HAWAII</option>
                     <option value="489">IDAHO</option>
                     <option value="491">ILLINOIS</option>
                     <option value="492">INDIANA</option>
                     <option value="493">IOWA</option>
                     <option value="494">KANSAS</option>
                     <option value="495">KENTUCKY</option>
                     <option value="496">LOUISIANA</option>
                     <option value="497">MAINE</option>
                     <option value="498">MARYLAND</option>
                     <option value="499">MASSACHUSETTS</option>
                     <option value="500">MICHIGAN</option>
                     <option value="501">MINNESOTA</option>
                     <option value="502">MISSISSIPPI</option>
                     <option value="503">MISSOURI</option>
                     <option value="504">MONTANA</option>
                     <option value="505">NEBRASKA</option>
                     <option value="506">NEVADA</option>
                     <option value="507">NEW HAMPSHIRE</option>
                     <option value="508">NEW JERSEY</option>
                     <option value="509">NEW MEXICO</option>
                     <option value="470">NEW YORK</option>
                     <option value="510">NORTH CAROLINA</option>
                     <option value="511">NORTH DAKOTA</option>
                     <option value="512">OHIO</option>
                     <option value="513">OKLAHOMA</option>
                     <option value="514">OREGON</option>
                     <option value="515">PENNSYLVANIA</option>
                     <option value="516">RHODE ISLAND</option>
                     <option value="517">SOUTH CAROLINA</option>
                     <option value="518">SOUTH DEKOTA</option>
                     <option value="519">TENNESSEE</option>
                     <option value="462">TEXAS</option>
                     <option value="520">UTAH</option>
                     <option value="521">VERMONT</option>
                     <option value="522">VIRGINIA</option>
                     <option value="523">WASHINGTON</option>
                     <option value="524">WEST VIRGINIA</option>
                     <option value="525">WISCONSIN</option>
                     <option value="526">WYOMING</option>
                 </select>
             </article>
         </div>
     </div>
     <!-- END THE STATE DROPDOWN ROW -->

     <!-- THE CITY DROPDOWN -->
     <div class="row">

         <div class="col-sm-8">
             <article class="main-cat-box">
                 <select id="select-all-cities" placeholder="Pick or Create a Market">
                     <option value="">Pick or create new market...</option>
                 </select>
             </article>
         </div>
         <div class="col-sm-4">
             <a id="city-new-btn" href="#" class="btn btn-secondary btn-sm btn-block">
                 New Market
             </a>
         </div>

     </div>
     <!-- END THE CITY DROPDOWN -->

 </section>

 <!-- AFTER CITY INSERT UI -->


 <ul id="city-display-ui-box" class="card  bg-light p-3 animate__animated animate__zoomIn d-none">

     <span id="city-insert-success"></span>
     <h5 class="text-dark"><small class="text-danger">Your Selected State & City:</small></h5>
     <li id="state-display-box" class="text-dark font-weight-bold ml-1" style="list-style: none;">GEORGIA</li>
     <li id="city-display-box" class="text-dark font-weight-bold ml-1" style="list-style: none;">Atlanta</li>

 </ul>
 <!-- END THE STATE DROPDOWN ROW -->