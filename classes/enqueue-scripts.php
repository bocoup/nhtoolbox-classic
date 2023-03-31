<?php

function nhtoolbox_register_scripts() {
    wp_enqueue_script("nhtoolbox-js", get_template_directory_uri() . "/assets/js/main.js", array(), "1.0", true);
}

add_action("wp_enqueue_scripts", 'nhtoolbox_register_scripts');