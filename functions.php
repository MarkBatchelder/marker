<?php
/**
 * Marker functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marker
 */

/**
 * Enqueue scripts and styles.
 */
function marker_scripts() {
	wp_enqueue_style( 'marker-style', get_stylesheet_uri() );
    
    wp_enqueue_script( 'marker-navigation', get_template_directory_uri() . '/js/responsive-nav.js', array(), '1.0.39', true );

	wp_enqueue_script( 'marker-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'marker_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

 /**
  * Print scripts or data before the closing body tag on the front end.
  */
function marker_footer_scripts() {
 echo    '<script>
            var nav = responsiveNav(".nav-collapse", {
                label: "&#9776;" // String: Label for the navigation toggle
            });
        </script>';
}  
add_action( 'wp_footer', 'marker_footer_scripts', 200 );
