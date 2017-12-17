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

function htmlCode() {
  echo '<div id="diagramart-library"></div><script>document.addEventListener("DOMContentLoaded", function() {DiagramArtLibrary({selector:"diagramart-library"});});</script>';
}

function dal_shortcode() {
  ob_start();
	htmlCode();
	return ob_get_clean();
}

add_shortcode( 'diagramart-library', 'dal_shortcode' );

function wpdal_plugin_url( $path = '' ) {
	$url = plugins_url( $path, WPDAL_PLUGIN );

	if ( is_ssl() && 'http:' == substr( $url, 0, 5 ) ) {
		$url = 'https:' . substr( $url, 5 );
	}

	return $url;
}

function wpdal_do_enqueue_scripts() {
	wpdal_enqueue_scripts();
	wpdal_enqueue_styles();
}

function wpdal_enqueue_scripts() {
	wp_enqueue_script( 'diagramartlibrary', wpdal_plugin_url( 'includes/js/diagramart.js' ));
	do_action( 'wpdal_enqueue_scripts' );
}

function wpdal_enqueue_styles() {
	wp_enqueue_style( 'diagramart-library', wpdal_plugin_url( 'includes/css/diagramart.css' ));
	do_action( 'wpdal_enqueue_styles' );
}

add_action( 'wp_enqueue_scripts', 'wpdal_do_enqueue_scripts' );
