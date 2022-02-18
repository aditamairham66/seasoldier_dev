@extends('template.frontend.index')
@section('title_page', 'Detail')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-tree')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/gallery.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('gallery_background')) }}");
            background-size: cover;
            background-position: top;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="white" data-aos="fade-down">
                        <li><a href="{{ webPath('gallery') }}">GALERIES</a></li>
                        <li><b><i>INSTAGRAM POST</i></b></li>
                    </ol>
                </div>
            </div>

            <div class="row mt-3" data-aos="fade-up">
                <div class="col-lg-12 text-center">
                    <div class="container">
                        <div class="row box-gallery-detail">
                            <div class="col-lg-5" data-aos="fade-right">
                                <img src="{{ asset($image) }}" alt="image detail" class="img-gallery">
                            </div>
                            <div class="col-lg-7" data-aos="fade-left">
                                <h4 class="title"><a href="https://www.instagram.com/{{$name}}" target="_blank">{{ '@'.$name }}</a></h4>
                                <div class="desc">{!! nl2br($content) !!}</div>
                                <a href="{{ $url }}" target="_blank" class="btn-danger-mid">MORE INFO</a>
                            </div>
                            <a href="{{ ($pref ? url('gallery/detail/'.$pref) : 'javascript:void(0)') }}" class="gallery-arrow arrow-left {{ $pref == '' ? 'disabled' : '' }}">
                                <i class='bx bxs-left-arrow'></i>
                            </a>
                            <a href="{{ ($next ? url('gallery/detail/'.$next) : 'javascript:void(0)') }}" class="gallery-arrow arrow-right {{ $next == '' ? 'disabled' : '' }}">
                                <i class='bx bxs-right-arrow'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@push('bottom')

@endpush
