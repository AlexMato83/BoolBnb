

require('./bootstrap');

// window.Vue = require('vue');
window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const app = new Vue({
    el: '#app',
});

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
  //funzioni riguardanti i tasti accedi e registrati da rivedere con collegamento al database



// const app = new Vue({
//     el: '#app',
// });
//*****************//
function turfjs(){
  var lat = $("#latitude").html();
  var long = $("#longitude").html();
  var center = [ long , lat];
  var apiKey = 'luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt';
  var map = tt.map({
  key: apiKey,
  container: 'map',
  center: center,
  style: 'tomtom://vector/1/basic-main',
  zoom: 15
  });



  function findGeometry() {
    var SEARCH_QUERY = 'Roma';
    tt.services.fuzzySearch({
        key: apiKey,
        query: SEARCH_QUERY
      })
      .go()
      .then(getAdditionalData);
  //sezione apartament in evidenza da collegare al database

  // var source = $('.apartmentEvidence-template').html();
  // var template = Handlebars.compile(source);
  //
  // $.ajax({
  //   url: ,
  //   method: "GET",
  //   success: function(data,stato) {
  //     var apartament = data.response;
  //
  //     for (var i = 0; i < apartment.length; i++) {
  //       var context = {
  //         foto: apartment[i].foto,
  //         title: apartment[i].title,
  //       };
  //       var html = template(context);
  //       $('.apartments').append(html);
  //     }
  //   },
  //   error: function(richiesta,stato,errore){
  //     alert("Chiamata fallita!!!");
  //   }
  // })


  //sezione reserch apartament da collegare al database

  // var source = $('.apartmentReserch-template').html();
  // var template = Handlebars.compile(source);
  //
  // $.ajax({
  //   url: ,
  //   method: "GET",
  //   success: function(data,stato) {
  //     var apartament = data.response;
  //
  //     for (var i = 0; i < apartment.length; i++) {
  //       var context = {
  //         foto: apartment[i].foto,
  //         title: apartment[i].title,
  //         description: apartment[i].description,
  //         location: apartment[i].location,
  //       };
  //       var html = template(context);
  //       $('.apartments').append(html);
  //     }
  //   },
  //   error: function(richiesta,stato,errore){
  //     alert("Chiamata fallita!!!");
  //   }
  // })
// });

  }
  // findGeometry();
  //
  // function getAdditionalData(fuzzySearchResults) {
  //   var geometryId = fuzzySearchResults.results[0].dataSources.geometry.id;
  //   tt.services.additionalData({
  //     key: apiKey,
  //     geometries: [geometryId],
  //       geometriesZoom: 12
  //     })
  //     .go()
  //     .then(processAdditionalDataResponse);
  // }

  // function buildLayer(id, data) {
  //   return {
  //     'id': id,
  //     'type': 'fill',
  //     'source': {
  //         'type': 'geojson',
  //         'data': {
  //             'type': 'Feature',
  //             'geometry': {
  //                 'type': 'Polygon',
  //                 'coordinates': data
  //             }
  //         }
  //     },
  //     'layout': {},
  //     'paint': {
  //         'fill-color': '#2FAAFF',
  //         'fill-opacity': 0.8,
  //         'fill-outline-color': 'black'
  //     }
  //   }
  // }

  // function displayPolygonOnTheMap(additionalDataResult) {
  //   var geometryData = additionalDataResult.geometryData.features[0].geometry.coordinates[0];
  //   map.addLayer(buildLayer('fill_shape_id', geometryData));
    // function reset_position(geometryData){
    //   var apiKey = 'luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt';
    //   var newmap = tt.map({
    //     key: apiKey,
    //     container: 'map',
    //     center: geometryData[0],
    //     style: 'tomtom://vector/1/basic-main',
    //     zoom: 10
    //   });
    // }
    // reset_position(geometryData);

  //   return geometryData;
  // }
  //
  // function processAdditionalDataResponse(additionalDataResponse) {
  //   if (additionalDataResponse.additionalData && additionalDataResponse.additionalData.length) {
  //     var geometryData = displayPolygonOnTheMap(additionalDataResponse.additionalData[0]);
  //   }
  //
  // }

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
}


function address_to_coord(button, submit){

  $(button).click(function(){
    var address = $("#apt_address").val();
    var longitude,latitude;
    $.ajax({
        url: "https://api.tomtom.com/search/2/search/"+ address +".json?",
        method: "get",
        data: {
          key: "luWzKOCtK4KkgiYWrGvKmUyo3hn8Huwt",
          // query: address,
          // ext: "json"
        },
        success: function(data){
          var position = data.results[0]["position"];
        latitude =  position.lat;
        longitude = position.lon;

        },
        complete: function(){
          $("#latitude").val(latitude);
          $("#longitude").val(longitude);
          document.getElementById(submit).click()
        }
      })
    });
  }

//****************//
function prova_api(){
  $("#provaApi").click(function(){
    $.ajax({
      url:"http://localhost:8000/welcome_show",
      method: "GET",
      success: function(data){
        var variabile = JSON.parse(data)
        console.log(variabile);
      }
    })
  });
}
function init(){
  if (document.getElementById("map")) {
    turfjs();
  }
  if (document.getElementById("provaApi")) {
        prova_api();
  }
  address_to_coord('#create2', 'create');
  address_to_coord('#search2', 'search');
  address_to_coord('#filtered2', 'filtered');



  $(".tasto").click(
    function() {
      $(".accedi").removeClass("off").addClass("on");
      $(".registrati").removeClass("on").addClass("off");
    }
  );
  $(".continua").click(
    function() {
      $(".accedi").removeClass("on").addClass("off");
    }
  );

  // Vue.component('example-component', require('./components/ExampleComponent.vue').default);
  $(".reg").click(
    function() {
      $(".registrati").removeClass("off").addClass("on");
      $(".accedi").removeClass("on").addClass("off");
    }
  );
  $(".continua").click(
    function() {
      $(".registrati").removeClass("on").addClass("off");
    }
  );
  $(".fa-bars").click(
    function() {
      $(".hamburger-menu").removeClass("off").addClass("on");
      $(".barre").removeClass("on").addClass("off");
    }
  );
  $(".continua").click(
    function() {
      $(".accedi").removeClass("on").addClass("off");
    }
  );
  $(".fa-times").click(
    function() {
      $(".hamburger-menu").removeClass("on").addClass("off");
      $(".barre").addClass("on");
    }
  );
  $(".continua").click(
    function() {
      $(".registrati").removeClass("on").addClass("off");
    }
  );
  // BOTTONE FILTRO TIPO DI ALLOGGIO
  $(".tipo").click(
    function() {
      if ($(".tipo_di_alloggio").hasClass("off")){
        $(".tipo_di_alloggio").removeClass("off").addClass("on")
      }
      else {
          $(".tipo_di_alloggio").removeClass("on").addClass("off")
      }
    }
  );

  // BOTTONE FILTRO SERVIZI
  $(".serv").click(
    function() {
      if ($(".servizi").hasClass("off")){
        $(".servizi").removeClass("off").addClass("on")
      }
      else {
          $(".servizi").removeClass("on").addClass("off")
      }
    }
  );

  // BOTTONE FILTRO STANZE E LETTI
  $(".stanze").click(
    function() {
      if ($(".stanze_letti").hasClass("off")){
        $(".stanze_letti").removeClass("off").addClass("on")
      }
      else {
          $(".stanze_letti").removeClass("on").addClass("off")
      }
    }
  );

  // BOTTONE FILTRO STANZE E LETTI
  $(".dist").click(
    function() {
      if ($(".distanza").hasClass("off")){
        $(".distanza").removeClass("off").addClass("on")
      }
      else {
          $(".distanza").removeClass("on").addClass("off")
      }
    }
  );

}
$(document).ready(init);
