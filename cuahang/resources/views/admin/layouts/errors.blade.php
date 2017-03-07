@if(Session::has('success'))
    <div id="error" class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{!! Session::get('success') !!}</strong>
    </div>
@endif