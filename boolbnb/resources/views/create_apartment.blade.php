@extends('layouts.mainLayout')

@section('content')
  @include('components.header_generic')

  <div class="container">
    <div class="row">
      <div class="space"></div>
      <div class="space"></div>
      <div class="space"></div>
      <div class="content_create">
    <div class="col-12 titolo-principale">
      <h1 class="blu">Inserisci il tuo appartamento</h1>
    </div>

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

    <div class="dim">

      <div class="col-12 col-md-6 dimdue">
        <label for="name">Nome</label>
        <input type="text" name="name" value="">
      </div>

      <div class="col-12 col-md-6 dimdue">
        <label for="address">Indirizzo</label>
        <input id="apt_address" type="text" name="address" value="">
      </div>

      <div class="col-12 col-md-6 dimdue ridim">
        <label for="mq">Metri Quadri</label>
        <input  type="number" name="mq" value="">
      </div>

      <div class="col-12 col-md-6 dimdue ridim">
        <label for="rooms">Stanze</label>
        <input  type="number" name="rooms" value="">
      </div>

      <div class="col-12 col-md-6 dimdue ridim">
        <label for="bathrooms">Bagni</label>
        <input  type="number" name="bathrooms" value="">
      </div>

      <div class="col-12 col-md-6 dimdue ridim">
        <label for="beds">Posti Letto</label>
        <input type="number" name="beds" value="">
      </div>

      <input class="dispna" id="longitude" type="text" name="longitude" value="">
      <input class="dispna" id="latitude" type="text" name="latitude" value="">


      <div class="col-12 col-md-6 dimdue">
        <label for="descr">Descrizione</label>
        <input type="text" name="descr" value="">
      </div>

      <div class="col-12 dimdue">


        <label for="images">Foto</label>
        <input  type="file" name="images" value=""><br>
      </div>
    </div>

    <div class="col-12">
        <label class="color" for="services[]">SERVICES</label>
    </div>




    @foreach ($services as $service)

    <div class="col-4 col-md-3 display">
      <div class="flexino">
        <input class="checkbox" type="checkbox" name="services[]" value="{{$service['id']}}">
        {{$service['name']}}
      </div>
    </div>
    @endforeach

    <div class="col-12 selectsi">
      <label for="visibility">Appartamento visibile sul sito</label>
      <select class="" name="visibility">
        <option value="0">No</option>
        <option value="1" selected>Si</option>
      </select>
    </div>

    <input id="create" class="dispna" type="submit" name="" value="Create">

  </form> <br>


  <div class="bt">
    <button id="create2" type="button" name="" value="">Crea appartamento</button>

  </div>
</div>
</div>

</div>
<div class="space"></div>
<div class="space"></div>
<div class="space"></div>

@endsection
