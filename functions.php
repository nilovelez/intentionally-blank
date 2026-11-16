<?php
/**
 * Intentionally Blank Theme functions
 *
 * @package WordPress
 * @subpackage intentionally-blank
 */

if ( ! function_exists( 'blank_setup' ) ) :
	/**
	 * Sets up theme defaults and registers the various WordPress features that
	 * this theme supports.
	 */
	function blank_setup() {
		load_theme_textdomain( 'intentionally-blank' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme allows users to set a custom background.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'f5f5f5',
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'height'               => 512,
				'width'                => 512,
				'flex-height'          => true,
				'flex-width'           => true,
				'header-text'          => array( 'site-title', 'site-description' ),
				'unlink-homepage-logo' => true,
			)
		);

		// System fonts in the classic editor (TinyMCE). The block editor uses theme.json.
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif; // end function_exists blank_setup.

add_action( 'after_setup_theme', 'blank_setup' );

/**
 * Whether the page is loaded in the preview of a page builder editor.
 *
 * Page builders edit the page inside a preview of the front end, and they
 * need a template that shows the post content. Supported builders: Elementor,
 * Beaver Builder, SiteOrigin Page Builder and WPBakery Page Builder (Visual
 * Composer).
 *
 * @return bool True in a page builder editor preview.
 */
function blank_is_builder_preview() {
	// Elementor.
	if ( did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) ) {
		$elementor = \Elementor\Plugin::$instance;
		if ( isset( $elementor->preview ) && $elementor->preview->is_preview_mode() ) {
			return true;
		}
	}

	// Beaver Builder.
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		return true;
	}

	// SiteOrigin Page Builder (Live Editor).
	if ( class_exists( 'SiteOrigin_Panels' ) && SiteOrigin_Panels::is_live_editor() ) {
		return true;
	}

	// WPBakery Page Builder (Visual Composer).
	if ( function_exists( 'vc_is_page_editable' ) && vc_is_page_editable() ) {
		return true;
	}

	return false;
}

/**
 * Serves builder-preview.php to page builder editor previews.
 *
 * Visitors always get index.php. Page templates set by a builder (such as
 * Elementor Canvas) still apply, because builders filter the template later.
 *
 * @param string $template Path of the template WordPress is about to load.
 * @return string Path of the template to load.
 */
function blank_builder_preview_template( $template ) {
	if ( blank_is_builder_preview() ) {
		$preview = locate_template( 'templates/builder-preview.php' );
		if ( $preview ) {
			return $preview;
		}
	}
	return $template;
}
add_filter( 'template_include', 'blank_builder_preview_template' );

/**
 * Loads basic styles in page builder editor previews.
 *
 * White background, black text and the theme.json fonts and sizes, so the
 * preview looks like the block editor. Page builder styles override them.
 */
function blank_builder_preview_styles() {
	if ( blank_is_builder_preview() ) {
		wp_enqueue_style(
			'blank-builder-preview',
			get_template_directory_uri() . '/assets/css/builder-preview.css',
			array(),
			wp_get_theme( get_template() )->get( 'Version' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'blank_builder_preview_styles' );

/**
 * Removes page builder layout styles and scripts from the blank page.
 *
 * Page builders load the styles, scripts and fonts of a layout on every page
 * built with them. When the page is served with index.php, the content is
 * never shown, so they are not needed. Templates set by a builder (such as
 * Elementor Canvas) show the content, and keep everything.
 *
 * Runs last on template_include, after any plugin has chosen the template,
 * and before wp_head prints the styles and scripts.
 *
 * @param string $template Path of the template WordPress is about to load.
 * @return string The same template path, unchanged.
 */
function blank_remove_builder_assets( $template ) {
	if ( locate_template( 'index.php' ) !== $template ) {
		return $template;
	}

	// Elementor.
	if ( did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) ) {
		$elementor = \Elementor\Plugin::$instance;
		if ( isset( $elementor->frontend ) ) {
			remove_action( 'wp_enqueue_scripts', array( $elementor->frontend, 'enqueue_styles' ), \Elementor\Frontend::ENQUEUED_STYLES_PRIORITY );
		}
	}

	// Beaver Builder.
	remove_action( 'wp_enqueue_scripts', 'FLBuilder::enqueue_all_layouts_styles_scripts' );

	// SiteOrigin Page Builder.
	if ( class_exists( 'SiteOrigin_Panels' ) ) {
		remove_action( 'wp_enqueue_scripts', array( SiteOrigin_Panels::single(), 'generate_post_css' ) );
	}

	// WPBakery Page Builder (Visual Composer).
	if ( function_exists( 'wpbakery' ) ) {
		$wpbakery = wpbakery();
		remove_action( 'wp_enqueue_scripts', array( $wpbakery, 'enqueueStyle' ) );
		remove_action( 'wp_head', array( $wpbakery, 'addShortcodesCss' ), 1000 );
		remove_action( 'wp_head', array( $wpbakery, 'addNoScript' ), 1000 );
	}

	return $template;
}
add_filter( 'template_include', 'blank_remove_builder_assets', PHP_INT_MAX );

remove_action( 'wp_head', '_custom_logo_header_styles' );

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );

if ( ! is_admin() ) {

	// we have only one page, no need for speculative load rules.
	add_filter( 'wp_speculation_rules_configuration', '__return_null' );

	// removes fix for lazy loaded images.
	add_filter( 'wp_img_tag_add_auto_sizes', '__return_false' );

	// No need for global styles in a classic theme.
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

	// No emoji detection script or emoji styles: the page has no content.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// No discovery links in the page head: REST API, RSD (XML-RPC), feeds and generator.
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'wp_generator' );

	// No blocks are rendered, so the block supports styles are always empty.
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_stored_styles' );
	remove_action( 'wp_footer', 'wp_enqueue_stored_styles', 1 );

	// WordPress 6.1 and 6.2 only: no duotone SVG filters and no wlwmanifest link.
	// Remove these two lines when the minimum supported version is 6.3.
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
	remove_action( 'wp_head', 'wlwmanifest_link' );

	add_action(
		'wp_enqueue_scripts',
		function () {
			wp_dequeue_style( 'classic-theme-styles' );
			wp_dequeue_style( 'wp-block-library' );
		},
		100
	);
}
/**
 * Sets up theme defaults and registers the various WordPress features that
 * this theme supports.

 * @param class $wp_customize Customizer object.
 */
function blank_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'static_front_page' );

	// The site title and tagline are hidden unless the user chooses to show them,
	// so the "Display Site Title and Tagline" checkbox starts unchecked.
	$blank_header_text = $wp_customize->get_setting( 'header_text' );
	if ( $blank_header_text ) {
		$blank_header_text->default = 0;
	}

	$wp_customize->add_section(
		'blank_footer',
		array(
			'title'      => __( 'Footer', 'intentionally-blank' ),
			'priority'   => 120,
			'capability' => 'edit_theme_options',
			'panel'      => '',
		)
	);
	$wp_customize->add_setting(
		'blank_copyright',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Intentionally Blank Theme - Proudly powered by WordPress', 'intentionally-blank' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	/**
	 * Checkbox sanitization function

	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function blank_sanitize_checkbox( $checked ) {
		// Returns true if checkbox is checked.
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
	$wp_customize->add_setting(
		'blank_show_copyright',
		array(
			'default'           => true,
			'sanitize_callback' => 'blank_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'blank_copyright',
		array(
			'type'     => 'textarea',
			'label'    => __( 'Copyright Text', 'intentionally-blank' ),
			'section'  => 'blank_footer',
			'settings' => 'blank_copyright',
			'priority' => '10',
		)
	);
	$wp_customize->add_control(
		'blank_footer_copyright_hide',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Show footer with copyright Text', 'intentionally-blank' ),
			'section'  => 'blank_footer',
			'settings' => 'blank_show_copyright',
			'priority' => '20',
		)
	);
}
add_action( 'customize_register', 'blank_customize_register', 100 );
