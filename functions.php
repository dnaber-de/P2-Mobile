<?php

/**
 * function set for the P2 Mobile Child theme
 */

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


/**
 * print the searchform at the very top of the page
 */
add_action( 'before', 'get_search_form' );
