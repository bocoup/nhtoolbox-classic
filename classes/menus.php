<?php

function nhtoolbox_menus(){
    $locations = array(
        'primary' => "Main Navigation"
    );

    register_nav_menus($locations);
}

add_action('init', 'nhtoolbox_menus');

