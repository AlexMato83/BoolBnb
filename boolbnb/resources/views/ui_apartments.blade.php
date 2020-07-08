@extends('layouts.main_layout')
@section('content')
  <form  action="{{route('ui_filtered_apt')}}" method="post">
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

  <label for="search_radius">Search Radius Km</label>
  <input id="search_radius" type="number" name="search_radius" value="20">

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

  <input id="filtered" class="dispna" type="submit" name="">
</form>
<button id="filtered2" type="text" name="" value="">search</button>

    @foreach ($apartments_found as $apartment)
        <a href="{{route('create_view',$apartment['id'])}}">{{$apartment['name']}}</a><br>
    @endforeach
@endsection
