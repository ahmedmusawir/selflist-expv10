<?php
// ADDING CUSTOM INTERVAL
// The following was needed for testing

// add_filter('cron_schedules', 'selflist_add_cron_interval');
// function selflist_add_cron_interval($schedules)
// {
//     $schedules['ten_seconds'] = array(
//         'interval' => 10,
//         'display' => esc_html__('Every Ten Seconds'));
//     return $schedules;
// }

// SETTING MY CUSTOM HOOK FOR WP CRON
add_action('selflist_auto_point_hook', 'selflist_add_monthly_points');

// THE EVENT FUNCTION
function selflist_add_monthly_points()
{
    // CHECKING FOR 1ST DAY OF THE MONTH
    $date = date('d');

    if ('01' == $date) {

        // USER QUERY ARGS
        $args = array(
            'role' => 'subscriber',
        );

        // THE USER QUERY
        $user_query = new WP_User_Query($args);

        // THE USER LOOP
        if (!empty($user_query->get_results())) {
            foreach ($user_query->get_results() as $user) {

                // GETTING USER'S OLD POINTS
                $points_from_user = get_field('selflist_points', 'user_' . $user->ID);
                // SET MONTHLY AUTO POINTS
                $monthly_auto_points = 25;

                // NEW POINT CALCULATION
                $new_points_total = $points_from_user + $monthly_auto_points;
                // UPDATE THE USER'S POINTS FIELD
                update_user_meta($user->ID, 'selflist_points', $new_points_total);

            }

        }
    }

}

// SCHEDULING RECURRING EVENT

// TO PREVENT DUPLICATE EVENTS
if (!wp_next_scheduled('selflist_auto_point_hook')) {

    wp_schedule_event(time(), 'daily', 'selflist_auto_point_hook');

}