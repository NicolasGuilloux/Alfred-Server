<?php

use Illuminate\Database\Seeder;

use App\City;
use App\Report;

class DatabaseSeeder extends Seeder
{

    /**
     * Create a city entry in the database
     *
     * @param Int AccuWeather ID
     */
    private function createCity($id) {
        $city = new City;
        $city->accuweather_id = $id;
        $city->save();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $ids = [207931, 132541, 349727, 308526, 178087, 328328, 242560];

        foreach($ids as $id) {
            $this->createCity($id);
        }

        // Start date
    	$date = '2018-01-01';

    	while (strtotime($date) <= strtotime("now")) {

            $cities = City::all();

            foreach($cities as $city) {
                // Report
                Report::insert([
                    "city_id" => $city->id,
                    "date" => $date,
                    "electric" => rand(200, 300),
                    "waste" => rand(1, 100)/100,
                    "water" => rand(20, 200),
                    "samples" => rand(300, 15000)
                ]);
            }

            $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
    	}
    }
}
