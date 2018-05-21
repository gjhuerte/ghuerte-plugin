<?php

/**
 * @package GhuertePlugin
 */

 class GhuertePluginDeactivate
 {
     public static function deactivate() {
         flush_rewrite_rules();
     }
 }