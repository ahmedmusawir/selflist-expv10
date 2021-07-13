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
                     <?php make_state_country_dropdown(); ?>
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