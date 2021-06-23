<?php

function get_selflist_sub_cats_to_json($cat_id)
{
    $results = array(
        'primo' => array(),
        'secondo' => array(),
        'terzo' => array(),
    );
    /**
     * PRIMO LEVEL BEGINS
     */
    $args = array(
        'parent' => $cat_id, // Gives 1st child only. child_of give all the children
        'hide_empty' => 0,
    );
    $sub2_cats = get_categories($args);
    // echo '<pre>';
    // print_r($sub2_cats);
    // echo '</pre>';

    /**
     * PRIMO LEVEL CATEGORY LOOP
     */

    foreach ($sub2_cats as $sub_cat) {

        array_push($results['primo'], array(
            'primoName' => $sub_cat->name,
            'primoSlug' => $sub_cat->slug,
            'primoId' => $sub_cat->term_id,
            'parentId' => $sub_cat->parent,
            'primoLink' => get_category_link($sub_cat->term_id),
            'primoCount' => $sub_cat->count,
        ));

        /**
         * SECONDO LEVEL BEGINS
         */
        $args = array(
            'parent' => $sub_cat->term_id, // Gives 1st child only. child_of give all the children
            'hide_empty' => 0,
        );
        $sub3_cats = get_categories($args);
        /**
         * SECONDO LEVEL CATEGORY LOOP
         */
        foreach ($sub3_cats as $sub2_cat) {

            array_push($results['secondo'], array(
                'secondoName' => $sub2_cat->name,
                'secondoSlug' => $sub2_cat->slug,
                'secondoId' => $sub2_cat->term_id,
                'parentId' => $sub2_cat->parent,
                'secondoLink' => get_category_link($sub2_cat->term_id),
                'secondoCount' => $sub2_cat->count,
            ));

            /**
             * TERZO LEVEL BEGINS
             */
            $args = array(
                'parent' => $sub2_cat->term_id, // Gives 1st child only. child_of give all the children
                'hide_empty' => 0,
            );
            $sub4_cats = get_categories($args);

            foreach ($sub4_cats as $sub3_cat) {

                array_push($results['terzo'], array(
                    'terzoName' => $sub3_cat->name,
                    'terzoSlug' => $sub3_cat->slug,
                    'terzoId' => $sub3_cat->term_id,
                    'parentId' => $sub3_cat->parent,
                    'terzoLink' => get_category_link($sub3_cat->term_id),
                    'terzoCount' => $sub3_cat->count,
                ));

            } //END sub4_cats

        } //END sub3_cats

    } //END get_sub2_cats

    return $results;
}