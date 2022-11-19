@if (Session::has('banner'))
    <script>
        $(document).ready(function() {
            var message = "{{ Session::get('banner') }}"
            var style = "{{ Session::get('bannerStyle') ?? 'success' }}"
            try {
                toastr[style](message);
            } catch (_) {}
        })
    </script>
@endif
