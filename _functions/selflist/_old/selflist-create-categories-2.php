<?php 

wp_insert_term(
  // the name of the category
  'Category A', 
  
  // the taxonomy, which in this case if category (don't change)
  'category', 
  
  array(
  
  // what to use in the url for term archive
  'slug' => 'category-a',  
  ));
  wp_insert_term(
  
      // the name of the sub-category
      'Sub-category Level 1', 
  
      // the taxonomy 'category' (don't change)
      'category',
  
      array(
      // what to use in the url for term archive
    //   'slug' => 'level-1', 
  
      // link with main category. In the case, become a child of the "Category A" parent  
      'parent'=> term_exists( 'Category A', 'category' )['term_id']
  
      ));
      wp_insert_term(
  
          // the name of the sub-category
          'Sub-category Level 2', 
  
          // the taxonomy 'category' (don't change)
          'category',
  
          array(
          // what to use in the url for term archive
        //   'slug' => 'level-2', 
  
          // link with main category. In the case, become a child of the "Category A" parent  
          'parent'=> term_exists( 'Sub-category Level 1', 'category' )['term_id']
  
          ));
          wp_insert_term(
  
              // the name of the sub-category
              'Sub-category Level 3', 
  
              // the taxonomy 'category' (don't change)
              'category',
  
              array(
              // what to use in the url for term archive
            //   'slug' => 'level-3', 
  
              // link with main category. In the case, become a child of the "Category A" parent  
              'parent'=> term_exists( 'Sub-category Level 2', 'category' )['term_id']
  
              ));