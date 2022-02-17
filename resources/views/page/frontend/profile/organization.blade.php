@extends('template.frontend.index')
@section('title_page', 'Our Organization')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-dark')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
    <style>
        #main{
            background-color: black;
            padding-bottom: 60px;
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
                    <ol class="white" data-aos="fade-down">
                        <li><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                        <li><b><i>OUR ORGANIZATION</i></b></li>
                    </ol>
                </div>
            </div>
            <div class="row bg-pattern-profile mt-5">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="row flex-reverse">
                            <div class="col-lg-6 pl-0">
                                <div class="text-bid-left">
                                    <h4 class="title text-white" data-aos="fade-right">OUR ORGANIZATION</h4>
                                    <div class="desc text-white" data-aos="fade-right">{!! nl2br($description) !!}</div>
                                </div>
                            </div>

                            <div class="col-lg-6 pr-0 text-center" data-aos="fade-left">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="swiper-container mySwiper">
                                            <div class="swiper-wrapper">
                                                @foreach($image as $row)
                                                    <div class="swiper-slide">
                                                        <img class="img-slide-big" src="{{ asset($row->image) }}" alt="image">
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
                                                                <img class="img-slide-big" src="{{ asset($row->image) }}" alt="image">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @for($i = 0; $i < 1; $i++)
                                                        <div class="swiper-slide">
                                                            <img class="img-slide-big" src="{{ asset($image[$i]->image) }}" alt="image">
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
                                                                <img class="img-slide-big" src="{{ asset($row->image) }}" alt="image">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @for($i = 0; $i < 2; $i++)
                                                        <div class="swiper-slide">
                                                            <img class="img-slide-big" src="{{ asset($image[$i]->image) }}" alt="image">
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
        });
    </script>
@endpush
