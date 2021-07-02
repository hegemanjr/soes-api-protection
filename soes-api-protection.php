<?php

/**
 * Plugin Name: [SOES] - REST API Protection
 * Plugin URI: https://608.software
 * Description: Block REST API for users that are not logged in
 * Author: Jeff Hegeman
 * Version: 1.0.6
 * Author URI: https://608.software
 * Text Domain: soes-api-protection
 * Domain Path: /languages
 * License: GPL-2.0+
 */

class SOES_API_Protection {

	function __construct() {
		add_action( 'init', array($this, 'action_init' ));
		$this->load_resources();
	}

	public function action_init() {
		add_filter( 'rest_endpoints', array($this, 'filter_rest_endpoints' ));
	}

	function filter_rest_endpoints( $endpoints ){
		if ( ! is_user_logged_in() ) {
			if ( isset( $endpoints['/wp/v2/users'] ) ) {
				unset( $endpoints['/wp/v2/users'] );
			}
			if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
				unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
			}
		}
		return $endpoints;
	}

	function load_resources(){
		require plugin_dir_path(__FILE__) . "resources/plugin-update-checker-config.php";
	}

}
new SOES_API_Protection();
