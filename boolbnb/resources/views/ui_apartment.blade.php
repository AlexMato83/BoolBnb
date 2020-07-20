@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

  <div class="container.fluid">

    <!-- titolo e foto appartamento -->
    <div class="row">
      <div class="offset-1 col-10">
        <div class="space"></div>
        <div class="space"></div>
        <h1 class="titolo-appartamento text-center mb-3">{{$apartment['name']}}</h1>
        <h3 class="blu mb-3">{{$apartment['address']}}</h3>
      </div>
    </div>

    <div class="row">
      <div class="offset-1 col-7">
        <img class="w-100" src="{{asset($apartment['images']) }}"/>
      </div>
      <div class="col-3 text-center align-items-center">
        <ul>
          <li>{{$apartment['rooms']}} stanze</li>
          <li>{{$apartment['beds']}} letti</li>
          <li>{{$apartment['bathrooms']}} bagni</li>
          <li>{{$apartment['mq']}} mq</li>
        </ul>
      </div>
    </div>

    <!-- descrizione appartamento  -->
    <div class="offset-1 col-10">
      <div class="space"></div>
      <p class="paragrafo_appartamento">Bellissima Villa nel verde del Salento, 85 mq, tranquilla e lussuosa. La Casa è stat recentemente ristrutturata completamente. Ha un pergolato bellissimo e una terrazza grande, molto romantica.<br>

      Lo spazio
      La posizione in una zona bellissima nel cuore del Salento, residenziale e naturale allo stesso momento. 25 Km a sud di Lecce, a 5 minuti da Galatina e 3 minuti da Cutrofiano ed Aradeo.<br>

      Accesso per gli ospiti
      Grande giardino bellissimo con molte piante, Palme e alberi di frutta. Parcheggio privato per 2 auto. Spazi al esterno, pergolato, terrazza grande e molto di più.</p>
    </div>


    {{-- MAPPA --}}
    <div class="offset-1 col-10">
      <div class="map">
        <div id="latitude" class="dispna">
          {{$apartment["latitude"]}}
        </div>
        <div id="longitude" class="dispna">
          {{$apartment["longitude"]}}
        </div>
        <div class="" id='map'></div>
      </div>
    </div>

    <!-- scrivi + email + messaggio -->
      <div class="col-12 col-sm-12 col-md-12 col-lg-5  col-xl-5 ">
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
                <input type="text" name="text" id="message" class="form-control" placeholder="Scrivi il tuo messaggio">
              </div>
              <div class="invia">
                <button type="submit" value="Send" class="rimuovi" name="button">Invia</button>
              </div>
            </form>
          </div>
        </div>
      </div>

  </div>
@endsection
