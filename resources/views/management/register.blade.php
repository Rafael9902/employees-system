<div class="main">

    <div class="container">
        <div class="signup-content">
            <div class="signup-img">
                <img src="images/form-img.jpg" alt="">
                <div class="signup-img-content">
                    <h2>Register now </h2>
                    <p>while seats are available !</p>
                </div>
            </div>
            <div class="signup-form">
                <form action="{{url('/save')}}" method="post" class="register-form">
                    <input id="id" type="hidden" name="id" value="0">
                    {{csrf_field()}}

                    <div class="form-row">
                        <div class="form-group">

                            <div class="form-input">
                                <label for="first_name" class="required">{{__("First Last Name")}}</label>
                                <input type="text" id="first_last_name" name="first_last_name" class="input_name"
                                       value="{{!empty($employee) ? $employee->first_last_name : ''}}" maxlength="20" required>
                            </div>

                            <div class="form-input">
                                <label for="second_last_name">{{__("Second Last Name")}}</label>
                                <input type="text" id="second_last_name" name="second_last_name"
                                       value="{{!empty($employee) ? $employee->second_last_name : ''}}" class="input_name" maxlength="20">
                            </div>

                            <div class="form-input">
                                <label for="first_name" class="required">{{__("First Name")}}</label>
                                <input type="text" id="first_name" name="first_name" class="input_name"
                                       value="{{!empty($employee) ? $employee->first_name : ''}}" maxlength="20">
                            </div>

                            <div class="form-input">
                                <label for="other_names" >{{__("Other Names")}}</label>
                                <input type="text" id="other_names" name="other_names" class="input_name"
                                       value="{{!empty($employee) ? $employee->other_names : ''}}" maxlength="50">
                            </div>

                        </div>

                        <div class="form-group">

                        <div class="form-select">
                            <div class="label-flex">
                                <label for="employment_country">{{ __('Employment Country') }}</label>
                            </div>
                            <div class="select-list">
                                <select class="select-field" name="employment_country" id="employment_country">
                                    <option value="">{{ __('Select a Country') }}</option>
                                    @foreach ($countries as $c)
                                        <option {{!empty($employee) && $employee->employment_country == $c->id ? 'selected' : ''}}
                                                value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-select">
                            <div class="label-flex">
                                <label for="employment_country">{{ __('Identification Type') }}</label>
                            </div>
                            <div class="select-list">
                                <select name="document_type_id" id="document_type_id">
                                    <option value="">{{__('Select a Identification Type') }}</option>
                                    @foreach ($document_types as $t)
                                        <option {{!empty($employee) && $employee->document_type_id == $t->id ? 'selected' : ''}}
                                            value="{{$t->id}}">{{$t->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="number_document" class="required">{{__("Identification Number")}}</label>
                            <input type="text" id="number_document" name="number_document"
                                   value="{{!empty($employee) ? $employee->number_document : ''}}" maxlength="20">
                        </div>

                        <div class="form-input">
                            <label for="entry_date" class="required">{{__("Entry Date")}}</label>
                            <input type="date" id="entry_date" name="entry_date" value="{{!empty($employee) ? $employee->entry_date : ''}}"
                            {{!empty($employee) ? 'readonly': ''}}>
                        </div>
                        </div>
                    </div>

                    <div class="form-select">
                        <div class="label-flex">
                            <label for="employment_country">{{ __('Area') }}</label>
                        </div>
                        <div class="select-list">
                            <select name="area_id" id="area_id">
                                <option value="">{{__('Select an Area') }}</option>
                                @foreach ($areas as $a)
                                    <option {{!empty($employee) && $employee->area_id == $a->id ? 'selected' : ''}}
                                        value="{{$a->id}}">{{$a->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-submit">
                        <input type="submit" value="{{__('Save')}}" class="submit" id="submit" name="submit" />
                        <input type="button" value="{{__('Cancel')}}" class="submit" id="cancel" name="reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
