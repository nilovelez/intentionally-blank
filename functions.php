<?php
if ( ! function_exists( 'blank_setup' ) ) :
	function blank_setup() {
		load_theme_textdomain( 'intentionally-blank' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		// This theme allows users to set a custom background.
		add_theme_support( 'custom-background', apply_filters( 'intentionally_blank_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );

		add_theme_support( 'custom-logo' );
		add_theme_support( 'custom-logo', array(
			'height'      => 256,
			'width'       => 256,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		function blank_custom_logo() {
			if ( function_exists( 'the_custom_logo' ) ) {
				return get_custom_logo();
			}else{
				return '';
			}
		}
	}
endif; // blank_setup
add_action( 'after_setup_theme', 'blank_setup' );


function blank_enqueue_style() {
    wp_enqueue_style( 'blank-style', get_stylesheet_uri() ); 
}
add_action( 'wp_enqueue_scripts', 'blank_enqueue_style' );