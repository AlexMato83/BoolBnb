@extends('layouts.mainLayout')

@section('content')

  <form  action="{{route('update_apartment' , $apartment['id'])}}" method="post" enctype="multipart/form-data">
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
    <input type="text" name="name" value="{{$apartment['name']}}">

    <label for="mq">MQ</label>
    <input type="text" name="mq" value="{{$apartment['mq']}}">

    <label for="rooms">ROOMS</label>
    <input type="text" name="rooms" value="{{$apartment['rooms']}}">

    <label for="bathrooms">BATHROOMS</label>
    <input type="text" name="bathrooms" value="{{$apartment['bathrooms']}}">

    <label for="beds">beds</label>
    <input type="text" name="beds" value="{{$apartment['beds']}}">

    <label for="address">ADDRESS</label>
    <input id="apt_address" type="text" name="address" value="{{$apartment['address']}}">

    <input class="dispna" id="longitude" type="text" name="longitude" value="">
    <input class="dispna" id="latitude" type="text" name="latitude" value="">

    <label for="images">IMAGES</label>
    <input type="file" name="images" value="{{$apartment['images']}}">

    <label for="services[]">SERVICES</label>
    @foreach ($services as $service)
        <div>
            <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}"
                @foreach ($apartment-> services as $apt_service)
                    @if ($apt_service -> id === $service['id'])
                        checked
                    @endif
                @endforeach
            >
            {{$service['name']}}
        </div>
    @endforeach

    <label for="category_id">Category</label>
    <select class="" name="category_id">
      @foreach ($categories as $category)
        <option value="{{$category['id']}}"
        @if ($apartment["category_id"] == $category["id"] )
          selected
        @endif
        >{{$category['name']}}</option>

      @endforeach
    </select>

    <label for="visibility">visibility</label>
    <select class="" name="visibility">
      <option value="0">No</option>
      <option value="1" selected>Si</option>

    </select>

    <input id="create" class="dispna" type="submit" name="" value="">

  </form>
  <button id="create2" type="text" name="" value="">Update</button>

@endsection
