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

defined( 'ABSPATH') or die('Who are you?');

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php' ;
}

/**
 * The code that runs during activation
 *
 * @return void
 */
function activate_ghuerte_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_ghuerte_plugin');

/**
 * The code that runs during deactivation
 *
 * @return void
 */
function deactivate_ghuerte_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_ghuerte_plugin');

/**
 * Initialize plugin core
 */
if( class_exists( 'Inc\\Init' ) ){

	/**
	 * Initialize the class
	 */
	Inc\Init::register_services();
}
