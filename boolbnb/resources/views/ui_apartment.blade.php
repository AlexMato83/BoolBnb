@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

  <div class="container">

    <div class="row">
      <!-- titolo e foto appartamento -->
        <div class="offset-1 col-10">
          <div class="space"></div>
          <div class="space"></div>
          <h1 class="blu text-center">{{$apartment['name']}}</h1>
          <div class="space"></div>
          <h3 class="blu text-center">{{$apartment['address']}}</h3>
          <div class="space"></div>
          <div class="foto">
            <img class="w-100" src="{{ asset($apartment['images']) }}"/>
          </div>
        </div>
    </div>

    <div class="row">
      <!-- caratteristiche appartamento -->
      <div class="col-12 text-center">
        <div class="space"></div>
        <span class="blu text-center paragrafo_appartamento">{{$apartment['rooms']}} stanze - {{$apartment['beds']}} letti - {{$apartment['bathrooms']}} bagni - {{$apartment['mq']}} mq</span></li><br>
        <div class="space"></div>
        <span class="blu text-center paragrafo_appartamento">Servizi</span>
        <div class="space"></div>
      </div>
    </div>

    <div class="row">

      <!-- descrizione appartamento  -->
      <div class="col-12 text-center">
        <div class="space"></div>
        <p class="paragrafo_appartamento">Bellissima Villa nel verde del Salento, 85 mq, tranquilla e lussuosa. La Casa è stat recentemente ristrutturata completamente. Ha un pergolato bellissimo e una terrazza grande, molto romantica.<br>

        Lo spazio
        La posizione in una zona bellissima nel cuore del Salento, residenziale e naturale allo stesso momento. 25 Km a sud di Lecce, a 5 minuti da Galatina e 3 minuti da Cutrofiano ed Aradeo.<br>

        Accesso per gli ospiti
        Grande giardino bellissimo con molte piante, Palme e alberi di frutta. Parcheggio privato per 2 auto. Spazi al esterno, pergolato, terrazza grande e molto di più.</p>
      </div>
    </div>




      {{-- MAPPA --}}
    <div class="row">
      <div class="col-12">
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
    </div>

      <!-- scrivi + email + messaggio -->
    <div class="row">
      <div class="col-12 text-center">
        {{-- Modal --}}
        <div class="container">
          <!-- Button to Open the Modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Scrivi al proprietario
          </button>
          <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="msg py-5">
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
        </div>
      </div>
    </div>
  </div>

  <div class="space"></div>
  <div class="space"></div>
  <div class="space"></div>
@endsection
