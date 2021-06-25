@extends('template.frontend.index')
@section('title_page', 'Regions')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-sea')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <h4 class="title-big  text-white pt-5 mt-5">REGIONAL</h4>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="region-list">

                                <a href="{{ webPath('regions/detail') }}" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_medan.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">MEDAN</h4>
                                    </div>
                                </a>
                                <a href="{{ webPath('regions/detail') }}" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_jakarta.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">JAKARTA</h4>
                                    </div>
                                </a>
                                <a href="{{ webPath('regions/detail') }}" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_tasik.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">TASIK</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_bandung.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">BANDUNG</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_pacitan.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">PACITAN</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_surabaya.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">SURABAYA</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_banyuwangi.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">BANYUWANGI</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_bali.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">BALI</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_lombok.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">LOMBOK</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_pontianak.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">PONTIANAK</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_balikpapan.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">BALIKPAPAN</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_sulut.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">SULAWESI UTARA</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_gorontalo.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">GORONTALO</h4>
                                    </div>
                                </a>
                                <a href="" class="region-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_malut.png') }}" alt="region">
                                    <div class="content">
                                        <h4 class="title">MALUKU UTARA</h4>
                                    </div>
                                </a>
                                <a href="{{ webPath('regions/add') }}" class="region-item">
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
@push('head')

@endpush
