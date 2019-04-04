<!DOCTYPE html>
<link href="/css/slideshow.css" rel="stylesheet">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

  <div class="slideshow-container">

    <header class="mySlides fade">
      <img src="/images/home/1.jpg" style="width:100%">
    </header>

    <header class="mySlides fade">
      <img src="/images/home/2.jpg" style="width:100%">
    </header>

    <header class="mySlides fade">
      <img src="/images/home/3.jpg" style="width:100%">
    </header>

  </div>

  <div>
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
  </div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>

</body>
</html> 