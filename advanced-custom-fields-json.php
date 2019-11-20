<?php
/**
 * Plugin Name: Brickson ACF JSON output
 * Plugin URI: https://brickson.nl
 * Description: A plugin that will output the advanced custom fields to the json.
 * Version: 1.0.0
 * Author: Brickson
 * Author URI: https://brickson.nl
 * License: MIT
 */

/**
 * This filter appends the output for advanced custom fields to the post api output.
 * This only happens if the ACF plugin is enabled.
 */
add_filter('rest_prepare_post', function ($response) {
	if(is_plugin_active('advanced-custom-fields')) {
		$response->data['acf'] = get_fields( $response->data['id'] );
	}

	return $response;
});