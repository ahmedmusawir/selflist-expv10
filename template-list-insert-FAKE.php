<?php
 /**
  * The template for displaying all pages
  * Template Name: List Insert FAKE
  * This is the template that displays all pages by default.
  * Please note that this is the WordPress construct of pages
  * and that other 'pages' on your WordPress site may use a
  * different template.
  *
  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
  *
  * @package cyberize-app-dev
  */

 //  get_header();
 get_header('loggedout');

?>
<style>
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

textarea {
    color: red;
    font-size: .8rem;
    font-weight: bold;
}

input::placeholder {
    font-size: .8rem !important;
}

textarea::placeholder {
    font-size: .8rem !important;
}

#lister-facebook-error,
#lister-twitter-error,
#lister-instagram-error,
#lister-yelp-error,
#lister-linkedin-error,
#lister-youtube-error {
    position: absolute;
    top: 110%;
    left: 0%;
}
</style>

<main id="primary" class="site-main container-fluid">

    <header>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
            integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    </header>

    <style>
    .ispinner {
        margin: auto;
        width: 100px !important;
        height: 150px !important
    }

    .ispinner-blade {
        width: 20px !important;
        height: 100px !important;
        border-radius: 15px !important;
    }
    </style>

    <div class="row">
        <!-- LIST INSERT BLOCK -->
        <section class="col-12 col-sm-12 col-md-12 col-lg-6 mt-5">
            <!-- <h4 class="text-center font-weight-bold">MY NEW LISTING</h4> -->
            <article id="create-new-list-box" class="card p-3  animate__animated animate__zoomIn">

                <!-- MAIN CATEGORY SET DISPLAY AFTER INSERTED INTO THE DB -->

                <?php get_template_part('_custom-template-parts/insert-pg-main-cat-set-display-after-creation');?>

                <!-- END MAIN CATEGORY SET DISPLAY AFTER INSERTED INTO THE DB -->

                <!-- CATEGORY SELECTIZE CHOICE BOX - MAIN, PRIMO, SECONDO & TERZO -->

                <?php get_template_part('_custom-template-parts/fake-list-insert-pg-cat-select-box');?>

                <!-- END CATEGORY SELECTIZE CHOICE BOX - MAIN, PRIMO, SECONDO & TERZO -->


                <!-- STATE & CITY SELECTIZE CHOICE BOX -->

                <?php get_template_part('_custom-template-parts/fake-list-insert-city-state-select-box');?>
                <?php // get_template_part('_custom-template-parts/city-insert-form');?>

                <!-- END STATE & CITY SELECTIZE CHOICE BOX -->

                <!-- THE MAIN FORM INPUTS START -->

                <?php get_template_part('_custom-template-parts/fake-list-insert-pg-main-inputs');?>


                <!-- END THE MAIN FORM INPUTS  -->

            </article> <!-- END OF id="create-new-list-box" -->

            <!-- START OF MAIN CAT INSERT FORM -->

            <?php get_template_part('_custom-template-parts/insert-pg-main-cat-insert-form');?>

            <!-- END OF MAIN CAT INSERT FORM -->

            <!-- START OF PRIMO CAT INSERT FORM -->

            <?php get_template_part('_custom-template-parts/insert-pg-primo-cat-insert-form');?>

            <!-- END OF PRIMO CAT INSERT FORM -->

            <!-- START OF SECONDO CAT INSERT FORM -->

            <?php get_template_part('_custom-template-parts/insert-pg-secondo-cat-insert-form');?>

            <!-- END OF SECONDO CAT INSERT FORM -->

            <!-- START OF TERZO CAT INSERT FORM -->

            <?php get_template_part('_custom-template-parts/insert-pg-terzo-cat-insert-form');?>
            <article class="main-content">

                <!-- END OF TERZO CAT INSERT FORM -->

                <!-- LIST INSERT USER VALIDATION BOX -->

                <?php get_template_part('_custom-template-parts/insert-pg-user-validation-box');?>

                <!-- END OF LIST INSERT USER VALIDATION BOX -->


        </section>
        <!-- LEFT COLUMN ENDS HERE -->


        <!-- CATEGORY SEARCH COLUMN [RIGHT COLUMN STARTS]-->
        <section class="col-12 col-sm-12 col-md-12 col-lg-6">
            <div id="primary" class="site-main container mt-5">

                <!-- <hr> -->
                <!-- <h4 id="insert-search-cat-header" class="text-center">COMPARATIVE LISTINGS</h4> -->


                <section id="selflist-search-input-box" class="selflist-search-input-box">
                    <style>
                    .selflist-search-input::placeholder {

                        color: rgba(255, 0, 0, 0.4) !important;
                        /* line-height: 5rem !important; */
                        /* margin-top: -1rem !important; */
                    }

                    .selflist-search-input::-webkit-input-placeholder {
                        font-size: 18px !important;
                        color: #AAA;
                        transform: translate3d(0, -5px, 0)
                            /* transform: translate3d(0, -9px, 0) */
                    }
                    </style>

                    <input type="text" id="cat-search-input-json" class="selflist-search-input" placeholder="">
                    <i class="fas fa-search"></i>

                </section>


                <div id="category-search-json-result" class="moose-cols">


                </div> <!-- #main -->

        </section>
    </div>

    </article>

    <footer>
        <script>
        // $(document).ready(function() {
        //   $('select').selectize({
        //     sortField: 'text'
        //   });
        // });
        </script>
    </footer>

</main><!-- #main -->

<!-- THE DELSIT MODAL -->
<style>
#DELIST-close-btn,
#DELIST-action-btn {
    width: 200px !important;
}
</style>

<!-- Modal -->
<div class="modal fade text-center" id="the-FAKE-LIST-BTN-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog" role="document"> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <!-- <h5 class="modal-title text-light" id="exampleModalLabel">DELIST</h5> -->
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <h4>#<span id="DELIST-list-id"></span></h4>
                <!-- <h4>Your List Will Be Deactivated!</h4> -->
            </div>
            <div class="modal-footer justify-content-center">
                <button id="DELIST-close-btn" type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button id="DELIST-action-btn" type="button" class="btn btn-primary">
                    Delist
                </button>
            </div>
        </div>
    </div>
</div>

<!-- END THE DELSIT MODAL -->

<?php
get_footer();