@foreach (['alert-success' => 'success', 'alert-danger' => 'error'] as $cssClass => $sessName)
    @if (session($sessName))
        <div class="col-md-6 row">
            <p class="alert {{ $cssClass }}" role="alert">
                {{ session($sessName) }}
            </p>
        </div>
    @endif
@endforeach

<script>
    $(function() {
        if ($('div[role=alert]').length) {
            $('div[role=alert]').fadeOut(10000);
        }
    });
</script>
