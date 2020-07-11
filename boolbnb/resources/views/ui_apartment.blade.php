@extends('layouts.mainLayout')

@section('content')
  <!-- titolo e foto appartamento -->
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <h1>{{$apartment['name']}}</h1>
      <h3>{{$apartment['address']}}</h3>
      <div class="foto">
        <img src="{{ asset($apartment['images']) }}"/>
      </div>
    </div>

  <!-- descrizione appartamento  -->
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
      <div class="descr">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor7
         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
         exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </div>
    </div>

  <!-- caratteristiche appartamento -->
    <div class="col-12 col-sm-12 offset-md-3 col-md-3 offset-lg-3 col-lg-3 offset-xl-3 col-xl-3 ">
      <div class="carat">
        <ul>
          <li>{{$apartment['rooms']}} stanze</li>
          <li>{{$apartment['beds']}} letti</li>
          <li>{{$apartment['bathrooms']}} bagni</li>
          <li>{{$apartment['mq']}} mq</li>
        </ul>
      </div>
    </div>




  {{-- MAPPA --}}
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
      <div class="map">

        <div id="latitude" class="dispna">
          {{$apartment["latitude"]}}
        </div>
        <div id="longitude" class="dispna">
          {{$apartment["longitude"]}}
        </div>
        <div id='map'></div>
      </div>
    </div>

  <!-- scrivi + email + messaggio -->
    <div class="col-12 col-sm-12 col-md-12 offset-lg-1 col-lg-5 offset-xl-1 col-xl-5 ">
      <div class="bordo">
        <div class="msg">
          <h1> <strong>Scrivi al proprietario</strong> </h1>
          <form class="" action="{{route('send_message_upra', $apartment['id'])}}" method="post">
            @csrf
            @method('POST')
            <div class="insert_dati">
              <input type="email"
              @if (isset(Auth::user() -> email))
              value="{{Auth::user() -> email}}"
              @else
              value=""
              @endif
              name="email" id="mail_msg" class="form-control" placeholder="Email">
            </div>
            <div class="insert_dati">
              <input type="text" name="message" id="message" class="form-control" placeholder="Scrivi il tuo messaggio">
            </div>
            <div class="invia">
              <button type="submit" value="Send" class="rimuovi" name="button">Invia</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
