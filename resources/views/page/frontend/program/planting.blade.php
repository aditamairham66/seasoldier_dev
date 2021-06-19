@extends('template.frontend.index')
@section('title_page', 'Tress Planting')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-program-planting')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ webPath('programs') }}">PROGRAM</a></li>
                    <li>TREES PLANTING</li>
                </ol>
            </div>
        </div>
        <div class="row bg-pattern-left mt-5">
            <div class="col-lg-12 text-center">
                <h4 class="title-program">TREES PLANTING</h4>
                <div class="caption-program">
                    #MenanamMelawanKepunahan
                    Managed by Seasoldier
                    Bandung. Conservation area
                    located in Barunaragi, Nyawang,
                    North Bandung.
                </div>

                <div class="image-list">
                    <div class="image-small">
                        <img src="{{ asset('vendor/front/assets/example/img/program/t1.png') }}" alt="image small">
                    </div>
                    <div class="image-mid">
                        <img src="{{ asset('vendor/front/assets/example/img/program/t3.png') }}" alt="image medium">
                    </div>
                    <div class="image-small">
                        <img src="{{ asset('vendor/front/assets/example/img/program/t2.png') }}" alt="image small">
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
