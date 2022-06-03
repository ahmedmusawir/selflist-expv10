<?php 
/**
 * LIST INSERT PAGE: MAIN CATEGORY INSERT FORM
 */
?>


<section id="main-cat-insert-box" class="card p-5 animate__animated animate__zoomIn d-none">

    <!-- MAIN CAT INSERT FORM -->
    <div class="form-box">

        <form action="" name="main-cat-insert-form" id="main-cat-insert-form" class="form">

            <label class="font-weight-bold" for="exampleFormControlTextarea1">Create New List</label>
            <div class="form-group">
                <input type="text" class="form-control" id="main-input-main-cat" name="main-input-main-cat"
                    aria-describedby="textHelp" placeholder="New" required>
                <small id="textHelp" class="form-text text-muted">
                    (up to 30 Characters)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="main-input-primo-cat" name="main-input-primo-cat"
                    aria-describedby="textHelp" placeholder="New Primo">
                <small id="textHelp" class="form-text text-muted">
                    (up to 25 Characters)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="main-input-secondo-cat" name="main-input-secondo-cat"
                    aria-describedby="textHelp" placeholder="New Secondo">
                <small id="textHelp" class="form-text text-muted">
                    (up to 25 Characters)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="main-input-terzo-cat" name="main-input-terzo-cat"
                    aria-describedby="textHelp" placeholder="New Terzo">
                <small id="textHelp" class="form-text text-muted">
                    (up to 25 Characters)
                </small>
            </div>

            <button id="main-cat-user-validation-btn" type="submit" class="btn btn-primary btn-block">Create</button>
            <button id="main-cat-validation-cancel-btn" type="button"
                class="btn btn-secondary btn-block">Cancel</button>

        </form>

    </div>

</section>

<!-- MAIN CAT USER VALIDATION BOX -->
<section id="main-cat-user-validation-box" class="card p-5 animate__animated animate__zoomIn d-none">

    <ul class="list-group">
        <li class="list-group-item active bg-light text-primary">Please Verify List:<br>
            <!-- <small>(You cannot edit categories once they are created)</small> -->
        </li>
        <li class="list-group-item">New: <span class="pl-3 font-weight-bold" id="main-input"></span></li>
        <li class="list-group-item">Primo: <span class="pl-3 font-weight-bold" id="primo-input"></span></li>
        <li class="list-group-item">Secondo: <span class="pl-3 font-weight-bold" id="secondo-input"></span>
        </li>
        <li class="list-group-item">Terzo: <span class="pl-3 font-weight-bold" id="terzo-input"></span></li>
    </ul>

    <button id="main-cat-insert-submit-btn" type="button" class="btn btn-primary btn-block">Create</button>
    <button id="main-cat-insert-cancel-btn" type="button" class="btn btn-secondary btn-block">Cancel</button>

    <div class="my-3">
        <span id="ajax-failed-message-1"></span>
    </div>

</section>