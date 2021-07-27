@extends('template.frontend.index')
@section('title_page', 'Our Team')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-dark')

@push('head')
    <style>
    </style>
@endpush

@section('content')
    <main id="main">

        <section class="breadcrumbs mb-5 pb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="white">
                        <li><a href="{{ webPath('profiles') }}">PROFILE</a></li>
                        <li>OUR TEAM</li>
                    </ol>
                </div>
            </div>
            <div class="row bg-pattern-profile mt-5">
                <div class="col-lg-12 text-center">
                    <h4 class="title-mid text-white">OUR TEAM</h4>

                    <div class="team-list-primary">
                        @foreach($highlight as $x => $row)
                            <div class="team-list @if($row->isGanjil === true) left @else right @endif">
                                @if($row->isGanjil !== true)
                                    <img src="{{ $row->image }}" alt="team" class="image-team">
                                @endif
                                <div class="content">
                                    <h4 class="title">{{ $row->name }}</h4>
                                    <p class="caption">{{ $row->position }}</p>
                                </div>
                                @if($row->isGanjil === true)
                                    <img src="{{ $row->image }}" alt="team" class="image-team">
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="team-list-second">
                        @foreach($team as $t => $trow)
                            <div class="team-list">
                                <div class="image">
                                    <img src="{{ $trow->image }}" alt="Image Team">
                                </div>
                                <div class="content">
                                    <h4 class="title">{{ $trow->name }}</h4>
                                    <div class="caption">{{ $trow->position }}</div>
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
