@extends('template.frontend.index')
@section('title_page', 'Our Partners')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-tree')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('donation') }}">DONATION</a></li>
                    <li>OUR PARTNERS</li>
                </ol>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <h4 class="title-program text-white pt-5 mt-5">OUR PARTNERS</h4>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="partner-list">
                                @foreach($data as $x => $row)
                                <div class="image-item">
                                    <img src="{{ $row->image }}" alt="partner : {{ $row->name }}">
                                </div>
                                @endforeach
                                {{--<!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner2.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner3.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner4.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner5.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner7.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner16.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner9.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner8.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner10.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner6.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner11.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner12.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner13.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner14.png') }}" alt="partner">-->
                                <!--                                </div>-->
                                <!--                                <div class="image-item">-->
                                <!--                                    <img src="{{ asset('vendor/front/assets/example/img/partner/partner15.png') }}" alt="partner">-->
                                <!--                                </div>-->--}}

                            </div>
                            <div class="caption-program text-white">
                                You can put your company logo in our (related) info graphic to be
                                posted in our social media, upcoming website, or merchandise.
                                You will get monthly report sent via email or as per requested.
                                You will get special invitation for most our activities.
                                We will together protect our ocean, live sustainable, inspire others.
                            </div>

                            <a href="#" class="btn-danger-mid">JOIN PARTNERSHIP</a>
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
