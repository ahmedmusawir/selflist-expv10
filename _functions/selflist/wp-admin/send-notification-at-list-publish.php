<?php 
/**
 * SEND NOTIFICATION WHEN A LIST IS PUBLISHED
 * WP-ADMIN 
 */
// ENABLE HTML ON WP MAIL
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

// SEND NOTIFICATION
function post_published_notification( $post_id, $post ) {
    $author = $post->post_author; /* Post author ID. */
    $name = get_the_author_meta( 'display_name', $author );
    $email = get_the_author_meta( 'user_email', $author );
    $title = $post->post_title;

    $content = "
    
    <h4 style='padding:1rem; background:#e7e7e7;'> <span style='color:red'>LISTER ID:</span>      $author </h4>
    <h4 style='padding:1rem; background:#e7e7e7;'><span style='color:red'>LISTER NAME:</span>    $name </h4>
    <h4 style='padding:1rem; background:#e7e7e7;'><span style='color:red'>LISTER EMAIL:</span>   $email </h4>
    <hr>
    <h4 style='padding:1rem; background:#e7e7e7;'><span style='color:red'>LIST ID:</span>        $post_id </h4>
    <h4 style='padding:1rem; background:#e7e7e7;'><span style='color:red'>LIST TITLE:</span>     $title </h4>
    <hr>
    
    <h4 style='padding:1rem; background:#e7e7e7;'><span style='color:red'>LIST CONTENT:</span>   </h4>
    <h5 style='padding:2rem; background:#e7e7e7;'>$post->post_content</h5>
    
    ";

    // EMAIL INFO
    $to = 'moose@cyberizegroup.com';
    $subject = sprintf( 'Published: %s', $title );
    $message = $content;
    $headers[] = '';
    wp_mail( $to, $subject, $message, $headers );

    write_log($title);
    write_log('Post ID:' . $post_id);
    write_log($content);
}

add_action( 'publish_post', 'post_published_notification', 10, 2 );