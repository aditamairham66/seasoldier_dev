@extends('template.frontend.index')
@section('title_page', 'Detail')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-tree')
@section('content')
<main id="main">

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('gallery') }}">GALERIES</a></li>
                    <li>INSTAGRAM POST</li>
                </ol>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="gallery-detail-list">
                                <div class="detail-item">
                                    <img src="{{ asset('vendor/front/assets/example/img/gallery/g9.png') }}" alt="image detail">
                                    <div class="content">
                                        <h4 class="title">@SESOLDIER_</h4>
                                        <div class="desc">
                                            Seasoldier dan regional pacitan akan live bareng dengan membahas topik  Tanam Pohon di Pacitan, atasi bencana kekeringan.

                                            Minggu, 30 Agustus 2020
                                            Pukul 16.00 WIB
                                            Live at instagram @seasoldier_
                                        </div>
                                        <a href="#" class="btn-danger-mid">MORE INFO</a>
                                    </div>
                                </div>
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
