@extends('layouts.main_layout')

@section('content')

  <form  action="{{route('store_apartment')}}" method="post" enctype="multipart/form-data">
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


    <label for="name">NAME</label>
    <input type="text" name="name" value="">

    <label for="mq">MQ</label>
    <input type="text" name="mq" value="">

    <label for="rooms">ROOMS</label>
    <input type="text" name="rooms" value="">

    <label for="bathrooms">BATHROOMS</label>
    <input type="text" name="bathrooms" value="">

    <label for="address">ADDRESS</label>
    <input id="apt_address" type="text" name="address" value="">

    <input class="dispna" id="longitude" type="text" name="longitude" value="">
    <input class="dispna" id="latitude" type="text" name="latitude" value="">


    <label for="images">IMAGES</label>
    <input type="file" name="images" value="">

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

    <label for="visibility">visibility</label>
    <select class="" name="visibility">
      <option value="0">No</option>
      <option value="1" selected>Si</option>

    </select>


    <button id="create2" type="text" name="" value="">Create</button>
    <input id="create" class="dispna" type="submit" name="" value="Create">
  </form>

@endsection
