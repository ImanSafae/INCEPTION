<?php
/**
 * Dynamic css
 *
 * @since Puskar 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('puskar_dynamic_css')) :

    function puskar_dynamic_css()
    {
        global $puskar_theme_options;

        /* Color Options Options */
        $puskar_logo_width              = absint($puskar_theme_options['puskar_logo_width_option']);
        $puskar_header_overlay  = esc_attr($puskar_theme_options['puskar_slider_overlay_color']);
        $puskar_header_transparent  = esc_attr($puskar_theme_options['puskar_slider_overlay_transparent']);
        $puskar_header_min_height              = absint($puskar_theme_options['puskar_header_image_height']);
        $puskar_slider_text_color = esc_attr($puskar_theme_options['puskar_slider_text_color']);
        $custom_css = '';

        //Logo Width
        if (!empty($puskar_logo_width)) {
            $custom_css .= "
            .logo-area{ 
                max-width : ". $puskar_logo_width."px; 
            }";
        }

        //Header Overlay
        if (!empty($puskar_header_overlay)) {
            $custom_css .= "
            .header-bg:before { 
                background-color : ". $puskar_header_overlay."; 
            }";
        }

        //Header Tranparent
        if (!empty($puskar_header_transparent)) {
            $custom_css .= "
            .header-bg:before { 
                opacity : ". $puskar_header_transparent."; 
            }";
        }
        //Slider Text Color
        if (!empty($puskar_slider_text_color)) {
            $custom_css .= "
            .ts-slider .slick-arrow,
            .ts-slider * { 
                color : ". $puskar_slider_text_color."; 
            }";
        }
        //Header Min Height
        if (!empty($puskar_header_min_height)) {
            $custom_css .= "
            .header-image{ 
                min-height : ". $puskar_header_min_height."px; 
            }";
        }

        wp_add_inline_style('puskar-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'puskar_dynamic_css', 99);