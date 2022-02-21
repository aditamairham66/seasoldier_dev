@extends('template.frontend.index')
@section('title_page', 'Program')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/program.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('program_main_bg')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center justify-content-center">
        <h4 class="title-big mb-5" data-aos="fade-down">OUR MAIN PROGRAM</h4>
        <div class="container-fluid d-flex flex-row flex-wrap align-items-center justify-content-center">
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
    </main>
@endsection

@push('bottom')
@endpush
