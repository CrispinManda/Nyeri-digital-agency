<?php
/**
 * Theme Functions.
 *
 * @package Aquila
 */


if ( ! defined( 'AQUILA_DIR_PATH' ) ) {
	define( 'AQUILA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'AQUILA_DIR_URI' ) ) {
	define( 'AQUILA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'AQUILA_BUILD_URI' ) ) {
	define( 'AQUILA_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'AQUILA_BUILD_PATH' ) ) {
	define( 'AQUILA_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

if ( ! defined( 'AQUILA_BUILD_JS_URI' ) ) {
	define( 'AQUILA_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( ! defined( 'AQUILA_BUILD_JS_DIR_PATH' ) ) {
	define( 'AQUILA_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}

if ( ! defined( 'AQUILA_BUILD_IMG_URI' ) ) {
	define( 'AQUILA_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
}

if ( ! defined( 'AQUILA_BUILD_CSS_URI' ) ) {
	define( 'AQUILA_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( ! defined( 'AQUILA_BUILD_CSS_DIR_PATH' ) ) {
	define( 'AQUILA_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}

if ( ! defined( 'AQUILA_BUILD_LIB_URI' ) ) {
	define( 'AQUILA_BUILD_LIB_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/library' );
}

if ( ! defined( 'AQUILA_ARCHIVE_POST_PER_PAGE' ) ) {
	define( 'AQUILA_ARCHIVE_POST_PER_PAGE', 9 );
}

if ( ! defined( 'AQUILA_SEARCH_RESULTS_POST_PER_PAGE' ) ) {
	define( 'AQUILA_SEARCH_RESULTS_POST_PER_PAGE', 9 );
}

require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once AQUILA_DIR_PATH . '/inc/helpers/template-tags.php';

function aquila_get_theme_instance() {
	\AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
}

aquila_get_theme_instance();



// Register the "clean" CSS file
function register_clean_style() {
    wp_register_style('clean-style', get_template_directory_uri() . '/assets/build/css/clean.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'register_clean_style');

// Enqueue the registered "clean" CSS file
function enqueue_clean_styles() {
    wp_enqueue_style('clean-style');
}
add_action('wp_enqueue_scripts', 'enqueue_clean_styles');

// Register and enqueue the 'style.min.css' stylesheet
function enqueue_custom_styles() {
	
    wp_register_style('custom-style', get_template_directory_uri() . '/assets/build/css/style.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style');
	// preconnect fonts
	wp_register_style( 'preconnect', 'https://fonts.gstatic.com', false ); 
    wp_enqueue_style('preconnect' );
	// google fonts
	wp_register_style( 'googleapis', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap', false ); 
    wp_enqueue_style('googleapis' );
	// fonts awesome
	wp_register_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', false ); 
    wp_enqueue_style('fontawesome' );
	//Libraries Stylesheet
	wp_register_style( 'owlcarousel', get_template_directory_uri(). '/assets/build/css/owl.carousel.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('owlcarousel' );
	wp_register_style( 'lightbox', get_template_directory_uri(). '/assets/build/css/lightbox.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('lightbox' );


	
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');



// Register and enqueue  scripts
function enqueue_custo_scripts() {
    wp_register_script('custom-script', get_template_directory_uri() . '/assets/build/js/clean.js', array(''), '1.0.0', true);
    wp_enqueue_script('custom-script');
	// 2
	wp_register_script('jquery1', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery1');
	// 3
	wp_register_script('stackpath-bootstrapcdn', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array(), '1.0.0', true);
    wp_enqueue_script('stackpath-bootstrapcdn');
	// 4



	




}
add_action('wp_enqueue_scripts', 'enqueue_custo_scripts');












