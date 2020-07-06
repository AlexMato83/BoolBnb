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
  <a href="{{route('edit_apartment',$apartment['id'])}}">MODIFICA appartamento</a><br>
  <a href="{{route('delete_apartment',$apartment['id'])}}">CANCELLA appartamento</a>
@endsection
