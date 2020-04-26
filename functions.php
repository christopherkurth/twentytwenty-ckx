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

