<?php
declare (strict_types = 1);
namespace WebSharks\WpSharks\AlertBoxShortcode\Classes;

/**
* Shortcode handler.
*
* @since 160526 Naming standards.
*/

class AlertBox
{
    public function shortcode($attr, $content, $apply_shortcode)
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
                'margin_icon'     => '.2em .5em .2em 0',
                'type'             => '',
                'style'             => '',
            ],
            $attr,
            $apply_shortcode
        );

        $class  = 'dashicons dashicons-warning';

        switch ($attr['type']) {
            case 'error':
                $attr['background_color'] = '#d34b44';
                $attr['border_color']     = '#bd433d';
                $attr['link_color']       = '#ffc5c2';
                $attr['link_hover_color'] = '#f1f1f1';
                $class                    = 'dashicons dashicons-warning';
                break;

            case 'warning':
                $attr['background_color'] = '#efd155';
                $attr['border_color']     = '#edcb3e';
                $attr['link_color']       = '#fbeeb7';
                $attr['link_hover_color'] = '#f1f1f1';
                $class                    = 'dashicons dashicons-flag';
                break;

            case 'info':
            default: // Also default case.
                $attr['background_color'] = '#2ecc71';
                $attr['border_color']     = '#29b765';
                $attr['link_color']       = '#c0efd4';
                $attr['link_hover_color'] = '#f1f1f1';
                $class                    = 'dashicons dashicons-info';
                break;
        }

        $id = 'alert-box-'.$counter;

        $icon_css   = 'style="margin:'.$attr['margin_icon'].'"';

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

        $apply_shortcode = $css; // Styles from above.

        $apply_shortcode .= '<p id="'.esc_attr($id).'" '. $style .'>';
        $apply_shortcode .= '<span class="'.esc_attr($class).'" '.$icon_css.'></span>';
        $apply_shortcode .=    trim($content);
        $apply_shortcode .= '</p>';

        return $apply_shortcode;

    }
}
