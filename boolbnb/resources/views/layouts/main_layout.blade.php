<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel = 'stylesheet' type = 'text / css' href = 'https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.58.0/maps/maps.css ' >
    <script src = "https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.58.0/maps/maps-web.min.js" > </script>
    <script src="/js/app.js" charset="utf-8"></script>
  </head>
  <body>
    @include('components.header')
    @yield('content')
    @include('components.footer')


  </body>
</html>
