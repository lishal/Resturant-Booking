<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="{{url('/')}}">RRB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link @if(Request::is('home')) {{ 'active' }} @endif" href="{{url('/home')}}" style="font-size: 20px;">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link @if(Request::is('restaurantlist')) {{ 'active' }} @endif" href="{{url('/restaurantlist')}}" style="font-size: 20px;">Restaurant</a>
        <a class="nav-item nav-link @if(Request::is('contactus')) {{ 'active' }} @endif" href="{{url('/contactus')}}" style="font-size: 20px;">Contact Us</a>
        @if(!Auth::check())  
        <a class="nav-item nav-link" href="{{url('/login')}}" style="font-size: 20px;">Login</a>
        @endif
        @if(Auth::check())  
        <div  class="dropdown">
          <button class="btn dropdown-toggle" style="height:50px;" type="button" data-toggle="dropdown">{{ Auth::user()->name }} 
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
              <a class="dropdown-item"  href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
           </a>
   
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
           </form>
          </ul>
        </div>
        @endif
      </div>
    </div>
  </nav>