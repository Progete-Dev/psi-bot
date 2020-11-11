@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
@endpush
@push('head-script')
    <script>
        var botmanWidget = {
            chatServer: '/api/botman'
        };
    </script>
    <script defer src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endpush