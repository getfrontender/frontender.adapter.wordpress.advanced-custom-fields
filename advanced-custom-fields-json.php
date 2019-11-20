<?php
/**
 * Plugin Name: Advanced Custom Fields JSON
 * Plugin URI: https://brickson.nl
 * Description: A plugin that will append the advanced custom fields to the json rest output.
 * Version: 1.0.0
 * Author: Brickson
 * Author URI: https://brickson.nl
 * License: MIT
 */

/**
 * This filter appends the output for advanced custom fields to the post api output.
 * This only happens if the ACF plugin is enabled.
 */
add_filter( 'rest_prepare_post', function ( $response ) {
	$isEnabled = ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'advanced-custom-fields' ) ) || function_exists( 'get_fields' );

	if ( $isEnabled ) {
		$response->data['acf'] = get_fields( $response->data['id'] );
	}

	return $response;
} );