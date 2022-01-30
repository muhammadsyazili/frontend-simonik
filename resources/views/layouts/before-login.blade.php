<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.ico') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

  <title>SIMONIK | @yield('title')</title>

  <!-- Style -->
  @stack('style')
</head>
<body class="hold-transition register-page login-page">

  @yield('content', 'empty content')

  <!-- Script -->
  @stack('script')
</body>
</html>
