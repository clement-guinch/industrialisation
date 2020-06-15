
import Swiper from 'swiper';

var mySwiper = new Swiper ('.swiper-container', {
  direction: 'vertical',
  slidesPerView: 3,
  loop: false,
  centeredSlides: false,
  spaceBetween: 30,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
 },
})