<?php
/*
Setting Default Values
*/
function edm_set_default_values_for_modules(){
	$saved_to_db = array();
	$edm_get_modules = edm_get_modules_list();
	foreach($edm_get_modules as $singlemodule){
		if($singlemodule['type'] == 'free'){
			$saved_to_db[$singlemodule['slug']] = 1;
		}
		else{
			$saved_to_db[$singlemodule['slug']] = 0;
		}
	}
	update_option('edm_settings',$saved_to_db);
}
function edm_register_plugin_activate_default(){
	edm_set_default_values_for_modules();
}
add_action('edm_register_plugin_activate','edm_register_plugin_activate_default');
/*
Register Menu
*/
add_action( 'admin_menu', 'edm_add_admin_page');
function edm_add_admin_page() {
  // add top level menu page
  add_menu_page(
    'Exclusive Divi', //Page Title
    'Exclusive Divi', //Menu Title
    'manage_options', //Capability
    'exclusive-divi', //Page slug
    'edm_admin_page_html', //Callback to print html
    'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA3NSA3NC41MSI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiNmZmY7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZT5tb25vZ3JhbTwvdGl0bGU+PGcgaWQ9IkxheWVyXzIiIGRhdGEtbmFtZT0iTGF5ZXIgMiI+PGcgaWQ9IkxheWVyXzEtMiIgZGF0YS1uYW1lPSJMYXllciAxIj48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik00Ny42LDczLjMxYzAtNC43OCwwLTkuNDUsMC0xNC4xMiwwLS40NS42Ni0xLDEuMTQtMS4zMWEyNy4zNSwyNy4zNSwwLDAsMCw5LjY4LTEwQzY2LjI1LDMzLjE5LDU1LDE0LjIxLDM4LjI4LDE0LjExYy0xMS44NC0uMDgtMjMuNjcsMC0zNS41LDBDMCwxNC4wOSwwLDE0LjA5LDAsMTEuMjRjMC0zLjE2LDAtNi4zMiwwLTkuNDlDMCwuNTIuNDYsMCwxLjY3LDAsMTQuODMuMSwyOC0uMjIsNDEuMTQuMyw1MS4yNS43LDU5LjM4LDUuOCw2NiwxMy4zNmMxMi4yMywxNCwxMiwzNC4zNS0uMzUsNDguNjFBMzguMzcsMzguMzcsMCwwLDEsNDguODgsNzMuMTEsNy41MSw3LjUxLDAsMCwxLDQ3LjYsNzMuMzFaIi8+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTcuODYsNzQuNDdjLTUuMTgsMC0xMC4zNywwLTE1LjU1LDBDLjY0LDc0LjUzLjEzLDc0LC4xNCw3Mi4zMnEuMDktMTkuODEsMC0zOS42NWMwLTEuNjMuNDktMi4yMSwyLjE3LTIuMnExNS4zNi4wOCwzMC43MywwYzEuNzIsMCwyLjM5LjU0LDIuMzMsMi4zLS4xLDIuODQsMCw1LjY5LDAsOC41M3MtLjA1LDMtMywyLjkzYy01LjQzLDAtMTAuODcsMC0xNi4zMS0uMDctMS42NywwLTIuMzUuNDItMi4zLDIuMjMuMTMsNC4xNy4wOSw4LjM1LDAsMTIuNTIsMCwxLjUzLjUzLDIsMiwyLDUuODItLjA2LDExLjY0LDAsMTcuNDYtLjA2LDEuNiwwLDIuMjcuMzcsMi4yLDIuMTEtLjEyLDMuMTUtLjEyLDYuMzIsMCw5LjQ4LjA2LDEuNzEtLjU3LDIuMTUtMi4yLDIuMTItNS4xMi0uMDktMTAuMjQsMC0xNS4zNywwWiIvPjwvZz48L2c+PC9zdmc+'
  );

  add_action( 'admin_init', 'edm_register_settings' );
}

function edm_register_settings() {
	//register our settings

	$args = array(
			'sanitize_callback' => 'edm_sanitize_checkbox_field',
	);

	register_setting( 'edm-panel-settings', 'edm_settings', $args );
}

function edm_sanitize_checkbox_field($input){
		$sanitary_values = $input;
		$edm_get_modules = edm_get_modules_list();
		$edm_module_savedop = get_option('edm_settings');
		foreach($edm_get_modules as $singlemodule){

			if ( isset( $input[$singlemodule['slug']] ) ) {
				$sanitary_values[$singlemodule['slug']] = 1;
			}
			else{
				$sanitary_values[$singlemodule['slug']] = 0;
			}			

		}
		return $sanitary_values;	
}

/*
Enqueue Admin scripts
*/
function edm_selectively_enqueue_admin_script( $hook ) {
	if($hook == 'toplevel_page_exclusive-divi'){
		wp_enqueue_script( 'edm_admin_script', EDM_PLUGIN_URL . 'admin/js/script.js', array(), '1.0' );
		wp_enqueue_style( 'edm_admin_style',  EDM_PLUGIN_URL . 'admin/css/admin-styles.css' );
		wp_enqueue_style( 'edm_admin_preloader',  EDM_PLUGIN_URL . 'public/css/preloader.css' );
	}

	
}
add_action( 'admin_enqueue_scripts', 'edm_selectively_enqueue_admin_script' );

function edm_builder_load_css() {

	if ( function_exists( 'et_core_is_fb_enabled' ) ) {
		if ( et_core_is_fb_enabled() ) {
			wp_enqueue_style( 'edm_builder_style',  EDM_PLUGIN_URL . 'admin/css/builder.css' );
		}
	}

}

add_action( 'wp_enqueue_scripts', 'edm_builder_load_css' );

function edm_admin_page_html() {
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }
  $edm_module_savedop = get_option('edm_settings');
  //Get the active tab from the $_GET param
  $default_tab = null;
  $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

  ?>
  <!-- Our admin page content should all be inside .wrap -->
  <div class="wrap edm-panel-section">

	<div class="edm-admin-settings">
		    <!-- Print the page title -->
    <div class="edm_heading_title"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA3NSA3NC41MSI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiNmZmY7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZT5tb25vZ3JhbTwvdGl0bGU+PGcgaWQ9IkxheWVyXzIiIGRhdGEtbmFtZT0iTGF5ZXIgMiI+PGcgaWQ9IkxheWVyXzEtMiIgZGF0YS1uYW1lPSJMYXllciAxIj48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik00Ny42LDczLjMxYzAtNC43OCwwLTkuNDUsMC0xNC4xMiwwLS40NS42Ni0xLDEuMTQtMS4zMWEyNy4zNSwyNy4zNSwwLDAsMCw5LjY4LTEwQzY2LjI1LDMzLjE5LDU1LDE0LjIxLDM4LjI4LDE0LjExYy0xMS44NC0uMDgtMjMuNjcsMC0zNS41LDBDMCwxNC4wOSwwLDE0LjA5LDAsMTEuMjRjMC0zLjE2LDAtNi4zMiwwLTkuNDlDMCwuNTIuNDYsMCwxLjY3LDAsMTQuODMuMSwyOC0uMjIsNDEuMTQuMyw1MS4yNS43LDU5LjM4LDUuOCw2NiwxMy4zNmMxMi4yMywxNCwxMiwzNC4zNS0uMzUsNDguNjFBMzguMzcsMzguMzcsMCwwLDEsNDguODgsNzMuMTEsNy41MSw3LjUxLDAsMCwxLDQ3LjYsNzMuMzFaIi8+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTcuODYsNzQuNDdjLTUuMTgsMC0xMC4zNywwLTE1LjU1LDBDLjY0LDc0LjUzLjEzLDc0LC4xNCw3Mi4zMnEuMDktMTkuODEsMC0zOS42NWMwLTEuNjMuNDktMi4yMSwyLjE3LTIuMnExNS4zNi4wOCwzMC43MywwYzEuNzIsMCwyLjM5LjU0LDIuMzMsMi4zLS4xLDIuODQsMCw1LjY5LDAsOC41M3MtLjA1LDMtMywyLjkzYy01LjQzLDAtMTAuODcsMC0xNi4zMS0uMDctMS42NywwLTIuMzUuNDItMi4zLDIuMjMuMTMsNC4xNy4wOSw4LjM1LDAsMTIuNTIsMCwxLjUzLjUzLDIsMiwyLDUuODItLjA2LDExLjY0LDAsMTcuNDYtLjA2LDEuNiwwLDIuMjcuMzcsMi4yLDIuMTEtLjEyLDMuMTUtLjEyLDYuMzIsMCw5LjQ4LjA2LDEuNzEtLjU3LDIuMTUtMi4yLDIuMTItNS4xMi0uMDktMTAuMjQsMC0xNS4zNywwWiIvPjwvZz48L2c+PC9zdmc+" /><span><?php echo esc_html( get_admin_page_title() ); ?></span></div>
    <form method="post" action="options.php">
    	<?php settings_fields( 'edm-panel-settings' ); ?>
    	<?php do_settings_sections( 'edm-panel-settings' ); ?>
    <!-- Here are our tabs -->
    <nav class="nav-tab-wrapper">

	 <a href="#options-group-1" id="options-group-1-tab" class="nav-tab basicsettings-tab">General</a>
 
      <a href="#options-group-2" id="options-group-2-tab" class="nav-tab basicsettings-tab">Modules</a>
	 
	  <a href="#options-group-3" id="options-group-3-tab" class="nav-tab basicsettings-tab">Mobile</a>
	
    </nav>
  
	<div class="edm-settings-container">
	<div id="options-group-1" class="group advancedsettings" >
		<h3> General Settings </h3>
		<div class="settings-group">

		<div class="edm-settings-inner">


			<div class="edm-settings-item">

				
			<div class="edm-settings-item-inner">
				
				<div class="edm-settings-item-title">
					<h4 class="edm-settings-title-inr"> Enable AJAXIFY <span class="edm-beta">Beta</span></h4>
					<span class="settings-title-desc"> Enable this to load your website pages without reloading </span>
				</div>
					<div class="edm-settings-switch">
					<label class="edm-enable-switch">
					<input id="edm_enable_ajaxify" class="checkbox of-input" type="checkbox" name="edm_settings[ajaxify]" <?php if(edm_admin_check_if_box_checked('ajaxify', "", true) === true) { echo 'checked'; }; ?>>
							
					<span class="edm-switch-slider"></span>
					</label>
				</div>
					
			</div>
			</div>



				<div class="edm-settings-item">

	
				<div class="edm-settings-item-inner">
					
					<div class="edm-settings-item-title">
						<h4 class="edm-settings-title-inr"> Allow SVG Files Upload </h4>
						<span class="settings-title-desc"> Enable this option to allow SVG files upload </span>
					</div>
						<div class="edm-settings-switch">
						<label class="edm-enable-switch">
						<input id="edm_enable_svg" class="checkbox of-input" type="checkbox" name="edm_settings[svg-upload]" <?php if(edm_admin_check_if_box_checked('svg-upload', "", true) === true) { echo 'checked'; }; ?>>
								
						<span class="edm-switch-slider"></span>
						</label>
					</div>
						
				</div>
				</div>

				<div class="edm-settings-item">

	
				<div class="edm-settings-item-inner">
					
					<div class="edm-settings-item-title">
						<h4 class="edm-settings-title-inr"> Allow TTF, OTF and WOFF Font files Upload </h4>
						<span class="settings-title-desc"> Enable this option to allow TTF, OTF and WOFF font files upload </span>
					</div>
						<div class="edm-settings-switch">
						<label class="edm-enable-switch">
						<input id="edm_enable_font_files" class="checkbox of-input" type="checkbox" name="edm_settings[font-files]" <?php if(edm_admin_check_if_box_checked('font-files', "", true) === true) { echo 'checked'; }; ?>>
								
						<span class="edm-switch-slider"></span>
						</label>
					</div>
						
				</div>
				</div>

				<div class="edm-settings-item"  data-id="enable-preloader">

	
				<div class="edm-settings-item-inner">
					
					<div class="edm-settings-item-title">
						<h4 class="edm-settings-title-inr"> Enable Preloader </h4>
						<span class="settings-title-desc"> Enable this option to add preloader to your website </span>
					</div>
						<div class="edm-settings-switch">
						<label class="edm-enable-switch">
						<input id="edm_enable_preloader" class="checkbox of-input" type="checkbox" name="edm_settings[preloader]" <?php if(edm_admin_check_if_box_checked('preloader', "", true) === true) { echo 'checked'; }; ?>>
								
						<span class="edm-switch-slider"></span>
						</label>
					</div>
						
				</div>
				</div>


				<div class="edm-settings-item"  depends="enable-preloader">

	
				<div class="edm-settings-item-inner">
					
					<div class="edm-settings-item-title">
						<h4 class="edm-settings-title-inr">Change Preloader Color <span class="edm_badge_title">PRO</span> </h4>
						<span class="settings-title-desc"> Select the color for preloader. </span>
					</div>
						<div class="edm-settings-switch">
						<label class="edm-enable-switch">
						<input id="edm_enable_preloader_color" class="checkbox of-input" type="checkbox" disabled name="edm_settings[preloader_color]" >
								
						<span class="edm-switch-slider"></span>
						</label>
					</div>
						
				</div>
				</div>


				<div class="edm-settings-item edm-preloaders" depends="enable-preloader">

	
				<div class="edm-settings-item-inner">
					
					<div class="edm-settings-item-title">
						<h4 class="edm-settings-title-inr"> Select Preloader </h4>
						<span class="settings-title-desc"> Select the Preloader you would like to display on your website </span>
					</div>

  					<div class="edm-settings-multiple-options-group edm-select-preloader"> 

					  <div class="edm_select_option">
							<input type="radio" name="edm_settings[preloader-style]" <?php if(empty($edm_module_savedop['preloader-style'])) { echo "checked"; }  ?> value="edm_select_preloader_ripple" id="edm_select_preloader_ripple" <?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_ripple') === true) { echo 'checked'; }; ?>>
							<label for="edm_select_preloader_ripple">
							<div class="edm_preloader">

							<div class="edm-ripple">
								<div></div>
								<div></div>
							</div>
				
                   			 </div>
							</label>
						</div>

						<div class="edm_select_option">
							<input type="radio" name="edm_settings[preloader-style]" value="edm_select_preloader_ellipsis" id="edm_select_preloader_ellipsis" <?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_ellipsis') === true) { echo 'checked'; }; ?>>
							<label for="edm_select_preloader_ellipsis">
							<div class="edm_preloader">

							<div class="edm-ellipsis">
								<div></div>
								<div></div>
								<div></div>
								<div></div>
							</div>
				
                   			 </div>
							</label>
						</div>

						<div class="edm_select_option">
							<input type="radio" name="edm_settings[preloader-style]" value="edm_select_preloader_facebook" id="edm_select_preloader_facebook" <?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_facebook') === true) { echo 'checked'; }; ?> >
							<label for="edm_select_preloader_facebook">
							<div class="edm_preloader">

							<div class="edm-facebook">
								<div></div>
								<div></div>
								<div></div>
							</div>
				
                   			 </div>
							</label>
						</div>

						<div class="edm_select_option">
							<input type="radio" name="edm_settings[preloader-style]" value="edm_select_preloader_ring" id="edm_select_preloader_ring" <?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_ring') === true) { echo 'checked'; }; ?>>
							<label for="edm_select_preloader_ring">
							<div class="edm_preloader">

							<div class="edm-ring">
								<div></div>
								<div></div>
								<div></div>
								<div></div>
							</div>
				
                   			 </div>
							</label>
						</div>


						<div class="edm_select_option">
							<input type="radio" name="edm_settings[preloader-style]" value="edm_select_preloader_grid" id="edm_select_preloader_grid" <?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_grid') === true) { echo 'checked'; }; ?>>
							<label for="edm_select_preloader_grid">
							<div class="edm_preloader">

							<div class="edm-grid">
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
							</div>
				
                   			 </div>
							</label>
						</div>


						<div class="edm_select_option">
							<input type="radio" name="edm_settings[preloader-style]" value="edm_select_preloader_default" id="edm_select_preloader_default" <?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_default') === true) { echo 'checked'; }; ?>>
							<label for="edm_select_preloader_default">
							<div class="edm_preloader">

							<div class="edm-default">
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
								<div></div>
							</div>
				
                   			 </div>
							</label>
						</div>


					</div>

						
				</div>
				</div>


			</div>
			</div>


	</div>
	<div id="options-group-2" class="group basicsettings" style=""><h3>Modules</h3>
		<div class="section section-info">
		<div class="edm-module-list">
			<div class="edm-module-list-inner">
		<?php 

		$edm_get_modules = edm_get_modules_list();
		
		foreach($edm_get_modules as $singlemodule){
			?>
			<div class="edm-module-item <?php if(!empty($singlemodule["type"] == "pro") || !empty($singlemodule["type"] == "soon")) { ?> edm_pro_module <?php } ?>">
				<div class="edm-module-item-inner">
					<div class="edm-module-item-icon">
						<img src="<?php echo esc_attr($singlemodule['icon']); ?>" alt="" />
					</div>
					<div class="edm-module-item-title">
						<h4 class="edm-module-title-inr"><?php echo esc_html($singlemodule["title"]); ?> <?php if(!empty($singlemodule["badge"])) { ?><span class="edm_badge_title"><?php echo esc_html($singlemodule["badge"]); ?></span><?php } ?></h4>
					
					<span class="edm-module-item-preview">
						<a href="<?php echo esc_url($singlemodule["demo"]);?>" target="_blank" class="edm-module-prv-link"><?php _e('Live Demo','edm-exclusive-divi-modules'); ?></a>
					</span>
					</div>
					<div class="edm-enable-disable-module">
						<label class="edm-enable-switch">
						<input id="<?php echo esc_attr( $singlemodule['slug'] ); ?>" class="checkbox of-input" type="checkbox" name="edm_settings[<?php echo esc_attr( $singlemodule['slug'] ); ?>]" 
								<?php 
								if(!empty($edm_module_savedop)){  
								    if(edm_admin_check_if_box_checked($singlemodule['slug'])) { 
								       if($singlemodule["type"] != "pro"){ 
								          echo "checked";  
								        }  
								      }  
								}
								else{
									if($singlemodule["type"] != "pro" && $singlemodule["type"] != "soon"){ 
										echo "checked";
									}
								}
								 ?> <?php if(!empty($singlemodule["type"] == "pro") || !empty($singlemodule["type"] == "soon")) { ?> disabled <?php } ?>  />
								
						<span class="edm-switch-slider"></span>
						</label>
						</div>
				</div>
				<?php if(!empty($singlemodule["type"] == "pro")) { ?>
					<div class="edm-module-pro">
						<span>Pro</span>
					</div>
				<?php } ?>
			</div>
			<?php
		}
		?>
			</div>
		</div>

		</div>



	</div>
	<div id="options-group-3" class="group advancedsettings" >
	<h3> Mobile Settings </h3>

	<div class="settings-group">

	<div class="edm-settings-inner">

			<div class="edm-settings-item" data-id="collapse-menu">

	
				<div class="edm-settings-item-inner">
					
					<div class="edm-settings-item-title">
						<h4 class="edm-settings-title-inr"> Collapse Submenu Items on Mobiles </h4>
						<span class="settings-title-desc"> Enable this option to collapse submenu items on mobiles. </span>
					</div>
						<div class="edm-settings-switch">
						<label class="edm-enable-switch">
						<input id="edm_collapsable_menu" class="checkbox of-input" type="checkbox" name="edm_settings[mobile-collapsable]" <?php if(edm_admin_check_if_box_checked('mobile-collapsable', "", true) === true) { echo 'checked'; }; ?>>
								
						<span class="edm-switch-slider"></span>
						</label>
					</div>
						
				</div>
						


			</div>


			<div class="edm-settings-item" data-id="remove-parent-link" depends="collapse-menu">

	
				<div class="edm-settings-item-inner">
					
					<div class="edm-settings-item-title">
						<h4 class="edm-settings-title-inr"> Remove Parent Menu Link </h4>
						<span class="settings-title-desc"> Enable this option to prevent parent menu links from opening. </span>
					</div>
						<div class="edm-settings-switch">
						<label class="edm-enable-switch">
						<input id="mobile-remove-parent-link" class="checkbox of-input" type="checkbox" name="edm_settings[mobile-remove-parent-link]" <?php if(edm_admin_check_if_box_checked('mobile-remove-parent-link', "", true) === true) { echo 'checked'; }; ?>>
								
						<span class="edm-switch-slider"></span>
						</label>
					</div>
						
				</div>
						


				</div>


	</div>

	</div>

	</div>


	<?php submit_button(); ?>
	</div>
	</form>
	</div>
	<div class="edm-sidebar-container">

	<div class="meta-box-sortables edm-doc-box">
			<div class="postbox">
				<h3 class="activity-block"><span class="dashicons dashicons-unlock"></span> Upgrade to PRO</h3>
				<div class="inside">
					<p>Upgrade now to unlock the possiblities with Exclusive Divi. The price is we are offering is introductry.</p>
					<a href="<?php echo esc_url(ed_fs()->get_upgrade_url()); ?>" class="button button-primary" target="_blank">Upgrade Now</a>
				</div>
			</div>
		</div>


	<div class="meta-box-sortables edm-doc-box">
			<div class="postbox">
				<h3 class="activity-block"><span class="dashicons dashicons-media-document"></span> Documentation</h3>
				<div class="inside">
					<p>ExclusiveDivi documentation will cover all the information needed when using our ExclusiveDivi to build an amazing website, as well as some helpful tips and tricks that will make your experience working with our Divi modules and extensions easier and more enjoyable.</p>
					<a href="https://docs.exclusivedivi.com/" class="button button-primary" target="_blank">Documentation</a>
				</div>
			</div>
		</div>

	<div class="meta-box-sortables edm-review-box">
			<div class="postbox">
				<h3 class="activity-block"><span class="dashicons dashicons-heart"></span> Review us!</h3>
				<div class="inside">
					<p>Could you please be so kind to give a 5-star rating on WordPress? This would boost our motivation and help other users make a comfortable decision while choosing the Exclusive Divi. </p>
					<a href="https://wordpress.org/support/plugin/exclusive-divi/reviews/#new-post" data-rated="' . esc_attr__( 'Thanks :)', 'edm-exclusive-divi-modules' ) . '" class="button button-primary" target="_blank">Write a review</a>
				</div>
			</div>
		</div>

	</div>
	
	
  </div>
  <?php
}