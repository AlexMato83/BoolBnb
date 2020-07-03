@extends('layouts.main_layout')

@section('content')

  <form  action="{{route('store_apartment')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("POST")

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



    <input type="submit" name="" value="Create">

  </form>

@endsection
