@extends('layouts.mainLayout')

@section('content')




  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="search">
      <form  action="{{route('ui_apartments')}}" method="post">
        @csrf
        @method("POST")
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <input class="dove" id="apt_address" type="text" name="address" value="" placeholder="Dove vuoi andare?">

        <input class="dispna" id="longitude" type="text" name="longitude" value="">
        <input class="dispna" id="latitude" type="text" name="latitude" value="">
        <input id="search_radius" class="dispna" type="number" name="search_radius" value="20">


        <input id="search" class="dispna" type="submit" name="">
      </form>
      <button class="cerca" id="search2" type="text" name="" value="">search</button>
      <button id="provaApi" type="button" name="button">Prova Api</button>
      {{-- <input class="dove" type="text" id="dove" class="form-control" placeholder="Dove vuoi andare?">
      <button class="cerca" type="button" name="button"><i class="fas fa-search"></i><strong>Cerca</strong></button> --}}
    </div>
  </div>

  {{-- debug --}}
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="evidenza">

      <h1>Appartamenti consigliati</h1>

      <div class="apartments">

        <div class="apartment">

          <div class="foto">
            <img src="/img/1-1.jpeg"/>
          </div>

          <div class="titolo">
            <h3><a href="#">Beautiful suit near Duomo</a></h3>
          </div>

        </div>

        <div class="apartment">
          <div class="foto">
            <img src="/img/2-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3><a href="#">Residenza Toselli</a></h3>
          </div>
        </div>
        <div class="apartment">
          <div class="foto">
            <img src="/img/3-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3><a href="#">Private room</a></h3>
          </div>
        </div>
        <div class="apartment">

          <div class="foto">
            <img src="/img/1-1.jpeg"/>
          </div>

          <div class="titolo">
            <h3><a href="#">Beautiful suit near Duomo</a></h3>
          </div>

        </div>

        <div class="apartment">
          <div class="foto">
            <img src="/img/2-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3><a href="#">Residenza Toselli</a></h3>
          </div>
        </div>
        <div class="apartment">
          <div class="foto">
            <img src="/img/3-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3><a href="#">Private room</a></h3>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
