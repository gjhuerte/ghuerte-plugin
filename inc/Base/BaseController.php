<?php
/**
 * @package GhuertePlugin
 */
namespace Inc\Base;

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin;

    public function __contruct() {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2) );
        $this->plugin_url = plugin_dir_url( __FILE__ );
        $this->plugin = plugin_basename( __FILE__ );
    }
}
