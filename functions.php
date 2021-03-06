<?php

/**
 * function set for the P2 Mobile Child theme
 */
locate_template( 'inc/class-P2_Mobile.php', TRUE, TRUE );
P2_Mobile::init();

# hide the default sidebar
if ( ! function_exists( 'p2m_remove_default_sidebar' ) ) {

	function p2m_remove_default_sidebar() {
		remove_action( 'wp_head', 'p2_hidden_sidebar_css' );
		remove_action( 'widgets_init', 'p2_register_sidebar' );
	}

	add_filter( 'option_p2_hide_sidebar', '__return_true' );
	add_filter( 'default_option_p2_hide_sidebar', '__return_true' );
	add_action( 'after_setup_theme', 'p2m_remove_default_sidebar' );
}

if ( ! function_exists( 'p2m_device_header' ) ) {

	/**
	 * add a viewport meta-element to the html head
	 *
	 * @return void
	 */
	function p2m_device_header() {

		?><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<?php

	}
	add_action( 'wp_head', 'p2m_device_header' );
}

if ( ! function_exists( 'p2m_sidebar_header' ) ) {

	/**
	 * add some styles if there are no widgets at all
	 *
	 * @return void
	 */
	function p2m_sidebar_header() {

		if ( is_dynamic_sidebar( 'p2m_sidebar' ) )
			return;
		?>
	<style type="text/css">
		.sleeve_main{
			width: auto;
			margin-right: 0;
			float: none;
		}
	</style> <?php

	}
	add_action( 'wp_head', 'p2m_sidebar_header' );
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
				'name' => __( 'P2 Mobile Sidebar', 'p2m' ),
				'id'   => 'p2m_sidebar',
				'before_widget' => '<li class="widget">',
				'after_widget'  => '</li>',
				'description'   => __( 'These widgets will apear after the main content in the markup, so blow the content on small screens.', 'p2m' )
			)
		);
	}
	add_action( 'widgets_init', 'p2m_mobile_sidebar', 11 );
}

if ( ! function_exists( 'p2m_google_fonts' ) ) {

	/**
	 * get the google fonts on html-head
	 * Fonts: Lato (400, 400 italic, 700), Karla(400,700)
	 *
	 * @return void
	 */
	function p2m_google_fonts() {

		?><link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700|Karla:700,400' rel='stylesheet' type='text/css' />
		<?php
	}
	add_action( 'wp_head', 'p2m_google_fonts' );
}

if ( ! function_exists( 'p2m_skip_link' ) ) {

	/**
	 * skiplink to the sidebar
	 *
	 * @return void
	 */
	function p2m_skip_link() {

		if ( ! is_dynamic_sidebar( 'p2m_sidebar' ) )
			return;

		?>
	<div id="p2m-skip" class="clearfix">
		<div class="sleeve_main">
			<a href="#sidebar"><?php _e( 'Meta', 'p2m' ); ?></a>
		</div>
	</div> <?php

	}
	add_action( 'before', 'p2m_skip_link', 9 );
}

/**
 * adapting the custom header stuff
 *
 * @see p2/inc/custom-header.php
 */
if ( ! function_exists( 'p2m_custom_header_args' ) ) {

	/**
	 * changing default args for p2's custom header function
	 *
	 * @param array $args
	 * @return array
	 */
	function p2m_custom_header_args( $args ) {

		$args[ 'wp-head-callback' ] = 'p2m_custom_header_style';

		return $args;
	}
	add_filter( 'p2_custom_header_args', 'p2m_custom_header_args' );
}

if ( ! function_exists( 'p2m_custom_header_style' ) ) {

	/**
	 * prints the custom header style
	 *
	 * @wp-hook wp_head
	 * @param array $args
	 * @return array
	 */
	function p2m_custom_header_style( $args ) {

		//call the parents custom style function
		if ( function_exists( 'p2_header_style' ) )
			p2_header_style();

		if ( '' == get_header_image() )
			return;
		?>
		<style type="text/css" media="screen and ( max-width: 1024px )">
			#header {
				background-image: none;
				box-shadow: none;
			}
			#header .sleeve {
				margin-top: 8px;
				background: #fff url(<?php header_image(); ?>) repeat;
				box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2) ! important;
			}
			#header a.secondary {
				width: auto;
			}
		</style>
		<?php
	}
}


/**
 * print the searchform at the very top of the page
 */
add_action( 'before', 'get_search_form' );

