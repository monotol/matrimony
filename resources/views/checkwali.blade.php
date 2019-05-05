@extends('layouts.app')

@section('style')
@include('styles.register')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Waliyy /Wakeel</div>
                <div class="panel-heading">Do you have a waliyy/wakeel?</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/gender/wali">
                        {{ csrf_field() }}
                        
                         <div class="form-group">
                            <label for="waliyy_wakeel" class="col-md-4 control-label">Do you have a waliyy (guardian) or wakeel?</label>

                            <div class="col-md-6">

                                <select id="waliyy_wakeel" class="form-control" name="waliyy_wakeel" required>
                                    
                                    <option value="" disabled>Choose "Yes" or "No"</option>
                                    <option value="true">Yes</option>
                                    <option value="false" id="no_waliyy">No</option>
                                    
                                </select>
                                
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