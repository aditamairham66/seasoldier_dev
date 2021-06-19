@extends('template.frontend.index')
@section('title_page', 'Our Organization')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-dark')
@section('content')
<main id="main">

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('/profiles') }}">PROFILE</a></li>
                    <li>OUR ORGANIZATION</li>
                </ol>
            </div>
        </div>
        <div class="row bg-pattern-profile mt-5">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row flex-reverse">
                        <div class="col-lg-6 pl-0">
                            <div class="text-bid-left">
                                <h4 class="title text-white">OUR ORGANIZATION</h4>
                                <div class="desc text-white">
                                    #Seasoldier was first initiated by Nadine Chandrawinata and Dinni
                                    Septianingrum on March 28, 2015. This movement originated from
                                    social media, where we invited other people, especially young people,
                                    to take eco-friendly actions starting from ourselves.

                                    Over time, the movement that started from the hashtag #Seasoldier
                                    and #Brani on Instagram was realized in real action and developed in
                                    the community. We have done various kinds of activities, such as tree
                                    planting / mangroves, ecobrick training, or sailing dolphin. To this day,
                                    we are spread in 14 cities in Indonesia.

                                    As a form of seriousness and a long-term plan, in 2018, #Seasoldier
                                    officially becomes the Seasoldier Prajurit Laut Foundation. The hope is
                                    that we can manage this organization professionally, but still promote
                                    unity in the community and individual actions / initiatives.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-0 text-center">
                            <div class="image-our">
                                <img src="{{ asset('vendor/front/assets/example/img/profile/o1.png') }}" alt="image">
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
