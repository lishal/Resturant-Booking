<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<h3 style="text-align: center;color: white;">Welcome</h3>
<h4 style="color: white;text-align: center;">{{{Auth::user()->firstname }}}&nbsp;{{{Auth::user()->lastname }}}</h4>
<hr style="background-color: white; margin-bottom:40px; height:3px;">
  <a href="{{url('/menu')}}">Menu/Logo</a>
  <a href="{{url('/seat')}}/{{{Auth::user()->id }}}">Seat</a>
  <a href="{{url('/availablecustomer')}}">Customer</a>
  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    <input type="hidden" name="redirect" id="redirect">
</form>
<a  id="logoutBtn" href="{{url('/logout')}}" method="POST">Logout</a>