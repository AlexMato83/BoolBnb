@extends('layouts.payment_layout')
@section('content')
<p id='apt_name'>{{$apartment['name']}}</p>
<p id='id' class='dispna'>{{$apartment['id']}}</p>
<p id='price' class="dispna">{{$sponsorshipstype['price']}}</p>
<h4>Inserisci titolo della sponsorizzazione</h4>
<input class="sear_bar" type="text" name="title" id="title">
<h4>Stabilisci data di inizio</h4>
<input class="sear_bar" type="date" name="start_date" id="start_date">
<div id="dropin-container"></div>
<button id="submit-button">Procedi</button>
<button id="pay" class="dispna" >Paga</button>
@endsection
