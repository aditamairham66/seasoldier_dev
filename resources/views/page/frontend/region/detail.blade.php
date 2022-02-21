@extends('template.frontend.index')
@section('title_page', 'Regional / {{ $name }}')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/regional.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('regional_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="{{ webPath('/regions') }}">REGIONAL</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>{{ $name }}</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="region-detail">
                    <div class="row">
                        <div class="col-lg-3" data-aos="fade-right">
                            <img src="{{ asset($image) }}" alt="image item" class="image-detail">
                        </div>
                        <div class="col-lg-8 ms-auto box-information" data-aos="fade-left">
                            <h4 class="title">REGIONAL {{ $name }}</h4>
                            <p class="caption-text">
                                <i class="ic_instagram"></i> <a href="{{ $instagram }}"
                                    target="_blank">{{ '@' . $code }}</a>
                            </p>
                            <p class="caption-text">
                                <i class="ic_email"></i> <a href="mailto:{{ $email }}">{{ $email }}</a>
                            </p>
                            <div class="swiper-container mySwiper">
                                <div class="swiper-wrapper"></div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                            <div class="box-more-info">
                                <a href="{{ $instagram }}" target="_blank" class="btn-danger-mid">MORE INFO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('bottom')
    <script>
        new Vue({
            el: '#main',
            data: {
                swiper: null,
                current_page: 0,
                last_page: 0,
                items: [],
            },
            mounted: function() {
                this.swiper = new Swiper(".mySwiper", {
                    lazy: true,
                    // slidesPerView: 3,
                    breakpoints: {
                        "@0.00": {
                            slidesPerView: 1,
                            spaceBetween: 10,
                        },
                        "@0.75": {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        "@1.00": {
                            slidesPerView: 3,
                            spaceBetween: 40,
                        },
                        "@1.50": {
                            slidesPerView: 3,
                            spaceBetween: 50,
                        },
                    },
                    spaceBetween: 30,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
                this.swiper.on('slideChange', () => {
                    let index = this.swiper.activeIndex + 3;
                    let total = this.items.length;

                    if (index === total && this.current_page < this.last_page) {
                        this.getData()
                    }
                });
            },
            created: function() {
                this.init();
            },
            methods: {
                init() {
                    console.log("init");
                    this.getData();
                    this.setHeightInstagram();
                },
                getData() {
                    console.log('get data');
                    axios.get(`{{ url('regions/media/' . $slug) }}`, {
                        params: {
                            page: (this.current_page + 1)
                        }
                    }).then((response) => {
                        if (response.data.status === 1) {
                            this.current_page = response.data.data.current_page;
                            this.last_page = response.data.data.last_page;

                            response.data.data.items.forEach((item, index) => {
                                this.items.push(item);
                                this.swiper.appendSlide(
                                    `<div class="swiper-slide"><a href="${item.url}" target="_blank"><img src="${item.image}" alt="image" class="image-instagram"></a></div>`
                                );
                            });
                            this.setHeightInstagram();
                        } else {
                            alert(response.data.message);
                        }
                    }, (error) => {
                        console.log(error);
                    });
                },
                setHeightInstagram() {
                    let img = $('.image-instagram');
                    let w = img.width();
                    img.height(w);
                    setTimeout(() => {
                        this.setHeightLogo();
                    }, 200)
                },
                setHeightLogo() {
                    let docWidth = $('body').outerWidth();
                    if (docWidth > 768) {
                        let h = $('.box-information').height();
                        $('.image-detail').height(h);
                    }
                },
            }
        });
    </script>
@endpush
