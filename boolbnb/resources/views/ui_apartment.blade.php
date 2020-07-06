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
@endsection
