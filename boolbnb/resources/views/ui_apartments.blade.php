@extends('layouts.main_layout')
@section('content')
    @foreach ($apartments_found as $apartment)
        <a href="{{route('ui_apartment',$apartment['id'])}}">{{$apartment['name']}}</a><br>
    @endforeach
@endsection
