@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show w-auto" style="position: absolute; right: 20px; top: 100px;" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (Session::has('destroy'))
    <div class="alert alert-danger alert-dismissible fade show w-auto" style="position: absolute; right: 20px; top: 100px;" role="alert">
        <strong>{{ session('destroy') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


