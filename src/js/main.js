import Swiper, { Autoplay, Pagination } from 'swiper';

Swiper.use([Pagination, Autoplay]);

import 'swiper/swiper-bundle.css';


jQuery(document).ready(function ($) {

    //Cookie
    if (Cookies.get('yabu') !== 'closed') {
        $('.yabu-cookie').delay(3000).fadeIn();
    };

    $('.reject-cookie').on('click', function(){
        Cookies.set('yabu', 'closed', {expires: 1});
        $('.yabu-cookie').fadeOut();
    });

    $('.accept-cookie').on('click', function(){
        Cookies.set('yabu', 'closed', {expires: 60});
        $('.yabu-cookie').fadeOut();
    });

    //Progress Bar
    window.onscroll = function() {yabuProgressBar()};

    function yabuProgressBar() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height ) * 100;
        document.getElementById('progressBar').style.height = scrolled + "%";
    };

    //Switch Dark Mode
    const toggleSwitch = document.querySelector('.switch-input');
    const textBox = document.querySelector('.theme-toggle-text');

    function switchTheme(event) {
        if (event.target.checked) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }
    };

    toggleSwitch.addEventListener('change', switchTheme);

    const currentTheme = localStorage.getItem('theme');
    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);
        if (currentTheme === 'dark') {
            toggleSwitch.checked = true;
        }
    };

    // Slider Testimonials
    var slideTestimonials = new Swiper('.swiper-container', {
        autoplay: {
            delay: 4500,
            disableOnInteraction: false
        },
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
        slidesPerView: 1,
        breakpoints: {
            992: {
                slidesPerView: 2
            }
        }
    });

    //Project Filter-Isotope
    var $grid = $('.loop-projects');
    $grid.isotope({
        itemSelector: '.project-item',
        layoutMode: 'fitRows',
        percentPosition: true,
        masonry: {
            isFitWidth: true,
            isAnimated: true
        }
    });

    $('.filter-btn-group').on('click', 'button', function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue});
    });

    $('.filter-projects').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on('click', 'button', function(){
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $(this).addClass('is-checked');
        });
    });

    //Project Progress
    let progressBarr = $('#progressbar').circleProgress({
        size: 175,
        thickness: 1,
        startAngle: -Math.PI/2,
        fill: {
            gradient: ["#343a40","#5f5f5f"]
        },
        animation: {
            duration: 4000
        }
    });
    progressBarr.on('circle-animation-progress', function (event, progress, stepValue) {

        if ($(this).data('value') === '1.0') {
            $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
        } else {
            $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2) + '%');
        }
    });

});