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
      <button class="cerca" id="search2" type="text" name="" value="">Cerca</button>
      {{-- <button id="provaApi" type="button" name="button">Prova Api</button> --}}

      {{-- <input class="dove" type="text" id="dove" class="form-control" placeholder="Dove vuoi andare?">
      <button class="cerca" type="button" name="button"><i class="fas fa-search"></i><strong>Cerca</strong></button> --}}
    </div>
  </div>

  {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="evidenza">
      <h1>Appartamenti consigliati
      </h1>
      <div class="apartments">

          <div class="apartment">
            <div class="foto">
              <a href="{{route('create_view',$apartment['id'])}}"><img src="{{ asset($apartment['images'])}}"></a>
            </div>
            <div class="titolo">
              <h3>
                <a href="{{route('create_view',$apartment['id'])}}"> {{ $apartment['name']}}</a>
              </h3>
            </div>
          </div>

      </div>
    </div>
  </div> --}}


@endsection
