<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php include ('include/data.php'); ?>
<form action="admin.php?page=<?php echo $pluginname;?>" method="post">
	<div class="wowcolom">
		<div id="wow-leftcol">
			<div class="wow-admin">
				<input placeholder="Name is used only for admin purposes" type='text' name='title' value="<?php echo $title; ?>" class="input-100 wow-title"/>
			</div>
			<div class="tab-box wow-admin">
				<ul class="tab-nav">
					<li><a href="#t1"><i class="fa fa-paint-brush"></i> Style</a></li>
					<li><a href="#t2"><i class="fa fa-bars"></i> Menu</a></li>					
				</ul>
				<div class="tab-panels">
					<div id="t1">
						<div class="wow-admin-col">
							<div class="wow-admin-col-4">
								<span class="dashicons dashicons-lock" style="color:#37c781;"></span> Menu position: <br/>	
								<select disabled="disabled">																	
									<option>Left</option>
								</select>			
								
							</div>	
							<div class="wow-admin-col-4">
								Menu button position:<br/>									
								<select name="param[button]">																	
									<option value="top" <?php if($param['button']=='top') { echo 'selected="selected"'; } ?>>Top</option>
									<option value="bottom" <?php if($param['button']=='bottom') { echo 'selected="selected"'; } ?>>Bottom</option>
								</select>											
							</div>
							<div class="wow-admin-col-4"></div>
						</div>
						<div class="wow-admin-col">
							<div class="wow-admin-col-4">
								<span class="dashicons dashicons-lock" style="color:#37c781;"></span> Background color: <br/>
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/color.png" alt=""/>
								
							</div>
							<div class="wow-admin-col-4">
								<span class="dashicons dashicons-lock" style="color:#37c781;"></span> Background Color on Hover:<br/>
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/color.png" alt=""/>
								
							</div>
							<div class="wow-admin-col-4">
								<span class="dashicons dashicons-lock" style="color:#37c781;"></span> Text color:<br/>
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/color.png" alt=""/>
								
							</div>	
						</div>
						<div class="wow-admin-col">
							<div class="wow-admin-col-4">
								<span class="dashicons dashicons-lock" style="color:#37c781;"></span> Menu button color:<br/>
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/color.png" alt=""/>
								
							</div>
							<div class="wow-admin-col-4">
								<span class="dashicons dashicons-lock" style="color:#37c781;"></span> Open Menu button color:<br/>
								<img src="<?php echo plugin_dir_url( __FILE__ ); ?>img/color.png" alt=""/>
								
							</div>
							<div class="wow-admin-col-4"></div>
						</div>
					</div>
					<div id="t2">
						<div class="menu_1">
							<?php if ($count_i > 0){							
								for ($i = 0; $i < $count_i; $i++) { ?>
								<div class="menu_1-items-<?php echo $i+1;?>">
									<h3>Item <span class="menu_1-icount"><?php echo $i+1;?></span></h3>						
									<div class="wow-admin-col">
										<div class="wow-admin-col-6">
											Select Icon:<br/>
											<span id="menu_1_icons_<?php echo $i;?>"></span>	
											<input type="hidden" value="<?php echo $param['menu_1']['item_icon'][$i]; ?>" id="menu_1_item_icon_<?php echo $i;?>">	
										</div>
										<div class="wow-admin-col-6">
											Name:<br/>
											<input type="text" name="param[menu_1][item_tooltip][<?php echo $i;?>]" value="<?php if(!empty($param['menu_1']['item_tooltip'][$i])) echo $param['menu_1']['item_tooltip'][$i]; ?>">			
										</div>
									</div>
									<div class="wow-admin-col">
										<div class="wow-admin-col-6">	
											Item type:<br/>
											<select name="param[menu_1][item_type][<?php echo $i;?>]">
												<option value="link">Link</option>
											</select>
										</div>
										<div class="wow-admin-col-6 menu_1_item_link_<?php echo $i;?>">
											<span id="menu_1_item_link_<?php echo $i;?>">Link</span>:<br/>
											<input type="text" name="param[menu_1][item_link][<?php echo $i;?>]" value="<?php if(!empty($param['menu_1']['item_link'][$i])) echo $param['menu_1']['item_link'][$i]; ?>">
										</div>										
									</div>
								</div>
								<?php	
								} 
							} 										
							?>
						</div>
						<div class="submit-bottom">
							<input type="button" value="Add item" class="formsub fully-rounded" onclick="itemadd(1)"> 
							<input type="button" class="formpreview fully-rounded" value="Delete last item" onclick="itemremove(1)">
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div id="wow-rightcol">
			<div class="wowbox">
				<h3>Publish</h3>
				<div class="wow-admin-col">
					
					<div class="wow-admin-col-6">
						<?php if ($id != ""){ echo '<p class="wowdel"><a href="admin.php?page='.$pluginname.'&info=del&did='.$id.'">Delete</a></p>';}; ?>
					</div>
					<div class="wow-admin-col-6 right">
						<p/>
						<input name="submit" id="submit" class="button button-primary" value="<?php echo $btn; ?>" type="submit">
					</div>
					
				</div>
			</div>
			<div class="wowbox">
				<h3>Show menu</h3>
				<div class="inside wow-admin" style="display: block;">
					<div class="wow-admin-col wow-wrap">
						<div class="wow-admin-col-12">
							Show for users: <br/>
							<span class="dashicons dashicons-lock" style="color:#37c781;"></span> <input type="radio" checked="checked" > All users <br />
							<span class="dashicons dashicons-lock" style="color:#37c781;"></span> <input type="radio" disabled="disabled"> If a user logged in <br />
							<span class="dashicons dashicons-lock" style="color:#37c781;"></span> <input type="radio" disabled="disabled" > If user not logged 
						</div>
						<div class="wow-admin-col-12">
							<span class="dashicons dashicons-lock" style="color:#37c781;"></span> <input type="checkbox" disabled="disabled"> Depending on the language 
						</div>
						<div class="wow-admin-col-12">
							<span class="dashicons dashicons-lock" style="color:#37c781;"></span> Show menu: <br/>
							<select disabled="disabled">
								<option value="">Only Pro Version</option>									
							</select>
						</div>						
					</div>
				</div>
			</div>
			<div class="wowbox">
				<center><img src="<?php echo plugin_dir_url( __FILE__ ); ?>thankyou.png" alt=""  /></center>
				<hr/>				
				<div class="wow-admin wow-plugins">
					<p>We will be very grateful if you <a href="https://wordpress.org/plugins/slide-menu/" target="_blank"><b>leave a review about the plugin</b></a>.</p>
					<p>If you have suggestions on how to improve the plugin or create a new plugin, write to us via the <a href="admin.php?page=<?php echo $pluginname;?>&tool=support" target="_blank"><b>support form</b></a></p>					
					<p>We really appreciate your reviews and suggestions for improving the plugin.</p>
					<p>					
					<b><em>Thank you for choosing the plugin from Wow-Company! </em></b></p>
					<em><b>Best Regards</b>,<br/>						
						<a href="https://wow-estore.com/" target="_blank">Wow-Company Team</a><br/>
						Dmytro Lobov<br/>
						<a href="mailto:support@wow-company.com">support@wow-company.com</a>
					</em>
					
				</div>
			</div>	
		</div>
	</div>
	<input type="hidden" name="param[time]" value="<?php echo time(); ?>" />
	<input type="hidden" name="add" value="<?php echo $hidval; ?>" />    
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="hidden" name="data" value="<?php echo $data; ?>" />
	<input type="hidden" name="page" value="<?php echo $pluginname;?>" />	
	<input type="hidden" name="plugdir" value="<?php echo $pluginname;?>" />		
	<?php wp_nonce_field('wow_plugin_action','wow_plugin_nonce_field'); ?>
</form>	
<div style="display:none;">
	<select id="icons" class="icons">
		<?php
			include ('icon.php');										
		?> 
	</select>
</div>