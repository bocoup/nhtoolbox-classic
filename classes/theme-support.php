<?php

function nhtoolbox_theme_support() {
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'nhtoolbox_theme_support');