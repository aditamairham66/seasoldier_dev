@extends('template.frontend.index')
@section('title_page', 'Dolphin Soldier')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-program-soldier')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('programs') }}">PROGRAM</a></li>
                    <li>DOLPHIN SOLDIER</li>
                </ol>
            </div>
        </div>
        <div class="row bg-pattern-profile mt-5">
            <div class="col-lg-12 text-center">
                <h4 class="title-program text-white">DOLPHIN SOLDIER</h4>
                <div class="caption-program text-white">
                    Education about dolphins at
                    schools (equivalent to
                    elementary and middle school).
                    The target of this activity is
                    understanding the dolphin's
                    native habitat and direction so
                    that children do not watch
                    dolphin circuses. Sadly,
                    Indonesia is still the only country
                    that allows dolphin circus.
                </div>

                <div class="image-list">
                    <div class="image-small">
                        <img src="{{ asset('vendor/front/assets/example/img/program/d1.png') }}" alt="image small">
                    </div>
                    <div class="image-mid">
                        <img src="{{ asset('vendor/front/assets/example/img/program/d3.png') }}" alt="image medium">
                    </div>
                    <div class="image-small">
                        <img src="{{ asset('vendor/front/assets/example/img/program/d2.png') }}" alt="image small">
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
