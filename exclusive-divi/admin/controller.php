<?php
/*
Get All Modules
*/
function edm_get_modules_list(){
	$modules = array();

	$modules = array(
		array(
			'title' => 'Divider',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_divider',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_divider.svg',
			'demo' => 'https://exclusivedivi.com/module/divider/',
		),
		array(
			'title' => 'Gradient Text',
			'type' => 'free',
			'badge' => 'hot',
			'slug' => 'edm_gradient_text',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_gradient_text.svg',
			'demo' => 'https://exclusivedivi.com/module/gradient-text/',
		),	
		array(
			'title' => 'Typing Text',
			'type' => 'free',
			'badge' => 'hot',
			'slug' => 'edm_typing_text',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_typing_text.svg',
			'demo' => 'https://exclusivedivi.com/module/typing-text/',
		),	
		array(
			'title' => 'Video Lightbox',
			'type' => 'free',
			'badge' => 'New',
			'slug' => 'edm_video_lightbox',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_video_lightbox.svg',
			'demo' => 'https://exclusivedivi.com/module/video-lightbox/',
		),	
		array(
			'title' => 'Scrolling Text',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_scrolling_text',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_scrolling_text.svg',
			'demo' => 'https://exclusivedivi.com/module/scrolling-text/',
		),
		/*
		array(
			'title' => 'Card',
			'type' => 'pro',
			'badge' => 'hot',
			'slug' => 'edm_card',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/default.png',
			'demo' => 'https://exclusivedivi.com/',
		),	
		*/
		array(
			'title' => 'Before After Slider',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_before_after_image_slider',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_before_after_image_slider.svg',
			'demo' => 'https://exclusivedivi.com/module/before-after-image-slider/',
		),	
		array(
			'title' => 'Gallery',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_gallery',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_gallery.svg',
			'demo' => 'https://exclusivedivi.com/module/gallery/',
		),	

		array(
			'title' => 'Highlighted Text',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_highlighted_text',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_highlighted_text.svg',
			'demo' => 'https://exclusivedivi.com/module/highlighted-text/',
		),
		array(
			'title' => 'Progress Bar',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_progress_bar',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_progress_bar.svg',
			'demo' => 'https://exclusivedivi.com/module/progress-bar/',
		),	
		array(
			'title' => 'Multi Button',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_multi_button',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_multi_button.svg',
			'demo' => 'https://exclusivedivi.com/module/multi-button/',
		),	

		array(
			'title' => 'Twitter Feed',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_twitter_feed',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_twitter_feed.svg',
			'demo' => 'https://exclusivedivi.com/module/twitter-feed/',
		),

		array(
			'title' => 'Glitch Text',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_glitch_text',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_glitch_text.svg',
			'demo' => 'https://exclusivedivi.com/module/glitch-text/',
		),	

		array(
			'title' => 'Fancy Text',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_fancy_text',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_fancy_text.svg',
			'demo' => 'https://exclusivedivi.com/module/fancy-text/',
		),	

		array(
			'title' => 'Dropcap Text',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_drop_cap',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_drop_cap.svg',
			'demo' => 'https://exclusivedivi.com/module/drop-cap/',
		),	
		
		array(
			'title' => 'Business Hour',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_business_hour',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_business_hour.svg',
			'demo' => 'https://exclusivedivi.com/module/business-hours/',
		),	

/*
		array(
			'title' => 'Charts',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_charts',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_fancy_text.svg',
			'demo' => 'https://exclusivedivi.com/module/glitch-text/',
		),	


		array(
			'title' => 'Mouse Parallax',
			'type' => 'soon',
			'badge' => 'Soon',
			'slug' => 'edm_mouse_parallax',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_mouse_parallax.svg',
			'demo' => 'https://exclusivedivi.com/',
		),

		array(
			'title' => 'Breadcrumbs',
			'type' => 'soon',
			'badge' => 'Soon',
			'slug' => 'edm_breadcrumbs',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/edm_breadcrumbs.svg',
			'demo' => 'https://exclusivedivi.com/',
		),

*/

		/*



		array(
			'title' => 'Expanding CTA',
			'type' => 'free',
			'badge' => '',
			'slug' => 'edm_expanding_cta',
			'icon' => EDM_PLUGIN_URL.'/admin/icons/default.png',
			'demo' => 'https://exclusivedivi.com/',
		),
		*/

	);
	return $modules;
}

/*
Check if module activated
*/
function edm_check_if_module_activated($moduleslug){

	$edm_module_savedop = get_option('edm_settings');
	if(!empty($edm_module_savedop)){
		if(array_key_exists($moduleslug,$edm_module_savedop) && $edm_module_savedop[$moduleslug] == '1' ){
			return true;
		}
		else{
			return false;
		}
	}
	else{
		return true;
	}
}
if (!function_exists('edm_is_vb')) {
    function edm_is_vb()
    {
        return function_exists('et_core_is_fb_enabled') && et_core_is_fb_enabled();
    }
}

/* Check if checkbox is checked from DB */
function edm_admin_check_if_box_checked($optionname, $value = "", $bypass = false){
	if(empty($value)){
		$edm_module_savedop = get_option('edm_settings');
		if($bypass == true){
			if(array_key_exists($optionname,$edm_module_savedop)){
				return true;
			}
			else {
				return false;
			}			
		}
		else{
			if(!empty($edm_module_savedop)){
				if(array_key_exists($optionname,$edm_module_savedop) && $edm_module_savedop[$optionname] == '1'){
					return true;
				}
				else {
					return false;
				}
			}	
		}
	}
	else{
		$edm_module_savedop = get_option('edm_settings');
		if(!empty($edm_module_savedop)){
			if(array_key_exists($optionname,$edm_module_savedop)){
				if($edm_module_savedop[$optionname] == $value){
					return true;
				}
				else{
					return false;
				}
			}
		}
	}
}