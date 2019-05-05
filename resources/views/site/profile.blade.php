@extends('layouts.app')

@section('style')
@include('styles.register')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hello {{$user->first_name}} {{$user->last_name}}! Welcome to your personal profile on the DUS Matrimonial site</div>
                <div class="panel-heading">Your last successful login was  </div>
                <div class="panel-body">
                    {{--<ul class="nav nav-tabs">
                      <li role="presentation" class="active"><a href="#">My Account</a></li>
                      <li role="presentation"><a href="#">Questions</a></li>
                      <li role="presentation"><a href="#">Messages</a></li>
                      <li role="presentation"><a href="#">Statistics</a></li>
                   </ul>--}}
                   <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">My Account</a></li>
                    <li><a data-toggle="tab" href="#menu1">Questions</a></li>
                    <li><a data-toggle="tab" href="#menu2">Messages</a></li>
                    <li><a data-toggle="tab" href="#menu3">Statistics</a></li>
                  </ul>

                 <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                       <ul class="list-group">
                        <li class="list-group-item">First Name: {{$user->first_name}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Middle Name: {{$user->middle_name}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Last Name: {{$user->last_name}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Age: {{$user->date_of_birth->diffForHumans(null, true)}} old <span class="badge">edit</span></li>
                        <li class="list-group-item">Gender: {{$user->gender}} <span class="badge">edit</span></li>
                        @if($user->gender == 'female')
                        <li class="list-group-item">Waliyy/Wakeel's Name: {{$user->waliyy_wakeel_name}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Waliyy/Wakeel's Phone Number: {{$user->waliyy_wakeel_phone}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Waliyy/Wakeel's Relationship to You: {{$user->waliyy_wakeel_relationship}} <span class="badge">edit</span></li>
                        @endif
                        <li class="list-group-item">Racial Grouping: {{$user->racial_group}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Ethnicity: {{$user->ethnicity}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Nationality: @foreach ($user->nationality as $nationality) {{$nationality}}@if ($loop->iteration != $loop->count), @endif @endforeach <span class="badge">edit</span></li>
                        <li class="list-group-item">Country of Origin: {{$user->country_of_origin}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Languages You are Fluent in: @foreach ($user->language as $language) {{$language}}@if ($loop->iteration != $loop->count), @endif @endforeach <span class="badge">edit</span></li>
                        <li class="list-group-item">Town of Residence: {{$user->town_of_residence}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Number of Children: {{$user->number_of_children}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Marital Status: {{$user->marital_status}} <span class="badge">edit</span></li>
                        @if($user->gender == 'male')
                        <li class="list-group-item">Number of Wives: {{$user->number_of_wives}} <span class="badge">edit</span></li>
                        @endif
                        <li class="list-group-item">Education: {{$user->education}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Employment Status: {{$user->employment}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Height: {{$user->height}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Revert?: @if($user->revert)Yes @else No, has always been a Muslim @endif <span class="badge">edit</span></li>
                        @if($user->revert)
                        <li class="list-group-item">Reversion date: {{$user->reversion_date}} <span class="badge">edit</span></li>
                        @endif
                        <li class="list-group-item"> Has own accomodation?: @if($user->own_accomodation) Yes @else No @endif <span class="badge">edit</span></li>
                        <li class="list-group-item">Disabled?: @if($user->disabled) Yes @else No @endif <span class="badge">edit</span></li>
                        @if($user->disabled)
                        <li class="list-group-item">Type of Disability: {{$user->disability}} <span class="badge">edit</span></li>
                        @endif
                        <li class="list-group-item">Interested in Polygny?: @if($user->polygnous) Yes @else No @endif <span class="badge">edit</span></li>
                        <li class="list-group-item">Further details: {{$user->more_info}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Email address: {{$user->email}} <span class="badge">edit</span></li>
                        <li class="list-group-item">Password:    <span class="badge">Change Password</span></li>
                        
                        
                        
                        <li class="list-group-item">Warnings <span class="badge">3</span></li> 
                       </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>     

@endsection