<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @package    wpm_blocks
 * @subpackage wpm_blocks/inc
 */
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 */
class WPM_Blocks
{
    /**
     * The static varible to hold the only instance of this class
     *
     * @var array
     */
    protected static  $instances = array() ;
    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    protected function __construct()
    {
        $this->action_dispatcher();
        $this->filter_dispatcher();
    }
    
    /**
     * Blocked function for singleton pattern
     */
    protected function __clone()
    {
    }
    
    /**
     * Blocked function for singleton pattern
     */
    protected function __wakeup()
    {
    }
    
    /**
     * Call this method to get singleton
     *
     * @return UserFactory
     */
    public static function get_instance()
    {
        $cls = get_called_class();
        // late-static-bound class name.
        if ( !isset( self::$instances[$cls] ) ) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }
    
    /**
     * The action dispatcher for this class.
     *
     * @access private
     * @return void
     */
    private function action_dispatcher()
    {
        add_action( 'init', array( $this, 'register_scripts_styles' ) );
        add_action( 'init', array( $this, 'register_blocks' ) );
        add_action( 'init', array( $this, 'register_i18n' ) );
        add_action( 'init', array( $this, 'register_meta' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_assets' ) );
        add_action( 'get_footer', array( $this, 'enqueue_footer_styles' ) );
    }
    
    /**
     * The filter dispatcher for this class.
     *
     * @access private
     * @return void
     */
    private function filter_dispatcher()
    {
    }
    
    /**
     * Register needed scripts and styles for our free tier
     */
    public function register_scripts_styles()
    {
        wp_register_script(
            'wpm-blocks-helper',
            WPM_BLOCKS_URL . 'blocks-helper/blocks-helper.min.js',
            array( 'wp-block-library', 'wpm-jss', 'wp-dom-ready' ),
            '0.9.7',
            false
        );
        wp_add_inline_script( 'wpm-blocks-helper', 'window.wpm = {};', 'before' );
        wp_register_style(
            'wpm-helper-style',
            WPM_BLOCKS_URL . 'blocks-helper/blocks-helper.min.css',
            array(),
            '0.9.7'
        );
        wp_register_script(
            'wpm-blocks-editor',
            WPM_BLOCKS_URL . 'blocks/blocks.min.js',
            array( 'wpm-blocks-helper', 'wp-block-library', 'wpm-jss' ),
            '0.9.7',
            false
        );
        wp_register_script(
            'wpm-blocks-frontend',
            WPM_BLOCKS_URL . 'blocks/blocks-frontend.min.js',
            array( 'jquery' ),
            '0.9.7',
            true
        );
        wp_localize_script( 'wpm-blocks-editor', 'wpMunichBlocks', array(
            'plugin_url' => WPM_BLOCKS_URL,
            'site_url'   => get_home_url(),
        ) );
        wp_register_script(
            'wpm-jss',
            WPM_BLOCKS_URL . 'js/jss.min.js',
            array(),
            '0.9.7',
            true
        );
        wp_register_style(
            'wpm-blocks-editor-style',
            WPM_BLOCKS_URL . 'blocks/blocks-editor.min.css',
            array(),
            '0.9.7'
        );
        wp_register_style(
            'wpm-blocks-style',
            WPM_BLOCKS_URL . 'blocks/blocks.min.css',
            array(),
            '0.9.7'
        );
        wp_register_style(
            'wpm-filter-style',
            WPM_BLOCKS_URL . 'css/filter.min.css',
            array(),
            '0.9.7'
        );
    }
    
    /**
     * Enqueue needed scripts in the frontend
     *
     * @return void
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script( 'wpm-blocks-frontend' );
    }
    
    /**
     * Enqueue needed styles for the frontend, but only load in footer.
     *
     * @return void
     */
    public function enqueue_footer_styles()
    {
        wp_enqueue_style( 'wpm-filter-style' );
        wp_enqueue_style( 'wpm-blocks-style' );
    }
    
    /**
     * Enqueue needed assets to display blocks in the edtior
     *
     * @return void
     */
    public function enqueue_block_assets()
    {
        global  $current_screen ;
        $is_editor = $current_screen instanceof WP_Screen && $current_screen->is_block_editor();
        
        if ( $is_editor ) {
            wp_enqueue_style( 'wpm-blocks-style' );
            wp_enqueue_style( 'wpm-helper-style' );
        }
    
    }
    
    /**
     * Register the blocks for our free tier
     */
    public function register_blocks()
    {
        if ( !function_exists( 'register_block_type' ) ) {
            return;
        }
        /* ### Split ### */
        register_block_type( 'wpm/split', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
        ) );
        /* ### Background ### */
        register_block_type( 'wpm/background', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
        ) );
        /* ### Event ### */
        register_block_type( 'wpm/event', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
        ) );
        /* ### RSS ### */
        require_once WPM_BLOCKS_PATH . '/blocks/f-rss/index.php';
        // Get the dynamic block callback function.
        register_block_type( 'wpm/rss', array(
            'editor_script'   => 'wpm-blocks-editor',
            'editor_style'    => 'wpm-blocks-editor-style',
            'render_callback' => 'wpm_render_block_f_rss',
            'attributes'      => array(
            'url'                   => array(
            'type'    => 'string',
            'default' => '',
        ),
            'amount'                => array(
            'type'    => 'string',
            'default' => '4',
        ),
            'textColor'             => array(
            'type'    => 'string',
            'default' => '',
        ),
            'customTextColor'       => array(
            'type'    => 'string',
            'default' => '',
        ),
            'backgroundColor'       => array(
            'type'    => 'string',
            'default' => '',
        ),
            'customBackgroundColor' => array(
            'type'    => 'string',
            'default' => '',
        ),
            'columns'               => array(
            'type'    => 'string',
            'default' => '2',
        ),
        ),
        ) );
        /* ### Accordion ### */
        register_block_type( 'wpm/accordion', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
        ) );
        /* ### Person ### */
        register_block_type( 'wpm/person', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
        ) );
        /* ### Timeline ### */
        register_block_type( 'wpm/timeline', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
            'style'         => 'wpm-blocks-style',
        ) );
        /* ### Latest Posts ### */
        require_once WPM_BLOCKS_PATH . '/blocks/f-latest-posts/index.php';
        // Get the dynamic block callback function.
        register_block_type( 'wpm/latest-posts', array(
            'editor_script'   => 'wpm-blocks-editor',
            'editor_style'    => 'wpm-blocks-editor-style',
            'render_callback' => 'wpm_render_block_f_latest_posts',
            'attributes'      => array(
            'categories'        => array(
            'type' => 'string',
        ),
            'className'         => array(
            'type' => 'string',
        ),
            'postsToShow'       => array(
            'type'    => 'number',
            'default' => 5,
        ),
            'align'             => array(
            'type' => 'string',
        ),
            'order'             => array(
            'type'    => 'string',
            'default' => 'desc',
        ),
            'orderBy'           => array(
            'type'    => 'string',
            'default' => 'date',
        ),
            'displayPostDate'   => array(
            'type'    => 'boolean',
            'default' => true,
        ),
            'displayCategories' => array(
            'type'    => 'boolean',
            'default' => true,
        ),
            'displayTags'       => array(
            'type'    => 'boolean',
            'default' => true,
        ),
            'displayAuthor'     => array(
            'type'    => 'boolean',
            'default' => true,
        ),
            'displayThumbnail'  => array(
            'type'    => 'boolean',
            'default' => true,
        ),
            'excerptLength'     => array(
            'type'    => 'number',
            'default' => 55,
        ),
            'overrideReadmore'  => array(
            'type'    => 'boolean',
            'default' => false,
        ),
            'readmore'          => array(
            'type'    => 'string',
            'default' => '',
        ),
        ),
        ) );
        /* ### Pricing Table ### */
        register_block_type( 'wpm/pricing-table', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
        ) );
        register_block_type( 'wpm/price-column', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
        ) );
        /* ### Feature Boxes ### */
        register_block_type( 'wpm/feature-grid', array(
            'editor_script' => 'wpm-blocks-editor',
            'editor_style'  => 'wpm-blocks-editor-style',
            'style'         => 'wpm-blocks-style',
        ) );
        wp_enqueue_style( 'wpm-filter-style' );
    }
    
    /**
     * Register the text domain for our plugin
     */
    public function register_i18n()
    {
        if ( function_exists( 'wp_set_script_translations' ) ) {
            wp_set_script_translations( 'wpm-blocks-editor', 'wp-munich-blocks' );
        }
    }
    
    /**
     * Load the plugin text domain for translation.
     */
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain( 'wp-munich-blocks', false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );
    }
    
    /**
     * Register post meta values some blocks use.
     *
     * @return void
     */
    public function register_meta()
    {
        // Used by: ['wpm/timeline'].
        register_meta(
            'post',
            // Posttype, needs to be "post" till fix in core.
            'wpm_timeformat',
            // Metakey.
            array(
                'description'  => __( 'Set a time format.', 'wp-munich-blocks' ),
                'show_in_rest' => true,
                'single'       => true,
                'type'         => 'string',
            )
        );
    }

}