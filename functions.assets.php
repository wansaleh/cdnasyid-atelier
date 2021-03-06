<?php

// //Making jQuery to load from Google Library
// function cdns_replace_jquery() {
//   $jquery_version = '1.12.2';
//   $jquery_migrate_version = '1.4.0';
//
//   if (!is_admin()) {
//     // comment out the next two lines to load the local copy of jQuery
//     wp_deregister_script('jquery');
//     wp_register_script('jquery', "//code.jquery.com/jquery-$jquery_version.min.js", false, $jquery_version);
//     wp_enqueue_script('jquery');
//
//     wp_deregister_script('jquery-migrate');
//     wp_register_script('jquery-migrate', "//code.jquery.com/jquery-migrate-$jquery_migrate_version.min.js", false, $jquery_migrate_version);
//     wp_enqueue_script('jquery-migrate');
//   }
// }
// add_action('init', 'cdns_replace_jquery');


// ASSETS
$asset_version = '1.1.4';

function cdns_google_fonts() {
  $query_args = array(
    'family' => 'Lato:300,300italic,900,900italic,400italic,400,700,700italic|Oswald:300,400,700|Montserrat:400,700'
  );
  wp_enqueue_style( 'cdns-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
add_action('wp_enqueue_scripts', 'cdns_google_fonts', 9999);

function cdns_main_style() {
  global $asset_version;

  if ( is_admin() ) return;

  echo '<link rel="stylesheet" property="stylesheet" id="cdnasyid-styles" href="' . cdns_uri() . '/css/cdnasyid.min.css?ver=' . $asset_version . '" type="text/css" media="all">';
}
add_action('wp_footer', 'cdns_main_style');
// add_action('sf_before_page_container', 'cdns_main_style');


function cdns_scripts() {
  global $asset_version;

  if ( is_admin() ) return;

  // select2
  if ( !is_checkout() ) {
    wp_enqueue_style('cdns-select2', cdns_uri() . '/bower_components/select2/dist/css/select2.min.css');
    wp_enqueue_script('cdns-select2', cdns_uri() . '/bower_components/select2/dist/js/select2.min.js', array(), $asset_version, true);
  }

  // // tinycolor
  // wp_enqueue_script('cdns-tinycolor', cdns_uri() . '/bower_components/tinycolor/dist/tinycolor-min.js', array(), $asset_version, true);
  //
  // // color-thief
  // wp_enqueue_script('cdns-color-thief', cdns_uri() . '/bower_components/color-thief/dist/color-thief.min.js', array(), $asset_version, true);
  //
  // // match height
  // wp_enqueue_script('cdns-matchheight', cdns_uri() . '/bower_components/matchHeight/dist/jquery.matchHeight-min.js', array(), $asset_version, true);
  //
  // // long shadow
  // wp_enqueue_script('cdns-longshadow', cdns_uri() . '/bower_components/jquery.longShadow/jquery.longShadow.js', array(), $asset_version, true);

  // main cdnaysid's js
  wp_enqueue_script('cdnasyid', cdns_uri() . '/js/cdnasyid.min.js', array(), $asset_version, true);
  wp_enqueue_script('cdnasyid');
}
add_action('wp_enqueue_scripts', 'cdns_scripts', 9999);


function cdns_admin_scripts() {
  global $asset_version;

  wp_enqueue_script('cdns-admin', cdns_uri() . '/js/cdnasyid-admin.js', array(), $asset_version, true);
}
add_action('admin_enqueue_scripts', 'cdns_admin_scripts', 9999);
