<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\WorldModel;

class City extends WorldModel
{
    
   /**
     * Get the state that owns the city.
     */
     
    public function state()
    {
        return $this->belongsTo('App\State');
    }
    
}
