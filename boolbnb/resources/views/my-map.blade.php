<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>TomTom Web SDK plus TURF</title>
  <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.41.0/maps/maps.css'>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.41.0/maps/maps-web.min.js"></script>
  <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.41.0/services/services-web.min.js"></script>
  <link rel='stylesheet' type='text/css' href='/css/app.css' />  <!-- Include SDK's stylesheet -->
  <script src="js/app.js" charset="utf-8"></script>
  <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
</head>

<body>
  <div id='map'></div>
  <script src='js/app.js'></script>


  <div id="polygon-info-box">
<label>Area of the polygon:</label>
<div>
  <span id="area-info"> - </span><span>km<sup>2</sup></span>
</div>

</body>

</html>
