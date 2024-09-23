<?php

if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}
/**
 * 
 * Inclduing Main Builder Class
 * 
 * */

require_once EDM_PLUGIN_PATH.'includes/modules/EDMCore/EDMCore.php';

if(edm_check_if_module_activated('edm_divider')){
	require_once EDM_PLUGIN_PATH.'includes/modules/Divider/Divider.php';
}
if(edm_check_if_module_activated('edm_gradient_text')){
	require_once EDM_PLUGIN_PATH.'includes/modules/GradientText/GradientText.php';
}
if(edm_check_if_module_activated('edm_typing_text')){
	require_once EDM_PLUGIN_PATH.'includes/modules/TypingText/TypingText.php';
}
if(edm_check_if_module_activated('edm_video_lightbox')){
	require_once EDM_PLUGIN_PATH.'includes/modules/VideoLightBox/VideoLightBox.php';
}
if(edm_check_if_module_activated('edm_scrolling_text')){
	require_once EDM_PLUGIN_PATH.'includes/modules/ScrollingText/ScrollingText.php';
}
if(edm_check_if_module_activated('edm_highlighted_text')){
	require_once EDM_PLUGIN_PATH.'includes/modules/HighlightedText/HighlightedText.php';
}
if(edm_check_if_module_activated('edm_before_after_image_slider')){
	require_once EDM_PLUGIN_PATH.'includes/modules/BeforeAfterImageSlider/BeforeAfterImageSlider.php';
}
if(edm_check_if_module_activated('edm_mouse_parallax')){
	require_once EDM_PLUGIN_PATH.'includes/modules/MouseParallax/MouseParallax.php';
}
if(edm_check_if_module_activated('edm_expanding_cta')){
	require_once EDM_PLUGIN_PATH.'includes/modules/ExpandingCTA/ExpandingCTA.php';
}
if(edm_check_if_module_activated('edm_multi_button')){
	require_once EDM_PLUGIN_PATH.'includes/modules/MultiButtonItem/MultiButtonItem.php';
	require_once EDM_PLUGIN_PATH.'includes/modules/MultiButton/MultiButton.php';
}
if(edm_check_if_module_activated('edm_gallery')){
	require_once EDM_PLUGIN_PATH.'includes/modules/Gallery/Gallery.php';
}
if(edm_check_if_module_activated('edm_progress_bar')){
	require_once EDM_PLUGIN_PATH.'includes/modules/ProgressBar/ProgressBar.php';
}
if(edm_check_if_module_activated('edm_glitch_text')){
	require_once EDM_PLUGIN_PATH.'includes/modules/GlitchText/GlitchText.php';
}
if(edm_check_if_module_activated('edm_twitter_feed')){
	require_once EDM_PLUGIN_PATH.'includes/modules/TwitterFeed/TwitterFeed.php';
}
if(edm_check_if_module_activated('edm_fancy_text')){
	require_once EDM_PLUGIN_PATH.'includes/modules/FancyText/FancyText.php';
}
if(edm_check_if_module_activated('edm_drop_cap')){
	require_once EDM_PLUGIN_PATH.'includes/modules/DropCap/DropCap.php';
}
if(edm_check_if_module_activated('edm_business_hour')){
	require_once EDM_PLUGIN_PATH.'includes/modules/BusinessHour/BusinessHour.php';
}
if(edm_check_if_module_activated('edm_business_hour')){
	require_once EDM_PLUGIN_PATH.'includes/modules/BusinessHourChild/BusinessHourChild.php';
}