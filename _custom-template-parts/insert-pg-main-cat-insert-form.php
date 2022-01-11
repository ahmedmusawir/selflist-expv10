<?php 
/**
 * LIST INSERT PAGE: MAIN CATEGORY INSERT FORM
 */
?>


<section id="main-cat-insert-box" class="card p-5 animate__animated animate__zoomIn d-none">

    <!-- MAIN CAT INSERT FORM -->
    <div class="form-box">

        <form action="" name="main-cat-insert-form" id="main-cat-insert-form" class="form">

            <label class="font-weight-bold" for="exampleFormControlTextarea1">Create New Category and
                Subcategories</label>
            <div class="form-group">
                <input type="text" class="form-control" id="main-input-main-cat" name="main-input-main-cat"
                    aria-describedby="textHelp" placeholder="New Main Category" required>
                <small id="textHelp" class="form-text text-muted">
                    Main Category (25 Char Limit. Letters, numbers & Space only)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="main-input-primo-cat" name="main-input-primo-cat"
                    aria-describedby="textHelp" placeholder="New Primo Category">
                <small id="textHelp" class="form-text text-muted">
                    Primo Category (20 Char Limit. Letters, numbers & Space only)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="main-input-secondo-cat" name="main-input-secondo-cat"
                    aria-describedby="textHelp" placeholder="New Secondo Category">
                <small id="textHelp" class="form-text text-muted">
                    Secondo Category (20 Char Limit. Letters, numbers & Space only)
                </small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="main-input-terzo-cat" name="main-input-terzo-cat"
                    aria-describedby="textHelp" placeholder="New Terzo Category">
                <small id="textHelp" class="form-text text-muted">
                    Terzo Category (20 Char Limit. Letters, numbers & Space only)
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
        <li class="list-group-item active bg-light text-primary">Please Verify Categories:<br>
            <!-- <small>(You cannot edit categories once they are created)</small> -->
        </li>
        <li class="list-group-item">Main Category: <span class="pl-3 font-weight-bold" id="main-input"></span></li>
        <li class="list-group-item">Primo Category: <span class="pl-3 font-weight-bold" id="primo-input"></span></li>
        <li class="list-group-item">Secondo Category: <span class="pl-3 font-weight-bold" id="secondo-input"></span>
        </li>
        <li class="list-group-item">Terzo Category: <span class="pl-3 font-weight-bold" id="terzo-input"></span></li>
    </ul>

    <button id="main-cat-insert-submit-btn" type="button" class="btn btn-primary btn-block">Create</button>
    <button id="main-cat-insert-cancel-btn" type="button" class="btn btn-secondary btn-block">Cancel</button>

    <div class="my-3">
        <span id="ajax-failed-message-1"></span>
    </div>

</section>