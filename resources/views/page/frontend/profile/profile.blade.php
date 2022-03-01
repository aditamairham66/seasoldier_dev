@extends('template.frontend.index')
@section('title_page', 'Profile')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('program_main_bg')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center justify-content-center">
        <h4 class="title-big mb-5" data-aos="fade-down">#BRANI</h4>
        <div class="container-fluid d-flex flex-row flex-wrap align-items-center justify-content-center">
            <a href="{{ webPath('profiles/introduction') }}" class="menu-item" data-aos="fade-up">
                <div class="image">
                    <img src="{{ asset('vendor/front/assets/example/img/icon/ic_introduction.png') }}" alt="INTRODUCTION">
                </div>
                <span class="title">INTRODUCTION</span>
            </a>
            <a href="{{ webPath('profiles/our-organization') }}" class="menu-item" data-aos="fade-up">
                <div class="image">
                    <img src="{{ asset('vendor/front/assets/example/img/icon/ic_organization.png') }}"
                        alt="OUR ORGANIZATION">
                </div>
                <span class="title">OUR<br>ORGANIZATION</span>
            </a>
            <a href="{{ webPath('profiles/bracelet') }}" class="menu-item" data-aos="fade-up">
                <div class="image">
                    <img src="{{ asset('vendor/front/assets/example/img/icon/ic_bracelet.png') }}" alt="BRACLATE">
                </div>
                <span class="title">BRACELET</span>
            </a>
            <a href="{{ webPath('profiles/our-team') }}" class="menu-item" data-aos="fade-up">
                <div class="image">
                    <img src="{{ asset('vendor/front/assets/example/img/icon/ic_team.png') }}" alt="OUR TEAM">
                </div>
                <span class="title">OUR TEAM</span>
            </a>
            {{-- <a href="{{ webPath('profiles/seasoldier-kehormatan') }}" class="menu-item" data-aos="fade-up">
                <div class="image">
                    <img src="{{ asset('vendor/front/assets/example/img/icon/ic_respect.png') }}"
                        alt="SEASOLDIER KEHORMATAN">
                </div>
                <span class="title">SEASOLDIER<br>KEHORMATAN</span>
            </a> --}}
        </div>
    </main>
@endsection

@push('bottom')
@endpush
