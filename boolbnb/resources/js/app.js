

require('./bootstrap');

// window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// const app = new Vue({
//     el: '#app',
// });

// function geoloc(){
//   var places = require('places.js');
//   var placesAutocomplete = places({
//   appId: 'YU1WYVJYIM',
//   apiKey: '04db1208738284d85c5e94fae5f2f538',
//   container: document.querySelector('#address-input')
// });
// }

function init(){
  geoloc()
}

$(document).ready(init)
