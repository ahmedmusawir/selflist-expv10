<?php 

/**
 * Modify the "must_log_in" string of the comment form.
 *
 * @see http://wordpress.stackexchange.com/a/170492/26350
 */
add_filter( 'comment_form_defaults', function( $fields ) {
    $fields['must_log_in'] = sprintf( 
        __( '<p class="must-log-in">
                 You must <a href="%s">Register</a> to list a comment.</p>' 
        ),
        wp_registration_url(),
        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )   
    );
    return $fields;
});

// ORIGINAL
// add_filter( 'comment_form_defaults', function( $fields ) {
//     $fields['must_log_in'] = sprintf( 
//         __( '<p class="must-log-in">
//                  You must <a href="%s">Register</a> or 
//                  <a href="%s">Login</a> to list a comment.</p>' 
//         ),
//         wp_registration_url(),
//         wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )   
//     );
//     return $fields;
// });