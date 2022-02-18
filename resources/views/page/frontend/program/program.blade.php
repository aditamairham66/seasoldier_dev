@extends('template.frontend.index')
@section('title_page', 'Program')
@section('description', '')
@section('keywords', '')
@section('background', '')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/program.css') }}">
@endpush

@section('content')
<main id="main">

    <section class="nopadding-section">
        <div class="profile-section">
            <div class="image-section">
                <img src="{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('program_main_bg')) }}" alt="Image">
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mt-200">

                            <h4 class="title-big mb-5 pb-2" data-aos="fade-down">OUR MAIN PROGRAM</h4>

                            <div class="menu-round-center">
                                <a href="{{ webPath('programs/bersihkan-warungku') }}" class="menu-item" data-aos="fade-up">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_shop.png') }}">
                                    </div>
                                    <span class="title">BERSIHKAN <br> WARUNGKU</span>
                                </a>
                                <a href="{{ webPath('programs/dolphin-soldier') }}" class="menu-item" data-aos="fade-up">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_dolpin.png') }}">
                                    </div>
                                    <span class="title">DOLPHIN <br> SOLDIER</span>
                                </a>
                                <a href="{{ webPath('programs/trees-conservation') }}" class="menu-item" data-aos="fade-up">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_planting.png') }}">
                                    </div>
                                    <span class="title">TREES <br> CONSERVATION</span>
                                </a>
                                <a href="{{ webPath('programs/mangrove-conservation') }}" class="menu-item" data-aos="fade-up">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_manggrove.png') }}">
                                    </div>
                                    <span class="title">MANGROVE <br> CONSERVATION</span>
                                </a>
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

@endpush
