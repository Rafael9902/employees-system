<script>
    $(document).ready(function ($){
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {url: "{{url('/viewlist')}}"},
            columns: [
                {data: 'first_name', name: 'first_name'},
                {data: 'other_names', name: 'other_names'},
                {data: 'first_last_name', name: 'first_last_name'},
                {data: 'second_last_name', name: 'second_last_name'},
                {data: 'document_type_id', name: 'document_type_id'},
                {data: 'number_document', name: 'number_document'},
                {data: 'employment_country', name: 'employment_country'},
                {data: 'email', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false},
            ]
        });
        $('.btn-add').click(function(){
            $('.form-add').show();
            $('.table-responsive').hide();
            $('.btn-add').hide();
            $('#employees_title').text('{{__("Employee Register")}}');
            $('.alert').hide();
        });
        $('.input_name').keypress(function (e){
            return check(e, /[A-Z ]/);
        });

        $('#number_document').keypress(function (e){
            return check(e, /[A-Za-z0-9-]/ );
        });

        $('#cancel').click(function(){
            location.href = '{{url('/')}}';
        });

        $('#btn-modal').click(function (){
            $('#exampleModal').show();
        });

        @if(!empty($employee))
        $('.btn-add').trigger('click');
        $('#id').val('{{$employee->id}}');
        @endif


    });

    //Function to only allow a pattern
    function check(e, pattern) {
        key = e.keyCode;

        // Validate pattern
        final_key = String.fromCharCode(key);
        return pattern.test(final_key);
    }

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    if(dd<10){dd='0'+dd}
    if(mm<10){mm='0'+mm}

    today = yyyy+'-'+mm+'-'+dd;
    past = yyyy+'-'+(mm-1)+'-'+dd;
    document.getElementById("entry_date").setAttribute("max", today);
    document.getElementById("entry_date").setAttribute("min", past);
</script>
