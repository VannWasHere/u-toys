let slideIndex = 0;
showSlides(slideIndex);

function nextSlide(n) {
    showSlides(slideIndex += n);
}

function prevSlide(n) {
    showSlides(slideIndex -= n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("images-slide");
    
    if (n > slides.length) {
        slideIndex = 1
    }
    
    if (n < 1) {
        slideIndex = slides.length
    }

    for(i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    if (slides[slideIndex-1]) {
        slides[slideIndex-1].style.display = "block";
    }
}

setInterval(function() {
    nextSlide(1);
}, 5000);