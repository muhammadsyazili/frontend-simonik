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

  <title>SIMONIK | @yield('title')</title>

  <!-- Style -->
  @stack('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <div class="wrapper">
      @include('../sub-views/_navbar')
      @include('../sub-views/_sidebar')
      @yield('content', 'empty content')
      @include('../sub-views/_footer')
      @include('../sub-views/_control_sidebar')
    </div>

    <!-- Script -->
    @stack('script')
    @stack('ajax-request')
</body>
</html>
