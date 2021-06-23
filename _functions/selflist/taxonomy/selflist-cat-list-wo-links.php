<?php
/**
 * This is the one that shows the Categories (Parent/Child hierarchy) with arrows
 */
function show_all_categories_without_links_and_arrows($post_id)
{
    $post_term_ids = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'ids', 'hide_empty' => 0));
    $term_ids = implode(',', $post_term_ids);

    $post_terms = get_the_category($post_id);
    echo '<pre>';
    print_r($post_terms_ids);
    echo '</pre>';

    foreach ($post_terms as $post_term) {
        if ($post_term->parent == 0) {
            $parent_cat_id = $post_term->term_id;
            $parent_cat_name = $post_term->name;
        }
        // echo $parent_cat_id;
    }

    $args = array(
        'title_li' => '',
        'style' => '',
        'echo' => false,
        'hierarchical' => true,
        'child_of' => $parent_cat_id, //parent category
        'include' => $term_ids,
    );

    $separator = '&nbsp;<i class="fas fa-arrow-right"></i>&nbsp;';

    $terms = wp_list_categories($args);
    $terms = trim(str_replace('<br />', $separator, $terms));

    echo '<small class="for-list-preview-window font-weight-bold text-dark">';
    echo $terms;
    echo '</small>';

    // if ($terms == 'No categories') {
    //     echo '<small class="for-list-preview-window font-weight-bold text-dark">';
    //     echo 'New category with 0 Listings. Cannot be displayed until published.';
    //     echo '</small>';
    // } else {
    //     echo '<small class="font-weight-bold">';
    //     echo $parent_cat_name . $separator;
    //     echo '</small>';
    //     echo '<small class="for-list-preview-window font-weight-bold text-dark">';
    //     echo $terms;
    //     echo '</small>';
    // }
    // Display post categories.

}