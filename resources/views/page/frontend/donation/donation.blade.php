@extends('template.frontend.index')
@section('title_page', 'Support Us')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/donation.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_background')) }}");
            min-height: 100vh
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center justify-content-center">
        <h4 class="title-big mb-5" data-aos="fade-down">SUPPORT US</h4>
        <div class="container-fluid d-flex flex-row flex-wrap align-items-center justify-content-center">
            <a href="{{ webPath('support-us/fundraising') }}" class="menu-item" data-aos="fade-up">
                <div class="image">
                    <img src="{{ asset('vendor/front/assets/example/img/icon/ic_drainsing.png') }}">
                </div>
                <span class="title">FUNDRAISING</span>
            </a>
            <a href="{{ webPath('support-us/partner') }}" class="menu-item" data-aos="fade-up">
                <div class="image">
                    <img src="{{ asset('vendor/front/assets/example/img/icon/ic_our_partner.png') }}">
                </div>
                <span class="title">OUR PARTNERS</span>
            </a>
            <a href="{{ webPath('support-us/merchandise') }}" class="menu-item" data-aos="fade-up">
                <div class="image">
                    <img src="{{ asset('vendor/front/assets/example/img/icon/ic_merchandise.png') }}">
                </div>
                <span class="title">MERCHANDISE</span>
            </a>
        </div>
    </main>
@endsection

@push('bottom')
@endpush
