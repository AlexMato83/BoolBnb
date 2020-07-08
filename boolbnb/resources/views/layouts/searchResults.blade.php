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

  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="results ">
      <h1>Risultati ricerca</h1>
      <div class="apartments">
        <div class="row">
          <div class="apartment">
            <div class="col-lg-6 col-xl-6">
              <div class="foto">
                <img src="/img/1-1.jpeg"/>
              </div>
            </div>
            <div class="offset-lg-1 col-lg-4 offset-xl-1 col-xl-4">
              <div class="caratteristiche">
                <h3>Beautiful suit near Duomo</h3>
                <h2>Villa</h2>
                <h2>7 ospiti - 3 camere da letto - 4 letti - 2 bagni</h2>
                <h2>Cucina - Lavatrice - Piscina</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    <div class="apartment">
      <div class="foto">
        <img src=""/>
      </div>
      <div class="titolo">
        <h3></h3>
      </div>
      <div class="descrizione">
        <p></p>
      </div>
      <div class="map">
      </div>
    </div>
  </script> --}}

@endsection
