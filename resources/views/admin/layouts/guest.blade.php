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
        <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">

    </head>
    <body class="login-page">
        <div class="login-header box-shadow">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="brand-logo">
                    <a href={!! route('admin.dashboard') !!}>
                        <img src="{!! asset('images/logo.png') !!}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{!! asset('js/core.js') !!}"></script>
        <script src="{!! asset('js/script.min.js') !!}"></script>
        <script src="{!! asset('js/process.js') !!}"></script>
        <script src="{!! asset('js/layout-settings.js') !!}"></script>
    </body>
</html>
