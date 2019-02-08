<?php
	
	require_once(plugin_dir_path( __FILE__ ).'/frontend.php');
	require_once(plugin_dir_path( __FILE__ ).'/functions.php');
	new WPTP_task_plugin();
	
	$obj_task = new Register_Task_post_type();

	// Register Custom Post Type Task
	$obj_task->register_post_type();
	// Registration Task types taxonomies
	$obj_task->register_taxonomies();
	// Register meta box.
	$obj_task->register_meta_box();