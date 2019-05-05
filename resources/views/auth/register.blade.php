
                           
                        
                        <input type="hidden" name="gender" value="male">
                        <input type="hidden" name="waliyy_wakeel" value="">
                        <input type="hidden" name="waliyy_wakeel_relationship" value="">
                        <input type="hidden" name="waliyy_wakeel_name" value="">
                        <input type="hidden" name="waliyy_wakeel_phone" value="">
                        

<<<<<<< HEAD
                        <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }}">
                            <label for="marital_status" class="col-md-4 control-label">Marital Status*</label>
=======
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>

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
                                <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}" required>

                                @if ($errors->has('middle_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label for="date_of_birth" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" min="2001-01-01" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required>

                                @if ($errors->has('date_of_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-4 control-label">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" min="16" class="form-control" name="age" value="{{ old('age') }}" required>

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <label class="radio-inline"><input type="radio" name="gender" value="male" id="malegender" required checked>Male</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="female" id="femalegender" required>Female</label>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('racial_group') ? ' has-error' : '' }}">
                            <label for="racial_group" class="col-md-4 control-label">Racial Group</label>

                            <div class="col-md-6">

                                <select id="racial_group" class="form-control" name="racial_group" required>
                                    @isset($racial_groups)  {{-- main collection --}}  
                                        @foreach ($racial_groups->keys() as $racial_group)
                                            <optgroup label="{{$racial_group}}">  {{-- then use each key to get its corresponding value (a collection)   
                                                                                       from the main collection and iterate over each collection to get the option values --}}
                                               @foreach ($racial_groups->get($racial_group) as $group)
                                                    <option @if (old('racial_group')) == {{$group}} selected @endif value="{{$group}}" >{{$group}}
                                                    </option> 
                                               @endforeach    
                                            </optgroup>
                                            
                                        @endforeach
                                    @endisset         

                                </select>

                                @if ($errors->has('racial_group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('racial_group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ethnicity') ? ' has-error' : '' }}">
                            <label for="ethnicity" class="col-md-4 control-label">Ethnicity</label>

                            <div class="col-md-6">

                                <select id="ethnicity" class="form-control" name="ethnicity" required>
                                    @isset($ethnicities)
                                        @foreach ($ethnicities as $ethnicity)

                                            <option @if (old('ethnicity')) == {{$ethnicity}} selected @endif value="{{$ethnicity}}" >{{$ethnicity}}</option>
                                        @endforeach
                                    @endisset         

                                </select>

                                @if ($errors->has('ethnicity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ethnicity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                            <label for="nationality" class="col-md-4 control-label">Nationality</label>

                            <div class="col-md-6">

                                <select id="nationality" class="form-control" name="nationality" required>
                                    @isset($nationalities)    
                                        @foreach ($nationalities as $nationality)

                                            <option @if (old('nationality')) == {{$nationality}} selected @endif value="{{$nationality}}" >{{$nationality}}</option>
                                        @endforeach
                                    @endisset         

                                </select>

                                @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country_of_origin') ? ' has-error' : '' }}">
                            <label for="country_of_origin" class="col-md-4 control-label">Country of Origin</label>
>>>>>>> 5bb31ed550e91426f927e0308fab4605fa7aed83

                            <div class="col-md-6">

                                <select id="marital_status" class="form-control" name="marital_status" required>
                                    
                                    <option value="">Choose an option</option>
                                    <option value="Single" @if(old('marital_status') == 'Single') selected @endif>Single</option>
                                    <option value="Divorced" @if(old('marital_status') == 'Divorced') selected @endif>Divorced</option>
                                    <option value="Widower" @if(old('marital_status') == 'Widower') selected @endif>Widower</option>
                                    <option value="Married" id="married" @if(old('marital_status') == 'Married') selected @endif>Married</option>

                                </select>

                                @if ($errors->has('marital_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('marital_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('number_of_wives') ? ' has-error' : '' }}">
                            <label for="number_of_wives" class="col-md-4 control-label">Number of Wives if Married* (If you're not married please choose "0" or leave blank)</label>

                            <div class="col-md-6">
                                <input id="number_of_wives" min="0" max="3" type="number" class="form-control" name="number_of_wives" placeholder="The number of wives you already have" value="{{ old('number_of_wives') }}">

                                @if ($errors->has('number_of_wives'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_wives') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        