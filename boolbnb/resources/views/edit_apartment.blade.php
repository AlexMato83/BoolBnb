@extends('layouts.main_layout')

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

    <label for="address">ADDRESS</label>
    <input type="text" name="address" value="{{$apartment['address']}}">

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



    <input type="submit" name="" value="Update">

  </form>

@endsection
