@extends('template.frontend.index')
@section('title_page', 'Introduction')
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
                    <li>INTRODUCTION</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="image-big-left">
                    <img src="{{ asset('vendor/front/assets/example/img/profile/img_intro.png') }}" class="image-left">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="text-bid-right">
                    <h4 class="title">INTRODUCTION</h4>
                    <div class="desc">
                        There will be more plastic in the oceans than fish by 2050.
                        Every 20 minutes, the equivalent of a 10-ton truckload of plastic is
                        dumped into the waters around Indonesia, making this country the
                        biggest polluters after China.

                        In Indonesia’s case, given that base infrastructure is not keeping up
                        with the rapid rate of urbanization, Indonesia could reach such a
                        dubious milestone ahead of most countries.
                        Indonesia is estimated to generate over 190,000 tons of waste every
                        day.

                        Plastic constitutes around 25,000 tons per day of which at least 70-80
                        percent is believed to end up in rivers and coastal waters.
                        Issues include large-scale deforestation (much of it illegal), and related
                        wildfires causing heavy smog over parts of western Indonesia, Malaysia
                        and Singapore.
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
