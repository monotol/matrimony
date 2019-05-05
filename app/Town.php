<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends WorldModel
{
     /**
     * Scope a query to only include only town names
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTownName($query)
    {
        return $query->pluck('name');
    }
}
