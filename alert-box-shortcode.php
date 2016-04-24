<?php
/*
Version: 160421
Text Domain: alert-box-shortcode
Plugin Name: Alert Box Shortcode
Description: Provides an `[alert_box]` shortcode.
Plugin URI: https://wordpress.org/plugins/alert-box-shortcode/
Author: WP Sharks
Author URI: https://wpsharks.com
*/

class AlertBox
{
    public static function alert_box($attr, $content, $shortcode)
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
                'border_style'     => 'solid',
                'padding'          => '1em',
                'type'             => '',
            ],
            $attr,
            $shortcode
        );

        switch ($attr['type']) {
            case 'error':
                $attr['background_color'] = '#ffe6e6';
                $attr['border_color']     = '#ff8080';
                $attr['link_color']       = '#b30000';
                $attr['link_hover_color'] = '#4d0000';
                break;

            case 'warning':
                $attr['background_color'] = '#FFF89E';
                $attr['border_color']     = '#BBB66E';
                $attr['link_color']       = '#5D6EB3';
                $attr['link_hover_color'] = '#4d0000';
                break;

            case 'info':
                $attr['background_color'] = '#DAFFDA';
                $attr['border_color']     = '#AAC5AA';
                $attr['link_color']       = '#5D6EB3';
                $attr['link_hover_color'] = '#4d0000';
                break;

                casedefault:
                break;
        }
        $id = 'alert-box-'.$counter;

        $css = '
        <style type="text/css">
        #'.$id.' {
            border-width: '.$attr['border_width'].';
            border-color: '.$attr['border_color'].';
            border-style: '.$attr['border_style'].';
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

        $counter++;
    }
}

add_action('plugins_loaded', function () {
    add_shortcode('alert_box', array('AlertBox', 'alert_box'));
});
