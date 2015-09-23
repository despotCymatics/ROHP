<?php
/*
* Plugin Name: News Flash Posts
* Description: Custom posts
* Version: 1.0
* Author: despot
*/


//custom post type function

function create_posttype() {

    // CPT Labels
    $labels = array(
        'name'              => __( 'News Flash' ),
        'singular_name'     => __( 'News Flash' ),
        'menu_name'         => __( 'News Flash' ),
        'parent_item_colon'   => __( 'Parent News Flash' ),
        'all_items'           => __( 'All News Flash' ),
        'view_item'           => __( 'View News Flash' ),
        'add_new_item'        => __( 'Add News Flash' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit News Flash' ),
        'update_item'         => __( 'Update News Flash' ),
        'search_items'        => __( 'Search News Flash' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'description'         => __( 'News Flash that appear on home' ),
        'rewrite' => array('slug' => 'news_flash'),
        'hierarchical'        => false,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        'supports'            => array('title', 'excerpt', 'editor'),

    );
    register_post_type('News Flash', $args);
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );