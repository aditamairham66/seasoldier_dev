@extends('template.frontend.index')
@section('title_page', 'Bersihkan Warungku')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-program-warung')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ webPath('programs') }}">PROGRAM</a></li>
                    <li>BERSIHKAN WARUNGKU</li>
                </ol>
            </div>
        </div>
        <div class="row bg-pattern-left mt-5">
            <div class="col-lg-12 text-center">
                <h4 class="title-program">BERSIHKAN WARUNGKU</h4>
                <div class="caption-program">
                    We will pick stalls (preferred
                    small local stall) that sells
                    usually plastic packaged coffee,
                    snacks.
                    Goals:
                    Education for mid and lower
                    class society about waste
                    problem and the importance of
                    waste sort-out.
                    We will provide in their stall:
                    Education material, 1 sorted
                    trash bin, merchandise, and
                    certificate (if they can keep the
                    stall clean and waste sort-out
                    works for minimum 6 months).
                </div>

                <div class="image-list">
                    <div class="image-small">
                        <img src="{{ asset('vendor/front/assets/example/img/program/p1.png') }}" alt="image small">
                    </div>
                    <div class="image-mid">
                        <img src="{{ asset('vendor/front/assets/example/img/program/p3.png') }}" alt="image medium">
                    </div>
                    <div class="image-small">
                        <img src="{{ asset('vendor/front/assets/example/img/program/p2.png') }}" alt="image small">
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
