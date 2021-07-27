@extends('template.frontend.index')
@section('title_page', 'Profile')
@section('description', '')
@section('keywords', '')
@section('background', '')


@push('head')
    <style>
        .image-section > img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <section class="nopadding-section">
            <div class="profile-section">
                <div class="image-section">
                    <img src="{{ asset('vendor/front/assets/example/img/bg/bg_profile.png') }}" alt="Image">
                </div>
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center mt-200">

                                <h4 class="title-big mb-5">#BRANI</h4>

                                <div class="menu-round-center">
                                    <a href="{{ webPath('profiles/introduction') }}" class="menu-item">
                                        <div class="image">
                                            <img
                                                src="{{ asset('vendor/front/assets/example/img/icon/ic_introduction.png') }}"
                                                alt="INTRODUCTION">
                                        </div>
                                        <span class="title">INTRODUCTION</span>
                                    </a>
                                    <a href="{{ webPath('profiles/organization') }}" class="menu-item">
                                        <div class="image">
                                            <img
                                                src="{{ asset('vendor/front/assets/example/img/icon/ic_organization.png') }}"
                                                alt="OUR ORGANIZATION">
                                        </div>
                                        <span class="title">OUR ORGANIZATION</span>
                                    </a>
                                    <a href="{{ webPath('profiles/braclate') }}" class="menu-item">
                                        <div class="image">
                                            <img
                                                src="{{ asset('vendor/front/assets/example/img/icon/ic_bracelet.png') }}"
                                                alt="BRACLATE">
                                        </div>
                                        <span class="title">BRACLATE</span>
                                    </a>
                                    <a href="{{ webPath('profiles/team') }}" class="menu-item">
                                        <div class="image">
                                            <img src="{{ asset('vendor/front/assets/example/img/icon/ic_team.png') }}"
                                                 alt="OUR TEAM">
                                        </div>
                                        <span class="title">OUR TEAM</span>
                                    </a>
                                    <a href="{{ webPath('profiles/honor') }}" class="menu-item">
                                        <div class="image">
                                            <img
                                                src="{{ asset('vendor/front/assets/example/img/icon/ic_respect.png') }}"
                                                alt="SEASOLDIER KEHORMATAN">
                                        </div>
                                        <span class="title">SEASOLDIER KEHORMATAN</span>
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
