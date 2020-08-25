<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_filter('jpeg_quality', function($arg){return 100;});

/**
* Set intiial country for Caldera Forms phone fields
*/
add_filter( 'caldera_forms_phone_js_options', function( $options){
	//Use ISO_3166-1_alpha-2 formatted country code
	$options[ 'initialCountry' ] = 'DE';
	return $options;
});

/**
* Set preffered countries for Caldera Forms phone fields
*/
add_filter( 'caldera_forms_phone_js_options', function( $options){
	//Use ISO_3166-1_alpha-2 formatted country code
	$options[ 'preferredCountries' ] = array( 'DE', 'AT', 'CH' );
	return $options;
});

//WordPress Vollbild-Modus per Default deaktivieren
function jba_disable_editor_fullscreen_by_default() {
	$script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
	wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'jba_disable_editor_fullscreen_by_default' );

// Disable Google Fonts for Mailpoet
add_filter('mailpoet_display_custom_fonts', function () {
	return false;
});