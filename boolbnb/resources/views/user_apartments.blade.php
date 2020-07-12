@extends('layouts.mainLayout')

@section('content')
<div class="offset-3 offset-sm-3 offset-md-3 offset-lg-3 offset-xl-3 col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
  <div class="crea_appartamento">
    <h1><a href="{{route('create_apartment')}}">Crea nuovo appartamento <br> <i class="fas fa-plus"></i><i class="fas fa-home"></i>
    </a>
    </h1>
  </div>
  </div>

<div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5"> -->
  <div class="risultati_appartamenti_proprietario">
    @foreach ($apartments as $apartment)

      <div class="appartamenti_proprietario">
        <div class="appartamenti_proprietario_foto">
          <a href="{{route('show_upra_apartment',$apartment['id'])}}">
            <img class="prova" src="{{ asset($apartment['images'])}}">
          </a>
        </div>
        <div class="appartamenti_proprietario_nome">
          <h2>
            <a href="{{route('show_upra_apartment',$apartment['id'])}}">
              {{$apartment["name"]}}
            </a>
          </h2>
          </div>
          @endforeach
        </div>
      </div>
        <!-- </div> -->


@endsection
