<?php
/**
 * LIST INSERT PAGE: MAIN CATEGORY INSERT FORM
 */
?>


<section id="city-insert-form-box" class="card p-5 d-none animate__animated animate__zoomIn">

    <!-- CITY INSERT FORM -->

    <div class="form-box">

        <form action="" name="city-insert-form" id="city-insert-form" class="form">

            <label class="font-weight-bold" for="exampleFormControlTextarea1">
                <!-- Insert Your City Name -->
                New Market
            </label>

            <div class="form-group card pt-2 pl-2 bg-light">
                <h4 id="state-selected" class="text-danger">Georgia</h4>
                <!-- <small id="textHelp" class="form-text text-muted">This is your selected State</small> -->
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="city-input-element" name="city-input-element"
                    aria-describedby="textHelp" placeholder="New Market" required>
                <small id="textHelp" class="form-text text-muted">
                    (Up to 25 Characters)
                </small>
            </div>
            <span id="ajax-failed-message-city"></span>

            <button id="city-name-insert-btn" type="submit" class="btn btn-primary btn-block">Make</button>
            <button id="city-name-cancel-btn" type="button" class="btn btn-secondary btn-block">Cancel</button>

        </form>

    </div>

</section>