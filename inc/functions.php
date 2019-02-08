<?php
class  Register_Task_post_type {

	// Register Custom Post Type Task
	public function register_post_type(){

		function wptp_task_post_type() {

		    $labels = array(
		        'name' => _x('Tasks', 'Post Type General Name', 'am'),
		        'singular_name' => _x('Task', 'Post Type Singular Name', 'am'),
		        'menu_name' => __('Tasks', 'am'),
		        'name_admin_bar' => __('Tasks', 'am'),
		        'archives' => __('Tasks Archives', 'am'),
		        'attributes' => __('Tasks Attributes', 'am'),
		        'parent_item_colon' => __('Parent Item:', 'am'),
		        'all_items' => __('All Items', 'am'),
		        'add_new_item' => __('Add New Item', 'am'),
		        'add_new' => __('Add New', 'am'),
		        'new_item' => __('New Item', 'am'),
		        'edit_item' => __('Edit Item', 'am'),
		        'update_item' => __('Update Item', 'am'),
		        'view_item' => __('View Item', 'am'),
		        'view_items' => __('View Items', 'am'),
		        'search_items' => __('Search Item', 'am'),
		        'not_found' => __('Not found', 'am'),
		        'not_found_in_trash' => __('Not found in Trash', 'am'),
		        'featured_image' => __('Featured Image', 'am'),
		        'set_featured_image' => __('Set featured image', 'am'),
		        'remove_featured_image' => __('Remove featured image', 'am'),
		        'use_featured_image' => __('Use as featured image', 'am'),
		        'insert_into_item' => __('Insert into item', 'am'),
		        'uploaded_to_this_item' => __('Uploaded to this item', 'am'),
		        'items_list' => __('Items list', 'am'),
		        'items_list_navigation' => __('Items list navigation', 'am'),
		        'filter_items_list' => __('Filter items list', 'am'),
		    );
		    $args = array(
		        'label' => __('Tasks', 'am'),
		        'description' => __('Post Type Description', 'am'),
		        'labels' => $labels,
		        'supports' => array('title', 'editor'),
		        'hierarchical' => true,
		        'public' => true,
		        'show_ui' => true,
		        'show_in_menu' => true,
		        'menu_position' => 8,
		        'menu_icon' => 'dashicons-list-view',
		        'show_in_admin_bar' => true,
		        'show_in_nav_menus' => true,
		        'can_export' => true,
		        'has_archive' => false,
		        'exclude_from_search' => true,
		        'publicly_queryable' => true,
		        'capability_type' => 'post',
		        'rewrite' => true
		    );
		    register_post_type('task', $args);
		}
		add_action('init', 'wptp_task_post_type', 0);
	}

	// Registration Task types taxonomies
	public function register_taxonomies(){

		function wptp_create_task_types_taxonomies(){
		    
		    $labels = array(
		        'name' => _x( 'Task types', 'taxonomy general name' ),
		        'singular_name' => _x( 'Task type', 'taxonomy singular name' ),
		        'search_items' =>  __( 'Search Task types' ),
		        'all_items' => __( 'All Task types' ),
		        'parent_item' => __( 'Parent Task type' ),
		        'parent_item_colon' => __( 'Parent Task type:' ),
		        'edit_item' => __( 'Edit Task type' ),
		        'update_item' => __( 'Update Task type' ),
		        'add_new_item' => __( 'Add New Task type' ),
		        'new_item_name' => __( 'New Task type Name' ),
		        'menu_name' => __( 'Task types' ),
		    );

		    // Add taxonomie 'home dimension' (as category)
		    register_taxonomy('task-type', array('task'), array(
		        'hierarchical' => true,
		        'labels' => $labels,
		        'show_ui' => true,
		        'query_var' => true,
		     	'rewrite' => true
		    ));
		}
		add_action( 'init', 'wptp_create_task_types_taxonomies', 0 );
	}

	// Register meta box
	public function register_meta_box(){

		function wptp_register_meta_boxes() {
		    add_meta_box( 'task_meta_box', __( 'Task Meta Box', 'wptp' ), 'wptp_display_callback', 'task', 'side' );
		}
		add_action( 'add_meta_boxes', 'wptp_register_meta_boxes' );

		/**
		 * Meta box display callback.
		 *
		 * @param WP_Post $post Current post object.
		 */
		function wptp_display_callback( $post ) {
		    include plugin_dir_path( __FILE__ ) . './form.php';
		}

		/**
		 * Save meta box content.
		 *
		 * @param int $post_id Post ID
		 */
		function wptp_save_meta_box( $post_id ) {
		    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
		        $post_id = $parent_id;
		    }
		    $fields = [
		        'wptp_start_date',
		        'wptp_due_date',
		        'wptp_priority',
		    ];
		    foreach ( $fields as $field ) {
		        if ( array_key_exists( $field, $_POST ) ) {
		            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
		        }
		     }
		}
		add_action( 'save_post', 'wptp_save_meta_box' );
	}
}