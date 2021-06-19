@extends('template.frontend.index')
@section('title_page', 'Program')
@section('description', '')
@section('keywords', '')
@section('background', '')
@section('content')
<main id="main">

    <section class="nopadding-section">
        <div class="profile-section">
            <div class="image-section">
                <img src="{{ asset('vendor/front/assets/example/img/bg/bg_program.png') }}" alt="Image">
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mt-200">

                            <h4 class="title-big">OUR MAIN PROGRAM</h4>
                            <h4 class="caption-big mb-5 pb-2">IN 2020</h4>

                            <div class="menu-round-center">
                                <a href="index_warung.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_shop.png') }}" alt="">
                                    </div>
                                    <span class="title">BERSIHKAN WARUNGKU</span>
                                </a>
                                <a href="index_soldier.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_dolpin.png') }}" alt="">
                                    </div>
                                    <span class="title">DOLPHIN SOLDIER</span>
                                </a>
                                <a href="index_planting.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_planting.png') }}" alt="">
                                    </div>
                                    <span class="title">TREES PLANTING</span>
                                </a>
                                <a href="index_mangrove.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_manggrove.png') }}" alt="">
                                    </div>
                                    <span class="title">MANGROVE PLANTING</span>
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
@push('head')

@endpush
