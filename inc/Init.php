<?php

/**
 * @package GhuertePlugin
 */
namespace Inc;

/**
 * Add Initialization Action for custom post type function
 * flush_rewrite_rules() - refresh stuff and check newly created
 * 
 * [ visibility ] [ static or not ] [ function_name ]
 * 
 * public - accessible anywhere, default
 * private - accessible within the class itself not extends nor instance
 * protected - only within the class itself and the class that extends
 * it but not the instance class
 * 
 * static - if u dont want to initialize the class and if the process is 
 * only used once
* final - cannot be inherited
*/
final class Init
{
    /**
    * Store all the classes inside an array
    * @return array Full list of classes
    */
    public static function get_services() 
    {

        /**
         * return the entire class
         */
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }

    /**
     * Loop through the classes, initialize them, 
     * and call the register() method if it exists
     *
     * @return void
     */
    public static function register_services() 
    {
        foreach( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     *
     * @param [type] $class class from the services array
     * @return class instance new instance of the class 
     */
    private static function instantiate( $class ) 
    {
        $service = new $class();
        return $service;
    }
}