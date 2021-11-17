<?php
/**
 * DISPLAY CUSTOM TAXONOMY BY PARENT/CHILD ORDER
 * USAGE: print_taxonomy_ranks( get_the_terms( $post->ID, 'taxonomy_slug' ) );
 */
function print_taxonomy_ranks_for_listing_preview($terms = '')
{

    // check input
    if (empty($terms) || is_wp_error($terms) || !is_array($terms)) {
        return;
    }

    // set id variables to 0 for easy check
    $main_id = $primo_id = $secondo_id = $terzo_id = 0;

    // get order
    foreach ($terms as $term) {
        if ($main_id || $term->parent) {
            continue;
        }

        $main_id = $term->term_id;
        $main = $term->name;
    }

    // get family
    foreach ($terms as $term) {
        if ($primo_id || $main_id != $term->parent) {
            continue;
        }

        $primo_id = $term->term_id;
        $primo = $term->name;
    }

    // get subfamily
    foreach ($terms as $term) {
        if ($secondo_id || $primo_id != $term->parent) {
            continue;
        }

        $secondo_id = $term->term_id;
        $secondo = $term->name;
    }

    // get subfamily
    foreach ($terms as $term) {
        if ($terzo_id || $secondo_id != $term->parent) {
            continue;
        }

        $terzo_id = $term->term_id;
        $terzo = $term->name;
    }

    // output
    // echo "State: $main, City: $primo";
    // echo '
    // <p class="text-dark text-uppercase" style="font-size: .8rem; margin-bottom: 0;">
    //   <small class="font-weight-bold">Main Cat:
    //     <span class="text-info">' . $main . ',</span> Primo Cat: <span class="text-info">' . $primo . '</span>
    //     </span> Secondo Cat: <span class="text-info">' . $secondo . '</span>
    //     </span> Terzo Cat: <span class="text-info">' . $terzo . '</span>
    //   </small>
    // </p>';

    $separator = '&nbsp;&nbsp;<i class="fas fa-arrow-right text-dark"></i>&nbsp;';

    if (!$primo) {

        echo '
    <p class="text-dark text-uppercase" style="font-size: 1rem; margin-bottom: 0;">
      <small class="font-weight-bold text-danger">
        <span class="text-danger">' . $main . '</span>
      </small>
    </p>';

    } elseif (!$secondo) {

        echo '
    <p class="text-dark text-uppercase" style="font-size: 1rem; margin-bottom: 0;">
      <small class="font-weight-bold text-danger">
        <span class="text-danger">'  . $main . '</span>' . $separator . '<span class="text-danger">' . $primo . '</span>
        </span>
      </small>
    </p>';

    } elseif (!$terzo) {

        echo '
    <p class="text-dark text-uppercase" style="font-size: 1rem; margin-bottom: 0;">
      <small class="font-weight-bold text-danger">
        <span class="text-danger">' . $main . '</span>' . $separator . '<span class="text-danger">' . $primo . '</span>
        </span>' . $separator . '<span class="text-danger">'  . $secondo . '</span>
        </span>
      </small>
    </p>';

    } else {

        echo '
    <p class="text-dark text-uppercase" style="font-size: 1rem; margin-bottom: 0;">
      <small class="font-weight-bold text-danger">
        <span class="text-danger">' . $main . '</span>' . $separator . '<span class="text-danger">' . $primo . '</span>
        </span>' . $separator . '<span class="text-danger">' . $secondo . '</span>
        </span>' . $separator . '<span class="text-danger">' . $terzo . '</span>
      </small>
    </p>';

    }

}