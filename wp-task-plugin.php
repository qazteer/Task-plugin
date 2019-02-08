<?php
/*
	Plugin Name: WP Task Plugin
	Plugin URI: http://www.amixstudio.com/
	Description: Plugin register a 'Task' post type
	Text Domain: amsync
	Author: Amix Studio
	Version: 3.0.0
	Author URI: http://www.amixstudio.com/
	License: GPLv2 or later
*/

/*
	Copyright 2016
	
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // exit if accessed directly!
}

function wppt_load_wp_test_plugin() {
	require_once(dirname(__FILE__).'/inc/loader.php');
}
add_action( 'plugins_loaded', 'wppt_load_wp_test_plugin' );
