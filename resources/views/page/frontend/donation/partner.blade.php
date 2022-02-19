@extends('template.frontend.index')
@section('title_page', 'Our Partners')
@section('description', '')
@section('keywords', '')
{{--@section('background', 'bg-tree')--}}

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/donation.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_partners_background')) }}");
            background-size: cover;
            background-position: top;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: auto;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <section class="breadcrumbs mb-5 pb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="white" data-aos="fade-down">
                        <li><a href="{{ webPath('support-us') }}">SUPPORT US</a></li>
                        <li>OUR PARTNERS</li>
                    </ol>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <h4 class="title-program text-white mt-5" data-aos="fade-down">OUR PARTNERS</h4>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 pb-5">
                                <div class="partner-list">
                                    @foreach($data as $x => $row)
                                        <div class="image-item" data-aos="fade-up">
                                            <img src="{{ $row->image }}" alt="partner : {{ $row->name }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="caption-program text-white" data-aos="fade-up">{!! nl2br($description) !!}</div>
                                <a href="{{ $link }}" class="btn-danger-mid" target="_blank" data-aos="fade-up">JOIN PARTNERSHIP</a>
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
