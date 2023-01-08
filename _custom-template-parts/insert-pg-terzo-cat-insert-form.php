<?php 
/**
 * LIST INSERT PAGE: MAIN  INSERT FORM
 */
?>


<section id="terzo-cat-insert-box" class="card p-5 d-none animate__animated animate__zoomIn">

    <!-- TERZO CAT INSERT FORM -->

    <div class="form-box">

        <form action="" name="terzo-cat-insert-form" id="terzo-cat-insert-form" class="form">

            <label class="font-weight-bold" for="exampleFormControlTextarea1">Categories</label>

            <div class="form-group card p-3 bg-light">
                <h4 id="terzo-main-cat" class="text-danger">Tutoring</h4>
                <small id="textHelp" class="form-text text-muted">Grande </small>
                <div class="form-group mt-3">
                    <h4 id="terzo-primo-cat" class="text-danger"> -- Math</h4>
                    <small id="textHelp" class="form-text text-muted">Primo </small>
                </div>
                <div class="form-group mt-3">
                    <h4 id="terzo-secondo-cat" class="text-danger"> -- -- Grade 10</h4>
                    <small id="textHelp" class="form-text text-muted">Secondo </small>
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="terzo-input-terzo-cat" name="terzo-input-terzo-cat"
                    aria-describedby="textHelp" placeholder="TERZO" required>
                <small id="textHelp" class="form-text text-muted">
                    (&#x2264; 25 Characters)
                </small>
            </div>

            <!-- <button id="terzo-cat-user-validation-btn" type="submit" class="btn btn-primary btn-block">Make</button> -->
            <button id="terzo-cat-insert-submit-btn" type="button" class="btn btn-primary btn-block">Make</button>
            <button id="terzo-cat-validation-cancel-btn" type="button"
                class="btn btn-secondary btn-block">Cancel</button>

            <div class="my-3">
                <span id="ajax-failed-message-4"></span>
            </div>

        </form>

    </div>

</section>

<!-- PRIMO CAT USER VALIDATION BOX -->
<!-- <section id="terzo-cat-user-validation-box" class="card p-5 animate__animated animate__zoomIn d-none">

    <ul class="list-group">
        <li class="list-group-item active bg-light text-primary">
        <li class="list-group-item active bg-light text-primary">Please Verify List:<br>
            <small>(You cannot edit categories once they are created)</small>
        </li>
        <li class="list-group-item">Grande : <span class="pl-3 font-weight-bold" id="main-display-terzo"></span>
        </li>
        <li class="list-group-item">Primo : <span class="pl-3 font-weight-bold" id="primo-display-terzo"></span>
        </li>
        <li class="list-group-item">Secondo : <span class="pl-3 font-weight-bold" id="secondo-display-terzo"></span>
        </li>
        <li class="list-group-item">Terzo : <span class="pl-3 font-weight-bold" id="terzo-display-terzo"></span>
        </li>
    </ul>

    <button id="terzo-cat-insert-submit-btn" type="button" class="btn btn-primary btn-block">Make</button>
    <button id="terzo-cat-insert-cancel-btn" type="button" class="btn btn-secondary btn-block">Cancel</button>

    <div class="my-3">
        <span id="ajax-failed-message-4"></span>
    </div>

</section> -->