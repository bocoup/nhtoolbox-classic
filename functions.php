<?php
require_once get_template_directory() . '/classes/custom-post-types/custom-post-types.php';
require_once get_template_directory() . '/classes/enqueue-styles.php';
require_once get_template_directory() . '/classes/enqueue-scripts.php';
require_once get_template_directory() . '/classes/theme-support.php';
require_once get_template_directory() . '/classes/menus.php';
require_once get_template_directory() . '/classes/custom-logic.php';
require_once get_template_directory() . '/classes/custom-meta-fields/custom-meta-fields.php';

function nhtoolbox_additional_query_vars($vars) {
    $vars[] .= 'issues-addressed';
    $vars[] .= 'show-case-studies';
    return $vars;
  }
  add_filter( 'query_vars', 'nhtoolbox_additional_query_vars' );