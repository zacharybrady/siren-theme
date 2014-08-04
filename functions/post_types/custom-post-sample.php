<?php

	  add_action( 'init', 'demo_post_type' );
        
    function demo_post_type() {
            $args = array(
            'labels' => array(
                'name' => __( 'Demo Posts' ),
                'singular_name' => __( 'Demo Post' ),
                'add_new' => __( 'Add New Demo Post' ),
                'add_new_item' => __( 'Add New Demo Post' ),
                'edit_item' => __( 'Edit Demo Post' ),
                'new_item' => __( 'Add New Demo Post' ),
                'view_item' => __( 'View Demo Post' ),
                'search_items' => __( 'Search Demo Post' ),
                'not_found' => __( 'No Demo Post found' ),
                'not_found_in_trash' => __( 'No Demo Posts found in trash' )
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'exclude_from_search' => false,
            'rewrite' => true,
            'has_archive' => true,
            'rewrite' => array("slug" => "demopost"), // Permalinks format
            'hierarchical' => true,
            'menu_position' => null,
            'supports' => array('title',"editor"),
            'taxonomies' => array('')
        );
     
            register_post_type( 'demopost', $args );
    }	

?>