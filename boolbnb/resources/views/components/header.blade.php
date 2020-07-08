

<div class="offset-1 col-5 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-3 offset-xl-1 col-xl-3">
  <div class="logo">
    <img src="/img/logo.jpg">
  </div>
  <div class="barre">
    <a href="#">
      <i class="fas fa-bars"></i>
    </a>
  </div>
</div>

<div class="offset-md-1 col-md-5 offset-lg-3 col-lg-5 offset-xl-3 col-xl-5">

  <div class="navigazione prova">
    <ul>
      <li><a href="#"><strong>Diventa un host</strong></a><li>
      <li ><a class="reg" href="#"><strong>Registrati</strong></a><li>
      <li><button class="tasto" type="button" name="button"><strong>Accedi</strong></button></li>
    </ul>
  </div>
</div>

<div class="lista_ham">
  <div class="hamburger-menu off">
    <div class="chiusura">
      <a href="#" class="close">
        <i class="fas fa-times"></i>
      </a>
    </div>
    <div class="ham">
      <ul>
        <li><a href="#" ><strong>Diventa un host</strong></a><li>
        <li><a class="reg" href="#"><strong>Registrati</strong></a><li>
        <li><button class="tasto" type="button" name="button"><strong>Accedi</strong></button></li>
      </ul>
    </div>
  </div>
</div>

<div class="accedi off">
  <h1>Accedi</h1>
  <div class="input">
    <input type="mail" id="mail" class="form-control" placeholder="Inserisci la tua email">
  </div>
  <div class="input">
    <input type="password" id="password" class="form-control" placeholder="Inserisci la tua password">
  </div>
  <div class="continua">
    <button type="button" class="rimuovi" name="button">Continua</button>
  </div>
</div>

<div class="registrati off">
  <h1>Registrati</h1>
  <div class="input">
    <input type="email" id="mail" class="form-control" placeholder="Inserisci la tua email">
  </div>
  <div class="input">
    <input type="password" id="password" class="form-control" placeholder="Inserisci la tua password">
  </div>
  <div class="input">
    <input type="text" id="nome" class="form-control" placeholder="Inserisci il tuo nome">
  </div>
  <div class="input">
    <input type="text" id="cognome" class="form-control" placeholder="Inserisci il tuo cognome">
  </div>
  <div class="input">
    <input type="date" id="dataDiNascita" class="form-control" placeholder="Inserisci la tua data di nascita">
  </div>
  <div class="continua">
    <button type="button" class="rimuovi" name="button">Continua</button>
  </div>
</div>

<header>

 @if (Route::has('login'))
     <div class="top-right links">
         @auth
             {{-- <a href="{{ url('/home') }}">Home</a> --}}
         @else
             <a href="{{ route('login') }}">Login</a>

             @if (Route::has('register'))
                 <a href="{{ route('register') }}">Register</a>
             @endif
         @endauth
     </div>
 @endif

@auth
  <a class="dropdown-item" href="{{ route('logout') }}"
     onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
 <a href="{{route('user_apartments')}}">APARTMENTS</a><br>
 <a href="{{route('show_messages')}}">User Message</a><br>
@endauth
<a href="{{route('welcome')}}">WELCOME</a>

</header>
