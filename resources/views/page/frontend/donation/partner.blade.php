@extends('template.frontend.index')
@section('title_page', 'Support Us / Our Partners')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/donation.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_partners_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="{{ webPath('/support-us') }}">SUPPORT US</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>OUR PARTNERS</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid detail-title-center">
            <!-- Title -->
            <div class="row">
                <div class="col-12 col-lg-12" data-aos="fade-down">
                    <p class="detail-title">OUR PARTNERS</p>
                </div>
            </div><!-- End Title -->

            <!-- Content -->
            <div class="row">
                <div class="col-12 d-flex flex-row flex-wrap justify-content-center align-items-center">
                    @foreach ($data as $x => $row)
                        <div class="image-item" data-aos="fade-up">
                            <img src="{{ $row->image }}" alt="partner : {{ $row->name }}">
                        </div>
                    @endforeach
                </div>

                <div class="col-12">
                    <div class="caption-program text-white" data-aos="fade-up">{!! nl2br($description) !!}</div>
                </div>
            </div><!-- End Content -->
        </div>
    </main>
@endsection

@push('bottom')
@endpush
