@extends('template.frontend.index')
@section('title_page', 'Profile / Our Organization')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
    <style>
        #main {
            background-color: #000000;
            padding-bottom: 60px;
            min-height: auto;
        }

        .img-separator {
            margin-top: 20px;
        }

        .breadcrumb-item a,
        .detail-title,
        .detail-content {
            color: #ffffff;
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>INTRODUCTION</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <!-- Title -->
            <div class="row">
                <div class="col-12 col-lg-6">
                    <p class="detail-title" data-aos="fade-down">OUR<br>ORGANIZATION</p>
                </div>
                <div class="col-12 col-lg-6 content-no-padding-right separator-right">
                    <img src="{{ asset('vendor/front/assets/example/img/profile/intro_pattern_right.png') }}"
                        alt="Separator" class="img-separator">
                </div>
            </div><!-- End Title -->

            <!-- Content -->
            <div class="row">
                <div class="col-12 col-lg-6 order-lg-2 text-center"
                    @if ($is_mobile) data-aos="fade-up" @else data-aos="fade-left" @endif>
                    <div class="row">
                        <div class="col-lg-8 content-no-padding">
                            <div class="swiper-container mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($image as $row)
                                        <div class="swiper-slide">
                                            <img class="img-slide-big" src="{{ asset($row->image) }}" alt="image">
                                        </div>
                                    @endforeach
                                </div>
                                @if ($is_mobile)
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                @endif
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="swiper-container mySwiper swiper-detail-mini">
                                <div class="swiper-wrapper">
                                    @foreach ($image as $key => $row)
                                        @if ($key > 0)
                                            <div class="swiper-slide">
                                                <img class="img-slide-big" src="{{ asset($row->image) }}" alt="image">
                                            </div>
                                        @endif
                                    @endforeach
                                    @for ($i = 0; $i < 1; $i++)
                                        <div class="swiper-slide">
                                            <img class="img-slide-big" src="{{ asset($image[$i]->image) }}" alt="image">
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="swiper-container mySwiper swiper-detail-mini">
                                <div class="swiper-wrapper">
                                    @foreach ($image as $key => $row)
                                        @if ($key > 1)
                                            <div class="swiper-slide">
                                                <img class="img-slide-big" src="{{ asset($row->image) }}" alt="image">
                                            </div>
                                        @endif
                                    @endforeach
                                    @for ($i = 0; $i < 2; $i++)
                                        <div class="swiper-slide">
                                            <img class="img-slide-big" src="{{ asset($image[$i]->image) }}" alt="image">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-lg-1"
                    @if ($is_mobile) data-aos="fade-up" @else data-aos="fade-right" @endif>
                    <p class="detail-content">{!! nl2br($description) !!}</p>
                </div>
            </div><!-- End Content -->
        </div>
    </main>
@endsection

@push('bottom')
    <script>
        new Swiper(".mySwiper", {
            lazy: true,
            spaceBetween: 30,
            centeredSlides: true,
            mousewheel: false,
            effect: "cube", //slide, fade, cube, coverflow, flip,
            loop: true,
            loopFillGroupWithBlank: true,
            allowTouchMove: false,
            keyboard: {
                enabled: true,
            },
            autoplay: {
                delay: 3000,
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

        function sameHeightSwiper() {
            let h = 0;

            $('.mySwiper').each(function() {
                let divHeight = $(this).height();
                if (h < divHeight) {
                    h = divHeight;
                }
            });

            $('.swiper-detail-mini').height((h / 2) - 10 + 'px');
        }
        sameHeightSwiper();
    </script>
@endpush
