@extends('template.frontend.index')
@section('title_page', 'Profile / Seasoldier Kehormatan')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
    <style>
        #main {
            background-color: #FFFFFF;
        }

        .separator-right {
            position: absolute;
            right: 0;
            top: 0;
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>SEASOLDIER KEHORMATAN</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid detail-title-center">
            <div class="row">
                <div class="col-12 col-lg-12" data-aos="fade-down">
                    <p class="detail-title">SEASOLDIER KEHORMATAN</p>
                </div>
                <div class="separator-right">
                    <img src="{{ asset('vendor/front/assets/example/img/profile/intro_pattern_right.png') }}"
                        alt="Separator" class="img-separator">
                </div>
            </div>

            <div class="row">
                @foreach ($list as $x => $row)
                    <div class="col-12 col-sm-6 col-lg-4 text-center">
                        <img src="{{ $row->image }}" alt="{{ $row->name }}" class="image-team" data-aos="fade-up">
                        <div class="honor-content">
                            <h4 class="title" data-aos="fade-up">{{ $row->name }}</h4>
                            <p class="caption" data-aos="fade-up">{{ $row->position }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

@push('bottom')
@endpush
