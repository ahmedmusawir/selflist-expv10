<?php 
// CALCULATING MEMBER REGISTRATION DATE
$current_user = wp_get_current_user();
$user_registered = $current_user->user_registered
?>
<!-- MAIN FORM INPUTS - NAME, ADDRESS, SOCIAL LINKS ETC. -->
<form action="" name="list-insert-main-form" id="list-insert-main-form" class="form">
    <!-- DESCRIPTION - 140 CHAR LIMIT -->

    <div class="form-group mt-5">
        <!-- <label class="font-weight-bold" for="lister-description">Description:</label> -->
        <label class="font-weight-bold" for="exampleFormControlTextarea1">Insert List Details:</label>

        <textarea class="form-control" id="lister-description" name="lister-description" rows="3"
            placeholder="Add details of the list ...(Limit: 140 Characters)"></textarea>
    </div>
    <!-- NAME -->
    <div class="form-group">
        <!-- <label class="font-weight-bold" for="lister-name">Contact:</label> -->
        <input type="text" class="form-control" id="lister-name" name="lister-name" aria-describedby="textHelp"
            placeholder="My Name">
        <!-- <small id="textHelp" class="form-text text-muted">Ex: John Doe</small> -->
    </div>
    <!-- PHONE -->
    <div class="form-group">
        <!-- <label class="font-weight-bold" for="lister-phone">Phone:</label> -->
        <input type="tel" class="form-control" id="lister-phone" name="lister-phone" aria-describedby="textHelp"
            placeholder="My Phone Number">
        <!-- <small id="textHelp" class="form-text text-muted">Ex: 6781231234</small> -->
    </div>
    <!-- EMAIL -->
    <div class="form-group">
        <!-- <label class="font-weight-bold" for="lister-email">Email:</label> -->
        <input type="email" class="form-control" id="lister-email" name="lister-email" aria-describedby="textHelp"
            placeholder="My Email Address">
        <!-- <small id="textHelp" class="form-text text-muted">Ex: john@doe.com</small> -->
    </div>
    <!-- WEBSITE -->
    <div class="form-group">
        <!-- <label class="font-weight-bold" for="lister-website">Website:</label> -->
        <input type="text" class="form-control" id="lister-website" name="lister-website" aria-describedby="textHelp"
            placeholder="My Website">
        <!-- <small id="textHelp" class="form-text text-muted">Ex: https://you-website.com</small> -->
    </div>
    <!-- SOCIAL MEDIA  -->
    <!-- Facebook -->
    <div class="form-group">
        <label class="font-weight-bold" for="exampleFormControlTextarea1">My Social Media:</label>
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="text-danger fab fa-facebook-f"></i></div>
            </div>
            <input type="url" class="form-control" id="lister-facebook" name="lister-facebook"
                placeholder="https://facebook.com/mypage">
        </div>
        <!-- <small id="textHelp" class="form-text text-muted">Example: https://facebook.com/mypage</small> -->
    </div>
    <!-- Yelp -->
    <div class="form-group">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="text-danger fab fa-yelp"></i></div>
            </div>
            <input type="url" class="form-control" id="lister-yelp" name="lister-yelp"
                placeholder="https://yelp.com/mypage">
        </div>
        <!-- <small id="textHelp" class="form-text text-muted">Example: https://yelp.com/mypage</small> -->
    </div>
    <!-- Instagram -->
    <div class="form-group">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="text-danger fab fa-instagram"></i></div>
            </div>
            <input type="url" class="form-control" id="lister-instagram" name="lister-instagram"
                placeholder="https://instagram.com/mypage">
        </div>
        <!-- <small id="textHelp" class="form-text text-muted">Example: https://instagram.com/mypage</small> -->
    </div>
    <!-- LinkedIn -->
    <div class="form-group">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="text-danger fab fa-linkedin-in"></i></div>
            </div>
            <input type="url" class="form-control" id="lister-linkedin" name="lister-linkedin"
                placeholder="https://linkedin.com/mypage">
        </div>
        <!-- <small id="textHelp" class="form-text text-muted">Example: https://linkedin.com/mypage</small> -->
    </div>

    <!-- Twitter -->
    <div class="form-group">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="text-danger fab fa-twitter"></i></div>
            </div>
            <input type="url" class="form-control" id="lister-twitter" name="lister-twitter"
                placeholder="https://twitter.com/mypage">
        </div>
        <!-- <small id="textHelp" class="form-text text-muted">Example: https://twitter.com/mypage</small> -->
    </div>

    <!-- LISTING SINCE -->
    <div class="form-group">
        <label class="font-weight-bold" for="lister-name">Listing Since:</label>
        <div class="card bg-light pl-3 pt-3">
            <p class="text-danger font-weight-bold">
                <?php printf('%s<br>', date("M d, Y", strtotime($user_registered)));?>
            </p>
        </div>
    </div>

    <!-- THE SUBMIT BUTTON -->
    <!-- <button id="list-insert-button" type="button" class="btn btn-primary"> -->
    <button id="list-user-validation-button" type="submit" class="btn btn-primary btn-block">
        List
    </button>

</form>