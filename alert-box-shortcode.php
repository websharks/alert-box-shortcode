<?php
/*
Version: 160423
Text Domain: alert-box-shortcode
Plugin Name: Alert Box Shortcode
Description: Provides an `[alertBox]` shortcode.
Plugin URI: https://wordpress.org/plugins/alert-box-shortcode/
Author: WP Sharks
Author URI: https://wpsharks.com
*/

class Alert_Box
{
    public static function alertBox($attr, $content, $shortcode)
    {
        static $counter = 0;

        $attr = shortcode_atts(
            [
                'border_width'     => '1px',
                'background_color' => '#d34b44',
                'border_color'     => '#bd433d',
                'text_color'       => '#f1f1f1',
                'link_color'       => '#ffc5c2',
                'link_hover_color' => '#f1f1f1',
                'border_radius'    => '.25em',
                'border_style'     => 'solid',
                'padding'          => '1em',
                'margin_bottom'    => '2em',
                'padding_icon'     => '.5em',
                'type'             => '',
                'style'             => '',
            ],
            $attr,
            $shortcode
        );

        $class  = 'fa fa-exclamation-circle';

        switch ($attr['type']) {
            case 'error':
                $attr['background_color'] = '#d34b44';
                $attr['border_color']     = '#bd433d';
                $attr['link_color']       = '#ffc5c2';
                $attr['link_hover_color'] = '#f1f1f1';
                $class                    = 'fa fa-exclamation-circle';
                break;

            case 'warning':
                $attr['background_color'] = '#efd155';
                $attr['border_color']     = '#edcb3e';
                $attr['link_color']       = '#fbeeb7';
                $attr['link_hover_color'] = '#f1f1f1';
                $class                    = 'fa fa-exclamation-triangle';
                break;

            case 'info':
                $attr['background_color'] = '#2ecc71';
                $attr['border_color']     = '#29b765';
                $attr['link_color']       = '#c0efd4';
                $attr['link_hover_color'] = '#f1f1f1';
                $class                    = 'fa fa-info-circle';
                break;

                casedefault:
                break;
        }
        $id = 'alert-box-'.$counter;

        $stylesheet = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">';

        $icon_css   = 'style="padding-right:'.$attr['padding_icon'].'"';

        $css = '
        <style type="text/css">
        #'.$id.' {
            border-width: '.$attr['border_width'].';
            border-color: '.$attr['border_color'].';
            border-style: '.$attr['border_style'].';
            background-color: '.$attr['background_color'].';
            border-radius: '.$attr['border_radius'].';
            padding: '.$attr['padding'].';
            margin-bottom: '.$attr['margin_bottom'].';
            color: '.$attr['text_color'].';
        }

        #'.$id.' a {
            color: '.$attr['link_color'].';
            border-color: '.$attr['border_color'].';
        }

        #'.$id.' a:hover {
            color: '.$attr['link_hover_color'].';
        }
        </style>
        ';

        $counter++;

        $style = "";

        if (isset($attr['style']))
        {
            $style = 'style="'.$attr['style'].'"';
        }

        $alertBox = $stylesheet; //Stylesheet from FontAwesome
        $alertBox .= $css; // Styles from above.

        $alertBox .= '<p id="'.esc_attr($id).'" '. $style .'>';
        $alertBox .= '<i class="'.esc_attr($class).'" '.$icon_css.'></i>';
        $alertBox .=    trim($content);
        $alertBox .= '</p>';

        return $alertBox;

    }
}

add_action('plugins_loaded', function () {
    add_shortcode('alertBox', array('Alert_Box', 'alertBox'));
});
