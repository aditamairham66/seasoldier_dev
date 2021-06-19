@extends('template.frontend.index')
@section('title_page', 'Gallery')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-tree')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="row mt-3">
            <div class="col-lg-12 text-center">

                <h4 class="title-big  text-white pt-5 mt-5">GALLERY</h4>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="gallery-list">
                                <a href="{{ webPath('gallery/detail') }}" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g1.png') }}" alt="image gallery">
                                </a>
                                <a href="{{ webPath('gallery/detail') }}" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g2.png') }}" alt="image gallery">
                                </a>
                                <a href="{{ webPath('gallery/detail') }}" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g3.png') }}" alt="image gallery">
                                </a>
                                <a href="#" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g4.png') }}" alt="image gallery">
                                </a>
                                <a href="#" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g5.png') }}" alt="image gallery">
                                </a>
                                <a href="#" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g6.png') }}" alt="image gallery">
                                </a>
                                <a href="#" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g7.png') }}" alt="image gallery">
                                </a>
                                <a href="#" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g8.png') }}" alt="image gallery">
                                </a>
                                <a href="#" class="gallery-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g9.png') }}" alt="image gallery">
                                </a>
                            </div>

                            <a href="#" class="btn-danger-mid">SEE MORE</a>
                        </div>
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
