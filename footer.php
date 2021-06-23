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

?>


<footer id="colophon" class="site-footer navbar fixed-bottom navbar-light bg-light">
    <div class="site-info">
        &copy; <?php echo date("Y"); ?> SelfLIST
    </div><!-- .site-info -->
    <div class="term-and-conditions">
        <a href="/terms-and-conditions/" class="terms-link">Terms & Conditions</a>
    </div>

    <!--==============================================================================
		=            THIS IS FOR DEBUGGING. PLZ DISABLE WHEN READY TO PUBLISH            =
		===============================================================================-->

    <div style="color: dodgerblue"><strong>Current template:</strong>
        <?php get_current_template(true); ?>
    </div>


    <!-- ====  End of THIS IS FOR DEBUGGING. PLZ DISABLE WHEN READY TO PUBLISH  ==== -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>

</html>