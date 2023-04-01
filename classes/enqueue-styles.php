<?php
function nhtoolbox_register_styles() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style("nhtoolbox-fontface", get_template_directory_uri() . "/assets/fonts/fontface.css", array("nhtoolbox-bulma"), $version, "all");
    wp_enqueue_style("nhtoolbox-styles", get_template_directory_uri() . "/style.css", array("nhtoolbox-bulma"), $version, "all");
    wp_enqueue_style("nhtoolbox-bulma", "https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css", array(), "0.9.4", "all");
    wp_enqueue_style("nhtoolbox-fontawesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css", array(), "5.13.0", "all");
}

add_action("wp_enqueue_scripts", 'nhtoolbox_register_styles');