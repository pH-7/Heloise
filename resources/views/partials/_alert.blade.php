<div class="col-md-6 row">
    @if (session('success'))
        <p class="alert alert-success">
            {{ session('success') }}
        </p>
    @elseif (session('error'))
        <p class="alert alert-danger">
            {{ session('error') }}
        </p>
    @endif
</div>
