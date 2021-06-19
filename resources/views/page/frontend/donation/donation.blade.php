@extends('template.frontend.index')
@section('title_page', 'Donation')
@section('description', '')
@section('keywords', '')
@section('background', '')
@section('content')
<main id="main">

    <section class="nopadding-section">
        <div class="profile-section">
            <div class="image-section">
                <img src="{{ asset('vendor/front/assets/example/img/bg/bg_donation.png') }}" alt="Image">
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mt-200">
                            <h4 class="title-big mb-5">DONATION</h4>

                            <div class="menu-round-center-mid">
                                <a href="index_drain.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_drainsing.png') }}" alt="">
                                    </div>
                                    <span class="title">FUNDRAISING</span>
                                </a>
                                <a href="index_partner.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_our_partner.png') }}" alt="">
                                    </div>
                                    <span class="title">OUR PARTNERS</span>
                                </a>
                                <a href="index_merchandise.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_merchandise.png') }}" alt="">
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
@push('head')

@endpush
