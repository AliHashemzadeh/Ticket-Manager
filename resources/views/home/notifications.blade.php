@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
@if(session('fail'))
    <div class="alert alert-danger">
        <p>{{ session('fail') }}</p>
    </div>
@endif