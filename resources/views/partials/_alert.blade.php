@foreach (['alert-success' => 'success', 'alert-danger' => 'error'] as $cssClass => $sessName)
    @if (session($sessName))
        <div class="col-md-6 row">
            <p class="alert {{ $cssClass }}">
                {{ session($sessName) }}
            </p>
        </div>
    @endif
@endforeach
