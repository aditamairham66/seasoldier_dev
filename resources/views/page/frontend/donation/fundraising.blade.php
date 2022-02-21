@extends('template.frontend.index')
@section('title_page', 'Support Us / Fundraising')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/donation.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_fundraising_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="{{ webPath('/support-us') }}">SUPPORT US</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>FUNDRAISING</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid detail-title-center">
            <!-- Title -->
            <div class="row">
                <div class="col-12 col-lg-12" data-aos="fade-down">
                    <p class="detail-title">FUNDRAISING</p>
                </div>
            </div><!-- End Title -->

            <!-- Content -->
            <div class="row mt-5 mb-5" data-aos="fade-up">
                @foreach ($data as $i => $row)
                    <div @if ($i === 0) class="col-lg-8 box-large" @else class="col-lg-4" @endif
                        data-aos="fade-up">
                        <div class="box-black">
                            <div class="image">
                                <img src="{{ asset($row->image) }}" alt="image">
                            </div>
                            <div class="content">
                                <h4 class="title">{{ $row->name }}</h4>
                                <div class="desc">{{ nl2br($row->desc) }}</div>
                                <a href="{{ $row->link }}" target="_blank" class="btn-danger-mid btn-donate">DONATE</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- End Content -->
        </div>
    </main>
@endsection

@push('bottom')
    <script>
        function sameHeight() {
            let maxHeight = 0;
            let content = $('.content');

            content.each(function() {
                let h = $(this).height();
                if (h > maxHeight) {
                    maxHeight = h;
                }
            });

            content.height(maxHeight);
        }
        sameHeight();
    </script>
@endpush
