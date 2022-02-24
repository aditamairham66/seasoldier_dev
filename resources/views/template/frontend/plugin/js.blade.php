<script src="{{ asset('vendor/backend/azzara') . '/' }}js/core/jquery.3.2.1.min.js"></script>
<!-- Vendor JS Files -->
<script src="{{ asset('vendor/front/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('vendor/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('vendor/front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/front/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('vendor/front/assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('vendor/front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('vendor/front/assets/js/main.js') }}"></script>
@if (env('APP_PRODUCTION'))
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
@else
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>

@if (env('APP_ENV') == 'PRODUCTION')
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T9PFC9D117"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-T9PFC9D117');
    </script>
    <!-- Google Analytics -->
@endif
