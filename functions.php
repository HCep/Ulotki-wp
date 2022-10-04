<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on _s, use a find and replace
		* to change '_s' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', '_s' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'_s_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_s' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_s' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', '_s' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add footer content here.', '_s' ),
			'before_widget' => '<section id="%1$s" class="footer-wrap-content %2$s">',
			'after_widget'  => '</section>',
		)
	);
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), _S_VERSION ); 
	wp_enqueue_style( 'splide-css', get_stylesheet_uri() . '/css/splide.min.css', array(), _S_VERSION ); 
	wp_style_add_data( '_s-style', 'rtl', 'replace' );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true ); 
	wp_enqueue_script( 'splide-js', get_template_directory_uri() . '/js/splide.min.js', array(), _S_VERSION, true ); 
	 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
function cptui_register_services() {

	$labels = [
		"name" => __( "Usługi", "clean" ),
		"singular_name" => __( "usługi", "clean" ),
	];

	$args = [
		"label" => __( "Usługi", "clean" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "uslugi", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
		"taxonomies" => [ ""],
		"show_in_graphql" => false,
	];

	register_post_type( "uslugi", $args );
}

add_action( 'init', 'cptui_register_services' );

function cptui_register_reference() {

	$labels = [
		"name" => __( "Referencje", "clean" ),
		"singular_name" => __( "referencje", "clean" ),
	];

	$args = [
		"label" => __( "Referencje", "clean" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "referencje", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'custom-fields'],
		"taxonomies" => [ "category"],
		"show_in_graphql" => false,
	];

	register_post_type( "referencje", $args );
}

add_action( 'init', 'cptui_register_reference' );

function cptui_register_graphic() {

	$labels = [
		"name" => __( "Grafika", "clean" ),
		"singular_name" => __( "grafika", "clean" ),
	];

	$args = [
		"label" => __( "Grafika", "clean" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "grafiki", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
		"taxonomies" => [ "category"],
		"show_in_graphql" => false,
	];

	register_post_type( "grafika", $args );
}

add_action( 'init', 'cptui_register_graphic' );

function cptui_register_price_areas() {

	$labels = [
		"name" => __( "Cennik-obszary", "clean" ),
		"singular_name" => __( "cennik-obszary", "clean" ),
	];

	$args = [
		"label" => __( "Cennik-obszary", "clean" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "obszary", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'custom-fields'],
		"taxonomies" => [ ""],
		"show_in_graphql" => false,
	];

	register_post_type( "cennik-obszary", $args );
}

add_action( 'init', 'cptui_register_price_areas' );
function shortcode_of_posts(){
 
	$result  = '<section class="recent_posts" >';
	$result .= '<div class="recent_posts-wrap">';
  $args = array(
				  'post_type'      => 'post',
				  'posts_per_page' => '6',
				  'order' => 'ASC',
			   );

  $query = new WP_Query($args);

  if($query->have_posts()) :

	  while($query->have_posts()) :

		  $query->the_post() ;

		  $result .= '<div class="recent_posts-single">';
		  $result .= '<a class="recent_posts-link" href="';
		  $result .= get_permalink();
		  $result .= '"><img class="recent_posts-img" src="'. get_the_post_thumbnail_url().'"/> ';
		  $result .= '<h3 class="recent_posts-title">'. get_the_title() .'</h3>';
		  $result .= '<p class="recent_posts-content">'. get_the_excerpt() .' </p>';
          $result .=  '</a></div>';
	  endwhile;

	  wp_reset_postdata();

  endif;    
 			
  $result .=  '</div>';
  $result .= '</section>';


	
  return $result;            
}

add_shortcode( 'posty', 'shortcode_of_posts' ); 


function shortcode_slide_of_references(){
 
	$result = '<section class="splide" >';
	$result .= '<div class="splide__track">';
	$result .=	'<ul class="splide__list">';
  $args = array(
				  'post_type'      => 'referencje',
				  'posts_per_page' => -1,
				  'publish_status' => 'published',
			   );

  $query = new WP_Query($args);

  if($query->have_posts()) :
		$x =0;
	  while($query->have_posts()) :
			$x++;
		  $query->the_post() ;
		  $result .= '<li class="splide__slide"><div class="ref_single">';
		  if(!empty(get_field('ref_img'))){
          $result .=  '<a href="'.get_field('ref_img')['url'].'" data-lightbox="image-'.$x.'"><img src="'. get_field('ref_img')['url']  .'" alt="'. get_field('ref_img')['alt']  .'" /></a>';
		  }
		  $result .= '<div class="slide__content"><div><h3 class="slide__heading">'. get_field('ref_name')  .'</h3><span class="ref_company">'. get_field('ref_company') .'</span> <p>'. get_field('ref_content') .'</p></div>';
          $result .=  '</div></div></li>';
	  endwhile;

	  wp_reset_postdata();

  endif;    
 			
  $result .=   '</ul>';
  $result .=  '</div>';
  $result .= '</section>';


	
  return  $result;            
}

add_shortcode( 'referencje', 'shortcode_slide_of_references' ); 


function shortcode_of_services(){
 
	$result  = '<section class="additional_services" >';
	$result .= '<div class="additional_services-wrap">';
  $args = array(
				  'post_type'      => 'uslugi',
				  'posts_per_page' => '3',
				  'order' => 'ASC',
			   );

  $query = new WP_Query($args);

  if($query->have_posts()) :

	  while($query->have_posts()) :

		  $query->the_post() ;

		  $result .= '<div class="additional_services-single">';
		  $result .= '<img class="additional_services-img" src="'. get_the_post_thumbnail_url().'"/> ';
		  $result .= '<h3 class="additional_services-title">'. get_the_title() .'</h3>';
		  $result .= '<p class="additional_services-content">'. get_the_excerpt() .' </p>';
		  $result .= '<a class="additional_services-link" href="';
		  $result .= get_permalink();
		  $result .= '">Dowiedz się więcej</a>';
          $result .=  '</div>';
	  endwhile;

	  wp_reset_postdata();

  endif;    
 			
  $result .=  '</div>';
  $result .= '</section>';


	
  return $result;            
}

add_shortcode( 'uslugi', 'shortcode_of_services' ); 


function shortcode_of_graphic(){
 
	$result  = '<section class="graphic_section" >';
	$result .= '<div class="graphic_section-wrap">';
	
  $args = array(
				  'post_type'      => 'grafika',
				  'posts_per_page' => -1,
			   );

  $query = new WP_Query($args);

  if($query->have_posts()) :
	
    $result .= '<div class="graphic-items-list">';
	  while($query->have_posts()) :
		
		
		  $query->the_post() ;  
		  global $post;
		
		  $slug = $post->post_name;
		  $id = $post->ID;
		if(strpos($slug, 'grafika') !== false){

		}else {
			$result .='	<input type="button" value="'.get_the_title() .'" name="brand'. $id .'" class="single-graphic-item" href="#!" id="'. $id .'" data-slug="'. $slug .'">';

		}  
	  endwhile;

	  wp_reset_postdata();
	  $result .= ' </div>';
  endif;    

  $result .=  '</div>';
  $result .= '</section>';


	
  return $result;            
}

add_shortcode( 'grafika', 'shortcode_of_graphic' ); 

function register_js_files() {
	wp_enqueue_script("my_ajax_script", get_template_directory_uri() . "/js/custom.js");
	wp_localize_script("my_ajax_script", "php_vars", array(
		  "ajaxurl" => admin_url("admin-ajax.php"),
		  "another_var" => get_bloginfo("name")
		)
	  );
  }
  add_action("wp_enqueue_scripts", "register_js_files");


add_action("wp_ajax_nopriv_get_content", "get_content");
add_action("wp_ajax_get_content", "get_content");
 
function get_content() {
	  $post_id = intval($_POST['post_id'] );
	  if ( $post_id == 0 ) {
		  echo "Invalid Input";
		  die();
	  }  
	  $thispost = get_post( $post_id );
	  if ( !is_object( $thispost ) ) {
		  echo 'There is no post with the ID ' . $post_id;
		  die();
	  }
	  echo $thispost->post_content; 
	  die();
}

function all_references(){
	$content = '<section class="reference-section" >';
	$content .= '<div class="reference-wrap">';
	$args = array(
		'post_type'      => 'referencje',
		'posts_per_page' => -1,
		'publish_status' => 'published',
		
	 );
		$categories = get_categories($args);
		foreach($categories as $category) {
			if(strpos($category->name, 'referencje') !== false){
			}else if(get_cat_ID ( $category->name )!=1){
			
		  $content .='	<input type="button" data-cat="'.get_cat_ID ( $category->name ).'" value="'.$category->name .'" name="brand'.  get_cat_ID ( $category->name ) .'" class="single-reference-item" href="#!" id="'.  get_cat_ID ( $category->name ).'" data-slug="'. $category->name .'">';
	  }}
	     
	$content .= '</div>';
	$content .= '</section>';
	return $content;
}

add_shortcode('wszystkie-referencje', 'all_references');


add_action("wp_ajax_nopriv_get_reference", "get_reference");
add_action("wp_ajax_get_reference", "get_reference");
 
function get_reference() {	
	  $cat_id = intval($_POST['ref_id'] );

	  if ( $cat_id == 0 ) {
		echo "Invalid Input";
		die();
	}  else {

		$content ='<div class="ref-content">';
	$cat_args = array(
		'post_type' => 'referencje',
		'posts_per_page' => -1,
		'publish_status' => 'published',
		'cat' => ''.$cat_id.'',
		
	);
		
	$query = new WP_Query($cat_args);
	$x = 0;
	$max = 150;
	if($query->have_posts()) :
		while($query->have_posts()) :

			$query->the_post() ;  
			$x++;
		if($x < $max){
			$content .='<a href="'. get_field('ref_img')['url'].'" class="ref-image-cnt" data-lightbox="roadtrip" ><img src="'. get_field('ref_img')['url'] .'" /></a>';
		
		}
	endwhile;
	  wp_reset_postdata();

	endif;
 		 $content .= '</div>';
	 
		
	  echo $content; 
  
	  die();
}
}


add_action("wp_ajax_nopriv_get_price_area", "get_price_area");
add_action("wp_ajax_get_price_area", "get_price_area");
 
function get_price_area() {	
	$post_id = intval($_POST['area_id'] );


	if ( $post_id == 0 ) {
	  echo "Invalid Input";
	  die();
  }  else {

	  
  $cat_args = array(
	  'post_type' => 'cennik-obszary',
	  'p' => $post_id,
	  'posts_per_page' => -1,
	  'publish_status' => 'published',

	  
  );
	  
  $query = new WP_Query($cat_args);
 
  if($query->have_posts()) :
	  while($query->have_posts()) :

		  $query->the_post() ;  
		  $content .='<div class="wp-block-group__inner-container">';
		  $content .= get_field('box_top_content');
		  $content .= '<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#022f47;color:#022f47">';
		  $content .= '<div class="d-flex justify-content-between columns-p"><p class="summary-price" style="font-style:normal;font-weight:900">'. get_field('box_sum') .'</p>';
		  $content .= ' <p class="has-text-align-right summary-price" style="font-style:normal;font-weight:900">'. get_field('box_end_price') .'</p></div>';
		  $content .= '</div>';
	  
  endwhile;
	wp_reset_postdata();

  endif;
		
   
	  
	echo $content; 

	die();
}
}


function title_with_id_areas(){

  $args = array(
				  'post_type'      => 'cennik-obszary',
				  'posts_per_page' => -1,
			   );

  $query = new WP_Query($args);
  $result = '<div>';
  if($query->have_posts()) :

$x =0;
	  while($query->have_posts()) :
		
		
		  $query->the_post() ;  
		  global $post;
		$x++;
		  $slug = $post->post_name;
		  $id = $post->ID;
			$result .='	<input type="hidden" value="'.get_the_title() .'" name="'.$x.'" class="single-area-item '. $x .'" id="'. $id .'" data-id="'. $x .'">';
		  
	  endwhile;

	  wp_reset_postdata();
	
  endif;    

  $result .= '</div>';


	
  return $result;            
}
add_shortcode('hidden', 'title_with_id_areas');