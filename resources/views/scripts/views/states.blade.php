           {{--abort_unless($states, 403)--}}
            
            <option value="">Please select a state</option>
            @foreach ($states as $state)

                <option @if (old('state_of_residence')) == {{$state->name}} selected @endif value="{{$state->name}}" id="{{$state->id}}" >{{$state->name}}</option>
            @endforeach    

        
  
