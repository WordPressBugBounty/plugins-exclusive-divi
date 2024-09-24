<?php
/*
Plugin Name: Exclusive Divi
Plugin URI:  http://www.exclusivedivi.com/
Description: Exclusive Divi Modules 
Version:     1.4
Author:      WP Mario
Author URI:  http://www.exclusivedivi.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: edm-exclusive-divi
Domain Path: /languages

Exclusive Divi is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Exclusive Divi is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Exclusive Divi. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'edm_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
define('EDM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('EDM_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

require_once plugin_dir_path( __FILE__ ).'admin/controller.php';

require_once plugin_dir_path( __FILE__ ).'admin/edm-admin.php';

function edm_register_plugin_activate() {

     do_action( 'edm_register_plugin_activate' );
}
register_activation_hook( __FILE__, 'edm_register_plugin_activate' );


if ( ! function_exists( 'ed_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ed_fs() {
        global $ed_fs;

        if ( ! isset( $ed_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/integrations/freemius/start.php';

            $ed_fs = fs_dynamic_init( array(
                'id'                  => '16433',
                'slug'                => 'exclusive-divi',
                'type'                => 'plugin',
                'public_key'          => 'pk_2767d8ea3a61100ef7de81a370926',
                'is_premium'          => true,
                'premium_suffix'      => 'Pro',
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'menu'                => array(
                    'slug'           => 'exclusive-divi',
                ),
            ) );
        }

        return $ed_fs;
    }

    // Init Freemius.
    ed_fs();
    // Signal that SDK was initiated.
    do_action( 'ed_fs_loaded' );
}

function edm_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/ExclusiveDivi.php';
    require_once plugin_dir_path( __FILE__ ) . 'public/script-handler.php';
    if(edm_admin_check_if_box_checked('preloader', "", true)  === true) {
        require_once plugin_dir_path( __FILE__ ) . 'public/preloader.php';
    }
}
add_action( 'divi_extensions_init', 'edm_initialize_extension' );
endif;
