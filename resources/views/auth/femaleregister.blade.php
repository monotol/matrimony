
                        
                        <input type="hidden" name="gender" value="female">
                        <input type="hidden" name="waliyy_wakeel" value=1>
                        <input type="hidden" name="number_of_wives" value="">
                        
                        <div class="form-group{{ $errors->has('waliyy_wakeel_relationship') ? ' has-error' : '' }}">
                            <label for="waliyy_wakeel_relationship" class="col-md-4 control-label">What is your relationship to your waliyy/wakeel?*</label>

                            <div class="col-md-6">
                                <input id="waliyy_wakeel_relationship" type="text" class="form-control" name="waliyy_wakeel_relationship" placeholder="How are you and your waliyy/wakeel are related?" value="{{ old('waliyy_wakeel_relationship') }}" required>

                                @if ($errors->has('waliyy_wakeel_relationship'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('waliyy_wakeel_relationship') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('waliyy_wakeel_name') ? ' has-error' : '' }}">
                            <label for="waliyy_wakeel_name" class="col-md-4 control-label">Waliyy/Wakeel's Name*</label>

                            <div class="col-md-6">
                                <input id="waliyy_wakeel_name" type="text" class="form-control" name="waliyy_wakeel_name" placeholder="`Umar" value="{{ old('waliyy_wakeel_name') }}" required>

                                @if ($errors->has('waliyy_wakeel_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('waliyy_wakeel_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
                        <div class="form-group{{ $errors->has('waliyy_wakeel_phone') ? ' has-error' : '' }}">
                            <label for="waliyy_wakeel_phone" class="col-md-4 control-label">What is the phone number of your waliyy or wakeel?* (This will only be given out with your consent)</label>

                            <div class="col-md-6">
                                <input id="waliyy_wakeel_phone" type="tel" class="form-control" name="waliyy_wakeel_phone" placeholder="Waliyy/wakeel's Phone number" value="{{ old('waliyy_wakeel_phone') }}" required>

                                @if ($errors->has('waliyy_wakeel_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('waliyy_wakeel_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }}">
                            <label for="marital_status" class="col-md-4 control-label">Marital Status*</label>

                            <div class="col-md-6">

                                <select id="marital_status" class="form-control" name="marital_status" required>
                                    
                                    <option value="">Choose an option</option>
                                    <option value="Single" @if(old('marital_status') == 'Single') selected @endif>Single</option>
                                    <option value="Divorced" @if(old('marital_status') == 'Divorced') selected @endif>Divorced</option>
                                    <option value="Widow" @if(old('marital_status') == 'Widow') selected @endif>Widow</option>

                                </select>

                                @if ($errors->has('marital_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('marital_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        