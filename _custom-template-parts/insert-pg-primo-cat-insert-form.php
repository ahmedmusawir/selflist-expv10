<?php 
/**
 * LIST INSERT PAGE: MAIN CATEGORY INSERT FORM
 */
?>

<section id="primo-cat-insert-box" class="card p-5 d-none animate__animated animate__zoomIn">
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

    <!-- PRIMO CAT INSERT FORM -->

    <div class="form-box">

        <form action="" name="primo-cat-insert-form" id="primo-cat-insert-form" class="form">

            <label class="font-weight-bold" for="exampleFormControlTextarea1">Create New Primo</label>

            <div class="form-group card bg-light p-3">
                <h4 id="primo-main-cat" class="text-danger">Tutoring</h4>
                <small id="textHelp" class="form-text text-muted">This is the Main</small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="primo-input-primo-cat" name="primo-input-primo-cat"
                    aria-describedby="textHelp" placeholder="New Primo" required>
                <small id="textHelp" class="form-text text-muted">
                    (up to 20 Characters)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="primo-input-secondo-cat" name="primo-input-secondo-cat"
                    aria-describedby="textHelp" placeholder="New Secondo">
                <small id="textHelp" class="form-text text-muted">
                    (up to 20 Characters)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="primo-input-terzo-cat" name="primo-input-terzo-cat"
                    aria-describedby="textHelp" placeholder="New Terzo">
                <small id="textHelp" class="form-text text-muted">
                    (up to 20 Characters)
                </small>
            </div>

            <button id="primo-cat-user-validation-btn" type="submit" class="btn btn-primary btn-block">Create</button>
            <button id="primo-cat-validation-cancel-btn" type="button"
                class="btn btn-secondary btn-block">Cancel</button>

        </form>

    </div>

</section>

<!-- PRIMO CAT USER VALIDATION BOX -->
<section id="primo-cat-user-validation-box" class="card p-5 animate__animated animate__zoomIn d-none">

    <ul class="list-group">
        <li class="list-group-item active bg-light text-primary">Please Verify List:<br>
            <!-- <small>(You cannot edit categories once they are created)</small> -->
        </li>
        <li class="list-group-item">Main: <span class="pl-3 font-weight-bold" id="main-display-primo"></span>
        </li>
        <li class="list-group-item">Primo: <span class="pl-3 font-weight-bold" id="primo-display-primo"></span>
        </li>
        <li class="list-group-item">Secondo: <span class="pl-3 font-weight-bold" id="secondo-display-primo"></span>
        </li>
        <li class="list-group-item">Terzo: <span class="pl-3 font-weight-bold" id="terzo-display-primo"></span>
        </li>
    </ul>

    <button id="primo-cat-insert-submit-btn" type="button" class="btn btn-primary btn-block">Create</button>
    <button id="primo-cat-insert-cancel-btn" type="button" class="btn btn-secondary btn-block">Cancel</button>

    <div class="my-3">
        <span id="ajax-failed-message-2"></span>
    </div>

</section>