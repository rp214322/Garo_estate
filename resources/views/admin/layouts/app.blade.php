<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/core.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/icon-font.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('vendors/styles/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/dev.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('src/plugins/jquery-steps/jquery.steps.css') !!}">
    <link rel="stylesheet" href="{{ asset('css/star-rating-svg.css') }}">
    @yield('styles')
</head>

<body>
    <!-- Loader -->
    <!-- @include('admin.shared.loader') -->

    <!-- Header -->
    @include('admin.shared.header')

    @include('admin.shared.sidebar')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    @stack('modals')

    <!-- Scripts -->
    <script src="{!! asset('js/core.js') !!}"></script>
    <script src="{!! asset('js/script.min.js') !!}"></script>
    <script src="{!! asset('js/process.js') !!}"></script>
    <script src="{!! asset('js/layout-settings.js') !!}"></script>
    <script src="{!! asset('src/plugins/datatables/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('src/plugins/datatables/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('src/plugins/jquery-steps/jquery.steps.js') !!}"></script>
    <!-- <script src="{!! asset('vendors/scripts/steps-setting.js') !!}"></script> -->
    <script src="{{ asset('js/jquery.star-rating-svg.js') }}"></script>

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
