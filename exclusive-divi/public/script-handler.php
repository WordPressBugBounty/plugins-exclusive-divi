<?php
/* Enqueing Scripts */
function edm_scripts_method() {
    wp_register_script( 'edm-typed', EDM_PLUGIN_URL. 'public/js/typed.js', array( 'jquery' ) );
    
    wp_register_script( 'edm-scrolling', EDM_PLUGIN_URL . 'public/js/jquery.marquee.min.js', array( 'jquery' ), '1.3.0', false );    

    wp_register_script( 'edm-marker', EDM_PLUGIN_URL . 'public/js/jquery-marker.js', array( 'jquery' ), '1.3.0', false );
    
    wp_register_script( 'edm-before-after-library-event', EDM_PLUGIN_URL.'public/js/jquery.event.move.js', array( 'jquery' ), '1.3.0', false );
    
    wp_register_script( 'edm-before-after-library', EDM_PLUGIN_URL.'public/js/jquery.twentytwenty.js', array( 'jquery' ), '1.3.0', false );
        
    wp_register_script( 'magnific-popup', EDM_PLUGIN_URL.'public/js/magnific-popup.js', array( 'jquery' ), '1.3.0', false );

    wp_register_style( 'magnific-popup', EDM_PLUGIN_URL.'public/css/magnific-popup.min.css', array(), '1.3.0', 'all' );

    wp_register_script( 'slick-slider', EDM_PLUGIN_URL.'public/js/slick.min.js', array('jquery'), '1.3.0', 'all' );

    wp_register_style( 'slick-style', EDM_PLUGIN_URL.'public/css/slick.css', array(), '1.3.0', 'all' );

    wp_register_script( 'masonry', EDM_PLUGIN_URL.'public/js/masonry.pkgd.min.js', array('jquery'), '1.3.0', 'all' );

    wp_register_script( 'imagesloaded', EDM_PLUGIN_URL.'public/js/imagesloaded.pkgd.min.js', array('jquery'), '1.3.0', 'all' );

    wp_register_style( 'animatecss', EDM_PLUGIN_URL.'public/css/animate.min.css', array(), '1.3.0', 'all' );


    /* Mobile Collapsble Menu */ 

    if(edm_admin_check_if_box_checked('mobile-collapsable', "", true) === true) {
        wp_enqueue_style( 'edm-collapsable-style', EDM_PLUGIN_URL.'public/css/edm-collapsable-menu.css', array(), '1.3.0', 'all' );
        wp_enqueue_script( 'edm-collapsable-script', EDM_PLUGIN_URL.'public/js/edm-collapsable-menu.js', array(), '1.3.0', 'all' );

    }

    if(edm_admin_check_if_box_checked('mobile-remove-parent-link', "", true) === true) {
        wp_enqueue_style( 'edm-collapsable-style-remove-parent', EDM_PLUGIN_URL.'public/css/edm-collapsable-remove-parent.css', array(), '1.3.0', 'all' );
     
    }

    /* AJAXIFY  */

    if(edm_admin_check_if_box_checked('ajaxify', "", true) === true) {
        wp_enqueue_script( 'edm-ajaxify', EDM_PLUGIN_URL.'public/js/ajaxify.min.js', array(), '1.3.0', 'all' );
        wp_enqueue_script( 'edm-ajaxify-custom', EDM_PLUGIN_URL.'public/js/ajaxify-custom.js', array(), '1.3.0', 'all' );
    }

    /* Preloader */
    if(edm_admin_check_if_box_checked('preloader', "", true) === true) {
        wp_enqueue_style( 'edm-preloader', EDM_PLUGIN_URL.'public/css/preloader.css', array(), '1.3.0', 'all' );
        wp_enqueue_script( 'edm-preloader-script', EDM_PLUGIN_URL.'public/js/preloader.js', array('jquery'), '1.3.0', 'all' );
    }

    wp_enqueue_style( 'edm-progress-bar', EDM_PLUGIN_URL.'public/css/misc.css', array(), '1.3.0', 'all' );

}
add_action( 'wp_enqueue_scripts', 'edm_scripts_method' );
/*
* Enable SVG Support
*/
function edm_svgs_upload_check( $checked, $file, $filename, $mimes ) {
    if(edm_admin_check_if_box_checked('svg-upload', "", true) === true) {
        if ( ! $checked['type'] ) {

            $check_filetype     = wp_check_filetype( $filename, $mimes );
            $ext                = $check_filetype['ext'];
            $type               = $check_filetype['type'];
            $proper_filename    = $filename;

            if ( $type && 0 === strpos( $type, 'image/' ) && $ext !== 'svg' ) {
                $ext = $type = false;
            }

            $checked = compact( 'ext','type','proper_filename' );
        }
    }
    return $checked;
}
add_filter( 'wp_check_filetype_and_ext', 'edm_svgs_upload_check', 10, 4 );

function edm_enable_mime_types( $mimes ){
    if(edm_admin_check_if_box_checked('svg-upload', "", true) === true) {
      $mimes['svg'] = 'image/svg+xml';
      $mimes['svgz'] = 'image/svg+xml';
    }
    if(edm_admin_check_if_box_checked('font-files', "", true) === true) {
      $mimes['ttf'] = 'application/x-font-ttf';
      $mimes['otf'] = 'application/font-sfnt';
      $mimes['woff'] = 'application/x-font-woff';
    }
    return $mimes;
}
add_filter( 'upload_mimes', 'edm_enable_mime_types' );