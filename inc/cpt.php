<?php
function cptui_register_my_cpts() {
	
	/**
	 * Post Type: Weekly Digests
	 */
	$labels = array(
		'name'                  => _x( 'Weekly Digests', 'Weekly Digest General Name', 'capsule' ),
		'singular_name'         => _x( 'Weekly Digest', 'Weekly Digest Singular Name', 'capsule' ),
		'menu_name'             => __( 'Weekly Digests', 'capsule' ),
		'name_admin_bar'        => __( 'Weekly Digest', 'capsule' ),
		'archives'              => __( 'Weekly Digest Archives', 'capsule' ),
		'attributes'            => __( 'Digest Attributes', 'capsule' ),
		'parent_item_colon'     => __( 'Parent Digest:', 'capsule' ),
		'all_items'             => __( 'All Digests', 'capsule' ),
		'add_new_item'          => __( 'Add New Weekly Digest', 'capsule' ),
		'add_new'               => __( 'Add New', 'capsule' ),
		'new_item'              => __( 'New Digest', 'capsule' ),
		'edit_item'             => __( 'Edit Digest', 'capsule' ),
		'update_item'           => __( 'Update Digest', 'capsule' ),
		'view_item'             => __( 'View Weekly Digest', 'capsule' ),
		'view_items'            => __( 'View Weekly Digests', 'capsule' ),
		'search_items'          => __( 'Search Weekly Digest', 'capsule' ),
		'not_found'             => __( 'Not found', 'capsule' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'capsule' ),
		'featured_image'        => __( 'Featured Image', 'capsule' ),
		'set_featured_image'    => __( 'Set featured image', 'capsule' ),
		'remove_featured_image' => __( 'Remove featured image', 'capsule' ),
		'use_featured_image'    => __( 'Use as featured image', 'capsule' ),
		'insert_into_item'      => __( 'Insert into Digest', 'capsule' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'capsule' ),
		'items_list'            => __( 'Weekly Digests list', 'capsule' ),
		'items_list_navigation' => __( 'Digests list navigation', 'capsule' ),
		'filter_items_list'     => __( 'Filter Digests list', 'capsule' ),
	);
	$args = array(
		'label'                 => __( 'Weekly Digest', 'capsule' ),
		'description'           => __( 'Weekly Digests', 'capsule' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'post-formats' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rest_base'             => 'weekly_digests',
	);
	register_post_type( 'weekly-digest', $args );

	$labels = array(
		'name'                       => _x( 'Topics', 'Topics General Name', 'capsule' ),
		'singular_name'              => _x( 'Topic', 'Topic Singular Name', 'capsule' ),
		'menu_name'                  => __( 'Topic', 'capsule' ),
		'all_items'                  => __( 'All Topics', 'capsule' ),
		'parent_item'                => __( 'Parent Topic', 'capsule' ),
		'parent_item_colon'          => __( 'Parent Topic:', 'capsule' ),
		'new_item_name'              => __( 'New Topic Name', 'capsule' ),
		'add_new_item'               => __( 'Add New Topic', 'capsule' ),
		'edit_item'                  => __( 'Edit Topic', 'capsule' ),
		'update_item'                => __( 'Update Topic', 'capsule' ),
		'view_item'                  => __( 'View Topic', 'capsule' ),
		'separate_items_with_commas' => __( 'Separate Topics with commas', 'capsule' ),
		'add_or_remove_items'        => __( 'Add or remove Topics', 'capsule' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'capsule' ),
		'popular_items'              => __( 'Popular Topics', 'capsule' ),
		'search_items'               => __( 'Search Topics', 'capsule' ),
		'not_found'                  => __( 'Not Found', 'capsule' ),
		'no_terms'                   => __( 'No Topics', 'capsule' ),
		'items_list'                 => __( 'Topics list', 'capsule' ),
		'items_list_navigation'      => __( 'Topics list navigation', 'capsule' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'weekly-digest-topic', array( 'weekly-digest' ), $args );

	$labels = array(
		'name'                       => _x( 'Types', 'Types General Name', 'capsule' ),
		'singular_name'              => _x( 'Type Singular Name', 'Type', 'capsule' ),
		'menu_name'                  => __( 'Type', 'capsule' ),
		'all_items'                  => __( 'All Types', 'capsule' ),
		'parent_item'                => __( 'Parent Type', 'capsule' ),
		'parent_item_colon'          => __( 'Parent Type:', 'capsule' ),
		'new_item_name'              => __( 'New Type Name', 'capsule' ),
		'add_new_item'               => __( 'Add New Type', 'capsule' ),
		'edit_item'                  => __( 'Edit Type', 'capsule' ),
		'update_item'                => __( 'Update Type', 'capsule' ),
		'view_item'                  => __( 'View Type', 'capsule' ),
		'separate_items_with_commas' => __( 'Separate Types with commas', 'capsule' ),
		'add_or_remove_items'        => __( 'Add or remove Types', 'capsule' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'capsule' ),
		'popular_items'              => __( 'Popular Types', 'capsule' ),
		'search_items'               => __( 'Search Types', 'capsule' ),
		'not_found'                  => __( 'Not Found', 'capsule' ),
		'no_terms'                   => __( 'No Types', 'capsule' ),
		'items_list'                 => __( 'Types list', 'capsule' ),
		'items_list_navigation'      => __( 'Types list navigation', 'capsule' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'weekly-digest-type', array( 'weekly-digest' ), $args );

	$labels = array(
		'name'                       => _x( 'Regions', 'Regions', 'capsule' ),
		'singular_name'              => _x( 'Region', 'Region', 'capsule' ),
		'menu_name'                  => __( 'Region', 'capsule' ),
		'all_items'                  => __( 'All Regions', 'capsule' ),
		'parent_item'                => __( 'Parent Region', 'capsule' ),
		'parent_item_colon'          => __( 'Parent Region:', 'capsule' ),
		'new_item_name'              => __( 'New Region Name', 'capsule' ),
		'add_new_item'               => __( 'Add New Region', 'capsule' ),
		'edit_item'                  => __( 'Edit Region', 'capsule' ),
		'update_item'                => __( 'Update Region', 'capsule' ),
		'view_item'                  => __( 'View Region', 'capsule' ),
		'separate_items_with_commas' => __( 'Separate Regions with commas', 'capsule' ),
		'add_or_remove_items'        => __( 'Add or remove Regions', 'capsule' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'capsule' ),
		'popular_items'              => __( 'Popular Regions', 'capsule' ),
		'search_items'               => __( 'Search Regions', 'capsule' ),
		'not_found'                  => __( 'Not Found', 'capsule' ),
		'no_terms'                   => __( 'No Regions', 'capsule' ),
		'items_list'                 => __( 'Regions list', 'capsule' ),
		'items_list_navigation'      => __( 'Regions list navigation', 'capsule' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'weekly-digest-region', array( 'weekly-digest' ), $args );

	/**
	 * Post Type: Fixed Price Packages.
	 */

	$labels = [
		"name" => esc_html__( "Fixed Price Packages", "capsule" ),
		"singular_name" => esc_html__( "Fixed Price Package", "capsule" ),
		"menu_name" => esc_html__( "Fixed Price Packages", "capsule" ),
		"add_new" => esc_html__( "Add New Fixed Price Package", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Fixed Price Packages", "capsule" ),
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
		"rewrite" => [ "slug" => "fixed-price-packages", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-analytics",
		"supports" => [ "title", "thumbnail", "excerpt", "custom-fields", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "fixed-price-packages", $args );

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => esc_html__( "Testimonials", "capsule" ),
		"singular_name" => esc_html__( "Testimonial", "capsule" ),
		"menu_name" => esc_html__( "Testimonials", "capsule" ),
		"add_new" => esc_html__( "Add New Testimonial", "capsule" ),
		"add_new_item" => esc_html__( "Add New Testimonial", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Testimonials", "capsule" ),
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
		"rewrite" => [ "slug" => "testimonial", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-testimonial",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "testimonial", $args );

	/**
	 * Post Type: Team Members.
	 */

	$labels = [
		"name" => esc_html__( "Team Members", "capsule" ),
		"singular_name" => esc_html__( "Team Member", "capsule" ),
		"menu_name" => esc_html__( "Team Members", "capsule" ),
		"add_new" => esc_html__( "Add New Team Member", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Team Members", "capsule" ),
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
		"rewrite" => [ "slug" => "team-member", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-groups",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "team-member", $args );

	/**
	 * Post Type: Mail Templates.
	 */

	$labels = [
		"name" => esc_html__( "Mail Templates", "capsule" ),
		"singular_name" => esc_html__( "Mail Template", "capsule" ),
		"menu_name" => esc_html__( "Mail Templates", "capsule" ),
		"add_new" => esc_html__( "Add New Mail Template", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Mail Templates", "capsule" ),
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
		"rewrite" => [ "slug" => "mail-template", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-book-alt",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "mail-template", $args );

	/**
	 * Post Type: Checklists.
	 */

	$labels = [
		"name" => esc_html__( "Checklists", "capsule" ),
		"singular_name" => esc_html__( "Checklist", "capsule" ),
		"menu_name" => esc_html__( "Checklists", "capsule" ),
		"add_new" => esc_html__( "Add New Checklist", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Checklists", "capsule" ),
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
		"rewrite" => [ "slug" => "checklist", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-yes",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "checklist", $args );

	/**
	 * Post Type: Landing Pages.
	 */

	$labels = [
		"name" => esc_html__( "Landing Pages", "capsule" ),
		"singular_name" => esc_html__( "Landing Page", "capsule" ),
		"menu_name" => esc_html__( "Landing Pages", "capsule" ),
		"add_new_item" => esc_html__( "Add New Landing Page", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Landing Pages", "capsule" ),
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
		"rewrite" => [ "slug" => "landing-page", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-desktop",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "landing-page", $args );

	/**
	 * Post Type: Resources.
	 */

	$labels = [
		"name" => esc_html__( "Resources", "capsule" ),
		"singular_name" => esc_html__( "Resource", "capsule" ),
		"menu_name" => esc_html__( "Resources", "capsule" ),
		"all_items" => esc_html__( "All Resources", "capsule" ),
		"add_new" => esc_html__( "Add new", "capsule" ),
		"add_new_item" => esc_html__( "Add new Resource", "capsule" ),
		"edit_item" => esc_html__( "Edit Resource", "capsule" ),
		"new_item" => esc_html__( "New Resource", "capsule" ),
		"view_item" => esc_html__( "View Resource", "capsule" ),
		"view_items" => esc_html__( "View Resources", "capsule" ),
		"search_items" => esc_html__( "Search Resources", "capsule" ),
		"not_found" => esc_html__( "No Resources found", "capsule" ),
		"not_found_in_trash" => esc_html__( "No Resources found in trash", "capsule" ),
		"parent" => esc_html__( "Parent Resource:", "capsule" ),
		"featured_image" => esc_html__( "Featured image for this Resource", "capsule" ),
		"set_featured_image" => esc_html__( "Set featured image for this Resource", "capsule" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Resource", "capsule" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Resource", "capsule" ),
		"archives" => esc_html__( "Resource archives", "capsule" ),
		"insert_into_item" => esc_html__( "Insert into Resource", "capsule" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Resource", "capsule" ),
		"filter_items_list" => esc_html__( "Filter Resources list", "capsule" ),
		"items_list_navigation" => esc_html__( "Resources list navigation", "capsule" ),
		"items_list" => esc_html__( "Resources list", "capsule" ),
		"attributes" => esc_html__( "Resources attributes", "capsule" ),
		"name_admin_bar" => esc_html__( "Resource", "capsule" ),
		"item_published" => esc_html__( "Resource published", "capsule" ),
		"item_published_privately" => esc_html__( "Resource published privately.", "capsule" ),
		"item_reverted_to_draft" => esc_html__( "Resource reverted to draft.", "capsule" ),
		"item_scheduled" => esc_html__( "Resource scheduled", "capsule" ),
		"item_updated" => esc_html__( "Resource updated.", "capsule" ),
		"parent_item_colon" => esc_html__( "Parent Resource:", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Resources", "capsule" ),
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
		"rewrite" => [ "slug" => "resource", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-book",
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "content-topic", "content-type" ],
		"show_in_graphql" => false,
	];

	register_post_type( "resource", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_fixed_price_packages() {

	/**
	 * Post Type: Fixed Price Packages.
	 */

	$labels = [
		"name" => esc_html__( "Fixed Price Packages", "capsule" ),
		"singular_name" => esc_html__( "Fixed Price Package", "capsule" ),
		"menu_name" => esc_html__( "Fixed Price Packages", "capsule" ),
		"add_new" => esc_html__( "Add New Fixed Price Package", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Fixed Price Packages", "capsule" ),
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
		"rewrite" => [ "slug" => "fixed-price-packages", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-analytics",
		"supports" => [ "title", "thumbnail", "excerpt", "custom-fields", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "fixed-price-packages", $args );
}

add_action( 'init', 'cptui_register_my_cpts_fixed_price_packages' );

function cptui_register_my_cpts_testimonial() {

	/**
	 * Post Type: Testimonials.
	 */

	$labels = [
		"name" => esc_html__( "Testimonials", "capsule" ),
		"singular_name" => esc_html__( "Testimonial", "capsule" ),
		"menu_name" => esc_html__( "Testimonials", "capsule" ),
		"add_new" => esc_html__( "Add New Testimonial", "capsule" ),
		"add_new_item" => esc_html__( "Add New Testimonial", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Testimonials", "capsule" ),
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
		"rewrite" => [ "slug" => "testimonial", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-testimonial",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "testimonial", $args );
}

add_action( 'init', 'cptui_register_my_cpts_testimonial' );

function cptui_register_my_cpts_team_member() {

	/**
	 * Post Type: Team Members.
	 */

	$labels = [
		"name" => esc_html__( "Team Members", "capsule" ),
		"singular_name" => esc_html__( "Team Member", "capsule" ),
		"menu_name" => esc_html__( "Team Members", "capsule" ),
		"add_new" => esc_html__( "Add New Team Member", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Team Members", "capsule" ),
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
		"rewrite" => [ "slug" => "team-member", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-groups",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "team-member", $args );
}

add_action( 'init', 'cptui_register_my_cpts_team_member' );

function cptui_register_my_cpts_mail_template() {

	/**
	 * Post Type: Mail Templates.
	 */

	$labels = [
		"name" => esc_html__( "Mail Templates", "capsule" ),
		"singular_name" => esc_html__( "Mail Template", "capsule" ),
		"menu_name" => esc_html__( "Mail Templates", "capsule" ),
		"add_new" => esc_html__( "Add New Mail Template", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Mail Templates", "capsule" ),
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
		"rewrite" => [ "slug" => "mail-template", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-book-alt",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "mail-template", $args );
}

add_action( 'init', 'cptui_register_my_cpts_mail_template' );

function cptui_register_my_cpts_checklist() {

	/**
	 * Post Type: Checklists.
	 */

	$labels = [
		"name" => esc_html__( "Checklists", "capsule" ),
		"singular_name" => esc_html__( "Checklist", "capsule" ),
		"menu_name" => esc_html__( "Checklists", "capsule" ),
		"add_new" => esc_html__( "Add New Checklist", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Checklists", "capsule" ),
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
		"rewrite" => [ "slug" => "checklist", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-yes",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "checklist", $args );
}

add_action( 'init', 'cptui_register_my_cpts_checklist' );

function cptui_register_my_cpts_landing_page() {

	/**
	 * Post Type: Landing Pages.
	 */

	$labels = [
		"name" => esc_html__( "Landing Pages", "capsule" ),
		"singular_name" => esc_html__( "Landing Page", "capsule" ),
		"menu_name" => esc_html__( "Landing Pages", "capsule" ),
		"add_new_item" => esc_html__( "Add New Landing Page", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Landing Pages", "capsule" ),
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
		"rewrite" => [ "slug" => "landing-page", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-desktop",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "landing-page", $args );
}

add_action( 'init', 'cptui_register_my_cpts_landing_page' );

function cptui_register_my_cpts_resource() {

	/**
	 * Post Type: Resources.
	 */

	$labels = [
		"name" => esc_html__( "Resources", "capsule" ),
		"singular_name" => esc_html__( "Resource", "capsule" ),
		"menu_name" => esc_html__( "Resources", "capsule" ),
		"all_items" => esc_html__( "All Resources", "capsule" ),
		"add_new" => esc_html__( "Add new", "capsule" ),
		"add_new_item" => esc_html__( "Add new Resource", "capsule" ),
		"edit_item" => esc_html__( "Edit Resource", "capsule" ),
		"new_item" => esc_html__( "New Resource", "capsule" ),
		"view_item" => esc_html__( "View Resource", "capsule" ),
		"view_items" => esc_html__( "View Resources", "capsule" ),
		"search_items" => esc_html__( "Search Resources", "capsule" ),
		"not_found" => esc_html__( "No Resources found", "capsule" ),
		"not_found_in_trash" => esc_html__( "No Resources found in trash", "capsule" ),
		"parent" => esc_html__( "Parent Resource:", "capsule" ),
		"featured_image" => esc_html__( "Featured image for this Resource", "capsule" ),
		"set_featured_image" => esc_html__( "Set featured image for this Resource", "capsule" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Resource", "capsule" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Resource", "capsule" ),
		"archives" => esc_html__( "Resource archives", "capsule" ),
		"insert_into_item" => esc_html__( "Insert into Resource", "capsule" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Resource", "capsule" ),
		"filter_items_list" => esc_html__( "Filter Resources list", "capsule" ),
		"items_list_navigation" => esc_html__( "Resources list navigation", "capsule" ),
		"items_list" => esc_html__( "Resources list", "capsule" ),
		"attributes" => esc_html__( "Resources attributes", "capsule" ),
		"name_admin_bar" => esc_html__( "Resource", "capsule" ),
		"item_published" => esc_html__( "Resource published", "capsule" ),
		"item_published_privately" => esc_html__( "Resource published privately.", "capsule" ),
		"item_reverted_to_draft" => esc_html__( "Resource reverted to draft.", "capsule" ),
		"item_scheduled" => esc_html__( "Resource scheduled", "capsule" ),
		"item_updated" => esc_html__( "Resource updated.", "capsule" ),
		"parent_item_colon" => esc_html__( "Parent Resource:", "capsule" ),
	];

	$args = [
		"label" => esc_html__( "Resources", "capsule" ),
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
		"rewrite" => [ "slug" => "resource", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-book",
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "content-topic", "content-type" ],
		"show_in_graphql" => false,
	];

	register_post_type( "resource", $args );
}

add_action( 'init', 'cptui_register_my_cpts_resource' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Mail Template Region.
	 */

	$labels = [
		"name" => esc_html__( "Mail Template Region", "capsule" ),
		"singular_name" => esc_html__( "Mail Template Region", "capsule" ),
		"menu_name" => esc_html__( "Mail Template Region", "capsule" ),
		"new_item_name" => esc_html__( "Add New Mail Template Region", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Mail Template Region", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'mail_template_region', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "mail_template_region",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "mail_template_region", [ "mail-template" ], $args );

	/**
	 * Taxonomy: Mail Template Type.
	 */

	$labels = [
		"name" => esc_html__( "Mail Template Type", "capsule" ),
		"singular_name" => esc_html__( "Mail Template Type", "capsule" ),
		"menu_name" => esc_html__( "Mail Template Type", "capsule" ),
		"add_new_item" => esc_html__( "Add New Mail Template Type", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Mail Template Type", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'mail_template_type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "mail_template_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "mail_template_type", [ "mail-template" ], $args );

	/**
	 * Taxonomy: Checklist type.
	 */

	$labels = [
		"name" => esc_html__( "Checklist type", "capsule" ),
		"singular_name" => esc_html__( "Checklist type", "capsule" ),
		"menu_name" => esc_html__( "Checklist type", "capsule" ),
		"add_new_item" => esc_html__( "Add New Checklist type", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Checklist type", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'checklist_type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "checklist_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "checklist_type", [ "checklist" ], $args );

	/**
	 * Taxonomy: Checklist region.
	 */

	$labels = [
		"name" => esc_html__( "Checklist region", "capsule" ),
		"singular_name" => esc_html__( "Checklist region", "capsule" ),
		"menu_name" => esc_html__( "Checklist region", "capsule" ),
		"add_new_item" => esc_html__( "Add New Checklist region", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Checklist region", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'checklist_region', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "checklist_region",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "checklist_region", [ "checklist" ], $args );

	/**
	 * Taxonomy: Content Topics.
	 */

	$labels = [
		"name" => esc_html__( "Content Topics", "capsule" ),
		"singular_name" => esc_html__( "Content Topic", "capsule" ),
		"menu_name" => esc_html__( "Content Topics", "capsule" ),
		"all_items" => esc_html__( "All Content Topics", "capsule" ),
		"edit_item" => esc_html__( "Edit Content Topic", "capsule" ),
		"view_item" => esc_html__( "View Content Topic", "capsule" ),
		"update_item" => esc_html__( "Update Content Topic name", "capsule" ),
		"add_new_item" => esc_html__( "Add new Content Topic", "capsule" ),
		"new_item_name" => esc_html__( "New Content Topic name", "capsule" ),
		"parent_item" => esc_html__( "Parent Content Topic", "capsule" ),
		"parent_item_colon" => esc_html__( "Parent Content Topic:", "capsule" ),
		"search_items" => esc_html__( "Search Content Topics", "capsule" ),
		"popular_items" => esc_html__( "Popular Content Topics", "capsule" ),
		"separate_items_with_commas" => esc_html__( "Separate Content Topics with commas", "capsule" ),
		"add_or_remove_items" => esc_html__( "Add or remove Content Topics", "capsule" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Content Topics", "capsule" ),
		"not_found" => esc_html__( "No Content Topics found", "capsule" ),
		"no_terms" => esc_html__( "No Content Topics", "capsule" ),
		"items_list_navigation" => esc_html__( "Content Topics list navigation", "capsule" ),
		"items_list" => esc_html__( "Content Topics list", "capsule" ),
		"back_to_items" => esc_html__( "Back to Content Topics", "capsule" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "capsule" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "capsule" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "capsule" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Content Topics", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'content-topic', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "content-topic",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "content-topic", [ "resource" ], $args );

	/**
	 * Taxonomy: Content Types.
	 */

	$labels = [
		"name" => esc_html__( "Content Types", "capsule" ),
		"singular_name" => esc_html__( "Content Type", "capsule" ),
		"menu_name" => esc_html__( "Content Types", "capsule" ),
		"all_items" => esc_html__( "All Content Types", "capsule" ),
		"edit_item" => esc_html__( "Edit Content Type", "capsule" ),
		"view_item" => esc_html__( "View Content Type", "capsule" ),
		"update_item" => esc_html__( "Update Content Type name", "capsule" ),
		"add_new_item" => esc_html__( "Add new Content Type", "capsule" ),
		"new_item_name" => esc_html__( "New Content Type name", "capsule" ),
		"parent_item" => esc_html__( "Parent Content Type", "capsule" ),
		"parent_item_colon" => esc_html__( "Parent Content Type:", "capsule" ),
		"search_items" => esc_html__( "Search Content Types", "capsule" ),
		"popular_items" => esc_html__( "Popular Content Types", "capsule" ),
		"separate_items_with_commas" => esc_html__( "Separate Content Types with commas", "capsule" ),
		"add_or_remove_items" => esc_html__( "Add or remove Content Types", "capsule" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Content Types", "capsule" ),
		"not_found" => esc_html__( "No Content Types found", "capsule" ),
		"no_terms" => esc_html__( "No Content Types", "capsule" ),
		"items_list_navigation" => esc_html__( "Content Types list navigation", "capsule" ),
		"items_list" => esc_html__( "Content Types list", "capsule" ),
		"back_to_items" => esc_html__( "Back to Content Types", "capsule" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "capsule" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "capsule" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "capsule" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Content Types", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'content-type', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "content-type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "content-type", [ "resource" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
function cptui_register_my_taxes_mail_template_region() {

	/**
	 * Taxonomy: Mail Template Region.
	 */

	$labels = [
		"name" => esc_html__( "Mail Template Region", "capsule" ),
		"singular_name" => esc_html__( "Mail Template Region", "capsule" ),
		"menu_name" => esc_html__( "Mail Template Region", "capsule" ),
		"new_item_name" => esc_html__( "Add New Mail Template Region", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Mail Template Region", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'mail_template_region', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "mail_template_region",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "mail_template_region", [ "mail-template" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_mail_template_region' );

function cptui_register_my_taxes_mail_template_type() {

	/**
	 * Taxonomy: Mail Template Type.
	 */

	$labels = [
		"name" => esc_html__( "Mail Template Type", "capsule" ),
		"singular_name" => esc_html__( "Mail Template Type", "capsule" ),
		"menu_name" => esc_html__( "Mail Template Type", "capsule" ),
		"add_new_item" => esc_html__( "Add New Mail Template Type", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Mail Template Type", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'mail_template_type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "mail_template_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "mail_template_type", [ "mail-template" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_mail_template_type' );

function cptui_register_my_taxes_checklist_type() {

	/**
	 * Taxonomy: Checklist type.
	 */

	$labels = [
		"name" => esc_html__( "Checklist type", "capsule" ),
		"singular_name" => esc_html__( "Checklist type", "capsule" ),
		"menu_name" => esc_html__( "Checklist type", "capsule" ),
		"add_new_item" => esc_html__( "Add New Checklist type", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Checklist type", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'checklist_type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "checklist_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "checklist_type", [ "checklist" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_checklist_type' );

function cptui_register_my_taxes_checklist_region() {

	/**
	 * Taxonomy: Checklist region.
	 */

	$labels = [
		"name" => esc_html__( "Checklist region", "capsule" ),
		"singular_name" => esc_html__( "Checklist region", "capsule" ),
		"menu_name" => esc_html__( "Checklist region", "capsule" ),
		"add_new_item" => esc_html__( "Add New Checklist region", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Checklist region", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'checklist_region', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "checklist_region",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "checklist_region", [ "checklist" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_checklist_region' );

function cptui_register_my_taxes_content_topic() {

	/**
	 * Taxonomy: Content Topics.
	 */

	$labels = [
		"name" => esc_html__( "Content Topics", "capsule" ),
		"singular_name" => esc_html__( "Content Topic", "capsule" ),
		"menu_name" => esc_html__( "Content Topics", "capsule" ),
		"all_items" => esc_html__( "All Content Topics", "capsule" ),
		"edit_item" => esc_html__( "Edit Content Topic", "capsule" ),
		"view_item" => esc_html__( "View Content Topic", "capsule" ),
		"update_item" => esc_html__( "Update Content Topic name", "capsule" ),
		"add_new_item" => esc_html__( "Add new Content Topic", "capsule" ),
		"new_item_name" => esc_html__( "New Content Topic name", "capsule" ),
		"parent_item" => esc_html__( "Parent Content Topic", "capsule" ),
		"parent_item_colon" => esc_html__( "Parent Content Topic:", "capsule" ),
		"search_items" => esc_html__( "Search Content Topics", "capsule" ),
		"popular_items" => esc_html__( "Popular Content Topics", "capsule" ),
		"separate_items_with_commas" => esc_html__( "Separate Content Topics with commas", "capsule" ),
		"add_or_remove_items" => esc_html__( "Add or remove Content Topics", "capsule" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Content Topics", "capsule" ),
		"not_found" => esc_html__( "No Content Topics found", "capsule" ),
		"no_terms" => esc_html__( "No Content Topics", "capsule" ),
		"items_list_navigation" => esc_html__( "Content Topics list navigation", "capsule" ),
		"items_list" => esc_html__( "Content Topics list", "capsule" ),
		"back_to_items" => esc_html__( "Back to Content Topics", "capsule" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "capsule" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "capsule" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "capsule" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Content Topics", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'content-topic', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "content-topic",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "content-topic", [ "resource" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_content_topic' );

function cptui_register_my_taxes_content_type() {

	/**
	 * Taxonomy: Content Types.
	 */

	$labels = [
		"name" => esc_html__( "Content Types", "capsule" ),
		"singular_name" => esc_html__( "Content Type", "capsule" ),
		"menu_name" => esc_html__( "Content Types", "capsule" ),
		"all_items" => esc_html__( "All Content Types", "capsule" ),
		"edit_item" => esc_html__( "Edit Content Type", "capsule" ),
		"view_item" => esc_html__( "View Content Type", "capsule" ),
		"update_item" => esc_html__( "Update Content Type name", "capsule" ),
		"add_new_item" => esc_html__( "Add new Content Type", "capsule" ),
		"new_item_name" => esc_html__( "New Content Type name", "capsule" ),
		"parent_item" => esc_html__( "Parent Content Type", "capsule" ),
		"parent_item_colon" => esc_html__( "Parent Content Type:", "capsule" ),
		"search_items" => esc_html__( "Search Content Types", "capsule" ),
		"popular_items" => esc_html__( "Popular Content Types", "capsule" ),
		"separate_items_with_commas" => esc_html__( "Separate Content Types with commas", "capsule" ),
		"add_or_remove_items" => esc_html__( "Add or remove Content Types", "capsule" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Content Types", "capsule" ),
		"not_found" => esc_html__( "No Content Types found", "capsule" ),
		"no_terms" => esc_html__( "No Content Types", "capsule" ),
		"items_list_navigation" => esc_html__( "Content Types list navigation", "capsule" ),
		"items_list" => esc_html__( "Content Types list", "capsule" ),
		"back_to_items" => esc_html__( "Back to Content Types", "capsule" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "capsule" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "capsule" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "capsule" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "capsule" ),
	];

	
	$args = [
		"label" => esc_html__( "Content Types", "capsule" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'content-type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "content-type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "content-type", [ "resource" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_content_type' );

function capsule_register_videos(){
	// CPT registration
	$videos_labels = array(
		'name'                  => _x( 'Videos', 'Post type general name', 'capsule' ),
		'singular_name'         => _x( 'Video', 'Post type singular name', 'capsule' ),
		'menu_name'             => _x( 'Videos', 'Admin Menu text', 'capsule' ),
		'name_admin_bar'        => _x( 'Video', 'Add New on Toolbar', 'capsule' ),
		'add_new'               => __( 'Add New', 'capsule' ),
		'add_new_item'          => __( 'Add New Video', 'capsule' ),
		'new_item'              => __( 'New Video', 'capsule' ),
		'edit_item'             => __( 'Edit Video', 'capsule' ),
		'view_item'             => __( 'View Video', 'capsule' ),
		'all_items'             => __( 'All Videos', 'capsule' ),
		'search_items'          => __( 'Search Videos', 'capsule' ),
		'parent_item_colon'     => __( 'Parent Videos:', 'capsule' ),
		'not_found'             => __( 'No videos found.', 'capsule' ),
		'not_found_in_trash'    => __( 'No videos found in Trash.', 'capsule' )
	);

	$videos_args = array(
		'labels'             => $videos_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'menu_icon'			 => 'dashicons-video-alt3',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'video' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'video', $videos_args );

	$videos_cat = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'capsule' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'capsule' ),
		'search_items'      => __( 'Search Categories', 'capsule' ),
		'all_items'         => __( 'All Categories', 'capsule' ),
		'parent_item'       => __( 'Parent Category', 'capsule' ),
		'parent_item_colon' => __( 'Parent Category:', 'capsule' ),
		'edit_item'         => __( 'Edit Category', 'capsule' ),
		'update_item'       => __( 'Update Category', 'capsule' ),
		'add_new_item'      => __( 'Add New Category', 'capsule' ),
		'new_item_name'     => __( 'New Category Name', 'capsule' ),
		'menu_name'         => __( 'Category', 'capsule' ),
	);

	$videos_cat_args = array(
		'hierarchical'      => true,
		'labels'            => $videos_cat,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'video_cat' ),
	);

	register_taxonomy( 'video_cat', array( 'video' ), $videos_cat_args );
}
add_action( 'init', 'capsule_register_videos' );