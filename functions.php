<?php

/**
 * function set for the P2 Mobile Child theme
 */

# hide the default sidebar
if ( ! function_exists( 'p2m_remove_default_sidebar' ) ) {

	function p2m_remove_default_sidebar() {
		remove_action( 'wp_head', 'p2_hidden_sidebar_css' );
	}

	add_filter( 'option_p2_hide_sidebar', '__return_true' );
	add_filter( 'default_option_p2_hide_sidebar', '__return_true' );
	add_action( 'wp_head', 'p2m_remove_default_sidebar', 9 );
}

if ( ! function_exists( 'p2m_device_header' ) ) {

	/**
	 * add a viewport meta-element to the html head
	 *
	 * @return void
	 */
	function p2m_device_header() {

		?>	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><?php

	}
	add_action( 'wp_head', 'p2m_device_header' );

}

if ( ! function_exists( 'p2m_mobile_sidebar' ) ) {

	/**
	 * registers a new sidebar called 'mobile'
	 *
	 * @return void
	 */
	function p2m_mobile_sidebar() {

		register_sidebar(
			array(
				'name' => __( 'Mobile Sidebar (in Footer)', 'p2m_textdomain' ),
				'id'   => 'p2m_mobile_sidebar',
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>'
			)
		);
	}
	add_action( 'widgets_init', 'p2m_mobile_sidebar' );
}

if ( ! function_exists( 'p2m_google_fonts' ) ) {

	/**
	 * get the google fonts on html-head
	 * Fonts: Lato (400, 400 italic, 700), Karla(400,700)
	 *
	 * @return void
	 */
	function p2m_google_fonts() {

		?><link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700|Karla:700,400' rel='stylesheet' type='text/css'><?php

	}
	add_action( 'wp_head', 'p2m_google_fonts' );
}


/**
 * print the searchform at the very top of the page
 */
add_action( 'before', 'get_search_form' );
