@extends('layouts.mainLayout')

@section('content')

  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="jumbo">

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


          <input id="search_welcome" class="dispna" type="submit" name="">
        </form>
        <button class="cerca" id="search_welcome2" type="button" name="" value="">Cerca</button>
        {{-- <button id="provaApi" type="button" name="button">Prova Api</button> --}}

      </div>
    </div>
  </div>


  <div class="evidenza">
    <h2>Appartamenti consigliati</h2>
    <div class="apartments">
      <div class="apartment row"></div>

    </div>
    <div class="apartments ">
    <div class="apartment row">
      <div id="welcome_sponsored_apt">

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

        {{-- @foreach ($app as $a)
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="{{route('ui_apartment' , ['id' => $a->id ])}}">
              <img src='{{$a->images}}'>
              <h3>{{$a->name}}</h3>
            </a>
          </div>
        @endforeach --}}
    </div>
    </div>
  </div>



@endsection
