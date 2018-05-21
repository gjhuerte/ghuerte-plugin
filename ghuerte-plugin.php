<?php
/**
 * @package  GhuertePlugin
 * Use comment block and not inline 
 * comment
 */

/**
 * Plugin Name: Ghuerte Plugin
 * Plugin URI: http://github.com/ghuerte/ghuerte-plugin
 * Description: My First Plugin
 * Version: 1.0.0
 * Author: Gabriel Jay Huerte
 * Author URI: gjhuerte.com
 * License: GPLv2 or later
 * Text Domain: ghuerte-plugin
 */

/*
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


Copyright (C) 2018 Gabriel Jay Huerte
 */


if( ! defined( 'ABSPATH')) {

	/**
	 * if the abspath is not defined. it either means that someone 
	 * is using the plugin without the wordpress permission or
	 * the plugin is used without initialization of wordpress
	 * if the plugin is not initialized by wordpress
	 */
	die;
}

/**
 * Other option in writing the security feature
 */
defined( 'ABSPATH') or die('Who are you?');

// if ( ! function_exists('add_action') ) {

	/**
	 * Option 1
	 */
	// die('This website is hacked');

	/**
	 * Option 2
	 */
	// echo "Something";
	// exit;
// }

if( !class_exists('GhuertePlugin'))
{
	class GhuertePlugin 
	{
		public $plugin_location;
		/**
		 * Add Initialization Action for custom post type function
		 * flush_rewrite_rules() - refresh stuff and check newly created
		 * 
		 * [ visibility ] [ static or not ] [ function_name ]
		 * 
		 * public - accessible anywhere, default
		 * private - accessible within the class itself not extends nor instance
		 * protected - only within the class itself and the class that extends
		 * it but not the instance class
		 * 
		 * static
		 * final
		 */
		function __construct() {
			add_action( 'init', [ $this, 'custom_post_type' ]);
			$this->plugin_location = plugin_basename( __FILE__ );

			/**
			 * Example: for static methods only
			 */
			// add_action( 'init', ['GhuertePlugin', 'custom_post_type' ]);
		}

		function register() {
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ]);
			add_action( 'admin_menu', [ $this, 'add_admin_pages']);
			add_filter( "plugin_action_links_$this->plugin_location" , [ $this, 'settings_link']);
			
		}

		public function settings_link( $links ) {
			/**
			 * add custom settings link
			 */
			$settings_link = '<a href="admin.php?page=ghuerte_plugin">Settings</a>';
			array_push( $links, $settings_link);
			return $links;

		}

		public function add_admin_pages() {

			/**
			 * Add a new menu page in admin page
			 * sunset page tutorials for icons [ icons used are from dashicons wordpress ]
			 * param 1 - title
			 * param 2 - menu title
			 * param 3 - capability
			 * param 4 - menu_slug [ unique and use underscore ]
			 * param 5 - array [ class, function ]
			 * param 6 - icons
			 * param 7 - positiion of link
			 */
			add_menu_page( 'Ghuerte Plugin', 'Ghuerte', 'manage_options', 'ghuerte_plugin', [ $this, 'admin_index' ], 'dashicons-store', 110);
		}

		public function admin_index() {
			// require template
			require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
		}

		function activate() {

			/**
			 * generate custom post types
			 * located on the same class
			 */
			$this->custom_post_type();

			/**
			 * refresh 
			 */
			flush_rewrite_rules();
		}

		function deactivate() {
			require_once plugin_dir_path( __FILE__ ) . 'inc/ghuerte-plugin-deactivate.php';
			GhuertePlugin::deactivate();
		}

		/**
		 * uninstall requires static
		 * Option 1:
		 */
		// static function uninstall() {

		// }

		/**
		 * Option 2:
		 * Cretae an uninstall.php
		 */

		function custom_post_type() { 
			register_post_type( 'book', [
				'public' => true,
				'label' => 'Books'
			]);
		}

		/**
		 * __FILE__ - starts at the current file location
		 */
		function enqueue() {
			wp_enqueue_style('customstyle', plugins_url('/assets/style.css', __FILE__ ));
			wp_enqueue_script('customscript', plugins_url('/assets/script.js', __FILE__ ));
		}
	}

	if( class_exists( 'GhuertePlugin')){
		$ghuertePlugin = new GhuertePlugin();
		$ghuertePlugin->register();
	}


	/**
	 * activation
	 */
	require_once plugin_dir_path( __FILE__ ) . 'inc/ghuerte-plugin-activate.php';
	register_activation_hook( __FILE__, [ 'GhuertePluginActivate', 'activate' ]);

	/**
	 * deactivation
	 */
	register_deactivation_hook( __FILE__, [ $ghuertePlugin, 'deactivate' ]);

	/**
	 * uninstall
	 * Option 1:
	 */
	// register_uninstall_hook( __FILE__, [
	// 	$ghuertePlugin, 'uninstall',
	// ]);
}