
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Staff</title>

  <!-- Custom fonts for this template-->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/staff.css') }}" rel="stylesheet">

</head>

<body>
    {{-- Side Nav Bar --}}
    <div id="mySidenav" class="sidenav" >
        @include('staff.sidebar')
    </div>

    {{-- Main Content --}}
    <div id="main">
        <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; </span>
        <section class="content container-fluid" style="margin-top:2%">
            @yield('content')
          </section>
    </div>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <!-- Custom scripts for all pages-->
  
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "white";
    }
    </script>
  
  {{-- For Logout --}}
  <script type="text/javascript">
    $('#logoutBtn').on('click', function(e){
      e.preventDefault();
      $('#logout-form').submit();
    });

    // For Confirmation
    function confirmDelete()
{
	if(confirm('Are you sure to delete this item?') == true) {
		return true;
	}
	else {
		return false;
	}
}
function confirmCustomer()
{
	if(confirm('Are you sure your customer has gone?') == true) {
		return true;
	}
	else {
		return false;
	}
}
  
  </script>
  


</body>

</html>
