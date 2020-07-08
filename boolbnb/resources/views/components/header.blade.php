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
