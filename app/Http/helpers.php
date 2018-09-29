<?php

/**
 * Get the JSON of an URL
 *
 * @param String URL
 *
 * @return Array JSON transformed to a PHP array
 **/
if (! function_exists('getJSON')) {
    function getJSON($url) {
        return $marketDrivers = json_decode( file_get_contents($url), true );
    }
}

/**
 * Load a driver
 *
 * @param String Driver's name
 *
 * @return Driver
 */
if (! function_exists('getDriver')) {
    function getDriver($name) {
        include_once( storage_path('app/public/drivers/'. $name .'.php') );
        return new $name();
    }
}

/**
 * Get installed drivers list
 *
 * @return Array Drivers list
 **/
if (! function_exists('getDrivers')) {
    function getDrivers() {
        $driversList = Storage::files('drivers/');
        $drivers = array();

        foreach( $driversList as $driver ) {
            $name = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace('drivers/', '', $driver) );
            $drivers[] = getDriver($name);
        }

        return $drivers;
    }
}
