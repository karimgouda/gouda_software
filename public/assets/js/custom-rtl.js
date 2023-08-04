/*business-team*/
$(".slider-team__content").owlCarousel({
    nav: true,
    navText: ["<i class='custom-arrow-nav fa fa-angle-right'></i>", "<i class='custom-arrow-nav fa fa-angle-left'></i>"],
    dots: false,
    autoplay: true,
    loop: true,
    mouseDrag: false,
    touchDrag: true,
    responsiveClass: true,
    rtl: true,
    margin: 15,
    responsive: {
        0: {
            items: 1,
        },
        380: {
            items: 2,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 4,
        }
    }
});

/*clients*/
$(".slider-clients__content").owlCarousel({
    nav: true,
    navText: ["<i class='custom-arrow-nav fa fa-angle-right'></i>", "<i class='custom-arrow-nav fa fa-angle-left'></i>"],
    dots: false,
    autoplay: true,
    loop: true,
    mouseDrag: false,
    touchDrag: true,
    responsiveClass: true,
    rtl: true,
    margin: 15,
    responsive: {
        0: {
            items: 2
        },
        380: {
            items: 3
        },
        600: {
            items: 4
        },
        1000: {
            items: 5
        }
    }
});

/*partners*/
$(".slider-partners__content").owlCarousel({
    nav: true,
    navText: ["<i class='custom-arrow-nav fa fa-angle-right'></i>", "<i class='custom-arrow-nav fa fa-angle-left'></i>"],
    dots: false,
    autoplay: true,
    loop: true,
    mouseDrag: false,
    touchDrag: true,
    responsiveClass: true,
    rtl: true,
    margin: 15,
    responsive: {
        0: {
            items: 2
        },
        380: {
            items: 3
        },
        600: {
            items: 4
        },
        1000: {
            items: 5
        }
    }
});

// taps
let tabsParent = document.querySelector('.services__tabs__buttons')

tabsParent.addEventListener('click', (event) => {
    if (event.target.classList.contains('services__tabs__buttons__button')) {
        document.querySelector('.services__tabs__buttons__button.active').classList.remove('active')
        event.target.classList.add('active')

        document.querySelector('.services__tabs__content__box.active').classList.remove('active')
        document.getElementById(event.target.dataset.target).classList.add('active')
    }
})