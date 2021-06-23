<?php 
$category_name = 'Category Moose 2';
$sub_cat_1 = 'Sub-category Level 1';
$sub_cat_2 = 'Sub-category Level 2';
$sub_cat_3 = 'Sub-category Level 3';

wp_insert_term(
  // the name of the category
  $category_name, 
  
  // the taxonomy, which in this case if category (don't change)
  'category'
  
);
  
  wp_insert_term(
  
      // the name of the sub-category
      $sub_cat_1, 
  
      // the taxonomy 'category' (don't change)
      'category',
  
      array(
  
      // link with main category. In the case, become a child of the "Category A" parent  
      'parent'=> term_exists( $category_name, 'category' )['term_id']
  
      )
  );

        wp_insert_term(
  
          // the name of the sub-category
          $sub_cat_2, 
  
          // the taxonomy 'category' (don't change)
          'category',
  
          array(
  
          // link with main category. In the case, become a child of the "Category A" parent  
          'parent'=> term_exists( $sub_cat_1, 'category' )['term_id']
  
          )
        );

            wp_insert_term(
  
              // the name of the sub-category
              $sub_cat_3, 
  
              // the taxonomy 'category' (don't change)
              'category',
  
              array(
  
              // link with main category. In the case, become a child of the "Category A" parent  
              'parent'=> term_exists( $sub_cat_2, 'category' )['term_id']
  
              )
            );