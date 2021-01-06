<!-- Modal -->
<form action="{{url('/delete/')}}" method="post" class="register-form">
    {{csrf_field()}}
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 10px">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Confirmation')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{__('Do you want to remove the employee?')}}
                </div>
                <div class="modal-footer">
                    <button type="post" class="btn btn-primary">{{__('Accept')}}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>

