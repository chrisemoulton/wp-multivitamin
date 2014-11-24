<?php

// Register and Enqueue Scripts
function init_js() {

  // Set Site Scripts
  if (!is_admin() && !is_login_page()) {

    // Redfine jQuery
    wp_deregister_script('jquery');
    wp_register_script(
      $handle = 'site-js-jquery',
      $src = "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js",
      $deps = array(),
      $ver = null,
      $in_footer = true
    );
    wp_enqueue_script( 'site-js-jquery' );

    // Define Modernizr
    wp_register_script(
      $handle = 'site-js-modernizr',
      $src = "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.7.1.js",
      $deps = array(),
      $ver = null,
      $in_footer = false
    );
    wp_enqueue_script( 'site-js-modernizr' );

    // Define main vendor scripts
    wp_register_script(
      $handle = 'site-js-vendors',
      $src = get_bloginfo('template_directory') . '/assets/js/vendors.js',
      $deps = array('site-js-jquery'),
      $ver = null,
      $in_footer = true
    );
    wp_enqueue_script( 'site-js-vendors' );

    // Define main scripts file
    wp_register_script(
      $handle = 'site-js-scripts',
      $src = get_bloginfo('template_directory') . '/assets/js/scripts.js',
      $deps = array('site-js-jquery', 'site-js-vendors'),
      $ver = null,
      $in_footer = true
    );
    wp_enqueue_script( 'site-js-scripts' );

  }

  // Set Admin Scripts
  if (is_admin() || is_login_page()) {

    // Define main admin scripts
    wp_register_script(
      $handle = 'admin-js-scripts',
      $src = get_bloginfo('template_directory') . '/assets/js/admin.js',
      $deps = array('jquery'),
      $ver = null,
      $in_footer = true
    );
    wp_enqueue_script( 'admin-js-scripts' );

  }

}

// Initialize Scripts
add_action('init', 'init_js');

?>
