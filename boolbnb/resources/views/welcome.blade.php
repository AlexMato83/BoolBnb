@extends('layouts.main_layout')

@section('content')


  <a href="{{route('prova_tomtom')}}">prova</a>
  <button id="provaApi" type="button" name="button">Prova Api</button>

    <form  action="{{route('ui_apartments')}}" method="post">
    @csrf
    @method("POST")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <label for="address">ADDRESS</label>
    <input id="apt_address" type="text" name="address" value="">

    <input class="dispna" id="longitude" type="text" name="longitude" value="">
    <input class="dispna" id="latitude" type="text" name="latitude" value="">

    <input id="search" class="dispna" type="submit" name="">
  </form>
  <button id="search2" type="text" name="" value="">search</button>

@endsection
