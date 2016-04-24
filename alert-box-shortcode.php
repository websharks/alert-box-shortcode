<?php
/*
Version: 160420
Text Domain: alert-box-shortcode
Plugin Name: Alert Box Shortcode
Description: Provides an `[alert_box]` shortcode.
Plugin URI: https://wordpress.org/plugins/alert-box-shortcode/
Author: WP Sharks
Author URI: https://wpsharks.com
*/

function alert_box($attr, $content, $shortcode)
{
    static $counter = 0;

    $attr = shortcode_atts(
        [
            'border_width'     => '1px',
            'background_color' => '#ffe6e6',
            'border_color'     => '#ff8080',
            'text_color'       => '#000000',
            'link_color'       => '#b30000',
            'link_hover_color' => '#4d0000',
            'border_radius'    => '.25em',
            'padding'          => '1em',
        ],
        $attr,
        $shortcode
    );

    $id = 'alert-box-'.$counter;

    $css = '
        <style type="text/css">
        #'.$id.' {
            border-width: '.$attr['border_width'].';
            background-color: '.$attr['background_color'].';
            border-radius: '.$attr['border_radius'].';
            padding: '.$attr['padding'].';
            color: '.$attr['text_color'].';
        }
        
        #'.$id.' a {
            color: '.$attr['link_color'].';
        }
        
        #'.$id.' a:hover {
            color: '.$attr['link_hover_color'].';
        }
        </style>
        ';

    echo $css; // Styles from above.

    echo '<div id="'.esc_attr($id).'">';
    echo trim($content);
    echo '</div>';
}

add_action('plugins_loaded', function () {
    add_shortcode('alert_box', 'alert_box');
});
