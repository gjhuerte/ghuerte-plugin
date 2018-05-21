<?php
/**
 * @package GhuertePlugin
 */
namespace Inc\Base;

class Enqueue 
{
    public function register() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ]);
    }
  
    function enqueue() {
        wp_enqueue_style('customstyle',  PLUGIN_URL . 'assets/style.css' );
        wp_enqueue_script('customscript', PLUGIN_URL . 'assets/script.js' );
    }
}