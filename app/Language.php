<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends WorldModel
{
    /**
     * Scope a query to only include only languages in alphabetical order
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLanguages($query)
    {
        return $query->pluck('language')->sort();
    }
}
