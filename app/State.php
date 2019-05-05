<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\ WorldModel;

class State extends WorldModel
{
    
    /**
     * Get the country that owns the state.
     */
     
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }
    
    /**
     * Get the cities belongong to state.
     */
     
    public function cities()
    {
        return $this->hasMany('App\City');
    }
    
}
