<?php

////// Adiciona as media queries do bootstrap //////

function set_viewport() {
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
}
add_action('wp_head', 'set_viewport');


////// Adiciona o  favicon //////
function my_favicon() { ?>
  <link rel="shortcut icon" href="/wp-content/uploads/2020/12/logo_lar.png" >
  <?php }
add_action('wp_head', 'my_favicon');

////// Adiciona bootstrap e stylesheets //////
function load_stylesheets()
{
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 1, 'all');
  wp_enqueue_style('bootstrap');
  
  wp_register_style('stylesheet', get_template_directory_uri() . '/css/style.css', array(), 1, 'all');
  wp_enqueue_style('stylesheet');
  

} 
add_action('wp_enqueue_scripts','load_stylesheets');

function include_jquery()
{
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', '', 1, true);
  wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri().'/js/bootstrap.js', array('jquery'), NULL, true);
  add_action('wp_enqueue_scripts','jquery');
}

add_action('wp_enqueue_scripts','include_jquery');

////// Adiciona google fonts //////

function wpb_add_google_fonts() 

{
  wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

////// Adiciona limite de palavras nos posts //////
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'... <a href="'.$permalink.'" style="color: #774C1E"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg> Ler mais</a>'; 
  return $excerpt;
}




function loadjs()
{
  wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
  wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts','loadjs');
add_theme_support('menus');
add_theme_support('post-thumbnails');


register_nav_menus(
  array(
      'top-menu' => __('Top Menu','theme'),
      'footer-menu' => __('Footer Menu', 'theme')
  )
  );

  add_image_size('smallest', 300, 300, true);
  add_image_size('smallest', 800, 800, true);

// remove editor from wp

function remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

// Registo e loop de menu //

function theme_prefix_register_menus() {
  register_nav_menus(
  array(
  'primary_menu' => __( 'Primary Menu', 'theme_prefix' ),
  )
  );
}
add_action( 'init', 'theme_prefix_register_menus' );

function add_additional_class_on_li($classes, $item, $args) {
  if(isset($args->add_li_class)) {
          $classes[] = $args->add_li_class;
    }
  return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
      $classes[] = 'active ';
    }
    return $classes;
}




/**
 * Advanced Custom Fields Integration
 *
 * To access the ACF fields interface in the admin section, make sure you
 * set the below constant ACF_LITE to "FALSE" from the default "TRUE"
 *
 * Paste in your custom fields exported PHP code into inc/advanced-custom-fields/acf-fields.php
 *
 * We check ACF isn't already installed first or we get errors.
 *
 */

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/advanced-custom-fields/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/advanced-custom-fields/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/advanced-custom-fields/', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}

