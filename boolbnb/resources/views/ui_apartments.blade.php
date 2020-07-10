@extends('layouts.mainLayout')
@section('content')
  {{-- BARRA DI RICERCA --}}
  {{-- <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="search">
      <input class="dove" type="text" id="dove" class="form-control" placeholder="Dove vuoi andare?">
      <button class="cerca" type="button" name="button"><i class="fas fa-search"></i><strong>Cerca</strong></button>
    </div>
  </div> --}}

  {{-- FILTRI DI RICERCA --}}
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
    <div class="filtri">
        {{-- <button class="tipo" type="button" name="button">Tipo di alloggio</button> --}}
        <button class="stanze" type="button" name="button">Stanze e letti</button>
        <button class="serv" type="button" name="button">Servizi</button>
        <input class="dove" type="text" id="dove" class="form-control" placeholder="Dove vuoi andare?">
        <button class="dist" type="button" name="button">Distanza</button>
        <button id="filtered2" type="text" name="" value=""><strong>Cerca</strong></button>
    </div>
  </div>

  <form  action="{{route('ui_filtered_apt')}}" method="post">
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

    {{-- MENU A TENDINA TIPO DI ALLOGGIO --}}
    {{-- <div class="tipo_di_alloggio off">
      @foreach ($categories as $category)
        <div>
          <input class="checkbox" type="checkbox" name="category[]" value="{{$category['id']}}">
          {{$category['name']}}
        </div>
      @endforeach
    </div> --}}

    {{-- MENU A TENDINA SERVIZI --}}
    <div class="servizi off">
      @foreach ($services as $service)
          <div>
              <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}">
              {{$service['name']}}
          </div>
      @endforeach
    </div>

    {{-- MENU A TENDINA STANZE E LETTI --}}

    <div class="stanze_letti off">
      <div class="bedrooms">
        <label for="rooms">Stanze</label>
        <input type="text" name="rooms" value="">
      </div>
      <div class="bedrooms">
        <label for="rooms">Letti</label>
        <input type="text" name="beds" value="">
      </div>
    </div>

    {{-- MENU A TENDINA kM --}}

    <div class="distanza off">
      <div class="km">
        <label for="address">Città</label>
        <input id="apt_address" type="location" name="address" value="">
      </div>
      <div class="km">
        <label for="search_radius">Distanza</label>
        <input id="search_radius" type="number" name="search_radius" value="20">
      </div>
        <input class="dispna" id="longitude" type="text" name="longitude" value="">
        <input class="dispna" id="latitude" type="text" name="latitude" value="">
    </div>

    <input id="filtered" class="dispna" type="submit" name="">
  </form>

  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="results ">
      <h1>Risultati ricerca</h1>
      <div class="apartments_reserch">
        <div class="row">
          <div class="apartment_reserch">
            @foreach ($apartments_found as $apartment)
              <div class="foto_reserch">
                <a href="{{route('create_view',$apartment['id'])}}"><img src="{{ asset($apartment['images'])}}"></a>
              </div>
              <div class="caratteristiche_reserch">
                <h2><a href="{{route('create_view',$apartment['id'])}}"> {{ $apartment['name']}}</a></h2>
                {{-- <h3>{{$apartment['category_id']}}</h3> --}}
                <h3>{{$apartment['rooms']}} stanze - {{$apartment['beds']}} letti - {{$apartment['bathrooms']}} bagni</h3>
                @foreach ($apartment -> services as $service)
                  <h3>{{$service['name']}}</h3>
                @endforeach
              </div>
            @endforeach
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>



@endsection
