@extends('template.frontend.index')
@section('title_page', 'Introduction')
@section('description', '')
@section('keywords', '')
@section('background', '')

@push('head')
    <style>
        .text-bid-right .title {
            font-weight: bold;
        }

        .image-big-left .image-left {
            width: 100%;
        }
    </style>
@endpush

@section('content')
    <?php
    $image = $data['profile_introduction_image']->content ?? 'vendor/front/assets/example/img/favicon.png';
    $description = $data['profile_introduction_description']->content ?? '';
    ?>

    <main id="main">

        <section class="breadcrumbs mb-5 pb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol>
                        <li><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                        <li style="font-weight: bold">INTRODUCTION</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="image-big-left">
                        <img src="{{ asset($image) }}"
                             class="image-left" alt="Profile Introduction">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="text-bid-right">
                        <h4 class="title">INTRODUCTION</h4>
                        <div class="desc">
                            {!! nl2br($description) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('bottom')
@endpush
