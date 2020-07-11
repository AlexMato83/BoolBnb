@extends('layouts.mainLayout')

@section('content')
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

    <div class="crea_appartamento">
      <h1><a href="{{route('create_apartment')}}">Crea nuovo appartamento</a>
      </h1>
    </div>

    <div class="risultati_appartamenti_proprietario">
      @foreach ($apartments as $apartment)
        <div class="appartamenti_proprietario">
          <div class="appartamenti_proprietario_foto">
            <a href="{{route('show_upra_apartment',$apartment['id'])}}">
              <img src="{{ asset($apartment['images'])}}">
            </a>
          </div>
          <div class="appartamenti_proprietario_nome">
            <h2>
              <a href="{{route('show_upra_apartment',$apartment['id'])}}">
                {{$apartment["name"]}}
              </a>
            </h2>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
