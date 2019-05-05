@extends('layouts.app')

@section('style')
@include('styles.register')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Choose Gender</div>
                <div class="panel-heading">What Gender are You?</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/gender">
                        {{ csrf_field() }}
                         <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <label class="radio-inline"><input type="radio" name="gender" value="male" id="malegender" required checked>Male</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="female" id="femalegender" required>Female</label>

                            </div>
                        </div>
                        
                       <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary submit-btn btn-block">
                                    Next
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