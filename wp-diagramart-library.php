<?php
/*
Plugin Name: DiagramArt Library
Plugin URI: https://github.com/
Description: DiagramArt Library widget
Author: DiagramArt
Author URI: https://diagramart.com/
Text Domain: diagramart-library
Version: 1.0.0
*/

define( 'WPDAL_PLUGIN', __FILE__ );

function wpdal_html_code() {
  echo '<div id="diagramart-library"></div><script>document.addEventListener("DOMContentLoaded", function() {DiagramArtLibrary({selector:"diagramart-library"});});</script>';
}

function wpdal_shortcode() {
  ob_start();
	wpdal_html_code();
	return ob_get_clean();
}

add_shortcode( 'diagramart-library', 'wpdal_shortcode' );

function wpdal_do_enqueue_scripts() {
	wpdal_enqueue_scripts();
	wpdal_enqueue_styles();
}

function wpdal_enqueue_scripts() {
  wp_enqueue_script( 'diagramartlibrary', plugins_url( 'includes/js/diagramart.js', __FILE__ ) );
	do_action( 'wpdal_enqueue_scripts' );
}

function wpdal_enqueue_styles() {
  wp_enqueue_style( 'diagramartlibrary', plugins_url( 'ncludes/css/diagramart.css', __FILE__ ) );
	do_action( 'wpdal_enqueue_styles' );
}

add_action( 'wp_enqueue_scripts', 'wpdal_do_enqueue_scripts' );
