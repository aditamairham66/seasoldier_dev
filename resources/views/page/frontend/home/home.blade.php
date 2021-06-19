@extends('template.frontend.index')
@section('title_page', 'Home')
@section('description', '')
@section('keywords', '')
@section('background', '')
@section('content')
<main id="main">

    <section class="nopadding-section">
        <div class="banner-item">
            <img src="{{ asset('vendor/front/assets/example/img/banner/bg_banner3.jpg') }}" alt="Banner Image">
            <div class="banner-content">
                <div class="container">
                    <h4 class="title">APA AKSI KAMU HARI INI ?</h4>
                    <p class="caption">AKSI HARI INI, untuk keselamatan bumi</p>
                    <a href="#" class="btn-danger-t">MORE INFO</a>
                </div>
            </div>
        </div>
        <div class="banner-item">
            <img src="{{ asset('vendor/front/assets/example/img/banner/bg_banner2.jpg') }}" alt="Banner Image">
            <div class="banner-content">
                <div class="container">
                    <h4 class="title green">APA AKSI KAMU HARI INI ?</h4>
                    <p class="caption green">AKSI HARI INI, untuk keselamatan bumi</p>
                    <a href="#" class="btn-danger-t">MORE INFO</a>
                </div>
            </div>
        </div>
        <div class="banner-item">
            <img src="{{ asset('vendor/front/assets/example/img/banner/bg_banner2.jpg') }}" alt="Banner Image">
            <div class="banner-content">
                <div class="container">
                    <h4 class="title black">APA AKSI KAMU HARI INI ?</h4>
                    <p class="caption black">AKSI HARI INI, untuk keselamatan bumi</p>
                    <a href="#" class="btn-danger-t">MORE INFO</a>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="inner-page">

    </section> -->

</main><!-- End #main -->
@endsection
@push('bottom')

@endpush
@push('head')

@endpush
