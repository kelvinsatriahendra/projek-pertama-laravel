import './bootstrap';

// Import Swiper
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle'; // Import CSS Swiper

// Inisialisasi Swiper setelah halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.mySwiper', {
        // Opsi-opsi di sini agar slidernya bagus
        loop: true,
        spaceBetween: 20, // Jarak antar slide
        slidesPerView: 1.2, // Tampilkan 1 slide penuh dan sedikit slide berikutnya
        centeredSlides: true,

        // Breakpoints untuk tampilan di layar lebih besar
        breakpoints: {
            // Saat lebar layar 768px atau lebih
            768: {
              slidesPerView: 2,
              spaceBetween: 30,
              centeredSlides: false,
            },
            // Saat lebar layar 1024px atau lebih
            1024: {
              slidesPerView: 3,
              spaceBetween: 30,
              centeredSlides: false,
            }
        }
    });
});