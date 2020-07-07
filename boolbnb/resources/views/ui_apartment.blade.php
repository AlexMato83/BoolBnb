@extends('layouts.main_layout')

@section('content')
  <div class="">
    {{$apartment['name']}}<br>
    {{$apartment['mq']}}<br>
    {{$apartment['address']}}<br>
    {{$apartment['rooms']}}<br>
    {{$apartment['bathrooms']}}<br>
    {{$apartment['beds']}}<br>
    {{$apartment['images']}}
  </div>
  <form action="{{route('send_message_upra', $apartment['id'])}}" method="post">
      @csrf
      @method('POST')
      <label for="email">EMAIL</label>
      <input type="email"
      @if (isset(Auth::user() -> email))
      value="{{Auth::user() -> email}}"
      @else
      value=""
      @endif

      name="email">

      <label for="text">TEXT</label>
      <input type="text" name="text">

      <input type="submit" value="Send">

  </form>
@endsection