@extends('layouts.main_layout')

@section('content')

  @if (Route::has('login'))
      <div class="top-right links">
          @auth
              <a href="{{ url('/home') }}">Home</a>
          @else
              <a href="{{ route('login') }}">Login</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}">Register</a>
              @endif
          @endauth
      </div>
  @endif
  <a href="{{route('prova_tomtom')}}">prova</a>
  <button id="provaApi" type="button" name="button">Prova Api</button>

    <form  action="{{route('ui_apartments')}}" method="post" enctype="multipart/form-data">
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

    <label for="rooms">ROOMS</label>
    <input type="text" name="rooms" value="">

    <label for="beds">BEDS</label>
    <input type="text" name="beds" value="">

    <label for="address">ADDRESS</label>
    <input id="apt_address" type="text" name="address" value="">

    <input class="dispna" id="longitude" type="text" name="longitude" value="">
    <input class="dispna" id="latitude" type="text" name="latitude" value="">

    <label for="services[]">SERVICES</label>
    @foreach ($services as $service)
        <div>
            <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}">
            {{$service['name']}}
        </div>
    @endforeach
    <label for="category_id">Category</label>
    <select class="" name="category_id">
      @foreach ($categories as $category)
        <option value="{{$category['id']}}">{{$category['name']}}</option>

      @endforeach
    </select>

    <button id="search2" type="text" name="" value="">search</button>
    <input id="search" class="dispna" type="submit" name="">
  </form>
@endsection
