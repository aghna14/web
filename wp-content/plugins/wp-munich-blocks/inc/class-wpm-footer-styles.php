<?php
/**
 * The file that defines the footer styles class
 *
 * @package    wpm_blocks
 * @subpackage wpm_blocks/inc
 */

/**
 * The footer styles class.
 */
class WPM_Footer_Styles {

	/**
	 * The array in which we store needed styles
	 *
	 * @var array
	 */
	private $_styles = array();

	/**
	 * The static varible to hold the only instance of this class
	 *
	 * @var array
	 */
	protected static $instances = array();

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	protected function __construct() {
		$this->action_dispatcher();
		$this->filter_dispatcher();
	}

	/**
	 * Blocked function for singleton pattern
	 */
	protected function __clone() {}

	/**
	 * Blocked function for singleton pattern
	 */
	protected function __wakeup() {}

	/**
	 * Call this method to get singleton
	 *
	 * @return UserFactory
	 */
	public static function get_instance() {
		$cls = get_called_class(); // late-static-bound class name.
		if ( ! isset( self::$instances[ $cls ] ) ) {
			self::$instances[ $cls ] = new static();
		}
		return self::$instances[ $cls ];
	}

	/**
	 * The array of filters
	 *
	 * @var array
	 */
	private $filters = array();

	/**
	 * The action dispatcher for this class.
	 *
	 * @access private
	 * @return void
	 */
	private function action_dispatcher() {
		add_action( 'init', array( $this, 'register_meta' ) );

		add_action( 'wp_footer', array( $this, 'print_wpm_style' ) );
	}

	/**
	 * The filter dispatcher for this class.
	 *
	 * @access private
	 * @return void
	 */
	private function filter_dispatcher() {
		add_filter( 'the_content', array( $this, 'maybe_add_styles' ) );
	}

	/**
	 * Register needed meta endpoints
	 */
	public function register_meta() {
		register_meta(
			'post',
			'_wpm_styles',
			array(
				'show_in_rest'  => true,
				'single'        => true,
				'auth_callback' => '__return_true',
			)
		);
	}

	/**
	 * We maybe have to add styles, when content is loaded.
	 *
	 * @param string $content The content, that is not touched in this function.
	 */
	public function maybe_add_styles( $content ) {
		global $post;

		$wpm_styles = get_post_meta( $post->ID, '_wpm_styles', true );

		if ( ! empty( $wpm_styles ) ) {
			$this->_styles[ $post->ID ] = esc_attr( $wpm_styles );
		}

		return $content;
	}

	/**
	 * Print the actual styles.
	 *
	 * @todo: Add more escaping
	 */
	public function print_wpm_style() {
		if ( is_array( $this->_styles ) && count( $this->_styles ) > 0 ) {
			$style = $this->minify( implode( ' ', $this->_styles ) );
			echo "<style type=\"text/css\" id=\"wp-munich-block-styles\">$style</style>"; // phpcs:ignore
		}
	}

	/**
	 * Minify css in a short and dirty way
	 *
	 * @param  string $css The css string.
	 *
	 * @return string      The minified css string
	 */
	private function minify( $css ) {
		// Normalize whitespace.
		$css = preg_replace( '/\s+/', ' ', $css );
		// Remove spaces before and after comment.
		$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );
		// Remove comment blocks, everything between /* and */, unless
		// preserved with /*! ... */ or /** ... */.
		$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );
		// Remove ; before }.
		$css = preg_replace( '/;(?=\s*})/', '', $css );
		// Remove space after , : ; { } */ >.
		$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
		// Remove space before , ; { } ( ) >.
		$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );
		// Strips leading 0 on decimal values (converts 0.5px into .5px).
		$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
		// Strips units if value is 0 (converts 0px to 0).
		$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
		// Converts all zeros value into short-hand.
		$css = preg_replace( '/0 0 0 0/', '0', $css );
		// Shortern 6-character hex color codes to 3-character where possible.
		$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );
		return trim( $css );
	}

}
