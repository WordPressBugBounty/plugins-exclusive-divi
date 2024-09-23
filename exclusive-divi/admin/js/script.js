jQuery(document).ready(function($) {
	if ( $('.nav-tab-wrapper').length > 0 ) {
		options_framework_tabs();
	}

	function options_framework_tabs() {

		var $group = $('.group'),
			$navtabs = $('.nav-tab-wrapper a'),
			active_tab = '';

		// Hides all the .group sections to start
		$group.hide();

		$('.group:first').fadeIn();
		$('.nav-tab-wrapper a:first').addClass('nav-tab-active');

		// Bind tabs clicks
		$navtabs.click(function(e) {

			e.preventDefault();

			// Remove active class from all tabs
			$navtabs.removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			var selected = $(this).attr('href');

			$group.hide();
			$(selected).fadeIn();

		});
	}

	function edm_compile_check_boxes(){
		jQuery(".edm-settings-item").each(function(){
			if(jQuery(this).attr("depends")){
				if(jQuery(this).attr("depends").length){
					var dependid = jQuery(this).attr("depends");
					jQuery(".edm-settings-item").each(function(){
						 if(jQuery(this).data("id") == dependid){
							 if(jQuery(this).find("input:checkbox:checked").length > 0){
								 jQuery('.edm-settings-item[depends="'+dependid+'"]').slideDown();
							 }
							 else{
								
								 jQuery('.edm-settings-item[depends="'+dependid+'"]').slideUp();
							 }
						 }
					});
				}
			} 
		 });
	}
	$(".edm-settings-item .checkbox").change(function(){
		edm_compile_check_boxes();
	});
	edm_compile_check_boxes();

});