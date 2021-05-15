<?php
/**
 * Custom posts for use with this theme
 *
 *
 */

// Register Story Post Type
function story_post_type() {
	// Register News Custom Post Type
	$labels = array(
		'name'                  => _x( 'News', 'news', 'text_domain' ),
		'singular_name'         => _x( 'News', 'news', 'text_domain' ),
		'menu_name'             => __( 'News', 'text_domain' ),
		'name_admin_bar'        => __( 'News', 'text_domain' ),
		'archives'              => __( 'News Archives', 'text_domain' ),
		'attributes'            => __( 'News Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent News:', 'text_domain' ),
		'all_items'             => __( 'All News', 'text_domain' ),
		'add_new_item'          => __( 'Add News', 'text_domain' ),
		'add_new'               => __( 'Add News', 'text_domain' ),
		'new_item'              => __( 'New News', 'text_domain' ),
		'edit_item'             => __( 'Edit News', 'text_domain' ),
		'update_item'           => __( 'Update News', 'text_domain' ),
		'view_item'             => __( 'View News', 'text_domain' ),
		'view_items'            => __( 'View News', 'text_domain' ),
		'search_items'          => __( 'Search News', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into News', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this News', 'text_domain' ),
		'items_list'            => __( 'News list', 'text_domain' ),
		'items_list_navigation' => __( 'News list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter News list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'News', 'text_domain' ),
		'description'           => __( 'News post type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'custom-fields', 'page-attributes', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon' 						=> 'dashicons-text-page'
	);
	register_post_type( 'News', $args );

	// Register Team custom post type
	$labels = array(
		'name'                  => _x( 'Team', 'team', 'text_domain' ),
		'singular_name'         => _x( 'Team', 'team', 'text_domain' ),
		'menu_name'             => __( 'Team', 'text_domain' ),
		'name_admin_bar'        => __( 'Team', 'text_domain' ),
		'archives'              => __( 'Team Archives', 'text_domain' ),
		'attributes'            => __( 'Team Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Team:', 'text_domain' ),
		'all_items'             => __( 'All Team', 'text_domain' ),
		'add_new_item'          => __( 'Add Team', 'text_domain' ),
		'add_new'               => __( 'Add Team', 'text_domain' ),
		'new_item'              => __( 'New Team', 'text_domain' ),
		'edit_item'             => __( 'Edit Team', 'text_domain' ),
		'update_item'           => __( 'Update Team', 'text_domain' ),
		'view_item'             => __( 'View Team', 'text_domain' ),
		'view_items'            => __( 'View Team', 'text_domain' ),
		'search_items'          => __( 'Search Team', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Team', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team', 'text_domain' ),
		'items_list'            => __( 'Team list', 'text_domain' ),
		'items_list_navigation' => __( 'Team list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Team list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Team', 'text_domain' ),
		'description'           => __( 'Team post type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'custom-fields', 'page-attributes', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'							=> 'dashicons-groups'
	);
	register_post_type( 'Team', $args );
}
add_action( 'init', 'story_post_type', 0 );
