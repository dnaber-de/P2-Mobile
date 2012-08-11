<?php
/**
 * @package P2 Mobile
 */
class P2_Mobile {

	/**
	 * textdomain
	 */
	const TEXTDOMAIN = 'p2m';

	/**
	 * version
	 */
	const VERSION = '0.1';

	/**
	 * instance of this class
	 *
	 * @var P2_Mobile
	 */
	protected static $instance = NULL;

	/**
	 * theme url
	 *
	 * @var string
	 */
	public static $url = '';

	/**
	 * theme directory
	 *
	 * @var string
	 */
	public static $dir = '';

	/**
	 * init
	 *
	 * @return P2_Mobile
	 */
	public static function init() {

		self::$dir = dirname( dirname( __FILE__ ) );
		self::$url = get_stylesheet_directory_uri();

		return self::get_instance();
	}

	/**
	 * get instance
	 * use the instance to remove filters/actions, if necessary
	 *
	 * @return P2_Mobile
	 */
	public static function get_instance() {

		if ( ! self::$instance instanceof self )
			self::$instance = new self;

		return self::$instance;
	}

	/**
	 * constructor
	 *
	 * @return P2_Mobile
	 */
	protected function __construct() {

		$this->l10n();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

	}

	/**
	 * load javascript
	 *
	 * @return void
	 */
	public function enqueue_scripts() {

		wp_enqueue_script(
			'p2-mobile',
			self::$url . '/js/p2-mobile.js',
			array( 'jquery' ),
			self::VERSION,
			FALSE
		);

	}

	/**
	 * load javascript in backend
	 *
	 * @return void
	 */
	public function enqueue_admin_scripts() {
		global $pagenow;

		wp_enqueue_script(
			'p2-mobile-admin',
			self::$url . '/js/p2-mobile-admin.js',
			array( 'jquery' ),
			self::VERSION,
			FALSE
		);

		wp_localize_script(
			'p2-mobile-admin',
			'p2mAdmin',
			array(
				'pagenow' => $pagenow
			)
		);
	}

	/**
	 * load the language files
	 *
	 * @return void
	 */
	protected function l10n() {

		// @todo
	}
}
