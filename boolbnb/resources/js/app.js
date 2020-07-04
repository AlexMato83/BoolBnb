

require('./bootstrap');

// window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// const app = new Vue({
//     el: '#app',
// });




function turfjs(){
  var apiKey = 'luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt';
  var map = tt.map({
  key: apiKey,
  container: 'map',
  // center: geometryData[1][0],
  style: 'tomtom://vector/1/basic-main',
  zoom: 10
  });

  function findGeometry() {
    var SEARCH_QUERY = 'Roma';
    tt.services.fuzzySearch({
        key: apiKey,
        query: SEARCH_QUERY
      })
      .go()
      .then(getAdditionalData);

  }
  findGeometry();

  function getAdditionalData(fuzzySearchResults) {
    var geometryId = fuzzySearchResults.results[0].dataSources.geometry.id;
    tt.services.additionalData({
      key: apiKey,
      geometries: [geometryId],
        geometriesZoom: 12
      })
      .go()
      .then(processAdditionalDataResponse);
  }

  function buildLayer(id, data) {
    return {
      'id': id,
      'type': 'fill',
      'source': {
          'type': 'geojson',
          'data': {
              'type': 'Feature',
              'geometry': {
                  'type': 'Polygon',
                  'coordinates': data
              }
          }
      },
      'layout': {},
      'paint': {
          'fill-color': '#2FAAFF',
          'fill-opacity': 0.8,
          'fill-outline-color': 'black'
      }
    }
  }

  function displayPolygonOnTheMap(additionalDataResult) {
    var geometryData = additionalDataResult.geometryData.features[0].geometry.coordinates[0];
    map.addLayer(buildLayer('fill_shape_id', geometryData));
    console.log(geometryData[0]);
    function reset_position(geometryData){
      console.log(geometryData);
      var apiKey = 'luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt';
      var newmap = tt.map({
        key: apiKey,
        container: 'map',
        center: geometryData[0],
        style: 'tomtom://vector/1/basic-main',
        zoom: 10
      });
    }
    reset_position(geometryData);

    return geometryData;
  }

  function processAdditionalDataResponse(additionalDataResponse) {
    if (additionalDataResponse.additionalData && additionalDataResponse.additionalData.length) {
      var geometryData = displayPolygonOnTheMap(additionalDataResponse.additionalData[0]);
    }

  }

//   function calculateTurfArea(geometryData) {
//     var turfPolygon = turf.polygon(geometryData);
//     var areaInMeters = turf.area(turfPolygon);
//     var areaInKilometers = turf.round(turf.convertArea(areaInMeters, 'meters', 'kilometers'),2);
//   }
//
//   function calculateTurfArea(geometryData) {
//   var turfPolygon = turf.polygon(geometryData);
//   var areaInMeters = turf.area(turfPolygon);
//   var areaInKilometers = turf.round(turf.convertArea(areaInMeters, 'meters', 'kilometers'),2);
//   var areaInfo = document.getElementById('area-info');
//   areaInfo.innerText = areaInKilometers;
// }
//
// function processAdditionalDataResponse(additionalDataResponse) {
//   if (additionalDataResponse.additionalData && additionalDataResponse.additionalData.length) {
//     var geometryData = displayPolygonOnTheMap(additionalDataResponse.additionalData[0]);
//     calculateTurfArea(geometryData);
//   }
// }
// var markerCoordinates = [
//   [4.899431, 52.379189],
//   [4.8255823, 52.3734312],
//   [4.7483138, 52.4022803],
//   [4.797049, 52.435065],
//   [4.885911, 52.320235]
// ];
//
// function drawPointsInsideAndOutsideOfPolygon(geometryData) {
//   var customInsidePolygonMarkerIcon = 'img/inside_marker.png';
//   var customOutsideMarkerIcon = 'img/outside_marker.png';
//   var turfPolygon = turf.polygon(geometryData);
//   var points = turf.points(markerCoordinates);
//   var pointsWithinPolygon = turf.pointsWithinPolygon(points, turfPolygon);
//   markerCoordinates.forEach(function (markerCoordinate) {
//     const markerElement = document.createElement('div');
//     markerElement.innerHTML = createMarkerElementInnerHTML(customOutsideMarkerIcon);
//     pointsWithinPolygon.features.forEach(function (pointWithinPolygon) {
//       if (markerCoordinate[0] === pointWithinPolygon.geometry.coordinates[0] &&
//         markerCoordinate[1] === pointWithinPolygon.geometry.coordinates[1]) {
//           markerElement.innerHTML = createMarkerElementInnerHTML(customInsidePolygonMarkerIcon);
//       }
//     });
//     var marker = new tt.Marker({ element: markerElement}).setLngLat(markerCoordinate);
//     marker.addTo(map);
//   });
// }
//
// function processAdditionalDataResponse(additionalDataResponse) {
//   if (additionalDataResponse.additionalData && additionalDataResponse.additionalData.length) {
//     var geometryData = displayPolygonOnTheMap(additionalDataResponse.additionalData[0]);
//     calculateTurfArea(geometryData);
//     drawPointsInsideAndOutsideOfPolygon(geometryData);
//   }
// }
}

function address_to_coord(){

  $("#create2").click(function(){
    var address = $("#apt_address").val();
    var longitude,latitude;
    $.ajax({
        url: "https://api.tomtom.com/search/2/search/"+ address +".json?",
        method: "get",
        data: {
          key: "luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt",
          // query: address,
          ext: "json"
        },
        success: function(data){
          var position = data.results[0]["position"];
        latitude =  position.lat;
        longitude = position.lon;
      },
        complete: function(){
          $("#latitude").val(latitude);
          $("#longitude").val(longitude);
          console.log(latitude);
          document.getElementById("create").click()
        }
      })
    });
  }


function init(){
  address_to_coord()
  turfjs()
  // findGeometry()
}

$(document).ready(init)
