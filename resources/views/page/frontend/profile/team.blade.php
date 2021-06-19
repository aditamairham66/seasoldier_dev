@extends('template.frontend.index')
@section('title_page', 'Our Team')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-dark')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('profiles') }}">PROFILE</a></li>
                    <li>OUR TEAM</li>
                </ol>
            </div>
        </div>
        <div class="row bg-pattern-profile">
            <div class="col-lg-12 text-center">
                <h4 class="title-mid text-white">OUR TEAM</h4>

                <div class="team-list-primary">
                    <div class="team-list right">
                        <img src="{{ asset('vendor/front/assets/example/img/profile/pm_team1.png') }}" alt="team" class="image-team">
                        <div class="content">
                            <h4 class="title">NADINE CHANDRAWINATA</h4>
                            <p class="caption">FOUNDER & Executive Director</p>
                        </div>
                    </div>
                    <div class="team-list left">
                        <div class="content">
                            <h4 class="title">NADINE CHANDRAWINATA</h4>
                            <p class="caption">FOUNDER & Executive Director</p>
                        </div>
                        <img src="{{ asset('vendor/front/assets/example/img/profile/pm_team2.png') }}" alt="team" class="image-team">
                    </div>
                </div>

                <div class="team-list-second">
                    <div class="team-list">
                        <div class="image">
                            <img src="{{ asset('vendor/front/assets/example/img/profile/team_1.png') }}" alt="Image Team">
                        </div>
                        <div class="content">
                            <h4 class="title">RIKA SUPRIHANTINI</h4>
                            <div class="caption">Community Outreach Coordinator</div>
                        </div>
                    </div>
                    <div class="team-list">
                        <div class="image">
                            <img src="{{ asset('vendor/front/assets/example/img/profile/team_2.png') }}" alt="Image Team">
                        </div>
                        <div class="content">
                            <h4 class="title">MULIAWAN</h4>
                            <div class="caption">Regional Development Manager</div>
                        </div>
                    </div>
                    <div class="team-list">
                        <div class="image">
                            <img src="{{ asset('vendor/front/assets/example/img/profile/team_3.png') }}" alt="Image Team">
                        </div>
                        <div class="content">
                            <h4 class="title">LARAS A</h4>
                            <div class="caption">GRAPHIC DESIGNER</div>
                        </div>
                    </div>
                    <div class="team-list">
                        <div class="image">
                            <img src="{{ asset('vendor/front/assets/example/img/profile/team_4.png') }}" alt="Image Team">
                        </div>
                        <div class="content">
                            <h4 class="title">FITRIANAH</h4>
                            <div class="caption">Merchandise Manager</div>
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
