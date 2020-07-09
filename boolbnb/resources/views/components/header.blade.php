

{{-- LOGO HEADER--}}

<div class="offset-1 col-5 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-3 offset-xl-1 col-xl-3">
  <div class="logo">
    <a href="{{route('welcome')}}"><img src="/img/logo.jpg"></a>
  </div>
  {{-- TRE BARRE HAMBURGER MENU --}}
  <div class="barre">
    <a href="#">
      <i class="fas fa-bars"></i>
    </a>
  </div>
</div>

{{-- MENU HEADER --}}
<div class="offset-md-2 col-md-4 offset-lg-4 col-lg-4 offset-xl-4 col-xl-4">
  <div class="navigazione prova">
    <ul>
      <li><button class="reg" type="button" name="button"><strong>Registrati</strong></button><li>
      <li><button class="tasto" type="button" name="button"><strong>Accedi</strong></button></li>
    </ul>
  </div>
</div>

{{-- HAMBURGER MENU --}}
<div class="lista_ham">
  <div class="hamburger-menu off">
    <div class="chiusura">
      <a href="#" class="close">
        <i class="fas fa-times"></i>
      </a>
    </div>
    <div class="ham">
      <ul>
        @if (Route::has('login'))
          @auth
            @else
              <li><a class="reg" href="#"><strong>Registrati</strong></a><li>
            @if (Route::has('register'))
              <a class="tasto" href="{{route('register') }}">Accedi</a> {{-- CHIEDERE BE --}}
            @endif
          @endauth
        @endif
      </ul>
    </div>
  </div>
</div>



{{-- <div class="accedi off">
  <h1>Accedi</h1>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Login') }}</div>

                  <div class="card-body">
                      <form method="POST" action="{{ route('login') }}">
                          @csrf

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                      <label class="form-check-label" for="remember">
                                          {{ __('Remember Me') }}
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Login') }}
                                  </button>

                                  @if (Route::has('password.request'))
                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                          {{ __('Forgot Your Password?') }}
                                      </a>
                                  @endif
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

</div> --}}

<div class="registrati off">
  <h1>Registrati</h1>
  {{-- <div class="input">
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
  </div> --}}
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Register') }}</div>

                  <div class="card-body">
                      <form method="POST" action="{{ route('register') }}">
                          @csrf

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                              <div class="col-md-6">
                                  <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autofocus>

                                  @error('lastname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                              <div class="col-md-6">
                                  <input id="dateOfBirth" type="text" class="form-control @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth" value="{{ old('dateOfBirth') }}"  autofocus>

                                  @error('dateOfBirth')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              </div>
                          </div>

                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Register') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

</div>

<header>


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

</header>
