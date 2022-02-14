@extends('template.frontend.index')
@section('title_page', 'Home')
@section('description', '')
@section('keywords', '')
@section('background', '')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/home.css') }}">
@endpush

@section('content')
    <main id="main">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                @foreach($banner as $row)
                    <div class="swiper-slide">
                        <img src="{{ asset($row->image) }}" alt="{{ $row->title.' : '.$row->caption }}" class="swiper-lazy">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </main><!-- End #main -->
@endsection
@push('bottom')
    <script>
        new Swiper(".mySwiper", {
            lazy: true,
            autoHeight: true,
            spaceBetween: 30,
            centeredSlides: true,
            mousewheel: false,
            effect: "slide", //fade, cube, coverflow, flip,
            keyboard: {
                enabled: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush
