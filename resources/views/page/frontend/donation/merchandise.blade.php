@extends('template.frontend.index')
@section('title_page', 'Merchandise')
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
                    <li>MERCHANDISE</li>
                </ol>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <h4 class="title-program text-white pt-5 mt-5">MERCHANDISE</h4>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">

                            <div class="box-black-small">
                                <div class="image">
                                    <img src="{{ asset('vendor/front/assets/example/img/donation/p1.png') }}" alt="image">
                                </div>
                                <div class="content">
                                    <h4 class="title">T-SHIRT SHORT SLEEVE</h4>
                                    <div class="caption">RP 120.000</div>
                                    <a href="#" class="btn-danger-mid">BUY NOW</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">

                            <div class="box-black-small">
                                <div class="image">
                                    <img src="{{ asset('vendor/front/assets/example/img/donation/p2.png') }}" alt="image">
                                </div>
                                <div class="content">
                                    <h4 class="title">T-SHIRT SHORT SLEEVE</h4>
                                    <div class="caption">RP 120.000</div>
                                    <a href="#" class="btn-danger-mid">BUY NOW</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">

                            <div class="box-black-small">
                                <div class="image">
                                    <img src="{{ asset('vendor/front/assets/example/img/donation/p3.png') }}" alt="image">
                                </div>
                                <div class="content">
                                    <h4 class="title">T-SHIRT SHORT SLEEVE</h4>
                                    <div class="caption">RP 120.000</div>
                                    <a href="#" class="btn-danger-mid">BUY NOW</a>
                                </div>
                            </div>

                        </div>


                        <div class="col-lg-4">

                            <div class="box-black-small">
                                <div class="image">
                                    <img src="{{ asset('vendor/front/assets/example/img/donation/p4.png') }}" alt="image">
                                </div>
                                <div class="content">
                                    <h4 class="title">T-SHIRT SHORT SLEEVE</h4>
                                    <div class="caption">RP 120.000</div>
                                    <a href="#" class="btn-danger-mid">BUY NOW</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">

                            <div class="box-black-small">
                                <div class="image">
                                    <img src="{{ asset('vendor/front/assets/example/img/donation/p5.png') }}" alt="image">
                                </div>
                                <div class="content">
                                    <h4 class="title">T-SHIRT SHORT SLEEVE</h4>
                                    <div class="caption">RP 120.000</div>
                                    <a href="#" class="btn-danger-mid">BUY NOW</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">

                            <div class="box-black-small">
                                <div class="image">
                                    <img src="{{ asset('vendor/front/assets/example/img/donation/p6.png') }}" alt="image">
                                </div>
                                <div class="content">
                                    <h4 class="title">T-SHIRT SHORT SLEEVE</h4>
                                    <div class="caption">RP 120.000</div>
                                    <a href="#" class="btn-danger-mid">BUY NOW</a>
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
