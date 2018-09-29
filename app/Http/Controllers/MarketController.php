<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

class MarketController extends Controller
{
    public function getDrivers() {
        $driversList = Storage::files('drivers');
        $drivers = array();

        foreach( $driversList as $driver ) {
            $name = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace('drivers/', '', $driver) );

            include_once( storage_path('app/drivers/'. $name .'.php') );
            $addon = new $name();
            $addon->driverName =
            $drivers[] = new $name();
        }

        return response()->json($drivers);
    }

    /**
     * Return the source code of a driver
     *
     * @param String Driver's name
     *
     * @return String Source code of the driver
     */
    public function getDriverSource($name) {
        $driverSource = Storage::get('drivers/' . $name . '.php');
        return $driverSource;
    }
}
