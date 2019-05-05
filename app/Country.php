<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\WorldModel;

class Country extends WorldModel
{
   
    /**
     * Scope a query to only include only country names
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCountryName($query)
    {
        return $query->pluck('name');
    } 
    
   /**
    * Get the states for the country.
    */    
    
   public function states()
   {
     return $this->hasMany('App\State');    
   }
   
}
