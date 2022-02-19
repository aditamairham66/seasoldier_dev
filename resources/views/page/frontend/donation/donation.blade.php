@extends('template.frontend.index')
@section('title_page', 'Donation')
@section('description', '')
@section('keywords', '')
@section('background', '')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/donation.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_background')) }}");
            background-size: cover;
            background-position: top;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: auto;
        }
    </style>
@endpush

@section('content')
<main id="main">

    <section class="nopadding-section">
        <div class="profile-section">
            <div class="image-section">
                <img src="{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_background')) }}" alt="Image">
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mt-200">
                            <h4 class="title-big mb-5" data-aos="fade-down">DONATION</h4>
                            <div class="menu-round-center-mid">
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
