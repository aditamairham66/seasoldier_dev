@extends('template.frontend.index')
@section('title_page', 'Home')
@section('description', '')
@section('keywords', '')
@section('background', '')

@push('head')
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        .swiper-button-next, .swiper-button-prev {
            color: #C60000;
        }

        .swiper-pagination-bullet {
            background-color: #FFFFFF;
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background-color: #C60000;
        }
    </style>
@endpush

@section('content')
    <main id="main">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                @foreach($banner as $row)
                    <div class="swiper-slide">
                        <img src="{{ asset($row->image) }}" alt="{{ $row->title.' : '.$row->caption }}"
                             class="swiper-lazy">
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
