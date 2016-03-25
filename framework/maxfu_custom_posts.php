<?php
/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
// Register Custom Post Type: News
if ( ! function_exists('custom_post_type_news') ) {
function custom_post_type_news() {
	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'sparkling' ),
		'singular_name'         => _x( 'News', 'Post Type Singular Name', 'sparkling' ),
		'menu_name'             => __( 'News', 'sparkling' ),
		'name_admin_bar'        => __( 'News', 'sparkling' ),
		'archives'              => __( 'News Archives', 'sparkling' ),
		'parent_item_colon'     => __( 'Parent News:', 'sparkling' ),
		'all_items'             => __( 'All News', 'sparkling' ),
		'add_new_item'          => __( 'Add New News', 'sparkling' ),
		'add_new'               => __( 'Add New', 'sparkling' ),
		'new_item'              => __( 'New News', 'sparkling' ),
		'edit_item'             => __( 'Edit News', 'sparkling' ),
		'update_item'           => __( 'Update News', 'sparkling' ),
		'view_item'             => __( 'View News', 'sparkling' ),
		'search_items'          => __( 'Search News', 'sparkling' ),
		'not_found'             => __( 'Not found', 'sparkling' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sparkling' ),
		'featured_image'        => __( 'Featured Image', 'sparkling' ),
		'set_featured_image'    => __( 'Set featured image', 'sparkling' ),
		'remove_featured_image' => __( 'Remove featured image', 'sparkling' ),
		'use_featured_image'    => __( 'Use as featured image', 'sparkling' ),
		'insert_into_item'      => __( 'Insert into news', 'sparkling' ),
		'uploaded_to_this_item' => __( 'Uploaded to this news', 'sparkling' ),
		'items_list'            => __( 'Items list', 'sparkling' ),
		'items_list_navigation' => __( 'Items list navigation', 'sparkling' ),
		'filter_items_list'     => __( 'Filter news list', 'sparkling' ),
	);
	$args = array(
		'label'                 => __( 'News', 'sparkling' ),
		'description'           => __( 'News posts', 'sparkling' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', ),
		'public'                => true,
		'menu_position'         => 0,
		'menu_icon'             => 'dashicons-rss',
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'news'),
	);
	register_post_type( 'news', $args );
}
add_action( 'init', 'custom_post_type_news', 0 );
}

// Register Custom Taxonomy: News Type
if ( ! function_exists( 'custom_taxonomy_news_type' ) ) {
function custom_taxonomy_news_type() {
	$labels = array(
		'name'                       => _x( 'News Type', 'Taxonomy General Name', 'sparkling' ),
		'singular_name'              => _x( 'News Type', 'Taxonomy Singular Name', 'sparkling' ),
		'menu_name'                  => __( 'Types', 'sparkling' ),
		'all_items'                  => __( 'All Types', 'sparkling' ),
		'parent_item'                => __( 'Parent Type', 'sparkling' ),
		'parent_item_colon'          => __( 'Parent Type:', 'sparkling' ),
		'new_item_name'              => __( 'New Type Name', 'sparkling' ),
		'add_new_item'               => __( 'Add New Type', 'sparkling' ),
		'edit_item'                  => __( 'Edit Type', 'sparkling' ),
		'update_item'                => __( 'Update Type', 'sparkling' ),
		'view_item'                  => __( 'View Type', 'sparkling' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'sparkling' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'sparkling' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sparkling' ),
		'popular_items'              => __( 'Popular Types', 'sparkling' ),
		'search_items'               => __( 'Search Types', 'sparkling' ),
		'not_found'                  => __( 'Not Found', 'sparkling' ),
		'no_terms'                   => __( 'No types', 'sparkling' ),
		'items_list'                 => __( 'Types list', 'sparkling' ),
		'items_list_navigation'      => __( 'Types list navigation', 'sparkling' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'query_var'                  => true,
		'rewrite'                    => true,
	);
	register_taxonomy( 'news_type', array( 'news' ), $args );
}
add_action( 'init', 'custom_taxonomy_news_type', 0 );
}

// Register Custom Post Type: Partner
if ( ! function_exists('custom_post_type_partner') ) {
function custom_post_type_partner() {
	$labels = array(
		'name'                  => _x( 'Partners', 'Post Type General Name', 'sparkling' ),
		'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'sparkling' ),
		'menu_name'             => __( 'Partners', 'sparkling' ),
		'name_admin_bar'        => __( 'Partner', 'sparkling' ),
		'archives'              => __( 'Partner Archives', 'sparkling' ),
		'parent_item_colon'     => __( 'Parent Partner:', 'sparkling' ),
		'all_items'             => __( 'All Partners', 'sparkling' ),
		'add_new_item'          => __( 'Add New Partner', 'sparkling' ),
		'add_new'               => __( 'Add New', 'sparkling' ),
		'new_item'              => __( 'New Partner', 'sparkling' ),
		'edit_item'             => __( 'Edit Partner', 'sparkling' ),
		'update_item'           => __( 'Update Partner', 'sparkling' ),
		'view_item'             => __( 'View Partner', 'sparkling' ),
		'search_items'          => __( 'Search Partner', 'sparkling' ),
		'not_found'             => __( 'Not found', 'sparkling' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sparkling' ),
		'featured_image'        => __( 'Partner Logo', 'sparkling' ),
		'set_featured_image'    => __( 'Set partner logo', 'sparkling' ),
		'remove_featured_image' => __( 'Remove partner logo', 'sparkling' ),
		'use_featured_image'    => __( 'Use as partner logo', 'sparkling' ),
		'insert_into_item'      => __( 'Insert into partner', 'sparkling' ),
		'uploaded_to_this_item' => __( 'Uploaded to this partner', 'sparkling' ),
		'items_list'            => __( 'Partners list', 'sparkling' ),
		'items_list_navigation' => __( 'Partners list navigation', 'sparkling' ),
		'filter_items_list'     => __( 'Filter partners list', 'sparkling' ),
	);
	$args = array(
		'label'                 => __( 'Partner', 'sparkling' ),
		'description'           => __( 'Partner posts', 'sparkling' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'public'                => true,
		'has_archive'           => true,
		'menu_position'         => 0,
		'menu_icon'             => 'dashicons-groups',
		'can_export'            => true,
		'rewrite'               => array('slug' => 'partner'),
	);
	register_post_type( 'partner', $args );
}
add_action( 'init', 'custom_post_type_partner', 0 );
}

// Register Custom Post Type: Staff
if ( ! function_exists('custom_post_type_staff') ) {
function custom_post_type_staff() {
	$labels = array(
		'name'                  => _x( 'Staffs', 'Post Type General Name', 'sparkling' ),
		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'sparkling' ),
		'menu_name'             => __( 'Staffs', 'sparkling' ),
		'name_admin_bar'        => __( 'Staff', 'sparkling' ),
		'archives'              => __( 'Staff Archives', 'sparkling' ),
		'parent_item_colon'     => __( 'Parent Staff:', 'sparkling' ),
		'all_items'             => __( 'All Staffs', 'sparkling' ),
		'add_new_item'          => __( 'Add New Staff', 'sparkling' ),
		'add_new'               => __( 'Add New', 'sparkling' ),
		'new_item'              => __( 'New Staff', 'sparkling' ),
		'edit_item'             => __( 'Edit Staff', 'sparkling' ),
		'update_item'           => __( 'Update Staff', 'sparkling' ),
		'view_item'             => __( 'View Staff', 'sparkling' ),
		'search_items'          => __( 'Search Staff', 'sparkling' ),
		'not_found'             => __( 'Not found', 'sparkling' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sparkling' ),
		'featured_image'        => __( 'Staff photo', 'sparkling' ),
		'set_featured_image'    => __( 'Set staff photo', 'sparkling' ),
		'remove_featured_image' => __( 'Remove staff photo', 'sparkling' ),
		'use_featured_image'    => __( 'Use as staff photo', 'sparkling' ),
		'insert_into_item'      => __( 'Insert into staff', 'sparkling' ),
		'uploaded_to_this_item' => __( 'Uploaded to this staff', 'sparkling' ),
		'items_list'            => __( 'Staffs list', 'sparkling' ),
		'items_list_navigation' => __( 'Staffs list navigation', 'sparkling' ),
		'filter_items_list'     => __( 'Filter staffs list', 'sparkling' ),
	);
	$args = array(
		'label'                 => __( 'Staff', 'sparkling' ),
		'description'           => __( 'Staff pages', 'sparkling' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'public'                => true,
		'menu_position'         => 0,
		'menu_icon'             => 'dashicons-businessman',
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'staff'),

	);
	register_post_type( 'staff', $args );
}
add_action( 'init', 'custom_post_type_staff', 0 );
}

// Register Custom Taxonomy: Team
if ( ! function_exists( 'custom_taxonomy_team' ) ) {
function custom_taxonomy_team() {
	$labels = array(
		'name'                       => _x( 'Team', 'Taxonomy General Name', 'sparkling' ),
		'singular_name'              => _x( 'Team', 'Taxonomy Singular Name', 'sparkling' ),
		'menu_name'                  => __( 'Teams', 'sparkling' ),
		'all_items'                  => __( 'All Teams', 'sparkling' ),
		'parent_item'                => __( 'Parent Team', 'sparkling' ),
		'parent_item_colon'          => __( 'Parent Team:', 'sparkling' ),
		'new_item_name'              => __( 'New Team Name', 'sparkling' ),
		'add_new_item'               => __( 'Add New Team', 'sparkling' ),
		'edit_item'                  => __( 'Edit Team', 'sparkling' ),
		'update_item'                => __( 'Update Team', 'sparkling' ),
		'view_item'                  => __( 'View Team', 'sparkling' ),
		'separate_items_with_commas' => __( 'Separate teams with commas', 'sparkling' ),
		'add_or_remove_items'        => __( 'Add or remove teams', 'sparkling' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sparkling' ),
		'popular_items'              => __( 'Popular Teams', 'sparkling' ),
		'search_items'               => __( 'Search Teams', 'sparkling' ),
		'not_found'                  => __( 'Not Found', 'sparkling' ),
		'no_terms'                   => __( 'No teams', 'sparkling' ),
		'items_list'                 => __( 'Teams list', 'sparkling' ),
		'items_list_navigation'      => __( 'Teams list navigation', 'sparkling' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'query_var'                  => true,
		'rewrite'                    => true,
	);
	register_taxonomy( 'team', array( 'staff' ), $args );
}
add_action( 'init', 'custom_taxonomy_team', 0 );
}

// Register Custom Post Type: Project(Portfolio)
if ( ! function_exists('custom_post_type_portfolio') ) {
function custom_post_type_portfolio() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'sparkling' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'sparkling' ),
		'menu_name'             => __( 'Projects', 'sparkling' ),
		'name_admin_bar'        => __( 'Project', 'sparkling' ),
		'archives'              => __( 'Project Archives', 'sparkling' ),
		'parent_item_colon'     => __( 'Parent Project:', 'sparkling' ),
		'all_items'             => __( 'All Projects', 'sparkling' ),
		'add_new_item'          => __( 'Add New Project', 'sparkling' ),
		'add_new'               => __( 'Add New', 'sparkling' ),
		'new_item'              => __( 'New Project', 'sparkling' ),
		'edit_item'             => __( 'Edit Project', 'sparkling' ),
		'update_item'           => __( 'Update Project', 'sparkling' ),
		'view_item'             => __( 'View Project', 'sparkling' ),
		'search_items'          => __( 'Search Project', 'sparkling' ),
		'not_found'             => __( 'Not found', 'sparkling' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sparkling' ),
		'featured_image'        => __( 'Featured Image', 'sparkling' ),
		'set_featured_image'    => __( 'Set featured image', 'sparkling' ),
		'remove_featured_image' => __( 'Remove featured image', 'sparkling' ),
		'use_featured_image'    => __( 'Use as featured image', 'sparkling' ),
		'insert_into_item'      => __( 'Insert into project', 'sparkling' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'sparkling' ),
		'items_list'            => __( 'Projects list', 'sparkling' ),
		'items_list_navigation' => __( 'Projects list navigation', 'sparkling' ),
		'filter_items_list'     => __( 'Filter projects list', 'sparkling' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'sparkling' ),
		'description'           => __( 'Projects custom post', 'sparkling' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'public'                => true,
		'menu_position'         => 0,
		'menu_icon'             => 'dashicons-admin-multisite',
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'portfolio-type'),
	);
	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'custom_post_type_portfolio', 0 );
}

// Register Custom Taxonomy: Project Type
if ( ! function_exists( 'custom_taxonomy_portfolio_type' ) ) {
function custom_taxonomy_portfolio_type() {
	$labels = array(
		'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'sparkling' ),
		'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'sparkling' ),
		'menu_name'                  => __( 'Project Type', 'sparkling' ),
		'all_items'                  => __( 'All Project Types', 'sparkling' ),
		'parent_item'                => __( 'Parent Project Type', 'sparkling' ),
		'parent_item_colon'          => __( 'Parent Project Type:', 'sparkling' ),
		'new_item_name'              => __( 'New Project Type Name', 'sparkling' ),
		'add_new_item'               => __( 'Add New Project Type', 'sparkling' ),
		'edit_item'                  => __( 'Edit Project Type', 'sparkling' ),
		'update_item'                => __( 'Update Project Type', 'sparkling' ),
		'view_item'                  => __( 'View Project Type', 'sparkling' ),
		'separate_items_with_commas' => __( 'Separate project types with commas', 'sparkling' ),
		'add_or_remove_items'        => __( 'Add or remove project types', 'sparkling' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sparkling' ),
		'popular_items'              => __( 'Popular Project Types', 'sparkling' ),
		'search_items'               => __( 'Search Project Types', 'sparkling' ),
		'not_found'                  => __( 'Not Found', 'sparkling' ),
		'no_terms'                   => __( 'No project Types', 'sparkling' ),
		'items_list'                 => __( 'Project types list', 'sparkling' ),
		'items_list_navigation'      => __( 'Project types list navigation', 'sparkling' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'query_var'                  => true,
		'rewrite'                    => true,
	);
	register_taxonomy( 'portfolio_type', array( 'portfolio' ), $args );
}
add_action( 'init', 'custom_taxonomy_portfolio_type', 0 );
}
?>