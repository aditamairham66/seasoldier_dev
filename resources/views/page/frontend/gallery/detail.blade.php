@extends('template.frontend.index')
@section('title_page', 'Gallery - Detail')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/gallery.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('gallery_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="{{ webPath('/gallery') }}">GALLERY</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>INSTAGRAM POST</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <div class="row text-center" data-aos="fade-up">
                <div class="box-gallery-detail">
                    <div class="row">
                        <div class="col-lg-5" data-aos="fade-right">
                            <img src="{{ asset($image) }}" alt="image detail" class="img-gallery-detail">
                        </div>
                        <div class="col-lg-6 ms-auto" data-aos="fade-left">
                            <h4 class="title"><a href="https://www.instagram.com/{{ $name }}"
                                    target="_blank">{{ '@' . $name }}</a></h4>
                            <div class="desc">{!! nl2br($content) !!}</div>
                            <a href="{{ $url }}" target="_blank" class="btn-danger-mid">MORE INFO</a>
                        </div>
                        <a href="{{ $pref ? url('gallery/detail/' . $pref) : 'javascript:void(0)' }}"
                            class="gallery-arrow arrow-left {{ $pref == '' ? 'disabled' : '' }}">
                            <i class='bx bxs-left-arrow'></i>
                        </a>
                        <a href="{{ $next ? url('gallery/detail/' . $next) : 'javascript:void(0)' }}"
                            class="gallery-arrow arrow-right {{ $next == '' ? 'disabled' : '' }}">
                            <i class='bx bxs-right-arrow'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('bottom')
@endpush
