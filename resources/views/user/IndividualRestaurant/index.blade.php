@extends('user.layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
    @if($restaurant->image=="")
      <img class="card-img-top" src="{{asset('slider/noimage.jpg')}}" alt="{{$restaurant->restaurant_name}}" style="width:70px; height:70px; border-radius:50%;float:left; margin-left:3%;"  >
    @else
    <img src="{{asset('uploads/company_images')}}/{{$restaurant->image}}" style="width:70px; height:70px; border-radius:50%;float:left;margin-left:3%;" alt="{{$restaurant->restaurant_name}}"> 
    @endif
    <h1 style=" margin:10px;margin-left:10%"><b>{{ $restaurant->restaurant_name }}</b></h1></div>
    
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#!" class="btn btn-primary">Go somewhere</a> --}}
      <div class="container">
        <div class="mySlides">
          <div class="numbertext">1 / 6</div>
          <img src="{{asset('slider/pic1.jpg')}}" style="width:100%">
        </div>
      
        <div class="mySlides">
          <div class="numbertext">2 / 6</div>
          <img src="{{asset('slider/pic2.jpg')}}" style="width:100%">
        </div>
      
        <div class="mySlides">
          <div class="numbertext">3 / 6</div>
          <img src="{{asset('slider/pic3.jpg')}}" style="width:100%">
        </div>
          
        <div class="mySlides">
          <div class="numbertext">4 / 6</div>
          <img src="{{asset('slider/pic4.jpg')}}" style="width:100%">
        </div>
      
        <div class="mySlides">
          <div class="numbertext">5 / 6</div>
          <img src="{{asset('slider/pic5.jpg')}}" style="width:100%">
        </div>
          
        <div class="mySlides">
          <div class="numbertext">6 / 6</div>
          <img src="{{asset('slider/pic6.jpg')}}" style="width:100%">
        </div>
          
        <a class="prev" onclick="plusSlides(-1)" style="color: white"> ❮</a>
        <a class="next" onclick="plusSlides(1)" style="color: white">❯</a>
      
      
      
        <div class="row">
          <div class="column">
            <img class="demo cursor" src="{{asset('slider/pic1.jpg')}}" style="width:100%" height="100%" onclick="currentSlide(1)">
          </div>
          <div class="column">
            <img class="demo cursor" src="{{asset('slider/pic2.jpg')}}" style="width:100%" height="100%" onclick="currentSlide(2)" >
          </div>
          <div class="column">
            <img class="demo cursor" src="{{asset('slider/pic3.jpg')}}" style="width:100%" height="100%" onclick="currentSlide(3)" >
          </div>
          <div class="column">
            <img class="demo cursor" src="{{asset('slider/pic4.jpg')}}" style="width:100%" height="100%" onclick="currentSlide(4)" >
          </div>
          <div class="column">
            <img class="demo cursor" src="{{asset('slider/pic5.jpg')}}" style="width:100%" height="100%" onclick="currentSlide(5)" >
          </div>    
          <div class="column">
            <img class="demo cursor" src="{{asset('slider/pic6.jpg')}}" style="width:100%" height="100%" onclick="currentSlide(6)">
          </div>
        </div>
      </div>
      
      
    </div>
    <center>
    <div class="card text-white bg-info mb-3" style="max-width: 100rem; ">
      <div class="card-header">About Restaurant</div>
      <div class="card-body">
        <h5 class="card-title">Owner Name</h5>
        <p class="card-text text-white">{{$restaurant->firstname}}&nbsp;{{$restaurant->lastname}}</p>
        <h5 class="card-title"><i class='fas fa-phone-alt' style='font-size:20px;'></i>&nbsp;&nbsp;Phone Number</h5>
        <p class="card-text text-white" style="font-size:18px;">{{$restaurant->phone_number}}</p>
        <h5 class="card-title">Description</h5>
        <p class="card-text text-white">{{$restaurant->description}}</p>
          <a href="{{url('/menu')}}/{{$restaurant->restaurant_id}}"><button type="button" class="btn btn-primary" style="font-size: 20px;">Menu</button></a>
          <a href="{{url('/bookrestaurant')}}/{{$restaurant->restaurant_id}}">
          <button type="button" class="btn btn-success" style="font-size: 20px;">Book Now</button>
        </a>
      </div>
    </div>
    </center>
  </div>
  <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>
  @endsection 