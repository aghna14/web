<?php
/**
 * Plugin Name: Sogrid - Post Grid Layouts With Pagination
 * Plugin URI: https://delabon.com/plugin/sogrid
 * Description: Multiple grid design blocks.
 * Author: Sabri Taieb
 * Author URI: https://delabon.com/
 * Version: 1.2.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Defined
 */
define('SOGRID_VERSION', '1.2.1');
define('SOGRID_URL', plugin_dir_url( __FILE__ ));
define('SOGRID_DIR', __DIR__);
define('SOGRID_PANEL_URL', admin_url('admin.php?page=sogrid'));

/**
 * Init
 */
class Sogrid{

	function __construct(){

        require_once __DIR__ . '/src/Helpers.php';

        register_activation_hook(__FILE__, array( $this, 'activation' ));
        add_action( 'admin_init', array( $this, 'activation_redirect' ));
		add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_assets') );
		add_action( 'enqueue_block_assets', array( $this, 'load_assets') );
        add_action( 'enqueue_block_editor_assets', array( $this, 'load_editor_assets'), 9999 );
        add_action( 'after_setup_theme', array( $this, 'image_sizes') );
        add_action( 'after_setup_theme', array( $this, 'post_formats') );
        add_filter( 'block_categories', array( $this, 'add_block_categories'), PHP_INT_MAX, 2 );
        add_action( 'rest_api_init', array( $this, 'register_rest_fields' ) );
        add_action( 'plugins_loaded', array( $this, 'load_language' ) );
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ));
        add_action( 'admin_notices', array( $this, 'review_upgrade_notices' ) );
        add_action( 'admin_init', array( $this, 'hide_notices' ) );

        // Blocks
        require_once __DIR__ . '/src/Block.php';
        require_once __DIR__ . '/src/blocks/normal/index.php';
        require_once __DIR__ . '/src/blocks/masonry/index.php';        
        require_once __DIR__ . '/src/blocks/classic/index.php';
        require_once __DIR__ . '/src/blocks/overlay/index.php';  
        require_once __DIR__ . '/src/blocks/bordered/index.php';   
        require_once __DIR__ . '/src/blocks/pinterest/index.php';    
        require_once __DIR__ . '/src/blocks/pinterest-masonry/index.php';    
        require_once __DIR__ . '/src/blocks/oos1/index.php';  
        require_once __DIR__ . '/src/blocks/oos2/index.php';
        require_once __DIR__ . '/src/blocks/tos1/index.php';
    }
        
    /**
     * Plugin Activation
     * Add a check for our plugin before redirecting
     */
    function activation() {
        add_option( 'sogrid_do_activation_redirect', true );
    }

    /**
     * Redirect to the admin page on single plugin activation
     */
    function activation_redirect() {
        
        if ( get_option( 'sogrid_do_activation_redirect', false ) ) {

            delete_option( 'sogrid_do_activation_redirect' );
        
            if( ! isset( $_GET['activate-multi'] ) ) {

                wp_redirect( "admin.php?page=sogrid" );
            
            }
        }
    }

    /**
     * Load translation
     */
    function load_language() {
        load_plugin_textdomain( 'sogrid', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
	 * Enqueue Admin Panel assets.
	 */
	function load_admin_assets( $key ) { 
                    
        if( $key !== 'toplevel_page_sogrid' ) return;
    
        wp_enqueue_style( 
            'sogrid-admin-panel', 
            SOGRID_URL . '/dist/admin.min.css', 
            array(), 
            SOGRID_VERSION 
        );
    
        wp_enqueue_script( 
            'sogrid-admin-panel', 
            SOGRID_URL . '/dist/admin.min.js', 
            array('jquery'), 
            SOGRID_VERSION, 
            true 
        );

    }
    
	/**
	 * Enqueue Gutenberg block assets for both frontend and backend.
	 */
	function load_assets() { 
                    
		if( is_admin() ) return;
	
        wp_enqueue_style(
            'sogrid-style-build', 
            SOGRID_URL . '/dist/style.build.css', 
            array(), 
            SOGRID_VERSION 
        );
                
        wp_enqueue_script(
            'sogrid-frontend', 
            SOGRID_URL . '/dist/frontend.min.js', 
            array('jquery', 'masonry'), 
            SOGRID_VERSION,
            true
        );

        wp_localize_script('sogrid-frontend', 'SOGRID_PARAMS', [
            'ajaxurl' => admin_url('admin-ajax.php'),
        ]);
	}

	/**
	 * Load Only Editor Assets 
	 */
	function load_editor_assets(){

		$dependencies = array(
			'wp-compose',
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-editor',
			'wp-api-fetch',
			'wp-components',
			'wp-data',
			'wp-url',
			'lodash',
		);

		wp_enqueue_script(
			'sogrid-blocks-build', 
			SOGRID_URL . '/dist/blocks.build.js', 
			$dependencies, 
			SOGRID_VERSION, 
			true 
		);

		wp_enqueue_style(
			'sogrid-block-editor-build', 
			SOGRID_URL . '/dist/editor.build.css', 
			array( 'wp-edit-blocks' ), 
			SOGRID_VERSION 
		);
		
	}

	/**
	 * Image Sizes
	 */
	function image_sizes(){
		add_theme_support( 'post-thumbnails' );
    }
    
	/**
	 * Post Format
	 */
	function post_formats(){
        add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'image', 'audio', 'video', 'chat' ) );
    }

    /**
     * Register Block Categories
     */
    function add_block_categories( $categories, $post ) {
        return array_merge(
            array(
                array(
                    'slug' => 'sogrid',
                    'title' => 'Sogrid',
                ),
            ),
            $categories
        );
    }

    /**
     * Save Admin Panel Settings
     */
    private function save_panel_settings(){
        if( ! isset( $_POST['bokez-submit'] ) ) return;
        if( ! current_user_can('level_8') ) return;
        if ( ! wp_verify_nonce( $_POST['nonce'], 'bokez-admin-settings' ) ) return;
    
        foreach ( $_POST as $key => $value ) {
            update_option( 'bokez_' . sanitize_text_field($key), sanitize_text_field($value) );
        }
    }
    
    /**
     * Add Admin Menu Item
     */
    function add_admin_menu() {
    
        $this->save_panel_settings();
        
        add_menu_page( 
            'Sogrid', 
            'Sogrid Blocks', 
            'manage_options', 
            'sogrid', 
            array( $this, 'render_panel' ), 
            'dashicons-screenoptions', 
            200  
        );
    }
    
    /**
     * Render the admin page
     */
    function render_panel(){
        require_once __DIR__ . '/src/admin-panel/views/panel.php';
    }
    
    /**
     * Create API fields for additional post info
     */
    function register_rest_fields() {

        register_rest_field(
            'post',
            'author_data',
            array(
                'get_callback' => array( $this, 'get_author_data' ),
                'update_callback' => null,
                'schema' => null,
            )
        );

        register_rest_field(
            'post',
            'excerpt_data',
            array(
                'get_callback' => array( $this, 'get_excerpt_data' ),
                'update_callback' => null,
                'schema' => null,
            )
        );

        register_rest_field(
            'post',
            'categories_data',
            array(
                'get_callback' => array( $this, 'get_categories_data' ),
                'update_callback' => null,
                'schema' => null,
            )
        );

        register_rest_field(
            'post',
            'featured_image_src',
            array(
                'get_callback' => array( $this, 'get_image_src_square' ),
                'update_callback' => null,
                'schema' => null,
            )
        );
        
        register_rest_field(
            'post',
            'date_formated',
            array(
                'get_callback' => array( $this, 'get_date_formated' ),
                'update_callback' => null,
                'schema' => null,
            )
        );
        
    }

    /**
     * Get post author full name or username for the rest field
     */
    function get_author_data( $object, $field_name, $request ) {
        return Sogrid_Helpers::get_author( $object['author'] );
	}

    /**
     * Get post excerpt max length 55w for the rest field
     */
    function get_excerpt_data( $object, $field_name, $request ) {

        $excerpt = $object['excerpt']['raw'];

        if( $excerpt === '' ){
            $excerpt = $object['content']['raw'];
        }

        return wp_trim_words( $excerpt, 15, '...');
    }

    /**
     * Get post categories for the rest field
     */
    function get_categories_data( $object, $field_name, $request ) {

        $cats = array();

        foreach ( $object['categories'] as $key ) {
            $cats[ $key ] = get_category( $key );
        }

        return $cats;
    }

    /**
     * Get featured image source for the rest field
     */
    function get_image_src_square( $object, $field_name, $request ) {
        $img_array = wp_get_attachment_image_src(
            $object['featured_media'],
            'sogrid-posts-grid',
            false
        );
        return $img_array[0];
    }

    /**
     * Get formated date for the rest field
     */
    function get_date_formated( $object, $field_name, $request ) {
		return Sogrid_Helpers::get_date( $object['date'] );
	}

    /**
     * Shows the review and upgrade notices for the admin every 4 days
     */
    function review_upgrade_notices() {

        if( get_transient('sogrid_hide_notices') ) return;
        if( get_transient('sogrid_hide_review_notice') ) return;

        $url_hide_notices = add_query_arg( 'sogrid_hide_notices', 'true', Sogrid_Helpers::url() );
        $url_review_notice = add_query_arg( 'sogrid_hide_review_notice', 'true', Sogrid_Helpers::url() );

        ?>
            <div class="notice notice-warning">

                <p style="font-size: 15px;">

                    <?php _e("Hi there! you have been using <strong>Sogrid</strong> for few days. I hope it is helpful.", 'sogrid'); ?>
                    <br>
                    <?php _e("Would you mind give it 5-stars review to help spread the word? And to keep me updating it & adding more features to it!", 'sogrid' ); ?>

                </p>

                <p>
                    <a class="button button-primary" href="<?php echo $url_review_notice; ?>"><?php _e('Give it 5-stars', 'sogrid'); ?></a>
                    <a class="button" href="<?php echo $url_hide_notices; ?>"><?php _e('Thanks, later', 'sogrid') ?></a>
                </p>

            </div>
        <?php

    }

    /**
     * Hide admin notices
     */
    function hide_notices() {

        if( isset( $_REQUEST['sogrid_hide_notices'] ) ){
            set_transient('sogrid_hide_notices', 1, 5 * DAY_IN_SECONDS );
        }

        if( isset( $_REQUEST['sogrid_hide_review_notice'] ) ){
            set_transient('sogrid_hide_review_notice', 1, 30 * DAY_IN_SECONDS );

            echo '<script>location.href = "https://wordpress.org/support/plugin/sogrid/reviews/?rate=5#rate-response";</script>';
        }
    }
    
}

new Sogrid();
