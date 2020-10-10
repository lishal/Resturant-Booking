<h2 style="text-align:center">Advertise Here</h2>

<div class="slideshow-container" style="margin:0px;padding:0px;">
  <div class="mySlides">
    <img src="{{url ('bannerImg/img1.jpg')}}" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="{{url ('bannerImg/img2.jpg')}}" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="{{url ('bannerImg/img3.jpg')}}" style="width:100%">
  </div>
    
  <div class="mySlides">
    <img src="{{url ('bannerImg/img1.jpg')}}" style="width:100%">
  </div>

  <div class="mySlides">
    <img src="{{url ('bannerImg/img2.jpg')}}"style="width:100%">
  </div>
    
  <div class="mySlides">
    <img src="{{url ('bannerImg/img3.jpg')}}" style="width:100%">
  </div>
    
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
    <span class="dot" onclick="currentSlide(4)"></span> 
    <span class="dot" onclick="currentSlide(5)"></span> 
    <span class="dot" onclick="currentSlide(6)"></span> 
  </div>

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
  showSlides(n);
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
    setTimeout(showSlides, 2000);
  }


  </script>