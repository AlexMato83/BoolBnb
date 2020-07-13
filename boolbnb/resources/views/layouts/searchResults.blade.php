@extends('layouts.mainLayout')

@section('content')

  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="search">
      <input class="dove" type="text" id="dove" class="form-control" placeholder="Dove vuoi andare?">
      <button class="cerca" type="button" name="button"><i class="fas fa-search"></i><strong>Cerca</strong></button>
    </div>
  </div>

  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
    <div class="filtri">
      <button type="button" name="button">Tipo di alloggio</button>
      <button type="button" name="button">Stanze e letti</button>
      <button type="button" name="button">Distanza</button>
      <button type="button" name="button">Servizi</button>
    </div>
  </div>
<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="results ">
      <h1>Risultati ricerca</h1>
      <div class="apartments_reserch">
        <div class="row">
          <div class="apartment_reserch">
              <div class="foto_reserch">
                <img src="/img/1-1.jpeg"/>
              </div>
              <div class="caratteristiche_reserch">
                <h2>Beautiful suit near Duomo</h2>
                <h3>Villa</h3>
                <h3>7 ospiti - 3 camere da letto - 4 letti - 2 bagni</h3>
                <h3>Cucina - Lavatrice - Piscina</h3>
              </div>
          </div>
          <div class="apartment_reserch">
              <div class="foto_reserch">
                <img src="/img/1-1.jpeg"/>
              </div>
              <div class="caratteristiche_reserch">
                <h2>Beautiful suit near Duomo</h2>
                <h3>Villa</h3>
                <h3>7 ospiti - 3 camere da letto - 4 letti - 2 bagni</h3>
                <h3>Cucina - Lavatrice - Piscina</h3>
              </div>
          </div>
          <div class="apartment_reserch">
              <div class="foto_reserch">
                <img src="/img/1-1.jpeg"/>
              </div>
              <div class="caratteristiche_reserch">
                <h2>Beautiful suit near Duomo</h2>
                <h3>Villa</h3>
                <h3>7 ospiti - 3 camere da letto - 4 letti - 2 bagni</h3>
                <h3>Cucina - Lavatrice - Piscina</h3>
              </div>
          </div>
          <div class="apartment_reserch">
              <div class="foto_reserch">
                <img src="/img/1-1.jpeg"/>
              </div>
              <div class="caratteristiche_reserch">
                <h2>Beautiful suit near Duomo</h2>
                <h3>Villa</h3>
                <h3>7 ospiti - 3 camere da letto - 4 letti - 2 bagni</h3>
                <h3>Cucina - Lavatrice - Piscina</h3>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- filtri --}}

<div class="filtro_tipo_alloggio">

</div>









  {{-- Da collegare con il database

  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
    <div class="results">

      <h1>Risultati ricerca</h1>

      <div class="apartments">

      </div>
    </div>
  </div>
  <script class="apartmentReserch-template" type="text/x-handlebars-template">  
  <div class="apartment_reserch">

      <div class="foto_reserch">
        <img src="/img/1-1.jpeg"/>
      </div>
      <div class="caratteristiche_reserch">
        <h2>Titolo</h2>
        <h3>Tipo di casa</h3>
        <h3>NumeroOspiti - NumeroCamere - NumeroLetti - NumeroBagni</h3>
        <h3>Servizi</h3>
      </div>

  </div>
  </script> --}}

@endsection
