@extends('layouts.app')

@section('title')
<title>'Daar us Sunnah Matrimonial Service - Doing it by the Sunnah'</title>
@endsection

@section('style')
@include('styles.frontpage')
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-offset-1">

<h1 class="panel-heading">Welcome to the Daar us Sunnah Matrimonial Service</h1>

</<div>
    </div>
        </<div>
            
<div class="jumbotron text-center">
  <p>search for potential partners</p> 
  <form>
    <div class="form-group">
      <input type="email" class="form-control pad-search" size="50" placeholder="Search by age, nationality or city" required autofocus>
      </div>
      <div class="form-group">
        
          <button type="button" class="btn btn-block submit-btn"> <span class="glyphicon  glyphicon-search"> </button>
    </div>
    
  </form>
  
  @if (session('walimessage'))
    <div class="alert alert-success">
        {{ session('walimessage') }}
    </div>
@endif
</div>            

@endsection