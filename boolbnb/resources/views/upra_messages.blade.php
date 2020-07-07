@extends('layouts.main_layout')

@section('content')

  @foreach ($ordered_messages as $message)
    {{$message['email']}} {{$message['text']}} {{$message['id']}} {{$message['apartment_id']}}<br>
  @endforeach
@endsection
