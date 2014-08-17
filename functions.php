<?php

register_sidebar( array('name' => 'Sidebar') );

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

function my_init_method() {
  if(!is_admin()) {
    wp_register_style( 'global', get_bloginfo('template_directory') . '/css/global.css');
    wp_enqueue_style( 'global' );
  }
}
add_action('init', 'my_init_method');


// Custom post type with custom fields for events

function create_events_post_type() {
	register_post_type( 'events', 
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Event' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Event' ),
				'new_item' => __( 'New Event' ),
				'view' => __( 'View Event' ),
				'view_item' => __( 'View Event' ),
				'search_items' => __( 'Search Event Guide' ),
				'not_found' => __( 'No events found' ),
				'not_found_in_trash' => __( 'No events found in Trash' ),
			),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-calendar',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'can_export' => true,
			'register_meta_box_cb' => 'events_post_type_meta',
		)
	);
}


function events_custom_columns($columns) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Title' ),
        '_event_date' => __( 'Date' ),
        '_event_time' => __( 'Time' ),
        '_event_price' => __( 'Price' ),
    );

    return $columns;
}

function events_manage_custom_columns($column, $post_id) {
    global $post;

    $column_value = get_post_meta($post_id, $column, true);

    if ( empty( $column_value ) ) {
        echo __( '' );
    }
    else {
        printf( __( '%s' ), $column_value );
    }

}

function events_post_type_meta() {
    // add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );
    add_meta_box('_event_date', __('Date'),         'display_custom_field', 'events', 'side', 'low', array('field_name' => '_event_date'));
    add_meta_box('_event_time', __('Time'),         'display_custom_field', 'events', 'side', 'low', array('field_name' => '_event_time'));
    add_meta_box('_event_price', __('Door Charge'), 'display_custom_field', 'events', 'side', 'low', array('field_name' => '_event_price'));
    add_meta_box('_event_url', __('Event Url'),     'display_custom_field', 'events', 'side', 'low', array('field_name' => '_event_url'));
}

function display_custom_field($post, $args) {
    global $post;
    $current_value = get_post_meta($post->ID, $args['args']['field_name'], true);
    echo '<input type="hidden" name="banner-buttonmeta_noncename" id="banner-buttonmeta_noncename" value="', wp_create_nonce(plugin_basename(__FILE__)), '" />';
    echo '<input type="text" name="', $args['args']['field_name'], '" value="', $current_value, '" class="widefat" />'; 
}

function save_events_post_type_meta($post_id , $post) { 
    if ( !wp_verify_nonce($_POST['banner-buttonmeta_noncename'], plugin_basename(__FILE__)) ) {
        return $post->ID; 
    }

    if ( !current_user_can('edit_post', $post->ID) ) {
        return $post->ID;
    }

    $meta_field_names = array('_event_url', '_event_price', '_event_date', '_event_time');

    error_log(print_r($_POST));
    foreach ( $meta_field_names as $meta_field ) {
    	$post_data[$meta_field] = $_POST[$meta_field]; 
        foreach ( $post_data as $key => $value ) {
            process_meta_field($post, $key, $value);
        }
    }
}

function process_meta_field($post, $key, $value) {
    if ( $post->post_type == 'revision' ) {
        return;
    }

    $value = implode(',', (array) $value );

    if ( get_post_meta($post->ID, $key, FALSE) ) { 
        update_post_meta($post->ID, $key, $value);
    } else { 
        add_post_meta($post->ID, $key ,$value);
    }
    
    if (! $value ) {
        delete_post_meta($post->ID, $key);
    }
}

add_action('init', 'create_events_post_type');
add_action('admin_init', 'events_post_type_meta');
add_filter('manage_edit-events_columns', 'events_custom_columns');
add_action('manage_events_posts_custom_column', 'events_manage_custom_columns', 10, 2);
add_action('save_post' , 'save_events_post_type_meta' , 1, 2);

?>