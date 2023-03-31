<?php

//REMOVE MAIN EDITOR
function my_remove_editor_from_post_type() {
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'page', 'editor' );
}
add_action('init', 'my_remove_editor_from_post_type');

//REMOVE COMMENTS

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

//CHANGE POST TO STRATEGY

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to News
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'Strategy';
        $labels->singular_name = 'Strategies';
        $labels->add_new = 'Add Strategy';
        $labels->add_new_item = 'Add Strategy';
        $labels->edit_item = 'Edit Strategy';
        $labels->new_item = 'Strategies';
        $labels->view_item = 'View Strategy';
        $labels->search_items = 'Search Strategies';
        $labels->not_found = 'No Strategies found';
        $labels->not_found_in_trash = 'No Strategies found in Trash';
        $labels->all_items = 'All Strategies';
        $labels->menu_name = 'Strategies';
        $labels->name_admin_bar = 'Strategies';
}

//REMOVE BLOCK EDITOR

add_filter('use_block_editor_for_post', '__return_false');