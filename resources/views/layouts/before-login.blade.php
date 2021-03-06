<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('metadata')

        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.ico') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

        <title>SEMONGKO | @yield('title')</title>

        <!-- Intro -->
        <link href="https://unpkg.com/intro.js/minified/introjs.min.css" rel="stylesheet">
        <!-- Custom Intro -->
        <style>
            .reset {
                margin: 0;
                padding: 0;
            }

            .introjs-tooltip {
                color: #000000;
            }
        </style>

        <!-- Custom Scrollbar -->
        <style>
            /* width */
            ::-webkit-scrollbar {
                height: 10px;
                width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 5px grey;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #17a2b8;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #138496;
            }
        </style>
        <!-- End : Custom Scrollbar -->

        <!-- Style -->
        @stack('style')
    </head>
    <body class="hold-transition register-page login-page">

        @yield('content', 'empty content')

        <!-- Script -->
        @stack('script')
        <!-- Intro -->
        <script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
        <script>
            introJs().start();
        </script>
        @stack('ajax-request')
    </body>
</html>
