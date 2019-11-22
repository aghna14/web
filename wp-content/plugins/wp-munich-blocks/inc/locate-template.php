<?php
/**
 * File to host the definition of our own locate_template function
 *
 * @package    wpm_blocks
 * @subpackage wpm_blocks/inc
 */

if ( ! function_exists( 'wpm_locate_template' ) ) {

	/**
	 * Retrieve the name of the highest priority template file that exists.
	 *
	 * Searches in the STYLESHEETPATH before TEMPLATEPATH before PLUGINPATH
	 * so that themes and parent themes can just overload one file.
	 *
	 * @since 2.7.0
	 *
	 * @param string|array $template_names Template file(s) to search for, in order.
	 * @param bool         $load           If true the template file will be loaded if it is found.
	 * @param bool         $require_once   Whether to require_once or require. Default true. Has no effect if $load is false.
	 * @return string The template filename if one is located.
	 */
	function wpm_locate_template( $template_names, $load = false, $require_once = true ) {
		$located = '';
		foreach ( (array) $template_names as $template_name ) {
			if ( ! $template_name ) {
				continue;
			}
			if ( file_exists( get_stylesheet_directory() . '/' . $template_name ) ) {
				$located = get_stylesheet_directory() . '/' . $template_name;
				break;
			} elseif ( file_exists( get_template_directory() . '/' . $template_name ) ) {
				$located = get_template_directory() . '/' . $template_name;
				break;
			} elseif ( file_exists( WPM_BLOCKS_PATH . '/' . $template_name ) ) {
				$located = WPM_BLOCKS_PATH . '/' . $template_name;
				break;
			}
		}
		if ( $load && '' !== $located ) {
			load_template( $located, $require_once );
		}
		return $located;
	}
}

if ( ! function_exists( 'wpm_return_template_part' ) ) {
	/**
	 * Loads a template part into a template.
	 *
	 * Provides a simple mechanism for child themes to overload reusable sections of code
	 * in the theme.
	 *
	 * Includes the named template part for a theme or if a name is specified then a
	 * specialised part will be included. If the theme contains no {slug}.php file
	 * then no template will be included.
	 *
	 * The template is included using require, not require_once, so you may include the
	 * same template part multiple times.
	 *
	 * For the $name parameter, if the file is called "{slug}-special.php" then specify
	 * "special".
	 *
	 * @since 3.0.0
	 *
	 * @param string $slug The slug name for the generic template.
	 * @param string $name The name of the specialised template.
	 */
	function wpm_return_template_part( $slug, $name = null ) {
		/**
		 * Fires before the specified template part file is loaded.
		 *
		 * The dynamic portion of the hook name, `$slug`, refers to the slug name
		 * for the generic template part.
		 *
		 * @since 3.0.0
		 *
		 * @param string      $slug The slug name for the generic template.
		 * @param string|null $name The name of the specialized template.
		 */
		do_action( "wpm_return_template_part_{$slug}", $slug, $name );
		$templates = array();
		$name      = (string) $name;
		if ( '' !== $name ) {
			$templates[] = "{$slug}-{$name}.php";
		}
		$templates[] = "{$slug}.php";

		return wpm_locate_template( $templates );
	}
}
