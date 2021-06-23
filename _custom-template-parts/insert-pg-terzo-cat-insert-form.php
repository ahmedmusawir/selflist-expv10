<?php 
/**
 * LIST INSERT PAGE: MAIN CATEGORY INSERT FORM
 */
?>


<section id="terzo-cat-insert-box" class="card p-5 d-none animate__animated animate__zoomIn">

  <!-- TERZO CAT INSERT FORM -->

  <div class="form-box">

    <form action="" name="terzo-cat-insert-form" id="terzo-cat-insert-form" class="form">

      <label class="font-weight-bold" for="exampleFormControlTextarea1">Insert New Terzo
        Subcategory</label>

      <div class="form-group card p-3 bg-light">
        <h4 id="terzo-main-cat" class="text-danger">Tutoring</h4>
        <small id="textHelp" class="form-text text-muted">This is the Main Category</small>
        <div class="form-group mt-3">
          <h4 id="terzo-primo-cat" class="text-danger"> -- Math</h4>
          <small id="textHelp" class="form-text text-muted">This is the Primo Category</small>
        </div>
        <div class="form-group mt-3">
          <h4 id="terzo-secondo-cat" class="text-danger"> -- -- Grade 10</h4>
          <small id="textHelp" class="form-text text-muted">This is the Secondo Category</small>
        </div>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="terzo-input-terzo-cat" name="terzo-input-terzo-cat"
          aria-describedby="textHelp" placeholder="New Terzo Category" required>
        <small id="textHelp" class="form-text text-muted">
          Terzo Category (20 Char Limit. Letters & Space only)
        </small>
      </div>

      <button id="terzo-cat-user-validation-btn" type="submit" class="btn btn-primary btn-block">Submit</button>
      <button id="terzo-cat-validation-cancel-btn" type="button" class="btn btn-secondary btn-block">Cancel</button>

    </form>

  </div>

</section>

<!-- PRIMO CAT USER VALIDATION BOX -->
<section id="terzo-cat-user-validation-box" class="card p-5 animate__animated animate__zoomIn d-none">

  <ul class="list-group">
    <li class="list-group-item active bg-light text-primary">Please Verify Categories Before Creating:<br>
      <small>(You cannot edit categories once they are created)</small>
    </li>
    <li class="list-group-item">Main Category: <span class="pl-3 font-weight-bold" id="main-display-terzo"></span></li>
    <li class="list-group-item">Primo Category: <span class="pl-3 font-weight-bold" id="primo-display-terzo"></span>
    </li>
    <li class="list-group-item">Secondo Category: <span class="pl-3 font-weight-bold" id="secondo-display-terzo"></span>
    </li>
    <li class="list-group-item">Terzo Category: <span class="pl-3 font-weight-bold" id="terzo-display-terzo"></span>
    </li>
  </ul>

  <button id="terzo-cat-insert-submit-btn" type="button" class="btn btn-primary btn-block">Create Categories</button>
  <button id="terzo-cat-insert-cancel-btn" type="button" class="btn btn-secondary btn-block">Cancel</button>

  <div class="my-3">
    <span id="ajax-failed-message-4"></span>
  </div>

</section>