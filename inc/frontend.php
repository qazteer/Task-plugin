<?php
	class WPTP_task_plugin {
	
		public $path; 				// path to plugin dir
		public $url;
		public $folder;
		public $slug;
		public $ns_plugin_name; 	// friendly name of this plugin for re-use throughout
		public $ns_plugin_slug; 	// slug name of this plugin for re-use throughout
		public $ns_plugin_ref; 	// reference name of the plugin for re-use throughout
		public $version;

		public function __construct(){		
			$this->path = dirname(dirname(__FILE__));
			$this->folder = basename($this->path);
			$this->url = plugins_url($this->folder.'/');
			$this->slug = $this->folder;
			$this->ns_plugin_name = "WP Task Plugin";
			$this->ns_plugin_slug = "wp-task-plugin";
			$this->ns_plugin_ref = "wp_task_plugin";
			$this->version = "1.0.0";
			
			add_action( 'plugins_loaded', array($this, 'setup_plugin') );		
			add_action( 'admin_menu', array($this,'register_settings_page'), 20 );
			add_action( 'admin_enqueue_scripts', array($this, 'admin_assets') );
		}

		public function admin_assets($page){//print_r($this->url."css/style.css");exit;
			wp_register_style( $this->slug, $this->url."css/style.css", false, $this->version );
			wp_enqueue_style( $this->slug );
					
		}
	 
		public function setup_plugin(){
			load_plugin_textdomain( $this->ns_plugin_slug, false, $this->path."lang/" ); 
		}
		
		public function register_settings_page(){
			add_submenu_page(
				'tools.php',								// Parent menu item slug	
				__($this->ns_plugin_name, $this->ns_plugin_name),	// Pate Title
				__($this->ns_plugin_name, $this->ns_plugin_name),	// Menu Title
				'manage_options',									// Capability
				$this->ns_plugin_ref,								// Menu Slug
				array( $this, 'show_settings_page' )				// Callback function
			);
		}


		
		public function show_settings_page(){

			?>

			<div class="wrap am_import_csv">
				<h2><?php echo $this->ns_plugin_name; ?></h2>
				<ul>
					<li><h3><?php _e( 'Register a "Task" post type', 'wptp' ) ?></h3></li>
					<li><h3><?php _e( 'Register a corresponding category (Task types)', 'wptp' ) ?></h3></li>
					<li><h3><?php _e( 'Register a meta box with following fields: start date, due date, priority (high, low, normal)', 'wptp' ) ?></h3></li>
					<li><h3><?php _e( 'https://github.com/teer12/Task-plugin', 'wptp' ) ?></h3></li>
				</ul>	
			</div>
			<?php
		}
	}