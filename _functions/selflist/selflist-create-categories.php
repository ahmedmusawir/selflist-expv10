<?php 

$category_name = 'Category Moose 7';
$sub_cat_1 = 'Sub Cat Primo';
// $sub_cat_1_slug = sanitize_title($title);
$sub_cat_2 = 'Sub Cat Secondo';
// $sub_cat_2_slug = sanitize_title($sub_cat_2);
$sub_cat_3 = 'Sub Cat Terzo';
// $sub_cat_3_slug = sanitize_title($sub_cat_3);


/**
 * CHECKING IF CATEGORY EXISTS
 */
if (term_exists( $category_name, 'category' )) {
  echo 'CATEGORY EXITS!';
  die();
}

/**
 * INSERT MAIN CATEGORY
 */
$main_cat_info = wp_insert_term(
  // the name of the category
  $category_name, 
  
  // the taxonomy, which in this case if category (don't change)
  'category'
);
// COLLECTING MAIN CATEGORY 1 ID
$main_cat_id = $main_cat_info['term_id'];

/**
 * INSERT SUB CATEGORY 1 - PRIMO
 */
$sub_cat_1_info = wp_insert_term(

  // the name of the sub-category
  $sub_cat_1, 

  // the taxonomy 'category' (don't change)
  'category',

  array(
  // what to use in the url for term archive
  // 'slug' => $sub_cat_1_slug, 

  // link with main category. In the case, become a child of the "Category A" parent  
  'parent'=> $main_cat_id
  // 'parent'=> term_exists( $category_name, 'category' )['term_id']

  )
);

// COLLECTING SUB CATEGORY 1 ID
$sub_cat_1_id = $sub_cat_1_info['term_id'];

/**
 * INSERT SUB CATEGORY 2 - SECONDO
*/
$sub_cat_2_info = wp_insert_term(

  // the name of the sub-category
  $sub_cat_2, 

  // the taxonomy 'category' (don't change)
  'category',

  array(
  // what to use in the url for term archive
  // 'slug' => $sub_cat_2_slug, 

  // link with main category. In the case, become a child of the "Category A" parent  
  'parent'=> $sub_cat_1_id

  )
);
// COLLECTING SUB CATEGORY 2 ID
$sub_cat_2_id = $sub_cat_2_info['term_id'];

/**
 * INSERT SUB CATEGORY 3 - TERZO
*/
$sub_cat_3_info = wp_insert_term(

  // the name of the sub-category
  $sub_cat_3, 

  // the taxonomy 'category' (don't change)
  'category',

  array(
  // what to use in the url for term archive
  // 'slug' => $sub_cat_3_slug, 

  // link with main category. In the case, become a child of the "Category A" parent  
  'parent'=> $sub_cat_2_id

  )
);

    