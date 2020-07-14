@extends('layouts.mainLayout')
@section('content')

{{-- FILTRI DI RICERCA --}}
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
  <form  id="search_form"action="{{route('ui_filtered_apt')}}" method="post">
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

    <div class="filtri d-flex justify-content-between flex-wrap">

      <div class="dropdown">
        <button class="stanze btn btn-secondary dropdown-toggle" type="button" name="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stanze e letti
        </button>
        <div class="dropdown-menu stanze_letti" aria-labelledby="dropdownMenuButton">
          <div class="bedrooms">
            <label for="rooms">Stanze</label>
            <input id="rooms" type="text" name="rooms" value="">
          </div>
          <div class="bedrooms">
            <label for="beds">Letti</label>
            <input id="beds" type="text" name="beds" value="">
          </div>
        </div>
      </div>

      <div class="dropdown">
        <button class="serv btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Servizi
        </button>
        <div class="servizi dropdown-menu" aria-labelledby="dropdownMenuButton">
          @foreach ($services as $service)
            <div>
              <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}">
              {{$service['name']}}
            </div>
          @endforeach
        </div>
      </div>

      <input id="apt_address" type="location" name="address" value="{{$add}}" class="form-control" placeholder="Dove vuoi andare?">

      <div class="distanza">
        <span>Distanza</span>
        <input class="dist" id="search_radius" type="number" name="search_radius" value="20">
        <span>Km</span>
      </div>

      <div class="filtro_cerca">
      </div>
    </div>

    {{-- MENU A TENDINA SERVIZI --}}
  <div class="servizi off">
    @foreach ($services as $service)
      <div>
        <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}">
        {{$service['name']}}
      </div>
    @endforeach
  </div>

    {{-- MENU A TENDINA TIPO DI ALLOGGIO --}}
    {{-- <div class="tipo_di_alloggio off">
    @foreach ($categories as $category)
    <div>
    <input class="checkbox" type="checkbox" name="category[]" value="{{$category['id']}}">
    {{$category['name']}}
    </div>
  @endforeach
  </div> --}}


    <input class="dispna" id="longitude" type="text" name="longitude" value="{{$longitude}}">
    <input class="dispna" id="latitude" type="text" name="latitude" value="{{$latitude}}">
    {{-- <input id="filtered" class="dispna" type="submit" name=""> --}}
  </form>
  <button id="filtered2" type="button" name="" value=""><strong>Cerca</strong></button>
</div>


<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <div class="results">
    <h1>Risultati ricerca</h1>
    <div class="apartments_reserch">
      <div class="row">
        <div id="appartamenti">

        </div>

        {{-- HANDELBARS --}}

        <script id="giacomino-template" type="text/x-handlebars-template">
          <div class="container_ @{{add_class}}">
            <div class="apartment_ ">
              <a href="/ui_apartment/@{{id}}">@{{title}}</a>
              <h3>@{{title}}</h3>
              <img src="@{{image_route}}" alt="">
               <p>@{{description}}</p>
               <span>@{{sponsorship}}</span>
            </div>
          </div>
         </script>



        {{-- HANDELBARS --}}
         {{-- @foreach ($apartments_found['sponsored'] as $apartment)
          <div class="apartment_reserch">
            <div class="foto_reserch">
              <a href="{{route('create_view',$apartment['id'])}}"><img src="{{ asset($apartment['images'])}}"></a>
            </div>
            <div class="caratteristiche_reserch">
              <h2>
                <a href="{{route('create_view',$apartment['id'])}}"> {{ $apartment['name']}}</a>
              </h2>
              <h3 style="color:purple;">
                {{$apartment['rooms']}} stanze - {{$apartment['beds']}} letti - {{$apartment['bathrooms']}} bagni
              </h3>
              <h3>
                @foreach ($apartment -> services as $service)
                  <span>{{$service['name']}}</span>
                @endforeach
              </h3>
            </div>
          </div>
        @endforeach --}}
        {{-- @foreach ($apartments_found['normal'] as $apartment)
          <div class="apartment_reserch">
            <div class="foto_reserch">
              <a href="{{route('create_view',$apartment['id'])}}"><img src="{{ asset($apartment['images'])}}"></a>
            </div>
            <div class="caratteristiche_reserch">
              <h2>
                <a href="{{route('create_view',$apartment['id'])}}"> {{ $apartment['name']}}</a>
              </h2>
              <h3>
                {{$apartment['rooms']}} stanze - {{$apartment['beds']}} letti - {{$apartment['bathrooms']}} bagni
              </h3>
              <h3>
                @foreach ($apartment -> services as $service)
                  <span>{{$service['name']}}</span>
                @endforeach
              </h3>
            </div>
          </div>
        @endforeach  --}}
      </div>
    </div>
  </div>
</div>

@endsection

{{-- <button class="tipo" type="button" name="button">Tipo di alloggio</button> --}}

{{-- MENU A TENDINA TIPO DI ALLOGGIO --}}
{{-- <div class="tipo_di_alloggio off">
@foreach ($categories as $category)
<div>
<input class="checkbox" type="checkbox" name="category[]" value="{{$category['id']}}">
{{$category['name']}}
</div>
@endforeach
</div> --}}

{{-- <h3>{{$apartment['category_id']}}</h3> --}}
