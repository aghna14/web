<?php
/**
 * Main Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'settings/main.php' );

?>

<div class="container">
	<div class="element">
	  <?php _e( 'Position', $this->plugin['text'] ); ?><?php echo self::tooltip( $menu_help ); ?><br/>
	  <?php echo self::option( $menu ); ?>

	</div>
	<div class="element">
	  <?php _e( 'Button shapes', $this->plugin['text'] ); ?><?php echo self::tooltip( $shapes_help ); ?>
	  <?php echo self::pro(); ?><br/>
	  <?php echo self::option( $shapes ); ?>
	</div>
	<div class="element">
	  <?php _e( 'Animation', $this->plugin['text'] ); ?><?php echo self::tooltip( $animation_help ); ?>
	  <?php echo self::pro(); ?><br/>
	  <?php echo self::option( $animation ); ?>
	</div>
</div>

<div class="container">
	<div class="element">
	  <?php _e( 'Icon', $this->plugin['text'] ); ?><br/>
		<?php echo self::option( $menu_icon ); ?>

	</div>
	<div class="element">
	  <?php _e( 'Color', $this->plugin['text'] ); ?><?php echo self::pro(); ?><br/>
	  <?php echo self::option( $color ); ?>
	</div>
	<div class="element">
	  <?php _e( 'Hover color', $this->plugin['text'] ); ?><?php echo self::pro(); ?><br/>
	  <?php echo self::option( $hcolor ); ?>
	</div>
</div>

<div class="container">
	<div class="element">
	  <?php _e( 'ID for element', $this->plugin['text'] ); ?><?php echo self::tooltip( $main_id_help ); ?><br/>
	  <?php echo self::option( $main_id ); ?>
	</div>
	<div class="element">
	  <?php _e( 'Class for element', $this->plugin['text'] ); ?><?php echo self::tooltip( $main_class_help ); ?><br/>
	  <?php echo self::option( $main_class ); ?>
	</div>

	<div class="element">
	  <input type="checkbox" disabled="disabled">
	  <?php _e( 'Hold open', $this->plugin['text'] ); ?>
		<?php echo self::tooltip( $hold_open_help ); ?><?php echo self::pro(); ?>

	</div>
</div>