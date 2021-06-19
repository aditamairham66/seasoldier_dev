@extends('template.frontend.index')
@section('title_page', 'Detail')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-sea')
@section('content')
<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('regions') }}">REGIONAL</a></li>
                    <li>JAKARTA</li>
                </ol>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">

                    <div class="region-detail-list">

                        <div class="region-detail-item">
                            <img src="{{ asset('vendor/front/assets/example/img/icon/city/ic_jakarta.png') }}" alt="image item" class="image">
                            <div class="content">
                                <h4 class="title">REGIONAL JAKARTA</h4>
                                <p class="caption-text"><i class="ic_instagram"></i> @seasoldier_jkt</p>
                                <p class="caption-text"><i class="ic_email"></i> seasoldierjakarta@gmail.com</p>

                                <div class="region-list-media">
                                    <div class="media-item">
                                        <img src="" alt="image media">
                                    </div>
                                    <div class="media-item">
                                        <iframe src="" frameborder="0"></iframe>
                                    </div>
                                </div>

                                <a href="#" class="btn-danger-mid">MORE INFO</a>
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
