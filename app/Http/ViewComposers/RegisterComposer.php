<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Nationality;
use App\Ethnicity;
use App\Race;
use App\Country;
use App\Town;
use App\Language;
use Illuminate\Http\Request; 
use Illuminate\Validation\Rule;

class RegisterComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    //protected $users;

    /**
     * Create a new register composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        //$this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('nationalities', Nationality::nationalityCollection());
        $view->with('ethnicities', Ethnicity::ethnicityCollection());
        $view->with('racial_groups', Race::raceCollection());
        $view->with('countryNames', Country::countryName());
        $view->with('townNames', Town::townName());
        $view->with('languages', Language::languages());
        
    }
}