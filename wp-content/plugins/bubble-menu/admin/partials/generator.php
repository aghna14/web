<?php
/**
 * Generate class for main menu icon
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

include_once plugin_dir_path( __FILE__ ) . 'add-new/settings/icons.php';

?>
<div class="about-wrap wow-support">
	<div class="feature-section one-col">
		<div class="col">

			<div class="wow-plugin">

				<h3>
			<?php _e( 'Generate icon class for main menu', $this->plugin['text'] ); ?>
				</h3>


				<div class="container">
					<div class="element">
			  		<?php _e( 'Select icon', $this->plugin['text'] ); ?><br/>
						<select class="icons" id="select_icon" onchange="menuicon();">
							<?php
							$icon_select = '';
							foreach ( $icons as $icon ) {
								$icon_select .= '<option value="' . $icon . '">' . $icon . '</option>';
							};
							echo $icon_select;
							?>
						</select>

					</div>
					<div class="element">
						<?php _e( 'Icon position', $this->plugin['text'] ); ?>
						<select id="icon_position" onchange="menuicon();">
							<option value=""><?php _e( 'Before Menu item', $this->plugin['text'] ); ?></option>
							<option value=" fa-after"><?php _e( 'After Menu item', $this->plugin['text'] ); ?></option>
						</select>
					</div>
				</div>

				<div class="container">
					<div class="element">
						<h4><?php _e( 'Icon Class', $this->plugin['text'] ); ?>:	<span id="icon_class" style="color:#37c781;"/></span> </h4>
					</div>
				</div>

				<fieldset class="triggers-open-notice">
				<legend style="color:red"><?php _e( 'Notice!', $this->plugin['text'] ); ?></legend>
				<div class="container">
					<div class="element">
			  <?php _e( 'You can open popup via adding to the element:', $this->plugin['text'] ); ?>
						<ul>
							<li>&bull; Copy Icon Class</li>
							<li>&bull; Go to Appearance -> Menus, select which menu item to which you want to add the icon, and add the icon class(es) under 'CSS Classes (optional)'. Click 'Screen Options' (top right of screen) and make sure that 'CSS Classes' is checked. If not - check it!</li>
							<li>&bull; Paste Icon Class to item 'CSS Classes'</li>
						</ul>
					</div>
				</div>
				</fieldset>


			</div>
		</div>
	</div>
</div>
