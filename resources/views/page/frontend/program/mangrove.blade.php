@extends('template.frontend.index')
@section('title_page', 'Mangrove Planting')
@section('description', '')
@section('keywords', '')
{{--@section('background', 'bg-program-mangrove')--}}

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/program.css') }}">
    <style>
        #main{
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('program_mangrove_background')) }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
    </style>
@endpush
@section('content')
<main id="main">
    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol class="white" data-aos="fade-down">
                    <li><a href="{{ webPath('programs') }}">PROGRAM</a></li>
                    <li><b><i>MANGROVE CONSERVATION</i></b></li>
                </ol>
            </div>
        </div>
        <div class="row bg-pattern-profile mt-5">
            <div class="col-lg-12 text-center">
                <h4 class="title-program text-white" data-aos="fade-down">MANGROVE CONSERVATION</h4>
                <div class="caption-program text-white" data-aos="fade-down">{!! nl2br($description) !!}</div>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-3 ms-auto">
                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset($image[count($image) - 1]->image) }}" alt="image">
                                </div>
                                @foreach($image as $key => $row)
                                    @if($key < count($image) - 1)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($row->image) }}" alt="image">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($image as $row)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($row->image) }}" alt="image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 me-auto">
                        <div class="swiper-container mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($image as $key => $row)
                                    @if($key > 0)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($row->image) }}" alt="image">
                                        </div>
                                    @endif
                                @endforeach
                                @for($i = 0; $i < 1; $i++)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($image[$i]->image) }}" alt="image">
                                    </div>
                                @endfor
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
