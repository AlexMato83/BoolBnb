@extends('layouts.mainLayout')
@section('content')
  @include('components.header_generic')

{{-- FILTRI DI RICERCA --}}
<div class="container-fluid">
  <div class="row ml-2 ">

    <div class="col-2">
      <form  autocomplete="off" id="search_form"action="{{route('ui_filtered_apt')}}" method="post">
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

        {{-- Dove vuoi andare --}}
        <input class="dove mt-5 mr-5 pl-3" id="apt_address" type="location" name="address" value="{{$add}}" class="form-control" placeholder="Dove vuoi andare?">

        <div class="filtri">
          <div class="space_search"></div>
          <span class="ml-3 pt-3">Filtra per...</span><hr>

          <div class="space_search"></div>

          {{-- Stanze e letti --}}
          <div class="ml-3">
            <label for="rooms">Stanze</label>
            <input id="rooms" type="number" name="rooms" value="">
          </div>
          <div class="ml-3">
            <label for="beds">Letti</label>
            <input id="beds" type="number" name="beds" value="">
          </div>
          <hr>
          <div class="space_search"></div>

          {{-- Servizi --}}
          @foreach ($services as $service)
            <div class="ml-3">
              <input class="checkbox mr-1" type="checkbox" name="services[]" value="{{$service['id']}}">
              {{$service['name']}}
            </div>
          @endforeach
          <div class="space_search"></div><hr>

          {{-- Distanza --}}
          <div class="distanza mx-3">
            <span>Distanza in km</span>
            <input class="dist" id="search_radius" type="number" name="search_radius" value="20">
          </div>
          <input class="dispna" id="longitude" type="text" name="longitude" value="{{$longitude}}">
          <input class="dispna" id="latitude" type="text" name="latitude" value="{{$latitude}}">
          <div class="space_search"></div>

          {{-- Cerca  --}}
          <div class="filtro_cerca">
            <button class="w-100" id="filtered2" type="button" name="" value=""><strong>FIltra la ricerca</strong></button>
          </div>
        </div>
      </form>
    </div>


    <div class="col-9">
      <div class="results">
        <h1>Risultati ricerca</h1>
        <div class="apartments_reserch">
          <div class="row">
            <div id="sponsored_apt">

            </div>
            <div id="normal_apt">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


{{-- HANDELBARS --}}

<script id="giacomino-template" type="text/x-handlebars-template">
<div class="container_ @{{add_class}}">
<div class="apartment_ ">
<h3><a href="/ui_apartment/@{{id}}">@{{title}}</a></h3>
<img src="@{{image_route}}" alt="">
 <p>@{{address}}</p>
 <span>@{{sponsorship}}</span>
</div>
</div>
</script>

{{-- HANDELBARS --}}


@endsection
