<?php

/**
 * Register Custom Post Type: Portfolio
 */

function trueman_register_portfolio() {
	register_post_type( 'portfolio', array(
			'label' => esc_html__( 'Portfolio', 'trueman-plugin' ),
	        'description' => esc_html__( 'Portfolio', 'trueman-plugin' ),
	        'supports' => array( 'title','editor','revisions','thumbnail','page-attributes' ),
	        'taxonomies' => array( 'portfolio_categories' ),
	        'hierarchical' => false,
	        'show_in_rest' => true,
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'show_in_nav_menus' => true,
	        'show_in_admin_bar' => true,
	        'menu_position' => 20,
	        'menu_icon' => 'dashicons-images-alt2',
	        'can_export' => true,
	        'has_archive' => false,
	        'exclude_from_search' => true,
	        'publicly_queryable' => true,
	        'capability_type' => 'post',
	        'rewrite' => array( 'slug' => 'portfolio', 'with_front' => true  ),
			'labels' => array(
				'name' => esc_html__( 'Portfolio', 'trueman-plugin' ),
		        'singular_name' => esc_html__( 'Portfolio', 'trueman-plugin' ),
		        'menu_name' => esc_html__( 'Portfolio', 'trueman-plugin' ),
		        'parent_item_colon' => esc_html__( 'Parent Portfolio:', 'trueman-plugin' ),
		        'all_items' => esc_html__( 'All Portfolio', 'trueman-plugin' ),
		        'view_item' => esc_html__( 'View Portfolio', 'trueman-plugin' ),
		        'add_new_item' => esc_html__( 'Add New Portfolio', 'trueman-plugin' ),
		        'add_new' => esc_html__( 'New Portfolio', 'trueman-plugin' ),
		        'edit_item' => esc_html__( 'Edit Portfolio', 'trueman-plugin' ),
		        'update_item' => esc_html__( 'Update Portfolio', 'trueman-plugin' ),
		        'search_items' => esc_html__( 'Search Portfolio', 'trueman-plugin' ),
		        'not_found' => esc_html__( 'No portfolio found', 'trueman-plugin' ),
		        'not_found_in_trash' => esc_html__( 'No portfolio found in Trash', 'trueman-plugin' ),
			),
		)
	);
}
add_action( 'init', 'trueman_register_portfolio' );

function trueman_register_portfolio_categories() {
	register_taxonomy( 'portfolio_categories', array ( 0 => 'portfolio' ),
		array(
			'label' => esc_html__( 'Portfolio Categories', 'trueman-plugin' ),
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'show_admin_column' => true,
			'public' => false,
			'query_var' => true,
			'has_archive' => false,
			'rewrite' => array( 'slug' => 'portfolio/category' ),
			'labels' => array(
				'name'              => esc_html__( 'Portfolio Categories', 'trueman-plugin' ),
		        'singular_name'     => esc_html__( 'Portfolio Categories', 'trueman-plugin' ),
		        'search_items'      => esc_html__( 'Search Portfolio Category', 'trueman-plugin' ),
		        'all_items'         => esc_html__( 'All Portfolio Category', 'trueman-plugin' ),
		        'parent_item'       => esc_html__( 'Parent Portfolio Category', 'trueman-plugin' ),
		        'parent_item_colon' => esc_html__( 'Parent Portfolio Category:', 'trueman-plugin' ),
		        'edit_item'         => esc_html__( 'Edit Portfolio Category', 'trueman-plugin' ),
		        'update_item'       => esc_html__( 'Update Portfolio Category', 'trueman-plugin' ),
		        'add_new_item'      => esc_html__( 'Add New Portfolio Category', 'trueman-plugin' ),
		        'new_item_name'     => esc_html__( 'New Portfolio Category Name', 'trueman-plugin' ),
		        'menu_name'         => esc_html__( 'Portfolio Category', 'trueman-plugin' ),
			)
		)
	);
}
add_action( 'init', 'trueman_register_portfolio_categories' );