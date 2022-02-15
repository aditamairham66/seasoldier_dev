@extends('template.frontend.index')
@section('title_page', 'Seasoldier Kehormatan')
@section('description', '')
@section('keywords', '')
@section('background', '')


@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
    <style>
        #main {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .breadcrumbs {
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }

        .title {
            font-family: 'Lemon/Milk', sans-serif;
            font-style: italic;
            font-weight: bold;
            font-size: 24px;
            color: #001521;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .caption {
            font-family: 'Titillium Web', sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            color: #001521;
            margin-bottom: 60px;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <section class="breadcrumbs mb-5 pb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol data-aos="fade-down">
                        <li><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                        <li>SEASOLDIER KEHORMATAN</li>
                    </ol>
                </div>
            </div>
            <div class="row bg-pattern-profile mt-5 mb-5">
                <div class="col-lg-12 text-center">
                    <h4 class="title-mid" data-aos="fade-down">SEASOLDIER KEHORMATAN</h4>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @foreach($list as $x => $row)
                        <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                            <img src="{{ $row->image }}" alt="honor team" class="image-team" data-aos="fade-up">
                            <div class="content">
                                <h4 class="title" data-aos="fade-up">{{ $row->name }}</h4>
                                <p class="caption" data-aos="fade-up">{{ $row->position }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@push('bottom')

@endpush
