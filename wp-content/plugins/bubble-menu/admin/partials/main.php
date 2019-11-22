<?php
/**
 * Plugin main page
 *
 * @package     Wow_Plugin
 * @subpackage  Admin/Main_page
 * @author      Dmytro Lobov <i@wpbiker.com>
 * @copyright   2019 Wow-Company
 * @license     GNU Public License
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once 'tools-data-base.php';

$current_tab = ( isset( $_REQUEST["tab"] ) ) ? sanitize_text_field( $_REQUEST["tab"] ) : 'list';

$tabs = apply_filters( $this->plugin['slug'] . '_tab_menu', array(
	'list'      => esc_attr__( 'List', $this->plugin['text'] ),
	'add-new'   => esc_attr__( 'Add new', $this->plugin['text'] ),
	'generator' => esc_attr__( 'Icon for menu', $this->plugin['text'] ),
	'extension' => esc_attr__( 'Pro Features', $this->plugin['text'] ),
	'support'   => esc_attr__( 'Support', $this->plugin['text'] ),
	'items'     => esc_attr__( 'Plugins', $this->plugin['text'] ),
) );

?>

	<div class="wrap">
		<h1 class="wp-heading-inline"><?php echo $this->plugin['name']; ?> v. <?php echo $this->plugin['version']; ?></h1>
		<a href="?page=<?php echo $this->plugin['slug']; ?>&tab=add-new" class="page-title-action">
		<?php esc_attr_e( 'Add New', $this->plugin['text'] ); ?></a>
		<a href="<?php echo $this->url['facebook']; ?>" class="page-title-action" target="_blank">Stay in touch</a>
		<hr class="wp-header-end">
		<p class="ideas">
			<span class="dashicons dashicons-megaphone"></span>
		<?php printf( __( 'We want to hear your Ideas about improving the plugin.
    <a href="%1$s" target="_blank">Send Message</a>!', $this->plugin['text'] ), $this->url['support'] ); ?>
		</p>

		<div id="wow-message"></div>

	  <?php
	  echo '<h2 class="nav-tab-wrapper">';
	  foreach ( $tabs as $tab => $name ) {
		  $class = ( $tab === $current_tab ) ? ' nav-tab-active' : '';
		  if ( $tab == 'add-new' ) {
			  $action = ( isset( $_REQUEST["act"] ) ) ? sanitize_text_field( $_REQUEST["act"] ) : '';
			  if ( ! empty( $action ) && $action == 'update' ) {
				  echo '<a class="nav-tab' . esc_attr( $class ) . '" href="?page=' . $this->plugin['slug'] . '&tab='
				       . esc_attr( $tab ) . '">' . esc_attr__( 'Update', $this->plugin['prefix'] ) . ' #'
				       . absint( $_REQUEST["id"] ) . '</a>';
			  } else {
				  echo '<a class="nav-tab' . esc_attr( $class ) . '" href="?page=' . $this->plugin['slug'] . '&tab='
				       . esc_attr( $tab ) . '">' . esc_attr( $name ) . '</a>';
			  }
		  } else {
			  echo '<a class="nav-tab' . esc_attr( $class ) . '" href="?page=' . $this->plugin['slug'] . '&tab='
			       . esc_attr( $tab ) . '">' . esc_attr( $name ) . '</a>';
		  }

	  }
	  echo '</h2>';
	  $file = apply_filters( $this->plugin['slug'] . '_menu_file', $current_tab );
	  include_once( $file . '.php' );
	  ?>
	</div>
<?php
