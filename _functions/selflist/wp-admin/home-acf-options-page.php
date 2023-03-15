<?php

if (function_exists('acf_add_options_page')) {

 acf_add_options_page(array(
  'page_title' => 'Selflist General Settings',
  'menu_title' => 'Selflist Settings',
  'menu_slug'  => 'theme-general-settings',
  'capability' => 'edit_posts',
  'redirect'   => false
 ));

}