<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Presento</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('Frontend.layouts.css')
</head>

<body>

 @include("Frontend.layouts.topnav")

  @yield('content')

  @include('Frontend.layouts.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('Frontend.layouts.script')

</body>

</html>