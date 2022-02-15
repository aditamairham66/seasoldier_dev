@extends('template.frontend.index')
@section('title_page', 'Introduction')
@section('description', '')
@section('keywords', '')
@section('background', '')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/profile.css') }}">
@endpush

@section('content')
    <?php
    $image = $data['profile_introduction_image']->content ?? 'vendor/front/assets/example/img/favicon.png';
    $description = $data['profile_introduction_description']->content ?? '';
    ?>

    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol data-aos="fade-down">
                        <li><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                        <li><b><i>INTRODUCTION</i></b></li>
                    </ol>
                </div>
            </div>
        </section>

        <div class="row" style="margin: 0;">
            <div class="col-lg-6 col-md-12" style="padding: 0;">
                <div class="image-big-left" data-aos="fade-right">
                    <img src="{{ asset($image) }}" class="image-left" alt="Profile Introduction">
                </div>
            </div>
            <div class="col-lg-5 col-md-12" style="padding: 0;">
                <div class="text-bid-right">
                    <h4 class="title" data-aos="fade-left">INTRODUCTION</h4>
                    <div class="desc" data-aos="fade-left">{!! nl2br($description) !!}</div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->
@endsection

@push('bottom')
    <script>
        function setHeight() {
            let h = $('.desc').height() - 20;
            $('.image-left').height(h);
        }

        setHeight();
    </script>
@endpush
