<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cyberize-app-dev
 */

$current_user = wp_get_current_user();
$user_firstname = $current_user->user_firstname;
$user_lastname = $current_user->user_lastname;
$user_id = $current_user->ID;
$user_email = $current_user->user_email; 

?>


<footer id="colophon" class="site-footer navbar fixed-bottom navbar-light bg-light">
    <div class="site-info">
        &copy; <?php echo date("Y"); ?> SelfLIST

        <?php 
        if (is_user_logged_in()) {
        ?>
        <a href="/selflist-support/?FIRST_NAME=<?php echo $user_firstname; ?>&LAST_NAME=<?php echo $user_lastname; ?>&MEMBER_EMAIL=<?php echo $user_email; ?>&MEMBER_ID=<?php echo $user_id; ?>"
            style="margin-left: 5px">
            SUPPORT
        </a>

        <?php
        }
        ?>

    </div><!-- .site-info -->
    <div class="term-and-conditions">
        <a href="/terms-and-conditions/" class="terms-link">TERMS & CONDITIONS</a>
    </div>

    <!--==============================================================================
		=            THIS IS FOR DEBUGGING. PLZ DISABLE WHEN READY TO PUBLISH            =
		===============================================================================-->

    <!-- <div style="color: dodgerblue"><strong>Current template:</strong>
        <?php get_current_template(true); ?>
    </div> -->


    <!-- ====  End of THIS IS FOR DEBUGGING. PLZ DISABLE WHEN READY TO PUBLISH  ==== -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>

</html>