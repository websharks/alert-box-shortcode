<?php
/*
Version: 160526
Text Domain: alert-box-shortcode
Plugin Name: Alert Box Shortcode
Description: Provides an `[alert_box]` shortcode.
Plugin URI: https://wordpress.org/plugins/alert-box-shortcode/
Author: WP Sharks
Author URI: https://wpsharks.com
*/

declare (strict_types = 1);
namespace WebSharks\WpSharks\AlertBoxShortcode;

use WebSharks\WpSharks\AlertBoxShortcode\Classes;

require_once __DIR__.'/src/includes/classes/AlertBox.php';

$GLOBALS[__NAMESPACE__] = new Classes\AlertBox();

add_action('plugins_loaded', function () {
     add_shortcode('alert_box', [$GLOBALS[__NAMESPACE__], 'shortcode']);
 });
