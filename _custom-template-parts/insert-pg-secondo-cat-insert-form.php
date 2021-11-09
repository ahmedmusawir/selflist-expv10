<?php 
/**
 * LIST INSERT PAGE: SECONDO CATEGORY INSERT FORM
 */
?>


<section id="secondo-cat-insert-box" class="card p-5 d-none animate__animated animate__zoomIn">
    <!-- <style>
  .error {
    color: red;
    font-size: .8rem;
    font-weight: bold;
  }

  input {
    color: red;
    font-size: .8rem;
    font-weight: bold;
  }
  </style> -->

    <!-- SECONDO CAT INSERT FORM -->
    <div class="form-box">

        <form action="" name="secondo-cat-insert-form" id="secondo-cat-insert-form" class="form">
            <label class="font-weight-bold" for="exampleFormControlTextarea1">Insert New Secondo and
                a Subcategory</label>

            <div class="form-group card p-3 bg-light">
                <h4 id="secondo-main-cat" class="text-danger">Tutoring</h4>
                <small id="textHelp" class="form-text text-muted">This is the Main Category</small>
                <div class="form-group mt-4">
                    <h4 id="secondo-primo-cat" class="text-danger"> -- Math</h4>
                    <small id="textHelp" class="form-text text-muted">This is the Primo Category</small>
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="secondo-input-secondo-cat" name="secondo-input-secondo-cat"
                    aria-describedby="textHelp" placeholder="New Secondo Category" required>
                <small id="textHelp" class="form-text text-muted">
                    Secondo Category (20 Char Limit. Letters & Space only)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="secondo-input-terzo-cat" name="secondo-input-terzo-cat"
                    aria-describedby="textHelp" placeholder="New Terzo Category">
                <small id="textHelp" class="form-text text-muted">
                    Terzo Category (20 Char Limit. Letters & Space only)
                </small>
            </div>

            <button id="secondo-cat-user-validation-btn" type="submit" class="btn btn-primary btn-block">Submit</button>
            <button id="secondo-cat-validation-cancel-btn" type="button"
                class="btn btn-secondary btn-block">Cancel</button>

        </form>

    </div>

</section>

<!-- PRIMO CAT USER VALIDATION BOX -->
<section id="secondo-cat-user-validation-box" class="card p-5 animate__animated animate__zoomIn d-none">

    <ul class="list-group">
        <!-- THE HEADER ANNOUNCEMENT -->
        <li class="list-group-item active bg-light text-primary">Please Verify Your List Entries:<br>
            <!-- <small>(You cannot edit entries once they are created)</small> -->
        </li>
        <!-- THE CATEGORY LIST -->
        <li class="list-group-item">Main Category: <span class="pl-3 font-weight-bold" id="main-display-secondo"></span>
        </li>
        <li class="list-group-item">Primo Category: <span class="pl-3 font-weight-bold"
                id="primo-display-secondo"></span>
        </li>
        <li class="list-group-item">Secondo Category: <span class="pl-3 font-weight-bold"
                id="secondo-display-secondo"></span>
        </li>
        <li class="list-group-item">Terzo Category: <span class="pl-3 font-weight-bold"
                id="terzo-display-secondo"></span>
        </li>
    </ul>

    <button id="secondo-cat-insert-submit-btn" type="button" class="btn btn-primary btn-block">Create</button>
    <button id="secondo-cat-insert-cancel-btn" type="button" class="btn btn-secondary btn-block">Cancel</button>

    <div class="my-3">
        <span id="ajax-failed-message-3"></span>
    </div>

</section>