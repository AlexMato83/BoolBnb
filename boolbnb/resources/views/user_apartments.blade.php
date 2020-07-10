@extends('layouts.mainLayout')

@section('content')
  <div class="crea_appartamento">
    <h2><a href="{{route('create_apartment')}}">Crea nuovo appartamento</a>
    </h2> 
  </div>
  <div class="appartamenti_proprietario">
    @foreach ($apartments as $apartment)
      <a href="{{route('show_upra_apartment',$apartment['id'])}}">
        {{$apartment["name"]}}
        <img src="{{ asset($apartment['images']) }}"></a><br>
    @endforeach
  </div>



@endsection
