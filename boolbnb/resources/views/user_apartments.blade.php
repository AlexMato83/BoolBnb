@extends('layouts.main_layout')

@section('content')

  <a href="{{route('create_apartment')}}">Isert new apartment</a> <br>

  @foreach ($apartments as $apartment)
    <a href="{{route('show_upra_apartment',$apartment['id'])}}">{{$apartment["name"]}}<img src="{{ asset($apartment['images']) }}" style="width: 40px; height: 40px; border-radius: 50%;"></a><br>
  @endforeach
@endsection
