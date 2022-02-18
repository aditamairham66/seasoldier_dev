@extends('template.frontend.index')
@section('title_page', 'Regions')
@section('description', '')
@section('keywords', '')
{{--@section('background', 'bg-sea')--}}

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/regional.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('regional_background')) }}");
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

        <section class="breadcrumbs pb-5">
            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <h4 class="title-big text-white pt-5"  data-aos="fade-down">REGIONAL</h4>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="region-list">
                                    @foreach($data as $row)
                                        <a href="{{ webPath('regions/detail/'.$row->slug) }}" class="region-item" data-aos="fade-up">
                                            <img src="{{ asset($row->image) }}" alt="region">
                                            <div class="content">
                                                <h4 class="title">{{ $row->name }}</h4>
                                            </div>
                                        </a>
                                    @endforeach
                                    <a href="{{ webPath('regions/register') }}" class="region-item" data-aos="fade-up">
                                        <div class="circle-empty-city">YOUR CITY</div>
                                        <div class="content">
                                            <h4 class="title">NEXT..</h4>
                                        </div>
                                    </a>
                                </div>
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
