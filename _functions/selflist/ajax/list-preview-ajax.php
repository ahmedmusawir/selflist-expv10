<?php
/**
 * INSERT MULTI LEVEL CATEGORIES WITH AJAX
 */

add_action('wp_ajax_nopriv_list_preview_ajax', 'list_preview_ajax');
add_action('wp_ajax_list_preview_ajax', 'list_preview_ajax');

function list_preview_ajax()
{

    $post_id = $_POST['post_id'];

    // PAGE TITLE
    echo '<h3 class="text-center">Preview<h3>';
    // echo '<h6 class="text-center">(Links are functional on active listing)</h6>';
    // echo '<h6 class="text-center">(List Status: Pending)</h6>';

    $args = [
        'post_type' => 'post',
        'p' => $post_id,
        'post_status' => 'pending',
    ];

    $the_list = new WP_Query($args);

    if ($the_list->have_posts()):

        while ($the_list->have_posts()): $the_list->the_post();?>

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
}

input[type="checkbox"]:checked:before {
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
    top: 5px;
    /* top: 19.35%; */
    transform: translate(-50%, -50%);
}
</style>


<section class="category">
    <main id="list-preview" class="site-main container category">
        <article id="" class="category animate__animated  animate__zoomIn">
            <header class="entry-header">

                <?php
        echo '<section class="post-item-cat-list">';
            // SHOW STATE & CITY IN A PARENT CHILD ORDER
            // Coming from _functions/helpers-setup.php
            print_taxonomy_ranks(get_the_terms(get_the_ID(), 'states'));

            /**
             * DISPLAY USER REGISTRATION DATE
             */
            $user_id = get_current_user_id();
            $udata = get_userdata($user_id);
            $registered = $udata->user_registered;

            echo '<span class="bg-danger text-light font-weight-bold float-right py-2 px-4" style="font-size: .8rem;">';
            printf('%s<br>', date("m", strtotime($registered)));
            printf('%s<br>', date("d", strtotime($registered)));
            printf('%s<br>', date("y", strtotime($registered)));
            echo '</span>';
            // DISPLAY LIST ID
            echo '<p class="font-weight-bold" style="margin-bottom: -.25rem; font-size: .8rem">LIST #' . $post_id . "</p>";

            /**
             *
             * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
             *
             */
            $taxonomy = 'category';
            // function coming from _functions/selflist/taxonomy/selflist-cat-list-w-links
            show_all_categories_w_links_and_arrows($post_id, $taxonomy);

            $cats = get_the_category($post_id);

            // print_taxonomy_ranks_for_listing_preview($cats);


            ?>

                <?php
        // ====================================== END CATEGORY LIST WITH PARENT CHILD ===================================

            if ('post' === get_post_type()):
            ?>
                <div class="entry-meta">
                    <?php
        cyberize_app_dev_posted_on();
            // cyberize_app_dev_posted_by();
            ?>
                </div><!-- .entry-meta -->
                <?php endif;?>
            </header><!-- .entry-header -->

            <?php cyberize_app_dev_post_thumbnail();?>

            <div id="post-content" class="entry-content">
                <?php
    the_content();
        ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">

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
                            <img title="Your Twitter Page" src="/wp-content/uploads/Twitter-Icon.png"
                                alt="Twitter Link">
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
                            <img title="Your Instagram Page" src="/wp-content/uploads/Instagram-icon.png"
                                alt="Instagram Link">
                        </a>
                    </div>
                    <?php endif;?>

                    <?php if (get_field('your_linkedin')): ?>
                    <div class="flex-icon-item">
                        <a href="<?php the_field('your_linkedin') ?>" target="_blank">
                            <img title="Your Linkedin Page" src="/wp-content/uploads/Linkedin-Icon.png"
                                alt="Linkedin Link">
                        </a>
                    </div>
                    <?php endif;?>

                    <?php if (get_field('your_youtube')): ?>
                    <div class="flex-icon-item">
                        <a href="<?php the_field('your_youtube') ?>" target="_blank">
                            <img title="Your Youtube Page" src="/wp-content/uploads/Youtube-Icon.png"
                                alt="youtube Link">
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
                            <img title="<?php echo get_field('your_site'); ?>"
                                src="/wp-content/uploads/Website-icon.png" alt="Website Link">
                        </a>
                    </div>

                    <div class="flex-icon-item">
                        <a href="/list-chat/" target="_blank">
                            <img title="Chat Page" src="/wp-content/uploads/Instant-Messaging-icon.png" alt="Chat Link">
                        </a>
                    </div>
                    <div class="flex-icon-item mr-3">
                        <div class="form-group" id="flag-btn">
                            <div class="input-group mb-2 mt-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fab fa-font-awesome-flag text-danger"></i>
                                    </div>
                                    <button class="btn btn-primary btn-sm flag-form-btn"
                                        data-key="flag-<?php echo get_the_ID(); ?>"
                                        data-list-id="<?php echo $post_id; ?>"
                                        data-flag-email="<?php echo get_field('your_email'); ?>">
                                        Flag
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-icon-item ml-3">
                        <input type="checkbox" name="list-hmu-checkbox" id="list-hmu-checkbox"
                            class="list-hmu-checkbox ml-5" autocomplete="off"
                            data-hmu="<?php echo get_field('your_email'); ?>" style="background: black;">
                        <span class="checkmark"></span>
                        <!-- <small class="" style="margin-left: 2.5rem;">&nbsp;&nbsp;RA</small> -->
                    </div>

                </section>

            </footer><!-- .entry-footer -->


        </article><!-- #post-ENDS -->
    </main>
</section>
<script>
jQuery(function($) {
    $('#list-hmu-checkbox').on('click', function() {
        alert('Invite checkbox will be enabled when the Listing is Published!');
        $(this).prop("checked", false);
    });
    $('#flag-btn').on('click', function() {
        alert('Flagging will be enabled when the Listing is Published!');
    });
});
</script>
<?php

    endwhile;

    endif;

    die();
}