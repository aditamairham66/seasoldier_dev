@extends('template.frontend.index')
@section('title_page', 'Program / Bersihkan Warungku')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/program.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('program_warungku_background')) }}");
            min-height: 90vh;
        }

        .separator-left {
            text-align: left;
            position: absolute;
            right: 0;
            top: 0;
        }

        @media (max-width: 768px) {
            #main {
                padding-top: 30px;
                min-height: auto;
            }
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ webPath('/programs') }}">PROGRAM</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>BERSIHKAN WARUNGKU</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid detail-title-center">
            <!-- Title -->
            <div class="row">
                <div class="col-12 col-lg-12" data-aos="fade-down">
                    <p class="detail-title">BERSIHKAN WARUNGKU</p>
                </div>
                <div class="separator-left content-no-padding-left">
                    <img src="{{ asset('vendor/front/assets/example/img/profile/intro_pattern.png') }}" alt="Separator"
                        class="img-separator">
                </div>
            </div><!-- End Title -->

            <!-- Content -->
            <div class="row mt-5 mb-5" data-aos="fade-up">
                <div class="col-lg-12 order-lg-2">
                    <div class="row">
                        <div class="col-lg-3 ms-auto">
                            <div class="swiper-container mySwiper swiper-hide">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset($image[count($image) - 1]->image) }}" alt="image">
                                    </div>
                                    @foreach ($image as $key => $row)
                                        @if ($key < count($image) - 1)
                                            <div class="swiper-slide">
                                                <img src="{{ asset($row->image) }}" alt="image">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-11 ms-auto me-auto col-lg-6 ms-lg-0 me-lg-0">
                            <div class="swiper-container mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($image as $row)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($row->image) }}" alt="image">
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
                        <div class="col-lg-3 me-auto">
                            <div class="swiper-container mySwiper swiper-hide">
                                <div class="swiper-wrapper">
                                    @foreach ($image as $key => $row)
                                        @if ($key > 0)
                                            <div class="swiper-slide">
                                                <img src="{{ asset($row->image) }}" alt="image">
                                            </div>
                                        @endif
                                    @endforeach
                                    @for ($i = 0; $i < 1; $i++)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($image[$i]->image) }}" alt="image">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-11 col-lg-10 me-auto ms-auto order-lg-1" data-aos="fade-up">
                    <div class="caption-program">{!! nl2br($description) !!}</div>
                </div>
            </div><!-- End Content -->
        </div>
    </main>
@endsection

@push('bottom')
    <script>
        function setHeightImage() {
            let img = $('.mySwiper:not(.swiper-hide) img').width();
            let h = img * 9 / 16;

            $('.mySwiper img').height(h);

            setTimeout(() => {
                setSwiper();
            }, 1);
        }
        setHeightImage();

        function setSwiper() {
            new Swiper(".mySwiper", {
                lazy: true,
                spaceBetween: 30,
                centeredSlides: true,
                mousewheel: false,
                effect: "{{ $is_mobile ? 'slide' : 'cube' }}", //slide, fade, cube, coverflow, flip, creative
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
        }
    </script>
@endpush
