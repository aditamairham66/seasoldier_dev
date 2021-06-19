@extends('template.frontend.index')
@section('title_page', 'Braclate')
@section('description', '')
@section('keywords', '')
@section('background', '')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                    <li>BRACLATE</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="image-big-left">
                    <img src="{{ asset('vendor/front/assets/example/img/profile/img_braclate.png') }}" class="image-left">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="text-bid-right">
                    <h4 class="title">BRACLATE</h4>
                    <div class="desc">
                        The primary roles of a #SEASOLDIER include
                        educating the mass, conservation, and encouraging
                        this movement towards assisting our earth.
                        #SEASOLDIER bracelets are used as a reminder
                        of these responsibilities.
                        More than 80% of pollution
                        to the marine environment comes from land.
                        The #SEASOLDIER’s task is focused on minimalizing
                        matters that are harmful to earth.
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
