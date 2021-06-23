<?php

  function get_selflist_sub_cats_to_json($cat_id) {
       /**
       * PRIMO LEVEL BEGINS
       */
      $args = array( 
        'parent' => $cat_id, // Gives 1st child only. child_of give all the children
        'hide_empty' => 1 
      );
      $sub2_cats = get_categories($args);
        // echo '<pre>';
        // print_r($sub2_cats);
        // echo '</pre>';

      if (! $sub2_cats ) {
        echo '
        <section id="no-cat-found" class="card text-center">

          No More Categories ...
          <p>Back to Category Search<p>
          <a class="btn btn-danger btn-sm btn-block" href="/category-search-index/">Back</a>
          
        </section>
        ';
      }
      /**
       * PRIMO LEVEL CATEGORY LOOP
       */

      foreach($sub2_cats as $sub_cat) {

        $results['primo'] = array(
          'primo-name' => $sub_cat->name,
          'primo-slug' => $sub_cat->slug,
          'primo-id' => $sub_cat->term_id,
          'parent-id' => $sub_cat->parent
        ); 

        /**
         * SECONDO LEVEL BEGINS
         */
        $args = array( 
          'parent' => $sub_cat->term_id, // Gives 1st child only. child_of give all the children
          'hide_empty' => 1 
        );
        $sub3_cats = get_categories($args);
        /**
         * SECONDO LEVEL CATEGORY LOOP
         */
        foreach($sub3_cats as $sub2_cat) {
    
        $results['secondo'] = array(
          'secondo-name' => $sub2_cat->name,
          'secondo-slug' => $sub2_cat->slug,
          'secondo-id' => $sub2_cat->term_id,
          'parent-id' => $sub2_cat->parent
        ); 


            /**
             * TERZO LEVEL BEGINS
             */
            $args = array( 
              'parent' => $sub2_cat->term_id, // Gives 1st child only. child_of give all the children
              'hide_empty' => 1 
            );
            $sub4_cats = get_categories($args);

            foreach($sub4_cats as $sub3_cat) {

              $results['terzo'] = array(
                'terzo-name' => $sub3_cat->name,
                'terzo-slug' => $sub3_cat->slug,
                'terzo-id' => $sub3_cat->term_id,
                'parent-id' => $sub3_cat->parent
              ); 

            
            } //END sub4_cats

        } //END sub3_cats

      } //END get_sub2_cats

      return $results;
  }
  
  