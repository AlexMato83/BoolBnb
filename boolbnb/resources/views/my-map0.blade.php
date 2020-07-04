<!DOCTYPE html>
<html class='use-all-space'>
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge' />
    <meta charset='UTF-8'>
    <title>My Map</title>
    <meta name='viewport'
          content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'/>
    <!-- Replace version in the URL with desired library version -->
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
    <link rel = 'stylesheet' type = 'text / css' href = 'https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.58.0/maps/maps.css ' >
    <style>
       #map {
           width: 100vw;
           height: 100vh;
       }
    </style>
</head>
<body>
    <div id='map' class='map'></div>
 <!-- Replace version in the URL with desired library version -->
 <script src = "https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.58.0/maps/maps-web.min.js" > </script>
    <script>
      tt.setProductInfo('Progetto-scuola', 'Beta');
      tt.map({
          key: 'luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt',
          container: 'map',
          style: 'tomtom://vector/1/basic-main'
      });
    </script>
</body>
</html>
