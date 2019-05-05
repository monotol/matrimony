<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenderWaliController extends Controller
{
    public function getGender(Request $request) 
    {
        if($request->gender == 'male') {
            $request->flash();                //save to session
            session(['gender' => 'male']);
            return redirect('/register');
        }
        
        elseif($request->gender == 'female') {
            $request->flash();
            return redirect()->action('GenderWaliController@getWali', $request);
        }
        
        else {
            return view('checkgender');
        }
    }
    
    public function getWali(Request $request) 
    {
        if($request->waliyy_wakeel === 'true') {
           //$request->gender = 'female';
            $request->flash();
           //return response($request->old('gender'));
            session(['gender' => 'female', 'waliyy_wakeel' => 'true']);
            return redirect('/register');
        }
        
        elseif($request->waliyy_wakeel === 'false') {
            return redirect('/')->with('walimessage', 'Please get yourself a waliyy or wakeel and then come back and register. Thanks!');
            //return redirect('/');
        }
        
        return view('checkwali');
    }
    
    
}
