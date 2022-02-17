@extends('template.frontend.index')
@section('title_page', 'Our Team')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-dark')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
    <style>
        #main {
            background-color: black;
            padding-bottom: 0;
        }

        .breadcrumbs{
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }

        .title-mid {
            font-family: 'Lemon/Milk', sans-serif;
            font-style: italic;
        }

        .team-list-primary .team-list.right .content {
            padding-right: 80px;
            align-items: start;
        }

        .team-list-primary .team-list.left .content {
            padding-left: 80px;
            align-items: end;
        }

        .team-list-primary .team-list .content .title {
            font-family: 'Lemon/Milk', sans-serif;
            font-style: italic;
            font-size: 24px;
        }

        .team-list-primary .team-list .content .caption {
            font-family: 'Titillium Web', sans-serif;
            font-size: 16px;
            text-align: left;
        }

        .team-list-second .team-list .content .title {
            font-family: 'Lemon/Milk', sans-serif;
            font-style: italic;
            font-size: 24px;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <section class="breadcrumbs mb-5 pb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="white" data-aos="fade-down">
                        <li><a href="{{ webPath('profiles') }}">PROFILE</a></li>
                        <li><b><i>OUR TEAM</i></b></li>
                    </ol>
                </div>
            </div>

            <div class="row bg-pattern-profile mt-5">
                <div class="col-lg-12 text-center">
                    <h4 class="title-mid text-white" data-aos="fade-down">OUR TEAM</h4>

                    <div class="team-list-primary">
                        @foreach($highlight as $x => $row)
                            <div class="team-list @if($x%2 === 0) left @else right @endif">
                                @if($x%2 === 0)
                                    <img src="{{ $row->image }}" alt="team" class="image-team" data-aos="fade-right">
                                @endif
                                <div class="content" @if($x%2 === 0) data-aos="fade-left" @else  data-aos="fade-right" @endif>
                                    <h4 class="title">{{ $row->name }}</h4>
                                    <p class="caption">{{ $row->position }}</p>
                                </div>
                                @if($x%2 !== 0)
                                    <img src="{{ $row->image }}" alt="team" class="image-team" data-aos="fade-left">
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="team-list-second">
                        @foreach($team as $t => $trow)
                            <div class="team-list">
                                <div class="image">
                                    <img src="{{ $trow->image }}" alt="Image Team" data-aos="fade-up">
                                </div>
                                <div class="content">
                                    <h4 class="title" data-aos="fade-up">{{ $trow->name }}</h4>
                                    <div class="caption" data-aos="fade-up">{{ $trow->position }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@push('bottom')

@endpush
