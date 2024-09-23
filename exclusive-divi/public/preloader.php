<?php
/*
Preloader
*/
function edm_preloader_main(){
	if(!edm_is_vb()){
		if(edm_admin_check_if_box_checked('preloader', "", true) == true) {
		?>
		<div class="edm_preloader_main" id="edm_preloader">
			<div class="edm_preloader_inner">
				<?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_ripple') == 'edm_select_preloader_ripple') { ?>
				<div class="edm-ripple">
					<div></div>
					<div></div>
				</div>		
				<?php } ?>

				<?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_ellipsis') == 'edm_select_preloader_ellipsis') { ?>
					<div class="edm-ellipsis">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
				<?php } ?>

				<?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_facebook') == 'edm_select_preloader_facebook') { ?>
					<div class="edm-facebook">
						<div></div>
						<div></div>
						<div></div>
					</div>
				<?php } ?>

				<?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_ring') == 'edm_select_preloader_ring') { ?>
					<div class="edm-ring">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
				<?php } ?>

				<?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_grid') == 'edm_select_preloader_grid') { ?>
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
				<?php } ?>

				<?php if(edm_admin_check_if_box_checked('preloader-style', 'edm_select_preloader_default') == 'edm_select_preloader_default') { ?>
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
				<?php } ?>

			</div>
		</div>
		<?php
		}
	}
}
add_action('wp_footer','edm_preloader_main');