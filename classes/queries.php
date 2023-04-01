<?php
function nhtoolbox_additional_query_vars($vars) {
    $vars[] .= 'issues-addressed';
    $vars[] .= 'show-case-studies';
    return $vars;
  }
add_filter( 'query_vars', 'nhtoolbox_additional_query_vars' );