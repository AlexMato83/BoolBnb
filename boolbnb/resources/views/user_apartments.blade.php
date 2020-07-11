@extends('layouts.mainLayout')

@section('content')
  <div class="crea_appartamento">
    <h1><a href="{{route('create_apartment')}}">Crea nuovo appartamento</a>
    </h1>
  </div>
  <div class="appartamenti_proprietario">
    @foreach ($apartments as $apartment)
      <div class="appartamenti_proprietario_foto">
        <a href="{{route('show_upra_apartment',$apartment['id'])}}">
          <img src="{{ asset($apartment['images'])}}">
        </a>
      </div>
      <div class="appartamenti_proprietario_nome">
        <a href="{{route('show_upra_apartment',$apartment['id'])}}">
          {{$apartment["name"]}}
        </a>
      </div>



    @endforeach
  </div>



@endsection
