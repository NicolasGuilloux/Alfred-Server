<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country', 'area', 'accuweather_id'
    ];


    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */

    public function reports() {
        return $this->hasMany('App\Report', 'city_id', 'id');
    }

    public function setAccuweatherIdAttribute($value='') {
        $this->attributes['accuweather_id'] = $value;

        $url = 'http://dataservice.accuweather.com/locations/v1/' . $this->accuweather_id . '?apikey=' . env('ACCUWHEATER_KEY');
        $data = json_decode(file_get_contents($url), true);

        $this->name = $data['LocalizedName'];
        $this->country = $data['Country']['LocalizedName'];
        $this->area = $data['AdministrativeArea']['LocalizedName'];

        $this->save;
    }


}
