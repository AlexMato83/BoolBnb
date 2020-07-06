@extends('layouts.mainLayout')

@section('content')

  <div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6 col-xl-offset-3 col-xl-6">
    <div class="search">
      <input class="dove" type="text" id="dove" class="form-control" placeholder="Dove vuoi andare?">
      <button class="cerca" type="button" name="button"><i class="fas fa-search"></i><strong>Cerca</strong></button>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
    <div class="results">

      <h1>Risultati ricerca</h1>

      <div class="apartments">
        <div class="apartment">
          <div class="foto">
            <img src="/img/1-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3>Beautiful suit near Duomo</h3>
          </div>
          <div class="tipoAppartamento">
            <p></p>
          </div>
          <div class="map">
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
