@extends('template.frontend.index')
@section('title_page', 'Profile / Bracelet')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
    <style>
        #main {
            background-color: #FFFFFF;
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>BRACELET</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <!-- Title -->
            <div class="row">
                <div class="col-12 col-lg-6 content-no-padding-left">
                    <img src="{{ asset('vendor/front/assets/example/img/profile/intro_pattern.png') }}" alt="Separator"
                        class="img-separator">
                </div>
                <div class="col-12 col-lg-6" data-aos="fade-down">
                    <p class="detail-title">BRACELET</p>
                </div>
            </div><!-- End Title -->

            <!-- Content -->
            <div class="row">
                <div class="col-12 col-lg-6 content-no-padding-left"
                    @if ($is_mobile) data-aos="fade-up" @else data-aos="fade-right" @endif>
                    <img src="{{ asset($image) }}" alt="Image Introduction" class="img-fluid image-detail">
                </div>
                <div class="col-12 col-lg-6"
                    @if ($is_mobile) data-aos="fade-up" @else data-aos="fade-left" @endif>
                    <p class="detail-content">{!! nl2br($description) !!}</p>
                </div>
            </div><!-- End Content -->
        </div>
    </main>
@endsection

@push('bottom')
@endpush
