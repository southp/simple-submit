<?php
/**
 * @package TEST_WP_API_Comments
 * @version 0.1
 */
/*
Plugin Name: Test WP API Comment Submission
Plugin URI: https://github.com/WP-API/WP-API/issues
Description: Just a test code.
Author: James Tien
Version: 0.1
Author URI: http://en.gravatar.com/southp
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( is_plugin_inactive( 'rest-api/plugin.php' ) ) {
	return;
}

$rest_api_major_ver = intval( substr( REST_API_VERSION, 0, 1) );

if( $rest_api_major_ver < 2 ) {
	return;
}

class Test_Comment {
	public static function replace_comment_template() {
		return __DIR__ . '/comments.php';
	}
}

add_filter('comments_template' , array( 'Test_Comment', 'replace_comment_template' ) );

?>
