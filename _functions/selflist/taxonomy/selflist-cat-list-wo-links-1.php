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
    $order_id = $family_id = $subfamily_id = $supersubfamily_id = 0;

    // get order
    foreach ($terms as $term) {
        if ($order_id || $term->parent) {
            continue;
        }

        $order_id = $term->term_id;
        $order = $term->name;
    }

    // get family
    foreach ($terms as $term) {
        if ($family_id || $order_id != $term->parent) {
            continue;
        }

        $family_id = $term->term_id;
        $family = $term->name;
    }

    // get subfamily
    foreach ($terms as $term) {
        if ($subfamily_id || $family_id != $term->parent) {
            continue;
        }

        $subfamily_id = $term->term_id;
        $subfamily = $term->name;
    }

    // get subfamily
    foreach ($terms as $term) {
        if ($supersubfamily_id || $subfamily_id != $term->parent) {
            continue;
        }

        $supersubfamily_id = $term->term_id;
        $supersubfamily = $term->name;
    }


    // output
    // echo "State: $order, City: $family";
    // echo '
    // <p class="text-dark text-uppercase" style="font-size: .8rem; margin-bottom: 0;">
    //   <small class="font-weight-bold">Main Cat:
    //     <span class="text-info">' . $order . ',</span> Primo Cat: <span class="text-info">' . $family . '</span>
    //     </span> Secondo Cat: <span class="text-info">' . $subfamily . '</span>
    //     </span> Terzo Cat: <span class="text-info">' . $supersubfamily . '</span>
    //   </small>
    // </p>';

    $separator = '&nbsp;<i class="fas fa-arrow-right"></i>&nbsp;';


    echo '
    <p class="text-dark text-uppercase" style="font-size: 1rem; margin-bottom: 0;">
      <small class="font-weight-bold text-danger">
        <span class="text-danger">' . $order . '</span>' . $separator . '<span class="text-danger">' . $family . '</span>
        </span> Secondo Cat: <span class="text-danger">' . $subfamily . '</span>
        </span> Terzo Cat: <span class="text-danger">' . $supersubfamily . '</span>
      </small>
    </p>';
}