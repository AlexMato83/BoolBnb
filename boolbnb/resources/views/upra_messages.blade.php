@extends('layouts.mainLayout')

@section('content')
  <div class="contenitore_messaggi">
    @foreach ($ordered_messages as $message)
      <div class="email_destinatario">
        {{$message['email']}}
      </div>
      <div class="messaggio_destinatario">
        <h3>Appartamento "{{$message['apartment_id']}}" Messaggio "{{$message['id']}}" </h3>
        <p>{{$message['text']}}Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>       
      </div>
    @endforeach
  </div>
@endsection
