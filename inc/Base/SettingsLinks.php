<?php
/**
 * @package GhuertePlugin
 */
namespace Inc\Base;

class SettingsLinks 
{
    protected $plugin;
    
    public function __construct() {
        $this->plugin = PLUGIN;
    }

    public function register() {
        add_filter( "plugin_action_links_$this->plugin", [ $this, 'settings_link'] );
    }

    public function settings_links( $links ) {
        $settings_links = '<a href="admin.php?page=ghuerte_plugin">Settings</a>';
        array_push( $links, $settings_link);
        return $links;
    }
}