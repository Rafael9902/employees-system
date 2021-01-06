@include('template')
@include('management.js.registerJS')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <label for="">{{__("First last name")}}</label>
                <input type="text" class="form-control input_name" id="first_lastname" name="first_last_name" placeholder="{{__("First last name")}}" maxlength="20" required>

                <label for="">{{__("Second last name")}}</label>
                <input type="text" class="form-control input_name" id="second_lastname" name="second_last_name" placeholder="{{__("Second Last name")}}" maxlength="20">

                <label for="">{{__("First name")}}</label>
                <input type="text" class="form-control input_name" id="first_name" name="first_name" placeholder="{{__("First name")}}" maxlength="20" required>

                <label for="">{{__("Other names")}}</label>
                <input type="text" class="form-control input_name" id="other_names" name="other_names" placeholder="{{__("Other names")}}" maxlength="50">

                <select name="employment_country" id="employment_country" required>
                    <option value="">{{ __('Select a Country') }}</option>
                    @foreach ($countries as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>

                <select name="document_type_id" id="document_type_id" required>
                    <option value="">{{__('Select a type document') }}</option>
                    @foreach ($document_types as $t)
                        <option value="{{$t->id}}">{{$t->name}}</option>
                    @endforeach
                </select>

                <label for="">{{__("Number document")}}</label>
                <input type="text" class="form-control" id="number_document" name="number_document" placeholder="{{__("Number document")}}" maxlength="20" required>

                <label for="">{{__("Entry date")}}</label>
                <input type="date" class="form-control" id="entry_date" name="entry_date" placeholder="{{__("Entry date")}}" required>

                <select name="area_id" id="area_id" required>
                    <option value="">{{__('Select an area') }}</option>
                    @foreach ($areas as $a)
                        <option value="{{$a->id}}">{{$a->name}}</option>
                    @endforeach
                </select>

                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
        </div>
    </main>
</div>

