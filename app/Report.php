<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id', 'date', 'electric', 'waste', 'water', 'samples'
    ];

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */

    public function city() {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    /*
    |------------------------------------------------------------------------------------
    | Methods
    |------------------------------------------------------------------------------------
    */

    public function addSample($elec, $waste, $water, $sample = 1) {
        // Electricity
        $this->electric = ( ($this->electric * $this->samples) + $elec ) / ($this->samples +1);

        // Waste
        $this->waste = ( ($this->waste * $this->samples) + $waste ) / ($this->samples +1);

        // Water
        $this->water = ( ($this->water * $this->samples) + $water ) / ($this->samples +1);

        // Samples
        $this->samples += $sample;
    }
}
