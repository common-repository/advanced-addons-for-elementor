<?php
namespace Elementor;

function aae_for_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'aae_elementor',
        [
            'title'  => esc_html__('Advanced Addons', 'aa_elementor'),
            'icon'   => 'eicon-font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\aae_for_elementor_init');


if (!function_exists('aae_for_elementor_array_get')) {
    function aae_for_elementor_array_get($array, $key, $default = null)
    {
        if (!is_array($array)) return $default;
        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}

add_filter( 'widget_text', 'do_shortcode' );
