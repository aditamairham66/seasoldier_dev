@extends('template.frontend.index')
@section('title_page', 'Support Us / Merchandise')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/donation.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_merchandise_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="{{ webPath('/support-us') }}">SUPPORT US</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>MERCHANDISE</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid detail-title-center">
            <!-- Title -->
            <div class="row">
                <div class="col-12 col-lg-12" data-aos="fade-down">
                    <p class="detail-title">MERCHANDISE</p>
                </div>
            </div><!-- End Title -->

            <!-- Content -->
            <div class="row mt-5 mb-5" data-aos="fade-up">
                @foreach ($data as $row)
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="box-black-small">
                            <div class="image">
                                <img src="{{ asset($row->image) }}" alt="image" class="img-merchandise">
                            </div>
                            <div class="content">
                                <h4 class="title merchandise-title"><i>{{ $row->name }}</i></h4>
                                <div class="caption">RP {{ number_format($row->price, 0, '.', '.') }}
                                </div>
                                <a href="{{ $row->link }}" class="btn-danger-mid btn-buy" target="_blank">BUY
                                    NOW</a>
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
            let outerWidth = $('body').outerWidth();

            if (outerWidth >= 768) {
                let maxHeight = 0;
                let content = $('.box-black-small');

                content.each(function() {
                    let h = $(this).height();
                    if (h > maxHeight) {
                        maxHeight = h;
                    }
                });
            }
        }
        sameHeight();
    </script>
@endpush
