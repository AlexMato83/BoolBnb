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
    <input type="text" name="address" value="">

    <label for="images">IMAGES</label>
    <input type="file" name="images" value="">

    <label for="services[]">SERVICES</label>
    @foreach ($services as $service)
        <div>
            <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}">
            {{$service['name']}}
        </div>
    @endforeach



    <input type="submit" name="" value="Create">

  </form>

@endsection
