@extends('layouts.mainLayout')

@section('content')

  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="search">
      <input class="dove" type="text" id="dove" class="form-control" placeholder="Dove vuoi andare?">
      <button class="cerca" type="button" name="button"><i class="fas fa-search"></i><strong>Cerca</strong></button>
    </div>
  </div>

  {{-- debug --}}
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="evidenza">

      <h1>Appartamenti consigliati</h1>

      <div class="apartments">

        <div class="apartment">

          <div class="foto">
            <img src="/img/1-1.jpeg"/>
          </div>

          <div class="titolo">
            <h3><a href="#">Beautiful suit near Duomo</a></h3>
          </div>

        </div>

        <div class="apartment">
          <div class="foto">
            <img src="/img/2-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3><a href="#">Residenza Toselli</a></h3>
          </div>
        </div>
        <div class="apartment">
          <div class="foto">
            <img src="/img/3-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3><a href="#">Private room</a></h3>
          </div>
        </div>
        <div class="apartment">

          <div class="foto">
            <img src="/img/1-1.jpeg"/>
          </div>

          <div class="titolo">
            <h3><a href="#">Beautiful suit near Duomo</a></h3>
          </div>

        </div>

        <div class="apartment">
          <div class="foto">
            <img src="/img/2-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3><a href="#">Residenza Toselli</a></h3>
          </div>
        </div>
        <div class="apartment">
          <div class="foto">
            <img src="/img/3-1.jpeg"/>
          </div>
          <div class="titolo">
            <h3><a href="#">Private room</a></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- debug --}}


  {{-- Da collegare con il database --}}

  {{-- <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
    <div class="evidenza">

      <h1>Appartamenti consigliati</h1>

      <div class="apartments">

      </div>
    </div>
  </div> --}}
  {{-- <script class="apartmentEvidence-template" type="text/x-handlebars-template">  
				<div class="apartment">
					<div class="foto">
						<img src=""/>
					</div>
					<div class="titolo">
						<h3></h3>
					</div>
				</div>
		</script> --}}

@endsection
