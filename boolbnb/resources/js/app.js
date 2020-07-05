require('./bootstrap');
window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const app = new Vue({
    el: '#app',
});
$(document).ready(function() {

  //funzioni riguardanti i tasti accedi e registrati da rivedere con collegamento al database

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

  //sezione apartament in evidenza da collegare al database

  // var source = $('.apartment-template').html();
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
});
