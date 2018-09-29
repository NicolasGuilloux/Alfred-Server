<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

use App\City;
use App\Report;

class MainController extends Controller
{
    /**
     * Home
     */
    public function index() {
        return view('index');
    }

    /**
     * Map
     */
    public function map() {
        return view('map');
    }

    /**
     * API
     */
    public function api() {
        return view('api');
    }

    /**
     * Get a list of dates where there are some data
     *
     * @param String (Optional) Specific country to check.
     *
     * @return JSONArray List of dates
     */
    public function getAvailableDates($country = false) {

        if( $country ) {
            $dates = array();
            $cities = City::where('country', 'LIKE', $country)->get();

            foreach($cities as $city) {
                $reports = $city->reports;
                foreach($reports as $report) {
                    $dates[] = $report->date;
                }
            }

            $dates = array_unique($dates);

        } else {
            $dates = Report::orderBy('date')->groupBy('date')->pluck('date');
        }

        return response()->json($dates);
    }

    /**
     * Get a list of countries where there are some data
     *
     * @param String (Optional) Specific date to check.
     *
     * @return JSONArray List of countries
     */
    public function getAvailableCountries($date = false) {
        $countries = array();

        if( $date )
            $reports = Report::where('date', '=', $date)->get();
        else
            $reports = Report::all();

        foreach($reports as $report) {
            $countries[] = $report->city->country;
        }

        $countries = array_unique($countries);

        return response()->json($countries);
    }

    /**
     * Get data based on the date
     *
     * @param String Date (aaaa-mm-dd)
     *
     * @return JSONObject Array of data
     */
    public function getDataByDate($date) {
        $reports = Report::where('date', '=', $date)->get();
        $data = array();

        // Format the report
        foreach($reports as $report) {
            $data[$report->city->country] = [
                "samples"   => $report->samples,
                "electric"  => $report->electric,
                "waste"     => $report->waste,
                "water"     => $report->water
            ];
        }

        return response()->json($data);
    }

    /**
     * Get data based on the country
     *
     * @param String Date (aaaa-mm-dd)
     *
     * @return JSONObject Array of data
     */
    public function getDataByCountry($country) {
        $cities = City::where('country', 'like', strtolower($country))->get();
        $reports = [];

        foreach($cities as $city) {
            foreach($city->reports as $report) {

                # If the date already exists, compute the average
                if( isset($reports[$report->date]) ) {
                    $reports[$report->date] = [
                        "samples"   => $report->samples + $reports[$report->date]["samples"],
                        "electric"  => (($reports[$report->date]["electric"] * $reports[$report->date]["samples"]) + $report->electric) / ($report->samples + $reports[$report->date]["samples"]),
                        "waste"     => (($reports[$report->date]["waste"] * $reports[$report->date]["samples"]) + $report->electric) / ($report->samples + $reports[$report->date]["samples"]),
                        "water"     => (($reports[$report->date]["water"] * $reports[$report->date]["samples"]) + $report->electric) / ($report->samples + $reports[$report->date]["samples"])
                    ];

                # If the date do not exist
                } else {
                    $reports[$report->date] = [
                        "samples"   => $report->samples,
                        "electric"  => $report->electric,
                        "waste"     => $report->waste,
                        "water"     => $report->water
                    ];
                }
            }
        }

        return response()->json($reports);
    }

    /**
     * Get notifications
     *
     * @return JSONArray Array of notifications
     */
    public function getNotifications() {
        $notif = json_decode( Storage::get('notifications.json') );

        return response()->json($notif);
    }
}
