document.addEventListener('DOMContentLoaded', function () {
    const sliders = document.querySelectorAll('.slider-container');

    sliders.forEach(sliderContainer => {
        const slider = sliderContainer.querySelector('.slider');
        const prevBtn = sliderContainer.querySelector('.prev-btn');
        const nextBtn = sliderContainer.querySelector('.next-btn');
        const slides = slider.querySelectorAll('.slide');
        
        let slideIndex = 0;
        const totalSlides = slides.length;

        function showSlide(index) {
            if (index < 0) {
                slideIndex = totalSlides - 1;
            } else if (index >= totalSlides) {
                slideIndex = 0;
            } else {
                slideIndex = index;
            }
            
            slider.style.transform = `translateX(-${slideIndex * 100}%)`;
        }

        prevBtn.addEventListener('click', () => {
            showSlide(slideIndex - 1);
        });

        nextBtn.addEventListener('click', () => {
            showSlide(slideIndex + 1);
        });

        // Auto-slide every 5 seconds
        setInterval(() => {
            showSlide(slideIndex + 1);
        }, 5000);
    });
});