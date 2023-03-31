<?php
function nhtoolbox_register_case_study() {
	$labels = array(
		'menu_name'          => __( 'Case Studies', 'nhtoolbox' ),
		'name_admin_bar'     => __( 'Case Study', 'nhtoolbox' ),
		'add_new'            => _x( 'Add Case Study', 'nhtoolbox' ),
		'add_new_item'       => __( 'Add new Case Study', 'nhtoolbox' ),
		'new_item'           => __( 'New Case Study', 'nhtoolbox' ),
		'edit_item'          => __( 'Edit Case Study', 'nhtoolbox' ),
		'view_item'          => __( 'View Case Study', 'nhtoolbox' ),
		'update_item'        => __( 'View Case Study', 'nhtoolbox' ),
		'all_items'          => __( 'All Case Studies', 'nhtoolbox' ),
		'search_items'       => __( 'Search Case Studies', 'nhtoolbox' ),
		'parent_item_colon'  => __( 'Parent Case Study', 'nhtoolbox' ),
		'not_found'          => __( 'No Case Studies found', 'nhtoolbox' ),
		'not_found_in_trash' => __( 'No Case Studies found in Trash', 'nhtoolbox' ),
		'name'               => _x( 'Case Studies', 'nhtoolbox' ),
		'singular_name'      => _x( 'Case Study', 'nhtoolbox' ),
	);
	$args = array(
		'labels' => $labels,
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-admin-site',
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
		),
		'rewrite' => true
	);

	register_post_type( 'case-study', $args );
}


add_action( 'init', 'nhtoolbox_register_case_study' );