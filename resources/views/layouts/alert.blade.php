@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible show fade" id="success-message">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    </div>
@endif
@if ($message = Session::get('failed'))
    <div class="alert alert-danger alert-dismissible show fade" id="failed-message">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    </div>
@endif
