<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Garo_estate') }}</title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico  the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/fontello.css') }}">
        <link href="{{ asset('assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/fonts/icon-7-stroke/css/helper.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/icheck.min_all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/price-range.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('css/star-rating-svg.css') }}">
</head>
<body>
    @include('shared.loader')

    @include('shared.header')

    @yield('content')

    @include('shared.footer')
    <script src="{{ asset('assets/js/modernizr-2.6.2.min.js') }}"></script>

        <script src="{{ asset('assets/js/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-hover-dropdown.js') }}"></script>

        <script src="{{ asset('assets/js/easypiechart.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>

        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('assets/js/wow.js') }}"></script>

        <script src="{{ asset('assets/js/icheck.min.js') }}"></script>
        <script src="{{ asset('assets/js/price-range.js') }}"></script>

        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('js/jquery.star-rating-svg.js') }}"></script>
        <script src="{{ asset('js/footer.js') }}"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery(document).on("click", "[data-confirm]", function(e) {
                    e.preventDefault();
                    var message = jQuery(this).data('confirm') ? jQuery(this).data('confirm') : 'Are you sure?';
                    if (confirm(message)) {
                        var form = jQuery('<form />').attr('method', 'post').attr('action', jQuery(this).attr('href'));
                        message != "Are you sure want to logout?" ? jQuery('<input />').attr('type', 'hidden').attr('name', '_method').attr('value', 'delete').appendTo(form) : "";
                        jQuery('<input />').attr('type', 'hidden').attr('name', '_token').attr('value', jQuery('meta[name="csrf-token"]').attr('content')).appendTo(form);
                        jQuery('body').append(form);
                        form.submit();

                    }
                });

                $(".my-rating").starRating({
                    initialRating: 4,
                    strokeColor: '#894A00',
                    strokeWidth: 10,
                    starSize: 25,
                    minRating: 1,
                    callback: function(currentRating, $el){
                        $("#rateInput").val(currentRating);
                    }
                });
            })
        </script>
        @yield('scripts')
</body>
</html>
