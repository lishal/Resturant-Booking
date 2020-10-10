<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="#">Hajur Buy</a>
    <ul class="navbar-nav">
      <li class="@if(Request::is('*/*')) {{ 'active' }} @endif">
        <a class="nav-link" href="{{ url('/') }}"> Home <i class="fa fa-home "></i></a>
      </li>
      <li class="@if(Request::is('*/Contact*')) {{ 'active' }} @endif">
        <a class="nav-link" href="{{ url('/') }}"> Contact   <i class="fas fa-phone-square-alt"></i></a>
      </li>
      <li class="@if(Request::is('*/Wishlist*')) {{ 'active' }} @endif">
        <a class="nav-link" href="{{ url('/') }}"> Wishlist <i class="fa fa-shopping-basket "></i> </a>
      </li>
      <li class="@if(Request::is('*/Cart*')) {{ 'active' }} @endif">
        <a class="nav-link" href="{{ url('/') }}"> Cart <i class="fas fa-shopping-cart"></i> </a>
      </li>
      
      <li class="@if(Request::is('*/Login*')) {{ 'active' }} @endif" style="margin-left:220%;">
        <a class="nav-link" href="{{ url('/login') }}"> Login <i class="fas fa-user-circle"></i> </a>
      </li>
      <li class="@if(Request::is('*/Register*')) {{ 'active' }} @endif" style="float:right;">
        <a class="nav-link" href="{{ url('/register') }}"> Register <i class="fa fa-user-plus"></i> </i></a>
      </li>
    </ul>
  </nav>
  