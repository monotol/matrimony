@extends('layouts.app')

@section('style')
@include('styles.register')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-heading">Please fill out the form below. All fields marked with (*) are required. <br/> Please note that the marriage service is currently for residents of England only.</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        
@includewhen(request()->session()->get('gender') == 'male','auth.register')
@includewhen(request()->session()->get('gender') == 'female', 'auth.femaleregister')

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name*</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name*</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" placeholder="" value="{{ old('last_name') }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                            <label for="middle_name" class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control" name="middle_name" placeholder="" value="{{ old('middle_name') }}" required>

                                @if ($errors->has('middle_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label for="date_of_birth" class="col-md-4 control-label">Date of Birth*</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required>

                                @if ($errors->has('date_of_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('racial_group') ? ' has-error' : '' }}">
                            <label for="racial_group" class="col-md-4 control-label">Racial Group*</label>

                            <div class="col-md-6">

                                <select id="racial_group" class="form-control" name="racial_group" required>
                                    abort_unless($racial_groups)    {{-- main collection --}}
                                    
                                    <option value="">Please Choose a Race</option>
                                        @foreach ($racial_groups->keys() as $racial_group)  {{-- first get keys as a collection and iterate over it to get the optgroup headings --}}
                                            <optgroup label="{{$racial_group}}">
                                               @foreach ($racial_groups->get($racial_group) as $group) {{-- then use each key to get its corresponding value (a collection) from the main collection
                                                                                                             and iterate over each collection to get the option values --}}
                                                    <option @if (old('racial_group') == $group) selected @endif value="{{$group}}" >{{$group}}
                                                    </option> 
                                               @endforeach    
                                            </optgroup>
                                            
                                        @endforeach

                                </select>

                                @if ($errors->has('racial_group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('racial_group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ethnicity') ? ' has-error' : '' }}">
                            <label for="ethnicity" class="col-md-4 control-label">Ethnicity*</label>

                            <div class="col-md-6">

                                <select id="ethnicity" class="form-control" name="ethnicity" required>
                                    abort_unless($ethnicities)
                                    
                                     <option value="">Please Choose an Ethnicity</option>
                                    
                                        @foreach ($ethnicities as $ethnicity)

                                            <option @if (old('ethnicity') == $ethnicity) selected @endif value="{{$ethnicity}}" >{{$ethnicity}}</option>
                                        @endforeach

                                </select>

                                @if ($errors->has('ethnicity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ethnicity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                            <label for="nationality" class="col-md-4 control-label">Nationality*</label>

                            <div class="col-md-6">

                                <select id="nationality" class="form-control" name="nationality[]" multiple required>
                                    <option disabled>Choose more options by holding down Ctrl</option>
                                    <option disabled>and then clicking</option>
                                   abort_unless($nationalities)
            
                                         @foreach ($nationalities as $nationality)

                                            <option @if (old('nationality'))
                                                          @if(in_array($nationality, old('nationality'))) selected @endif 
                                                    @endif      
                                                          value="{{$nationality}}" >
                                                {{$nationality}}
                                            </option>
                                        @endforeach

                                </select>

                                @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country_of_origin') ? ' has-error' : '' }}">
                            <label for="country_of_origin" class="col-md-4 control-label">Country of Origin*</label>

                            <div class="col-md-6">

                                <select id="country_of_origin" class="form-control" name="country_of_origin" required>
                                    {{--abort_unless(Countries::getList('en'), 403)--}}
                                    
                                     <option value="">Please Choose a Country </option>
                                    
                                    @foreach (Countries::getList('en') as $country)

                                        <option @if (old('country_of_origin') == $country) selected @endif value="{{$country}}" >{{$country}}</option>
                                    @endforeach     

                                </select>

                                @if ($errors->has('country_of_origin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_of_origin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                            <label for="language" class="col-md-4 control-label">Which Language(s) Do You Speak Fluently?*</label>

                            <div class="col-md-6">

                                <select id="language" class="form-control" name="language[]" multiple required>
                                    <option disabled>Choose more options by holding down Ctrl</option>
                                    <option disabled>and then clicking</option>
                                   abort_unless($languages)    
                                        @foreach ($languages as $language)

                                            <option @if (old('language'))
                                                          @if(in_array($language, old('language'))) selected @endif 
                                                    @endif      
                                                          value="{{$language}}" >
                                                {{$language}}
                                            </option>
                                        @endforeach

                                </select>

                                @if ($errors->has('language'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       

                        <div class="form-group{{ $errors->has('town_of_residence') ? ' has-error' : '' }}">
                            <label for="town_of_residence" class="col-md-4 control-label">Town of Residence*</label>

                            <div class="col-md-6" title="Please select the town where you live">

                                <select id="town_of_residence" class="form-control" name="town_of_residence" required>
                                    <option value="" >Please select a town</option>
                                    {{abort_unless($townNames, 403)}}
                                    @foreach ($townNames as $townName)

                                        <option @if (old('town_of_residence') == $townName) selected @endif value="{{$townName}}" >{{$townName}}</option>
                                    @endforeach     

                                </select>

                                @if ($errors->has('town_of_residence'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('town_of_residence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                         {{--<div class="form-group{{ $errors->has('country_of_residence') ? ' has-error' : '' }}">
                            <label for="country_of_residence" class="col-md-4 control-label">Country of Residence</label>

                            <div class="col-md-6" title="Please select the country where you live">

                                <select id="country_of_residence" class="form-control" name="country_of_residence" required>
                                    <option value="" >Please select a country</option>
                                    {{abort_unless($countryNames, 403)}}
                                    @foreach ($countryNames as $countryName)

                                        <option @if (old('country_of_residence') == $countryName) selected @endif value="{{$countryName}}" >{{$countryName}}</option>
                                    @endforeach     

                                </select>

                                @if ($errors->has('country_of_residence'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_of_residence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       <div class="form-group{{ $errors->has('state_of_residence') ? ' has-error' : '' }}" id="state_of_residence">
                           <label id="state_label" for="state_of_residence" class="col-md-4 control-label" hidden>State of Residence</label>
                           
                            <div class="col-md-6" title="Please select the state where you live">
                                
                              <select style="display: none;" id="states" class="form-control states" name="state_of_residence" required>
                                  
                                  
                                  
                              </select>

                              @if ($errors->has('state_of_residence'))
                              <span class="help-block">
                              <strong>{{ $errors->first('state_of_residence') }}</strong>
                              </span>
                              @endif
                           </div>      
        
                       </div>

                       <div class="form-group{{ $errors->has('town_of_residence') ? ' has-error' : '' }}" id="town_of_residence">
    
                       </div>--}}
                        
                        
                         <div class="form-group{{ $errors->has('number_of_children') ? ' has-error' : '' }}">
                            <label for="number_of_children" class="col-md-4 control-label">Number of Children*</label>

                            <div class="col-md-6">
                                <input id="number_of_children" min="0" type="number" class="form-control" name="number_of_children" placeholder="The number of children you have" value="{{ old('number_of_children') }}" required>

                                @if ($errors->has('number_of_children'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_children') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label for="education" class="col-md-4 control-label">Education*</label>

                            <div class="col-md-6">

                                <select id="education" class="form-control" name="education" required>
                                    
                                    <option value="">Choose an option</option>
                                    <option value="Doctoral" @if(old('education') == 'Doctoral') selected @endif>Doctoral Degree</option>
                                    <option value="Masters" @if(old('education') == 'Masters') selected @endif>Masters Degree</option>
                                    <option value="Honours" @if(old('education') == 'Honours') selected @endif>Bachelor's Degree with Honours</option>
                                    <option value="No Honours" @if(old('education') == 'No Honours') selected @endif>Bachelor's Degree without Honours</option>
                                    <option value="HND" @if(old('education') == 'HND') selected @endif>Higher National Diploma</option>
                                    <option value="HNC" @if(old('education') == 'HNC') selected @endif >Higher National Certificate</option>
                                    <option value="A Level" @if(old('education') == 'A Level') selected @endif>A Level</option>
                                    <option value="AS Level" @if(old('education') == 'AS Level') selected @endif>AS Level</option>
                                    <option value="NVQ" @if(old('education') == 'NVQ') selected @endif>NVQs</option>
                                    <option value="GCSE" @if(old('education') == 'GCSE') selected @endif>GCSEs</option>
                                    <option value="Skills for Life" @if(old('education') == 'Skills for Life') selected @endif>Skills for Life</option>
                                    

                                </select>

                                @if ($errors->has('education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('employment') ? ' has-error' : '' }}">
                            <label for="employment" class="col-md-4 control-label">Current Employment Status*</label>

                            <div class="col-md-6">

                                <select id="employment" class="form-control" name="employment" required>
                                    
                                    <option value="">Choose an option</option>
                                    <option value="Student" @if(old('employment') == 'Student') selected @endif>Student</option>
                                    <option value="Employed" @if(old('employment') == 'Employed') selected @endif>Employed</option>
                                    <option value="Self-Employed" @if(old('employment') == 'Self-Employed') selected @endif>Self Employed</option>
                                    <option value="Unemployed" @if(old('employment') == 'Unemployed') selected @endif>Unemployed</option>
                                    <option value="Retired" @if(old('employment') == 'Retired') selected @endif>Retired</option>

                                </select>

                                @if ($errors->has('employment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                            <label for="height" class="col-md-4 control-label">Height*</label>

                            <div class="col-md-6">
                                <input id="height" type="number" min="90" max="300" step="1" class="form-control" name="height" placeholder="Height in cm" value="{{ old('height') }}" required>

                                @if ($errors->has('height'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       <div class="form-group{{ $errors->has('revert') ? ' has-error' : '' }}">
                            <label for="revert" title="A revert is a previous non-muslim who entered Islaam" class="col-md-4 control-label">Are you a revert?*</label>

                            <div class="col-md-6">

                                <select id="revert" class="form-control" name="revert" required>
                                    
                                    <option value="">Choose "Yes" or "No"</option>
                                    <option id="revert_no" value="0" @if(old('revert') == '0') selected @endif>No</option>
                                    <option value="1" @if(old('revert') == '1') selected @endif>Yes</option>
                                    

                                </select>

                                @if ($errors->has('revert'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('revert') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('reversion_date') ? ' has-error' : '' }}">
                            <label for="reversion_date" class="col-md-4 control-label">When (approximately) did you revert to Islaam? (Required if you chose "yes" above)</label>

                            <div class="col-md-6">
                                <input id="reversion_date" type="date" class="form-control" name="reversion_date" value="{{ old('reversion_date') }}">

                                @if ($errors->has('reversion_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reversion_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('own_accomodation') ? ' has-error' : '' }}">
                            <label for="own_accomodation" class="col-md-4 control-label">Do you have your own accomodation?*</label>

                            <div class="col-md-6">

                                <select id="own_accomodation" class="form-control" name="own_accomodation" required>
                                    
                                    <option value="">Choose "Yes" or "No"</option>
                                    <option value="1" @if(old('own_accomodation') == '1') selected @endif>Yes</option>
                                    <option value="0" @if(old('own_accomodation') == '0') selected @endif>No</option>
                                    
                                </select>

                                @if ($errors->has('own_accomodation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('own_accomodation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('disabled') ? ' has-error' : '' }}">
                            <label for="disabled" class="col-md-4 control-label">Do you have any disabilities?*</label>

                            <div class="col-md-6">

                                <select id="disabled" class="form-control" name="disabled" required>
                                    
                                    <option value="">Choose "Yes" or "No"</option>
                                    <option id="disabled_no" value="0" @if(old('disabled') == '0') selected @endif>No</option>
                                    <option value="1" @if(old('disabled') == '1') selected @endif>Yes</option>
                                    
                                </select>

                                @if ($errors->has('disabled'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('disabled') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('disability') ? ' has-error' : '' }}">
                            <label for="disability" class="col-md-4 control-label">What is the nature of your disability? (Required if you chose "yes" above)</label>

                            <div class="col-md-6">
                                <input id="disability" type="text" class="form-control" name="disability" value="{{ old('disability') }}">

                                @if ($errors->has('disability'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('disability') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   
                        <div class="form-group{{ $errors->has('polygnous') ? ' has-error' : '' }}">
                            <label for="polygamous" class="col-md-4 control-label">Would you be interested in polygny?*</label>

                            <div class="col-md-6">

                                <select id="polygnous" class="form-control" name="polygnous" required>
                                    
                                    <option value="">Choose "Yes" or "No"</option>
                                    <option value="1" @if(old('polygnous') == '1') selected @endif>Yes</option>
                                    <option value="0" @if(old('polygnous') == '0') selected @endif>No</option>
                                    
                                </select>

                                @if ($errors->has('polygnous'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('polygnous') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('more_info') ? ' has-error' : '' }}">
                            <label for="more_info" class="col-md-4 control-label">Additional Information</label>

                            <div class="col-md-6">
                                <textarea id="more_info" class="form-control" name="more_info" placeholder="Give any more information about yourself that you feel is crucial or relevant" >{{ old('more_info') }}</textarea>    

                                @if ($errors->has('more_info'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('more_info') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password*</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary submit-btn btn-block">
                                    Register
                                </button>
               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
 