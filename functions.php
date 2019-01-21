<?php

// ******************* Sidebars ****************** //

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Blog',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

// ******************* Add Custom Menus ****************** //

add_theme_support( 'menus' );

// ******************* Add Custom Excerpt Lengths ****************** //

function wpe_excerptlength_index($length) {
    return 160;
}
function wpe_excerptmore($more) {
    return '...<a href="'. get_permalink().'">Read More ></a>';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

// ******************* Add Post Thumbnails ****************** //

add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 50, 50, true );
add_image_size( 'xlarge', 1200, 1200);

// ******************* Add Custom Post Types & Taxonomies ****************** //

register_post_type('custom', array(
  'label' => __('Custom Post Type'),
  'singular_label' => __('Custom Post Type'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  'rewrite' => true,
  'query_var' => false,
  'has_archive' => false,
  'supports' => array('title', 'editor', 'thumbnail')
));

add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
  register_taxonomy( 'taxo', 'custom', array( 'hierarchical' => true, 'label' => 'Custom Taxonomy', 'query_var' => true, 'rewrite' => true ) ); 
}

// ******************* ACF Options Page ****************** //

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// ******************* Remove jQuery From Header ****************** //

add_action('init', 'verge_head_cleanup');
function verge_head_cleanup() {
  remove_action( 'wp_head', 'feed_links_extra', 3 );
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'index_rel_link' );
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
  remove_action( 'wp_head', 'wp_generator' );
  if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', '', '', '', true);
  }
}

// ******************* Add SVG Upload Support ****************** //

function wpcontent_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );
add_filter( 'wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4 );

function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon) {
  if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
    if(is_array($size)) {
        $image[1] = $size[0];
        $image[2] = $size[1];
    } elseif(($xml = simplexml_load_file($image[0])) !== false) {
        $attr = $xml->attributes();
        $viewbox = explode(' ', $attr->viewBox);
        $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
        $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
    } else {
        $image[1] = $image[2] = null;
    }
  }
  return $image;
} 

// ******************* Remove Admin Bar ****************** //

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	 show_admin_bar(false);
}

// ******************* Search Only WP Pages ****************** //

function search_only_pages($query) {
  if ($query->is_search && !is_admin() ) {
      $query->set('post_type',array('page'));
  }
  return $query;
}
add_filter('pre_get_posts','search_only_pages');



?>
