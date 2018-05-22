<?php
/**
 * @package GhuertePlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;

class Admin extends BaseController
{
    public function register() {
        add_action( 'admin_menu', [ $this, 'add_admin_pages']);
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
        require_once $this->plugin_path . 'templates/admin.php';
    }
}

?>