<?php
/**
 * @package GhuertePlugin
 */
namespace Inc\Base;
 
class Enqueue extends BaseController
{
    public function register() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ]);
    }
  
    function enqueue() {
        wp_enqueue_style('customstyle',  $this->plugin_url . 'assets/style.css' );
        wp_enqueue_script('customscript', $this->plugin_url . 'assets/script.js' );
    }
}