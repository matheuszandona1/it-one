$(".solutions_slick").slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	arrows: true,
	infinite: false,
	prevArrow: $(".prev"),
	nextArrow: $(".next"),
})

document.addEventListener("DOMContentLoaded", function () {
	const container = document.getElementById("dif-card")
	const items = container.querySelectorAll(".solutions_card")
	const itemCount = items.length

	if (itemCount === 1) {
		container.classList.add("single-item")
	} else if (itemCount === 2) {
		container.classList.add("two-items")
	} else if (itemCount > 1 && itemCount < 4) {
		container.classList.add("multiple-items")
	} else if (itemCount >= 4) {
		container.classList.add("table-items")
	}
})

var mySwiper = new Swiper(".swiper-container", {
	speed: 400,
	spaceBetween: 24,
	initialSlide: 0,
	//truewrapper adoptsheight of active slide
	autoHeight: false,
	// Optional parameters
	direction: "horizontal",
	loop: true,
	// delay between transitions in ms
	// autoplay: 5000,
	autoplayStopOnLast: false, // loop false also
	// If we need pagination

	// Navigation arrows
	nextButton: ".swiper-button-next",
	prevButton: ".swiper-button-prev",

	// And if we need scrollbar
	//scrollbar: '.swiper-scrollbar',
	// "slide", "fade", "cube", "coverflow" or "flip"
	effect: "slide",
	slidesPerView: 2,
	autoHeight: true,
	//
	centeredSlides: true,
	//
	slidesOffsetBefore: 0,
	//
	grabCursor: true,
})
