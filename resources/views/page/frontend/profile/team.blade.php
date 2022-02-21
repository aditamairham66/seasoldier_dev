@extends('template.frontend.index')
@section('title_page', 'Profile / Our Team')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
    <style>
        #main {
            background-color: black;
            padding-bottom: 0;
        }

        .breadcrumb-item a,
        .detail-title,
        .detail-content {
            color: #ffffff;
        }

        .detail-title {
            margin-bottom: 60px;
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
                    <li class="breadcrumb-item active" aria-current="page"><b><i>OUR TEAM</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid detail-title-center">
            <div class="row">
                <div class="col-12 col-lg-12" data-aos="fade-down">
                    <p class="detail-title">OUR TEAM</p>
                </div>
                <div class="separator-right">
                    <img src="{{ asset('vendor/front/assets/example/img/profile/intro_pattern_right.png') }}"
                        alt="Separator" class="img-separator">
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ms-auto me-auto">
                    @foreach ($highlight as $x => $row)
                        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center @if ($x % 2 !== 0) flex-lg-row-reverse @endif"
                            @if ($is_mobile) data-aos="fade-up" @else @if ($x % 2 === 0) data-aos="fade-right" @else data-aos="fade-left" @endif
                            @endif>
                            <img src="{{ asset($row->image) }}" alt="{{ $row->name }}" class="profile-team-image">
                            <div class="profile-team-info @if ($x % 2 !== 0) info-right @endif">
                                <p class="profile-team-name">{{ $row->name }}</p>
                                <p class="profile-team-position">{{ $row->position }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-12 col-lg-8 ms-auto me-auto">
                    <div class="row mt-5">
                        @foreach ($team as $row)
                            <div class="col-md-6 profile-team-member" data-aos="fade-up">
                                <img src="{{ asset($row->image) }}" alt="{{ $row->name }}"
                                    class="profile-team-member-image">
                                <p class="profile-team-name">{{ $row->name }}</p>
                                <p class="profile-team-position">{{ $row->position }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('bottom')
@endpush
