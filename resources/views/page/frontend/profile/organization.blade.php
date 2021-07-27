@extends('template.frontend.index')
@section('title_page', 'Our Organization')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-dark')

@push('head')
    <style>
        .img-slide-big {
            width: 100%;
        }

        .box-img-sm {
            position: relative;
            height: 100%;
        }

        .box-img-sm-last {
            position: absolute;
            top: 100%;
        }

        .box-img-sm-last {

        }

        .swiper-slide img.img-slide-sm {
            width: 90%;
            margin-left: 0;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;

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
            object-fit: cover;
        }

        .swiper-pagination {
            text-align: right;
            padding-right: 30px;
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
    <?php
    $description = $data['profile_organization_description']->content ?? '';
    ?>

    <main id="main">

        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="white">
                        <li><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                        <li>OUR ORGANIZATION</li>
                    </ol>
                </div>
            </div>
            <div class="row bg-pattern-profile mt-5">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="row flex-reverse">
                            <div class="col-lg-6 pl-0">
                                <div class="text-bid-left">
                                    <h4 class="title text-white">OUR ORGANIZATION</h4>
                                    <div class="desc text-white">
                                        {!! nl2br($description) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-0 text-center">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="swiper-container mySwiper">
                                            <div class="swiper-wrapper">
                                                @foreach($image as $row)
                                                    <div class="swiper-slide">
                                                        <img class="img-slide-big"
                                                             src="{{ asset($row->image) }}"
                                                             alt="image">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="box-img-last">
                                            <div class="swiper-container mySwiper">
                                                <div class="swiper-wrapper">
                                                    @foreach($image as $key => $row)
                                                        @if($key > 0)
                                                            <div class="swiper-slide">
                                                                <img class="img-slide-big"
                                                                     src="{{ asset($row->image) }}"
                                                                     alt="image">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @for($i = 0; $i < 1; $i++)
                                                        <div class="swiper-slide">
                                                            <img class="img-slide-big"
                                                                 src="{{ asset($image[$i]->image) }}"
                                                                 alt="image">
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-img-last mt-4">
                                            <div class="swiper-container mySwiper">
                                                <div class="swiper-wrapper">
                                                    @foreach($image as $key => $row)
                                                        @if($key > 1)
                                                            <div class="swiper-slide">
                                                                <img class="img-slide-big"
                                                                     src="{{ asset($row->image) }}"
                                                                     alt="image">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @for($i = 0; $i < 2; $i++)
                                                        <div class="swiper-slide">
                                                            <img class="img-slide-big"
                                                                 src="{{ asset($image[$i]->image) }}"
                                                                 alt="image">
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
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
        });
    </script>
@endpush
