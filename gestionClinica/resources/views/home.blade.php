

        @extends('layouts.master')

        @section('body')
            @parent
            
            
                <link href="/css/texts.css" rel="stylesheet">
                <div>
                    <div class="slideshow-container">
                        
                    <div class="mySlides fade">
                        
                        <img src="https://camo.githubusercontent.com/49e6854da9cc405a86828673b597ee117c39a7dd/687474703a2f2f696c656d6970726f6a656374732e636f6d2f416c74616d6972612f77702d636f6e74656e742f75706c6f6164732f323031362f31302f62616e6e65722d686f6d652d332e6a7067" style="width:100%">
                        
                    </div>
                        
                    <div class="mySlides fade">
                        
                        <img src="https://i.avoz.es/sc/cJioJsqsTfYM1GZHO9lcGISdPTE=/x/2019/03/15/00121552677387315962916/Foto/hospital_1.jpg" style="width:100%">
                        
                    </div>

                        
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
                        setTimeout(showSlides, 8000); // Change image every 2 seconds
                    }
                </script>
                        
                </div>
            
        @stop
            
      