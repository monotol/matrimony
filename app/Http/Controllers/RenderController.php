<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;

class RenderController extends Controller
{
    public function renderState(Request $request) 
        {
            $_country = $request->input('country');
            $country = Country::where('name', $_country)->first();
            $country_id = $country->id;
            $states = Country::find($country_id)->states;
            return view('scripts.views.states', ['states' => $states]); 
            //session(['states' => $states]);
            //$request->session()->flush();
            //$request->session()->flash('states', $states);
            //return $_country;

        }
        
    public function renderTown(Request $request)
        {
            $_state = $request->input('state'); //get state name from request
            $state = State::where('name', $_state)->first(); //use state name to get record from db
            $state_id = $state->id; //retriev state id
            $towns = State::find($state_id)->cities; // retrieve all towns for state
            if($towns->toArray()) {
                return view('scripts.views.towns', ['towns' => $towns]);
            }
            
            return;
        }
        
        
}
