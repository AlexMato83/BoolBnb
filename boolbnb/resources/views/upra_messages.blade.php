@extends('layouts.mainLayout')

@section('content')
  <div class="contenitore_messaggi">
    @foreach ($ordered_messages as $message)
      <div class="email_destinatario">
        {{$message['email']}}
      </div>
      <div class="messaggio_destinatario">
        <h3>Appartamento "{{$message['apartment_id']}}" Messaggio "{{$message['id']}}" </h3>
        <p>{{$message['text']}}</p>       
      </div>
    @endforeach
  </div>
@endsection
