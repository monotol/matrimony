
                           
                        
                        <input type="hidden" name="gender" value="male">
                        <input type="hidden" name="waliyy_wakeel" value="">
                        <input type="hidden" name="waliyy_wakeel_relationship" value="">
                        <input type="hidden" name="waliyy_wakeel_name" value="">
                        <input type="hidden" name="waliyy_wakeel_phone" value="">
                        

                        <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }}">
                            <label for="marital_status" class="col-md-4 control-label">Marital Status*</label>

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
                        
                        