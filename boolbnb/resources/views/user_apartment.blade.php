@extends('layouts.main_layout')

@section('content')

  <a href="{{route('create_apartment')}}">Isert new apartment</a> <br>

  @foreach ($apartments as $apartment)
    <a href="{{route('create_view', $apartment['id'])}}">{{$apartment["name"]}}</a><br>
  @endforeach
@endsection
