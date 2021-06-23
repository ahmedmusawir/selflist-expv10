<?php
/**
 * This is the one that shows the Categories (Parent/Child hierarchy) with arrows
 */
function show_all_categories_w_links_and_arrows($post_id, $taxonomy)
{

    // $taxonomy = 'category';

// Get the term IDs assigned to post.
    $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'ids'));

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
        echo '<small class="font-weight-bold">';
        echo $terms;
        echo '</small>';
    }

    echo '</section>'; //END .post-item-cat-list

}