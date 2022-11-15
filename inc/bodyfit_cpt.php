<?php
// RETURN IF CALLED DIRECTLY BY PATH
if (!defined('WPINC')) {
    die;
}

function cptui_register_my_cpts() {

	/**
	 * Post Type: Schedules.
	 */

	$labels = [
		"name" => esc_html__( "Schedules", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Schedule", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "Schedules", "custom-post-type-ui" ),
		"all_items" => esc_html__( "All schedules", "custom-post-type-ui" ),
		"add_new" => esc_html__( "Add new schedule", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "Add new schedule", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "Edit schedule", "custom-post-type-ui" ),
		"new_item" => esc_html__( "New schedule", "custom-post-type-ui" ),
		"view_item" => esc_html__( "View schedule", "custom-post-type-ui" ),
		"view_items" => esc_html__( "View Schedules", "custom-post-type-ui" ),
		"search_items" => esc_html__( "Search schedule", "custom-post-type-ui" ),
		"not_found" => esc_html__( "Schedule not found", "custom-post-type-ui" ),
		"parent" => esc_html__( "Parent schedule", "custom-post-type-ui" ),
		"parent_item_colon" => esc_html__( "Parent schedule", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Schedules", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "weekly-schedule", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "weekly-schedule", $args );

	/**
	 * Post Type: Classes.
	 */

	$labels = [
		"name" => esc_html__( "Classes", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Class", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "Class", "custom-post-type-ui" ),
		"all_items" => esc_html__( "All Classes", "custom-post-type-ui" ),
		"add_new" => esc_html__( "Add new class", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Classes", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "Types of classes provided by company",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "gym-class", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "gym-class", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );