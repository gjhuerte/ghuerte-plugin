<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package  GhuertePlugin
 */

 /**
  * check if uninstall.php is accessed not via the plugin itself
  * if the file is triggered outside the plugin itself
  */
 if( ! defined( 'WP_UNINSTALL_PLUGIN') ) {
     die;
 }

 /**
  * Clear Database stored data
  * name must be identical to registered post type 
  * on the custom post type function
  */
  $books = get_posts( [
      'post_type' => 'book',
      'numberposts' => -1,
  ] );

  foreach( $books as $book ) {

    /**
     * parameter 1 - post id
     * parameter 2 - force delete
     */
      wp_delete_post( $book->ID, true);
  }

// Option 2:
// Access the database via SQL
// global $wpdb;
// $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
// $wpdb->query('DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)');
// $wpdb->query('DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)');