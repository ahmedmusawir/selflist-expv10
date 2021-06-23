<?php 
// ADDING CUSTOM INTERVAL
add_filter( 'cron_schedules', 'moose_add_cron_interval' );
function moose_add_cron_interval( $schedules ) { 
    $schedules['ten_seconds'] = array(
        'interval' => 10,
        'display'  => esc_html__( 'Every Ten Seconds' ), );
    return $schedules;
}
// SETTING MY CUSTOM HOOK FOR WP CRON 
add_action('moose_cron_hook', 'moose_cron_test');

// THE EVENT FUNCTION
function moose_cron_test() {
    // PREPARING POST ARGS
    $args = [
        'post_title' => 'NEW POST BY WP CRON EVERY 10 SECS',
    ];
    // INSERT POST EVERY 10 SECONDS
    wp_insert_post($args);
}
// SCHEDULING RECURRING EVENT

// TO PREVENT DUPLICATE EVENTS
if ( ! wp_next_scheduled( 'moose_cron_hook' ) ) {
  
    wp_schedule_event( time(), 'ten_seconds', 'moose_cron_hook' );
    
}