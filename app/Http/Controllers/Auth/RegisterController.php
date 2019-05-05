<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Nationality;
use App\Ethnicity;
use App\Race;
use App\Country;
use App\Town;
use App\Language;
use Illuminate\Http\Request; 
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
    /**
     * data to be passed to views
     * 
     * @var array
     */
    private $data = []; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('gender');
        $this->middleware('wali');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       //dd(request());
       /*$request = request();
       if ($data['revert'] == 0 ) {
           unset($data['reversion_date']);
       }
       
       if($data['marital_status'] != 'Married') {
           unset($data['number_of_wives']);
       }*/
        $messages = [
            'first_name.regex' => 'Names may contain only letters and dashes with no spaces',
            'last_name.regex' => 'Names may contain only letters and dashes with no spaces',
            'middle_name.regex' => 'Names may contain only letters and dashes with no spaces',
            'date_of_birth.before_or_equal' => 'You must be at least 16 years of age',
            'waliyy_wakeel_phone.regex' => 'Please enter a valid phone number',
            'waliyy_wakeel_name.regex' => 'Names may contain only letters and dashes with no spaces',
            'waliyy_wakeel_relationship.regex' => 'Please enter the relationship between you and your wakeel',
            'number_of_wives.min' => 'If you are married you must have at least 1 wife!',
            'number_of_wives.size' => 'If you are married, please choose "Married" in the question above, otherwise please choose "0" for this question or leave blank',
            'reversion_date.size' => 'If you are a revert, please choose "Yes" in the question above, otherwise please leave this box blank',
            'reversion_date.required' => 'Please give the approximate date that you reverted to Islaam',
            'disability.required'  => 'Please give your specific disability',
            'disability.size' => 'If you are disabled please choose "Yes" in the box above, otherwise please leave this box blank',
            'disability.regex' => 'Please give your specific disability',
        ];
        
        $rules = [
            'first_name' => 'required|regex:/^[A-Za-z\-]+$/|max:255',
            'last_name' => 'required|regex:/^[A-Za-z\-]+$/|max:255',
            'middle_name' => 'regex:/^[A-Za-z\-]+$/|max:255|nullable',
            'date_of_birth' => 'required|date|before_or_equal:16 years ago',
            //'age' => 'required|integer|min:16',
            //'gender' => ['required', Rule::in(['male', 'female']),],
            //'waliyy_wakeel' => 'sometimes|required|boolean',
            'racial_group' => ['required', Rule::in(Race::raceCollection()->collapse()->all()),],
            'ethnicity' => ['required', Rule::in($this->setViewData()['ethnicities']->all())],
            'nationality' => ['required','array', Rule::in($this->setViewData()['nationalities']->all())],
            'country_of_origin' => ['required', Rule::in($this->setViewData()['countries']->all()),],
            'language' => ['required', 'array', Rule::in($this->setViewData()['languages']->all()),],
            'town_of_residence' => ['required', Rule::in($this->setViewData()['towns']->all()),],
            'number_of_children' => 'required|numeric|min:0',
            //'number_of_dependent_children' => 'required|numeric|min:0',
            'marital_status' => ['required', Rule::in(['Single', 'Divorced', 'Widower', 'Widow', 'Married']),],
            //'number_of_wives' => 'sometimes|required_if:marital_status,Married|numeric|min:1|max:3',
            'education' => ['required', Rule::in(['Doctoral', 'Masters', 'Honours', 'No Honours', 'HND', 'HNC', 'A Level', 'AS Level', 'NVQ', 'GCSE', 'Skills for Life']),],
            'employment' => ['required', Rule::in(['Student', 'Employed', 'Self-Employed', 'Unemployed', 'Retired',]),],
            'height' => 'required|numeric|min:90',
            'revert' => 'required|boolean',
            //'reversion_date' => 'sometimes|required_if:revert,1|date',
            'own_accomodation' => 'required|boolean',
            'disabled' => 'required|boolean',
            'disability' => 'sometimes|required_if:disabled,1|max:255',
            'polygnous' => 'required|boolean',
            'more_info' => 'regex:/^[A-Za-z\s\d\W]*$/|nullable',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7|confirmed',
        ];
        
        if($data['marital_status'] != 'Married') {                      //if not married we don't want them to put any number of wives in the box
            $rules['number_of_wives'] = 'size:0|nullable';
        } elseif($data['marital_status'] == 'Married') {
            $rules['number_of_wives'] = 'required|numeric|min:1|max:3';  //if married 
        }
        
        if($data['revert'] == 1) {
            $rules['reversion_date'] = 'required|date'; //if a revert, must give date
        } else {
            $rules['reversion_date'] = 'date|nullable|size:0';  //if not must not give date, as date is pointless
        }
        
        if($data['disabled'] == 1) {
            $rules['disability'] = 'required|string|max:255|min:3|regex:/^[a-zA-Z-.,\s]{3,}[0-9]*/';  //if disabled, must specify
        } else {
            $rules['disability'] = 'size:0|nullable';  //not disabled do not specify any disability
        }
        
        if($data['gender'] == 'female') { //if the user is a female, add these rules
            $rules['waliyy_wakeel_relationship'] = 'required|regex:/^[A-Za-z\-\s]{3,}$/|max:255';
            $rules['waliyy_wakeel_name'] = 'required|regex:/^[A-Za-z\-]+$/|max:255';
            $rules['waliyy_wakeel_phone'] = 'required|regex:/^0[127][0-9]{8,9}$/';
        }
        
        return Validator::make($data, $rules, $messages);
    } 
    

    /**
     * Create a new user instance after a valid registration.
     *
     * 
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
       /* if($data['marital_status'] != 'Married') {  //extra precaution for these fields but not really necessary as validation will hopefully take care of it
            $data['number_of_wives'] = 0;
        }
        
        if($data['revert'] == 0) {
            $data['reversion_date'] = null;
        }
        
        if($data['disabled'] == 0) {
            $data['disability'] = null;
        }*/
        
        
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' =>$data['middle_name'],
            'date_of_birth' => $data['date_of_birth'],
            //'age' => $data['age'],
            'gender' => $data['gender'],
            'waliyy_wakeel' => $data['waliyy_wakeel'],
            'waliyy_wakeel_relationship' => $data['waliyy_wakeel_relationship'],
            'waliyy_wakeel_name' => $data['waliyy_wakeel_name'],
            'waliyy_wakeel_phone' => $data['waliyy_wakeel_phone'],
            'racial_group' => $data['racial_group'],
            'ethnicity' => $data['ethnicity'],
            'nationality' => serialize($data['nationality']),
            'country_of_origin' => $data['country_of_origin'],
            'language' => serialize($data['language']),
            'town_of_residence' => $data['town_of_residence'],
            'number_of_children' => $data['number_of_children'],
            //'number_of_dependent_children' => $data['number_of_dependent_children'],
            'marital_status' => $data['marital_status'],
            'number_of_wives' => $data['number_of_wives'],
            'education' => $data['education'],
            'employment' => $data['employment'],
            'height' => $data['height'],
            'revert' => $data['revert'],
            'reversion_date' => $data['reversion_date'],
            'own_accomodation' => $data['own_accomodation'],
            'disabled' => $data['disabled'],
            'disability' => $data['disability'],
            'polygnous' => $data['polygnous'],
            'more_info' => $data['more_info'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
   
   protected function setViewData()
   {
       $this->data = [    
                      'nationalities' => Nationality::nationalityCollection(),  
                      'ethnicities' => Ethnicity::ethnicityCollection(),
                      'racial_groups' => Race::raceCollection(),
                      'countries' => Country::countryName(),
                      'towns' => Town::townName(),
                      'languages' => Language::languages(),
                     ];
      return $this->data;                 
                     
   }
   

    public function showRegistrationForm(Request $request)
    {
       $viewData = $this->setViewData();
        
       /* if($request->old('gender') == 'female' || session('gender') == 'female') {
            return view('auth.femaleregister');
        }*/
        
        return view('auth.registergeneral');
    }
    
   

}    
