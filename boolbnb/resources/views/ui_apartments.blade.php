@extends('layouts.mainLayout')
@section('content')
  @include('components.header_generic')

{{-- FILTRI DI RICERCA --}}
<div class="container-fluid content">
  <div class="row mx-5">

    <div class="col-12 col-md-3 col-lg-2">
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
        <div class='search_container2'>
          <input class="dove mt-5 mr-5 pl-3" id="apt_address" type="location" name="address" value="{{$add}}" class="form-control" placeholder="Dove vuoi andare?">
          <div class="autocomplete">
            <div>
            </div>
          </div>
        </div>

        <div class="filtri">
          <div class="space_search"></div>
          <span class="ml-3 pt-3">Filtra per...</span><hr>

          <div class="space_search"></div>

          {{-- Stanze e letti --}}
          <div class="ml-3">
            <label for="beds">Letti</label>
            <input id="beds" type="number" name="beds" value="">
          </div>
          <div class="ml-3">
            <label for="rooms">Stanze</label>
            <input id="rooms" type="number" name="rooms" value="">
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
          <hr>

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

    <div class="col-12 col-md-9 col-lg-10">
      <div class="results mt-5">
        <h1 class="titolo-principale mb-3 ml-2">I risultati della tua ricerca</h1>
        <div class="space"></div>
        <div class="row" id="sponsored_apt">
        </div>
        <div class="row" id="normal_apt">
        </div>
      </div>
    </div>

  </div>
</div>


{{-- HANDELBARS --}}

<script id="giacomino-template" type="text/x-handlebars-template">
  <div class="appartamento rounded mx-4 mb-4 col-12 @{{add_class}}">
    <div class="row">
      <div class="col-4 p-0">
        <img class="w-100 rounded-left" src="@{{image_route}}" alt="">
      </div>
      <div class="col-8 p-4">
        <h3><a class="titolo-principale blu" href="/ui_apartment/@{{id}}">@{{title}}</a></h3>
        <p class="blu font_search">@{{address}}</p>
        <!-- <p>@{{description}}</p> -->
        <p class="blu font_search">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        <!-- <span>@{{services}}</span> -->
        <span class="blu font_search">Lavatrice - Posto Macchina - Vista mare</span>
        <span class="sponsored">@{{sponsorship}}</span>

      </div>

    </div>
  </div>
</script>

{{-- HANDELBARS --}}


@endsection
