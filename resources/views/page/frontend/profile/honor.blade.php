@extends('template.frontend.index')
@section('title_page', 'Seasoldier Kehormatan')
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
                    <li>SEASOLDIER KEHORMATAN</li>
                </ol>
            </div>
        </div>
        <div class="row bg-pattern-profile mt-5">
            <div class="col-lg-12 text-center">
                <h4 class="title-mid">SEASOLDIER KEHORMATAN</h4>

                <div class="team-honor-list">

                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person1.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
                        </div>
                    </div>
                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person2.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
                        </div>
                    </div>
                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person3.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
                        </div>
                    </div>

                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person4.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
                        </div>
                    </div>
                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person5.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
                        </div>
                    </div>
                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person6.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
                        </div>
                    </div>

                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person7.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
                        </div>
                    </div>
                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person8.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
                        </div>
                    </div>
                    <div class="team-list">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/person9.png') }}" alt="honor team" class="image-team">
                        <div class="content">
                            <h4 class="title">Mischa Chandrawinata</h4>
                            <p class="caption">AKTOR</p>
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
