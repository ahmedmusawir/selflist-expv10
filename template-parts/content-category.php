<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

?>
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
    background-color: black !important;
    color: black;
}


/* input[type="checkbox"]:before {
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
    top: 19.90%;
    transform: translate(-50%, -50%);
} */

/* left: 50%; */
/* top: 19.26%; */
/* top: 19.24%; */
</style>

<article id="post-<?php the_ID();?>" <?php post_class('post-item animate__animated');?>>
    <header class="entry-header">

        <?php
          // SHOW STATE & CITY IN A PARENT CHILD ORDER
          // Location: _functions/helpers-setup.php
          print_taxonomy_ranks( get_the_terms( get_the_ID(), 'states' ) );
/**
 *
 * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
 *
 */

echo '<section class="post-item-cat-list">';
/**
 * DISPLAY USER REGISTRATION DATE
 */
$user_id = get_post_field('post_author'); // Getting Author ID by Post ID (optional)
$udata = get_userdata($user_id);
$registered = $udata->user_registered;
echo '<span class="bg-danger text-light font-weight-bold float-right py-2 px-4" style="font-size: .8rem;">';
printf('%s<br>', date("m", strtotime($registered)));
printf('%s<br>', date("d", strtotime($registered)));
printf('%s<br>', date("y", strtotime($registered)));
echo '</span>';

// DISPLAY THE CATEGORY TITLE AGAIN FOR SOME WEIRD REASON
// the_archive_title( '<h6 class="page-title font-weight-bold text-uppercase">', '</h6>' );

 
                

// ========================================= DISPLAY CATEGORY LIST W/ LINKS ========================================

$taxonomy = 'category';

// Get the term IDs assigned to post.
$post_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));

// Separator between links.
$separator = '&nbsp;<i class="fas fa-arrow-right"></i>&nbsp;';

if (!empty($post_terms) && !is_wp_error($post_terms)) {

    $term_ids = implode(',', $post_terms);

    $terms = wp_list_categories(array(
        'title_li' => '',
        'style' => 'none',
        'echo' => false,
        'taxonomy' => $taxonomy,
        'include' => $term_ids,
    ));

    $terms = trim(str_replace('<br />', $separator, $terms));
    // $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

    // Display post categories.
    echo "<h6 class='font-weight-bold' style='font-size: .80rem;'>LIST:  $terms <h6>";
}

echo '</section>'; //END .post-item-cat-list

// ========================================= END CATEGORY LIST W/ LINKS ========================================
// DISPLAY LIST ID
echo '<p class="font-weight-bold" style="margin-bottom: -.5rem; font-size: .8rem">LISTING #' . get_the_ID() . "</p>";


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

    <?php //cyberize_app_dev_post_thumbnail();?>

    <div id="post-content" class="entry-content">
        <?php
        the_content();
        ?>
        <!-- AUTHOR NAME BOX -->
        <div class="list-author-box">
            <p class="list-author float-left">
                Chat:
                <span class="text-danger">
                    <?php //echo $udata->display_name; ?>
                    <?php echo $udata->user_firstname . ' ' . $udata->user_lastname; ?>
                </span>
            </p>
            <a class="btn btn-outline-danger btn-sm float-right mt-1" href="<?php echo get_permalink(); ?>">SHARE</a>
        </div>
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

            <div class="flex-icon-item">
                <a href="/list-chat/" target="_blank">
                    <img title="Chat Page" src="/wp-content/uploads/Instant-Messaging-icon.png" alt="Chat Link">
                </a>
            </div>
            <div class="flex-icon-item mr-3">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-font-awesome-flag text-danger"></i>
                            </div>
                            <button class="btn btn-primary btn-sm flag-form-btn"
                                data-key="flag-<?php echo get_the_ID(); ?>" data-list-id="<?php echo $post->ID; ?>"
                                data-flag-email="<?php echo get_field('your_email'); ?>">
                                Flag
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-icon-item ml-3">

                <input type="checkbox" name="list-hmu-checkbox" class="list-hmu-checkbox ml-5" autocomplete="off"
                    data-hmu="<?php echo get_field('your_email'); ?>" style="background: black;">
            </div>

        </section>

    </footer><!-- .entry-footer -->
</article><!-- #post--->