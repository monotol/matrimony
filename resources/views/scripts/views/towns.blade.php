
    <label for="town_of_residence" class="col-md-4 control-label">Town of Residence</label>

    <div class="col-md-6" title="Please select the town where you live">

        <select id="town_of_residence" class="form-control" name="town_of_residence" required>
            {{abort_unless($towns, 403)}}
            
            @foreach ($towns as $town)

                <option @if (old('town_of_residence')) == {{$town->name}} selected @endif value="{{$town->name}}" id="{{$town->id}}" >{{$town->name}}</option>
            @endforeach    

        </select>

        @if ($errors->has('town_of_residence'))
            <span class="help-block">
                 <strong>{{ $errors->first('town_of_residence') }}</strong>
            </span>
        @endif
    </div>
