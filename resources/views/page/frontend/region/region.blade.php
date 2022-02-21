@extends('template.frontend.index')
@section('title_page', 'Regions')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/regional.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('regional_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main">

        <div class="container-fluid">
            <h4 class="title-big text-white pt-5 text-center" data-aos="fade-down">REGIONAL</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-row flex-wrap d-flex justify-content-center align-items-center">
                        @foreach ($data as $row)
                            <a href="{{ webPath('regions/detail/' . $row->slug) }}" data-aos="fade-up"
                                class="region-item d-flex flex-column justify-content-center align-content-center">
                                <img src="{{ asset($row->image) }}" alt="Region {{ $row->name }}"
                                    class="img-region">
                                <h4 class="title-region">{{ $row->name }}</h4>
                            </a>
                        @endforeach
                        <a href="{{ webPath('regions/register') }}" data-aos="fade-up"
                            class="region-item d-flex flex-column justify-content-center align-content-center">
                            <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_your_city.png') }}"
                                alt="Your City" class="img-region">
                            <h4 class="title-region">NEXT..</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->
@endsection

@push('bottom')
    <script>
        function sameRegionItemHeight() {
            let box = $('.region-item');
            let w = box.width();
            box.height(w);
        }
        sameRegionItemHeight();
    </script>
@endpush
