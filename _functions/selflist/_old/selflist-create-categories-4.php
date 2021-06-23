<?php 

function get_random_slug( $title ) {

  // $title = 'This is a trumped up title';
  $text_slug = sanitize_title($title);
  $random_number = mt_rand(100000, 1000000);

  $random_slug = "$text_slug-$random_number";

  return $random_slug;

}


$category_name = 'Category Moose 4';
// $category_slug = get_random_slug($category_name);
// $sub_cat_1 = 'Sub-Mosh-category Level 1';
$sub_cat_1 = 'Sub-Mosh-category Level One';
$sub_cat_1_slug = sanitize_title($title);
$sub_cat_2 = 'Sub-Mosh-category Level Two';
$sub_cat_2_slug = sanitize_title($sub_cat_1);
// $sub_cat_1_slug = get_random_slug($sub_cat_1);
// $sub_cat_2 = 'Sub-category Level 2';
// $sub_cat_2_slug = get_random_slug($sub_cat_2);
// $sub_cat_3 = 'Sub-category Level 3';
// $sub_cat_3_slug = get_random_slug($sub_cat_3);

wp_insert_term(
  // the name of the category
  $category_name, 
  
  // the taxonomy, which in this case if category (don't change)
  'category'
  
  // array(
  
  // what to use in the url for term archive
  // 'slug' => $category_slug,  
  // )
);
  
    $sub_cat_2_id = wp_insert_term(
  
                      // the name of the sub-category
                      $sub_cat_1, 
                  
                      // the taxonomy 'category' (don't change)
                      'category',
                  
                      array(
                      // what to use in the url for term archive
                      'slug' => $sub_cat_1_slug, 
                  
                      // link with main category. In the case, become a child of the "Category A" parent  
                      'parent'=> term_exists( $category_name, 'category' )['term_id']
                  
                      )
                    );
    echo '<pre>';
    echo $sub_cat_2_id['term_id'];
    echo '</pre>';


        // wp_insert_term(
  
        //   // the name of the sub-category
        //   $sub_cat_2, 
  
        //   // the taxonomy 'category' (don't change)
        //   'category',
  
        //   array(
        //   // what to use in the url for term archive
        //   'slug' => $sub_cat_2_slug, 
  
        //   // link with main category. In the case, become a child of the "Category A" parent  
        //   'parent'=> term_exists( $sub_cat_1_slug, 'category' )['term_id']
  
        //   )
        // );
            
          // wp_insert_term(
  
          //     // the name of the sub-category
          //     'Sub-category Level 3', 
  
          //     // the taxonomy 'category' (don't change)
          //     'category',
  
          //     array(
          //     // what to use in the url for term archive
          //     'slug' => 'level-3', 
  
          //     // link with main category. In the case, become a child of the "Category A" parent  
          //     'parent'=> term_exists( 'Sub-category Level 2', 'category' )['term_id']
  
          //     )
          //   );