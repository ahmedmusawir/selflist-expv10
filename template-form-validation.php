<?php
/**
 * The template for displaying all pages
 * Template Name: Form Validation Test
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

get_header();
?>

<main id="primary" class="site-main container">

  <header id="header-test" class="site-header container py-5 text-center">

    <h1>Form Validation Test</h1>

  </header><!-- #masthead -->

  <section class="the-form-container">

    <style>
    .error {
      color: red;
      font-size: .8rem;
      font-weight: bold;
    }
    </style>

    <div class="">
      <h2>Test Form</h2>

      <form action="" name="test-form" id="test-form" class="form">

        <div class="form-group">
          <label for="firstname">First Name</label><br>
          <input class="form-control mb-2" type="text" name="firstname" id="firstname" placeholder="John" required />
        </div>
        <div class="form-group">
          <label for="lastname">Last Name</label><br>
          <input class="form-control mb-2" type="text" name="lastname" id="lastname" placeholder="Doe" required />
        </div>
        <div class="form-group">
          <label for="email">Email</label><br>
          <input class="form-control mb-2" type="email" name="email" id="email" placeholder="john@doe.com" required />
        </div>


        <div class="form-group">
          <button class="btn btn-info" id="submit-btn" type="submit">Submit</button>
        </div>

      </form>
    </div>
  </section>
  <section id="php-testing">
    <?php 
    /**
     * COLLECT USER REGISTRATION DATE
     */
    $user_id = get_current_user_id();
    $udata = get_userdata( $user_id );
    $registered = $udata->user_registered;
    printf( '%s member since %s<br>', $udata->display_name, date( "d m yy", strtotime( $registered ) ) );
    
    /**
     * COLLECT USER REGISTRATION DATE
     */
    $user_id = get_current_user_id();
    $udata = get_userdata( $user_id );
    $registered = $udata->user_registered;
    printf( '%s<br>', date( "d", strtotime( $registered ) ) );
    printf( '%s<br>', date( "m", strtotime( $registered ) ) );
    printf( '%s<br>', date( "y", strtotime( $registered ) ) );

    /**
     * GET AUTHOR ID BY POST ID
     */
    $post_id = 365;
    $author_id = get_post_field( 'post_author', $post_id );
    echo 'Author ID: ' . $author_id . '<br>';
    $udata = get_userdata( $author_id );
    $registered = $udata->user_registered;
    printf( '%s<br>', date( "d", strtotime( $registered ) ) );
    printf( '%s<br>', date( "m", strtotime( $registered ) ) );
    printf( '%s<br>', date( "y", strtotime( $registered ) ) );



    ?>
  </section>

</main><!-- #main -->

<?php
get_footer();