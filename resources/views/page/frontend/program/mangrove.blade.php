@extends('template.frontend.index')
@section('title_page', 'Mangrove Planting')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-program-mangrove')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('programs') }}">PROGRAM</a></li>
                    <li>MANGROVE PLANTING</li>
                </ol>
            </div>
        </div>
        <div class="row bg-pattern-profile mt-5">
            <div class="col-lg-12 text-center">
                <h4 class="title-program text-white">MANGROVE PLANTING</h4>
                <div class="caption-program text-white">
                    Managed by Seasoldier
                    Pontianak. Conservation area
                    located in Mempawah,
                    Pontianak. One of the largest
                    mangrove conservation area in
                    Indonesia.
                </div>

                <div class="image-list">
                    <div class="image-small">
                        <img src="{{ asset('vendor/front/assets/example/img/program/m1.png') }}" alt="image small">
                    </div>
                    <div class="image-mid">
                        <img src="{{ asset('vendor/front/assets/example/img/program/m3.png') }}" alt="image medium">
                    </div>
                    <div class="image-small">
                        <img src="{{ asset('vendor/front/assets/example/img/program/m2.png') }}" alt="image small">
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
