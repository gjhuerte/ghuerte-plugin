<?php

/**
 * @package GhuertePlugin
 */

 class GhuertePluginActivate
 {
     public static function activate() {
         flush_rewrite_rules();
     }
 }