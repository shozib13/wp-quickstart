<?php
add_action( 'init', function(){

	register_post_type( 'solution',
        array(
            'labels' => array(
                'name' => 'Solutions',
                'singular_name' => 'Solution',
                'add_new' => 'Add Solution',
                'add_new_item' => 'Add New Solution',
                'edit' => 'Edit',
                'edit_item' => 'Edit Solution',
                'new_item' => 'New Solution',
                'view' => 'View',
                'view_item' => 'View Solution',
                'search_items' => 'Search Solutions',
                'not_found' => 'No Solutions found',
                'not_found_in_trash' => 'No Solutions found in Trash',
                'parent' => 'Parent Solution'
            ),
 
            'public' => true,
            'menu_position' => 5,
            'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail'),
            'taxonomies' => array( 'category', 'post_tag' ),
            'menu_icon' => 'dashicons-admin-multisite',
            'has_archive' => false
        )
    );
});
