require('./bootstrap');
window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const app = new Vue({
    el: '#app',
});
$(document).ready(function() {
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


});
