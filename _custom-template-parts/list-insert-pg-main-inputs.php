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
        <label class="font-weight-bold" for="exampleFormControlTextarea1">Key Words:</label>

        <textarea class="form-control" id="lister-description" name="lister-description" rows="3"
            placeholder="Up to 140 Characters" maxlength="140"></textarea>
    </div>
    <!-- NAME -->
    <label class="font-weight-bold" for="exampleFormControlTextarea1">Auto Links:</label>

    <div class="form-group">
        <!-- <label class="font-weight-bold" for="lister-name">Contact:</label> -->
        <input type="text" class="form-control" id="lister-name" name="lister-name" aria-describedby="textHelp"
            placeholder="Name">
        <!-- <small id="textHelp" class="form-text text-muted">Ex: John Doe</small> -->
    </div>
    <!-- PHONE -->
    <div class="form-group">
        <!-- <label class="font-weight-bold" for="lister-phone">Phone:</label> -->
        <input type="tel" class="form-control" id="lister-phone" name="lister-phone" aria-describedby="textHelp"
            placeholder="Phone">
        <!-- <small id="textHelp" class="form-text text-muted">Ex: 6781231234</small> -->
    </div>
    <!-- EMAIL -->
    <div class="form-group">
        <!-- <label class="font-weight-bold" for="lister-email">Email:</label> -->
        <input type="email" class="form-control" id="lister-email" name="lister-email" aria-describedby="textHelp"
            placeholder="Email Address">
        <!-- <small id="textHelp" class="form-text text-muted">Ex: john@doe.com</small> -->
    </div>
    <!-- WEBSITE -->
    <div class="form-group">
        <!-- <label class="font-weight-bold" for="lister-website">Website:</label> -->
        <input type="text" class="form-control" id="lister-website" name="lister-website" aria-describedby="textHelp"
            placeholder="Website">
        <!-- <small id="textHelp" class="form-text text-muted">Ex: https://you-website.com</small> -->
    </div>
    <!-- SOCIAL MEDIA  -->
    <!-- Facebook -->
    <div class="form-group">
        <!-- <label class="font-weight-bold" for="exampleFormControlTextarea1">My Social Media:</label> -->
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

    <!-- Youtube -->
    <div class="form-group">
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="text-danger fab fa-youtube"></i></div>
            </div>
            <input type="url" class="form-control" id="lister-youtube" name="lister-youtube"
                placeholder="https://youtube.com/mypage">
        </div>
        <!-- <small id="textHelp" class="form-text text-muted">Example: https://twitter.com/mypage</small> -->
    </div>

    <section id="LOADING-SPINNER" class="d-none">
        <div class="text-center ispinner gray large animating">
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
            <div class="ispinner-blade"></div>
        </div>
    </section>

    <!-- LISTING SINCE -->

    <div class="form-group">
        <label class="font-weight-bold" for="lister-name">Listing Since:</label>
        <div class="row pl-0 pt-1">
            <div class="col-4">
                <?php echo '<span id="date-box" class="bg-danger text-light font-weight-bold float-left py-2 px-4"
                    style="font-size: .8rem;">';
                    printf('%s<br>', date("m", strtotime($user_registered)));
                    printf('%s<br>', date("d", strtotime($user_registered)));
                    printf('%s<br>', date("y", strtotime($user_registered)));
                    echo '</span>'; 
            ?>

            </div>
            <div class="col-8"></div>
            <!-- <p class="text-danger font-weight-bold">
                <?php printf('%s<br>', date("M d, Y", strtotime($user_registered)));?>
            </p> -->
        </div>
    </div>
    <!-- TERMS AND CONDS -->
    <div class="form-group">
        <label class="font-weight-bold" for="lister-terms">Terms & Conditions:</label>
        <div class="card bg-light pl-3 pt-3">
            <p class="text-danger font-weight-bold">
                <input type="checkbox" name="lister-terms" id="lister-terms"><span class="terms-text ml-2">Accept</span>
            </p>
        </div>
    </div>



    <!-- THE SUBMIT BUTTON -->
    <button id="list-user-validation-button" type="submit" class="btn btn-primary btn-block">
        List
    </button>
    <!-- <button id="list-insert-submit-btn" type="submit" class="btn btn-primary btn-block">
        List
    </button> -->


</form>