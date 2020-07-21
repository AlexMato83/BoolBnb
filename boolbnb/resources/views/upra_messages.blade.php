@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

<div class="container content">
    <div class="col-12">
      <div class="space"></div>
      <div class="space"></div>
      <h1 class="blu mb-5">I Miei Messaggi</h1>

      @foreach ($ordered_messages as $message)
        <div class="messaggio_destinatario mt-2 w-75 h-100">
          <h3 class="blu">Appartamento {{$message['name']}} - Messaggio n. {{$message['id']}}
          </h3>
          <p class="blu mb-2">{{$message['text']}}   <br><br><br>
            Inviato da: {{$message['email']}}
          </p>
        </div>
        <div class="space"></div>
      @endforeach

    </div>
  </div>
@endsection
