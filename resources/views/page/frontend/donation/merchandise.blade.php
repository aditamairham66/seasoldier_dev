@extends('template.frontend.index')
@section('title_page', 'Merchandise')
@section('description', '')
@section('keywords', '')
{{--@section('background', 'bg-tree')--}}

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/donation.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_merchandise_background')) }}");
            background-size: cover;
            background-position: top;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: auto;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="white" data-aos="fade-down">
                        <li><a href="{{ webPath('support-us') }}">SUPPORT US</a></li>
                        <li><b><i>MERCHANDISE</i></b></li>
                    </ol>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <h4 class="title-program text-white mt-5" data-aos="fade-down">MERCHANDISE</h4>

                    <div class="container">
                        <div class="row">
                            @foreach($data as $row)
                                <div class="col-lg-4" data-aos="fade-up">
                                    <div class="box-black-small">
                                        <div class="image">
                                            <img src="{{ asset($row->image) }}" alt="image" class="img-merchandise">
                                        </div>
                                        <div class="content">
                                            <h4 class="title merchandise-title"><i>{{ $row->name }}</i></h4>
                                            <div class="caption">RP {{ number_format($row->price,0,'.','.') }}</div>
                                            <a href="{{ $row->link }}" class="btn-danger-mid btn-buy" target="_blank">BUY NOW</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@push('bottom')
    <script>
        function sameHeight(){
            let maxHeight = 0;
            let content = $('.box-black-small');

            content.each(function(){
                let h = $(this).height();
                if(h > maxHeight){
                    maxHeight = h;
                }
            });

            content.height(maxHeight);
        }
        sameHeight();
    </script>
@endpush
