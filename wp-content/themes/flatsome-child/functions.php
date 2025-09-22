<?php
// Minimal child theme setup: enqueue parent stylesheet and custom assets

add_action( 'wp_enqueue_scripts', function() {
	// Enqueue parent theme stylesheet first
	$parent_handle = 'flatsome-style';
	if ( wp_style_is( $parent_handle, 'registered' ) || wp_style_is( $parent_handle, 'enqueued' ) ) {
		wp_enqueue_style( $parent_handle );
	} else {
		// Fallback: load parent style.css directly
		wp_enqueue_style( 'flatsome-parent-fallback', get_template_directory_uri() . '/style.css', array(), wp_get_theme( 'flatsome' )->get( 'Version' ) );
	}

	// Child custom CSS
	wp_enqueue_style(
		'flatsome-child-custom',
		get_stylesheet_directory_uri() . '/assets/css/custom.css',
		array( $parent_handle ),
		file_exists( get_stylesheet_directory() . '/assets/css/custom.css' ) ? filemtime( get_stylesheet_directory() . '/assets/css/custom.css' ) : null
	);

	// Child custom JS (in footer)
	wp_enqueue_script(
		'flatsome-child-custom',
		get_stylesheet_directory_uri() . '/assets/js/custom.js',
		array( 'jquery' ),
		file_exists( get_stylesheet_directory() . '/assets/js/custom.js' ) ? filemtime( get_stylesheet_directory() . '/assets/js/custom.js' ) : null,
		true
	);
}, 999 );

// Add a body class to help increase selector specificity without !important
add_filter( 'body_class', function( $classes ) {
	$classes[] = 'custom-overrides';
	return $classes;
} );