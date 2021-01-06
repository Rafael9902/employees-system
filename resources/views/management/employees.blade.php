@include('template')

    <h1 class="mt-4" id="employees_title"> {{__('Employees')}}
        <button type="button" class="btn btn-primary btn-add"
                title="{{ __('Add') }}"><i class="fa fa-plus"></i>
        </button>
    </h1>

    <div class="panel-body form-add">
        @include('management.register')
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table id="user_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{__("First Name")}}</th>
                    <th>{{__("Other Names")}}</th>
                    <th>{{__("First Last Name")}}</th>
                    <th>{{__("Second Last Name")}}</th>
                    <th>{{__("Identification Type")}}</th>
                    <th>{{__("Identification Number")}}</th>
                    <th>{{__("Employment Country")}}</th>
                    <th>{{__("Email")}}</th>
                    <th>{{__("Status")}}</th>
                    <th>{{__("Actions")}}</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


@include('management.modals.confirmationModal')
@include('management.js.registerJS')
@include('footer')
