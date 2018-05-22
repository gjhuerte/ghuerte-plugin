<?php
/**
 * @package GhuertePlugin
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register() {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) {
        $settings_links = '<a href="admin.php?page=ghuerte_plugin">Settings</a>';
        array_push( $links, $settings_links );
        return $links;
    }
}