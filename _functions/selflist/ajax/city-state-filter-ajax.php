<?php 
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

add_action('wp_ajax_nopriv_city_state_filter_ajax', 'city_state_filter_ajax');
add_action('wp_ajax_city_state_filter_ajax', 'city_state_filter_ajax');

// ================= MOOSE TESTING =============
    //CYBERIZE FRAMEWORK 1.0 HMU UNIFIED AND MINIFIED
// wp_enqueue_script('Bootstrap-js', get_template_directory_uri() . '/_functions/selflist/ajax/bootstrap4.min.js', array('jquery'), time(), false);

// ================= END MOOSE TESTING =============
 function city_state_filter_ajax() {

  $current_cat_id = $_POST['currentCatId'];
  $state_slug = $_POST['stateSlug'];
  $city_slug = $_POST['citySlug'];

  // echo "<h4>Current Cat ID: $current_cat_id</h4><br>"; 
  // echo "<h4>Current State Slug: $state_slug</h4><br>"; 
  // echo "<h4>Current City Slug: $city_slug</h4><br>"; 

  // WP LOOP STARTS
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  // echo 'Paged :' . $paged;
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'paged' => $paged,
    'category__in' => [ $current_cat_id ], //App Dev
    'tax_query' => [
      'relation' => 'AND',
      [
        'taxonomy' => 'states',
        'field' => 'slug',
        'terms' => [ $state_slug ],
      ],
      [
        'taxonomy' => 'states',
        'field' => 'slug',
        'terms' => [ $city_slug ],
      ],
    ],
  );

  $query = new WP_Query( $args );

  if ( $query->have_posts() ) :

    while ( $query->have_posts() ) :
      $query->the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item animate__animated'); ?>>
    <header class="entry-header">
        <script src="<?php echo get_template_directory_uri() ?>/_functions/selflist/ajax/bootstrap4.min.js"></script>

        <?php
        // AJAX ADMIN URL
        echo '<div id="ajax-admin-url" class="d-none">' . admin_url('admin-ajax.php') . '</div>';
      // CITY & STATE TAXONMY DISPLAY BY LIST START
      $tax = get_the_terms( get_the_ID(), 'states');

      foreach( $tax as $term ) {
        if ( $term->parent == 0 ) {
          $current_state = $term->name;
        } else {
          $current_city = $term->name;
        }
      } 

      echo '
      <p class="text-dark text-uppercase" style="font-size: .8rem; margin-bottom: 0;">
        <small class="font-weight-bold">Situs: 
          <span class="text-info">' . $current_state .',</span> Market <span class="text-info">' .  $current_city .'</span>
        </small>
      </p>';

      /**
         * 
         * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
         * 
         */
        
        echo '<section class="post-item-cat-list">';
        /**
         * DISPLAY USER REGISTRATION DATE
         */
        $user_id = get_post_field( 'post_author' ); // Getting Author ID by Post ID (optional)
        $udata = get_userdata( $user_id );
        $registered = $udata->user_registered;
        echo '<span class="bg-danger text-light font-weight-bold float-right py-2 px-4" style="font-size: .8rem;">';
        printf( '%s<br>', date( "d", strtotime( $registered ) ) );
        printf( '%s<br>', date( "m", strtotime( $registered ) ) );
        printf( '%s<br>', date( "y", strtotime( $registered ) ) );
        echo '</span>';
        // DISPLAY LIST ID
        echo '<p class="font-weight-bold" style="margin-bottom: -.5rem; font-size: .8rem">LISTING #' . get_the_ID() . "</p>";
        
        $taxonomy = 'category';

        // Get the term IDs assigned to post.
        $post_terms = wp_get_object_terms( get_the_ID(), $taxonomy, array( 'fields' => 'ids' ) );
        
        // Separator between links.
        $separator = '&nbsp;<i class="fas fa-arrow-right"></i>&nbsp;';
        
        if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
        
            $term_ids = implode( ',' , $post_terms );
        
            $terms = wp_list_categories( array(
                'title_li' => '',
                'style'    => 'none',
                'echo'     => false,
                'taxonomy' => $taxonomy,
                'include'  => $term_ids
            ) );
        
            $terms = trim( str_replace( '<br />',  $separator, $terms ));
        
            // Display post categories.
            echo  $terms;
          }

          echo '</section>'; //END .post-item-cat-list

          // =========================================END MOOSE TEST========================================

      if ( 'post' === get_post_type() ) :
                  ?>
        <div class="entry-meta">
            <?php
        cyberize_app_dev_posted_on();
        // cyberize_app_dev_posted_by();
      ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php cyberize_app_dev_post_thumbnail(); ?>

    <div id="post-content" class="entry-content">
        <?php
      the_excerpt();
    ?>
    </div><!-- .entry-content -->

    <!-- AUTHOR NAME BOX -->
    <div class="list-author-box">
        <!-- OLD CHAT -->
        <!-- <p class="list-author float-left">
            Chat:
            <span class="text-danger">
                <?php //echo $udata->display_name; ?>
                <?php echo $udata->user_firstname . ' ' . $udata->user_lastname; ?>
            </span>
        </p> -->
        <!-- NEW AUTHOR ARCHIVE LINK -->
        <p class="list-author float-left">
            <!-- Chat: -->
            <span class="text-danger">
                <?php //the_author_posts_link(); ?>
                <a href="<?php echo get_author_posts_url($udata->ID); ?>">
                    <?php echo $udata->user_firstname . ' ' . $udata->user_lastname; ?>
                </a>
            </span>
        </p>
        <a class="btn btn-outline-danger btn-sm float-right mt-1" href="<?php echo get_permalink(); ?>">SHARE</a>
    </div>

    <!-- FOOTER GOES HERE -->
    <footer class="entry-footer">

        <style>
        input[type=checkbox] {
            /* Double-sized Checkboxes */
            -ms-transform: scale(2.2);
            /* IE */
            -moz-transform: scale(2.2);
            /* FF */
            -webkit-transform: scale(2.2);
            /* Safari and Chrome */
            -o-transform: scale(2.2);
            /* Opera */
            transform: scale(2.2);
            /* padding: 10px; */
            margin-top: .5rem;
            accent-color: black;

        }

        /* input[type="checkbox"]:checked:before {
            font-family: "FontAwesome";
            font-size: .9rem;
            color: black;
            content: "\f14a";
            background: transparent;
            position: absolute;
            border-radius: 2px;
            width: 12px;
            height: 12px;
            left: 45%;
            top: 19.28%;
            transform: translate(-50%, -50%);
        } */
        </style>

        <section class="flex-icon-five">

            <?php if (get_field('your_facebook')): ?>
            <div class="flex-icon-item">
                <a href="<?php the_field('your_facebook') ?>" target="_blank">
                    <img title="Your Facebook Page" src="/wp-content/uploads/fb-icon.png" alt="Facebook Link">
                </a>
            </div>
            <?php endif;?>

            <?php if (get_field('your_twitter')): ?>
            <div class="flex-icon-item">
                <a href="<?php the_field('your_twitter') ?>" target="_blank">
                    <img title="Your Twitter Page" src="/wp-content/uploads/Twitter-Icon.png" alt="Twitter Link">
                </a>
            </div>
            <?php endif;?>

            <?php if (get_field('your_yelp')): ?>
            <div class="flex-icon-item">
                <a href="<?php the_field('your_yelp') ?>" target="_blank">
                    <img title="Your Yelp Page" src="/wp-content/uploads/Yelp-icon.png" alt="Yelp Link">
                </a>
            </div>
            <?php endif;?>

            <?php if (get_field('your_instagram')): ?>
            <div class="flex-icon-item">
                <a href="<?php the_field('your_instagram') ?>" target="_blank">
                    <img title="Your Instagram Page" src="/wp-content/uploads/Instagram-icon.png" alt="Instagram Link">
                </a>
            </div>
            <?php endif;?>

            <?php if (get_field('your_linkedin')): ?>
            <div class="flex-icon-item">
                <a href="<?php the_field('your_linkedin') ?>" target="_blank">
                    <img title="Your Linkedin Page" src="/wp-content/uploads/Linkedin-Icon.png" alt="Linkedin Link">
                </a>
            </div>
            <?php endif;?>

            <?php if (get_field('your_youtube')): ?>
            <div class="flex-icon-item">
                <a href="<?php the_field('your_youtube') ?>" target="_blank">
                    <img title="Your Youtube Page" src="/wp-content/uploads/Youtube-Icon.png" alt="youtube Link">
                </a>
            </div>
            <?php endif;?>

        </section>

        <section class="flex-icon-five">

            <div class="flex-icon-item">
                <a href="tel:<?php the_field('your_phone') ?>">
                    <img title="Phone: <?php the_field('your_phone') ?>" src="/wp-content/uploads/Cell-icon.png"
                        alt="Phone Number">
                </a>
            </div>
            <div class="flex-icon-item">
                <!-- <a href="mailto:webmaster@example.com"> -->
                <a href="mailto:<?php echo get_field('your_email'); ?>" target="_blank">
                    <img title="<?php echo get_field('your_email'); ?>" src="/wp-content/uploads/Email-icon.png"
                        alt="Email Address">
                </a>
            </div>
            <div class="flex-icon-item">
                <a href="<?php echo get_field('your_site'); ?>" target="_blank">
                    <img title="<?php echo get_field('your_site'); ?>" src="/wp-content/uploads/Website-icon.png"
                        alt="Website Link">
                </a>
            </div>

            <!-- <div class="flex-icon-item">
                <a href="/list-chat/" target="_blank">
                    <img title="Chat Page" src="/wp-content/uploads/Instant-Messaging-icon.png" alt="Chat Link">
                </a>
            </div> -->
            <!-- OLD FLAG -->
            <!-- <div class="flex-icon-item mr-3">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-font-awesome-flag text-danger"></i>
                            </div>
                            <button class="btn btn-primary btn-sm flag-form-btn"
                                data-key="flag-<?php echo get_the_ID(); ?>" data-list-id="<?php echo get_the_ID(); ?>"
                                data-flag-email="<?php echo get_field('your_email'); ?>"
                                data-ajaxUrl="<?php echo admin_url('admin-ajax.php');?>">
                                Flag
                            </button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- NEW FLAG -->
            <div class="flex-icon-item">
                <style>
                .btn-outline-primary.flag-form-btn {
                    padding-top: .25rem !important;
                    padding-bottom: .10rem !important;
                    padding-left: 1rem;
                    padding-right: 1rem;
                }

                .btn-outline-primary.flag-form-btn:hover {
                    background: white;
                }

                .btn-outline-primary.flag-form-btn.disabled {
                    background: #e3e3e3;
                    /* border: 1rem dotted red; */
                }

                .list-hmu-checkbox {
                    margin-left: 1.8rem;
                }

                i.fab {
                    font-size: 1rem;
                }
                </style>

                <button class="btn btn-outline-primary btn-sm flag-form-btn" data-key="flag-<?php echo get_the_ID(); ?>"
                    data-list-id="<?php echo $post->ID; ?>" data-flag-email="<?php echo get_field('your_email'); ?>">
                    <i class="fab fa-font-awesome-flag text-primary"></i>
                </button>

            </div>
            <div class="flex-icon-item">
                <input type="checkbox" name="list-hmu-checkbox" class="list-hmu-checkbox" autocomplete="off"
                    data-hmu="<?php echo get_field('your_email'); ?>" style="background: black;">
                <span class="checkmark"></span>
                <!-- <small class="" style="margin-left: 2.5rem;">&nbsp;&nbsp;RA</small> -->
            </div>

        </section>


    </footer><!-- .entry-footer -->

    <!-- END FOOTER GOES HERE -->
</article><!-- Main Article List Item ends -->





<?php     
     endwhile;        
     else :
        
        echo "<div class='mb-5'>No Listing Found in ...<span class='text-capitalize font-weight-bold text-primary'>$city_slug</span></div>" ;
        
    endif;
    
    // WP LOOP ENDS
    
    ?>


<!-- HMU SCRIPT FOR AJAX - START -->
<script>
jQuery(function($) {
    // alert('started jQuery in ajax');
    let hmuEmailArray = [];
    // COLLECTING ELEMENTS
    const hmuStartBtn = $('#start-hmu-btn');
    const hmuCheckbox = $('.list-hmu-checkbox');

    // SETTING EVENTS
    hmuCheckbox.on('change', clickCheckboxHandler);

    function clickCheckboxHandler(e) {
        // alert('Checkbox clicked from Ajax')
        if (e.target.checked) {
            let hmuEmail = $(e.target).data('hmu');

            // Adding collected email to Array
            hmuEmailArray.push(hmuEmail);
            // console.log('LIST HMU CHECKBOX -- ', hmuEmailArray);
        } else {
            let hmuEmail = $(e.target).data('hmu');

            // Removing collected email to Array
            hmuEmailArray = hmuEmailArray.filter((email) => {
                return email != hmuEmail;
            });
            // console.log('LIST HMU CHECKBOX -- ', hmuEmailArray);

            // Disabling the Start HMU when no email in the list
            if (hmuEmailArray.length === 0) {
                hmuStartBtn.addClass('disabled');
                hmuStartBtn.removeClass('btn-dark');
                hmuStartBtn.addClass('btn-outline-dark');
            }
        } // End e.target.checked IF/ELSE Logic

        makeGravityBtnUrl();


    } // END clickCheckboxHandler(e)

    function makeGravityBtnUrl() {
        const uniqueHmuEmails = hmuEmailArray.filter((email, i) => {
            return i == hmuEmailArray.indexOf(email);
        });
        // console.log('Unique:', uniqueHmuEmails);

        // Creating comma separated string
        const readyHmuEmails = uniqueHmuEmails.join();

        // console.log('String: ', readyHmuEmails);

        const gravityHmuLink = `/list-hmu/?HMU_EMAIL_LIST=${readyHmuEmails}`;

        // Updating the HMU Start button
        if (readyHmuEmails.length) {
            hmuStartBtn.attr('href', gravityHmuLink).removeClass('disabled');
            hmuStartBtn
                .attr('href', gravityHmuLink)
                .removeClass('btn-outline-dark');
            hmuStartBtn.attr('href', gravityHmuLink).addClass('btn-dark');
        }
    } // END makeGravityBtnUrl()

}); // END hmu script
</script>
<!-- HMU SCRIPT FOR AJAX - END -->

<!-- FLAG SCRIPT FOR AJAX - START -->

<script>
jQuery(function($) {
    // GLOBALS
    let flagListId;
    let flagEmail;
    let flagTitle;
    let flagContent;
    let ajaxUrl;
    let ajaxFunction;
    // COLLECTING ELEMENTS
    const flagListBtn = $('.flag-form-btn');
    const theFlagModal = $('#the-flag-modal-ajax');


    //SETTING EVENTS
    flagListBtn.on('click', clickInsertHandler);

    function clickInsertHandler(e) {
        // alert('Flag btn clicked')
        flagKey = $(e.target).data('key');
        flagListId = $(e.target).data('list-id');
        flagEmail = $(e.target).data('flag-email');
        ajaxUrl = $('#ajax-admin-url').text();
        ajaxFunction = 'list_flag_ajax';

        // console.log('FLAG KEY:', flagKey)
        // console.log('FLAG LIST ID:', flagListId)
        // console.log('FLAG EMAIL:', flagEmail)
        // console.log('FLAG AJAX URL:', ajaxUrl)

        // OPENING THE MODAL
        theFlagModal.modal({
            // backdrop: 'static',
            keyboard: false,
        });
    }

    // COLLECTING FORM ELEMENTS
    const flagAjaxSubmitBtn = $('#flag-ajax-submit-btn-ajax');
    const flagTextArea = $('#flag-textarea-ajax');
    // COLLECTING FLAG FORM ELEMENT
    // flagInsertForm = $('#flag-insert-form');

    // SETTING MODAL SUBMIT BUTTON'S EVENT
    flagAjaxSubmitBtn.on('click', ajaxFlagInsertHandler);

    function ajaxFlagInsertHandler(e) {
        // e.preventDefault();
        console.log('MODAL BTN CLICKED');

        // PREPING LIST DATA
        const flagTitle = `Flagged List ID: ${flagListId}`;
        const flagContent = flagTextArea.val().trim();

        // GETTING DATA READY FOR AJAX
        let newListData = {
            title: flagTitle,
            content: flagContent,
            email: flagEmail,
            listId: flagListId,
        };
        console.log('FLAG AJAX DATA:', newListData);

        // AJAX CALL TO WP DB BEGINS
        $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    action: ajaxFunction,
                    newListData,
                },
            })
            .done((response) => {
                console.info(response);
                console.log('Awesome! ... Ajax Success');
                location.reload();
            })
            .fail((response) => {
                console.error('Sorry ... Ajax failed');
                console.error('[FlagListFormAjax.js]', response);
            })
            .always(() => {
                // console.info('Ajax finished as always...');
            });
    }


}) //END of Flag Script for Ajax
</script>

<!-- FLAG SCRIPT FOR AJAX - END -->

<?php


wp_die();
}