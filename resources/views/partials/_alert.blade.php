@foreach (['alert-success' => 'success', 'alert-danger' => 'error'] as $cssClass => $sessName)
    @if (session($sessName))
        <div class="row col col-md-6">
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
