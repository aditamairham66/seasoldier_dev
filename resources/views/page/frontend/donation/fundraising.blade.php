@extends('template.frontend.index')
@section('title_page', 'Fundraising')
@section('description', '')
@section('keywords', '')
{{--@section('background', 'bg-tree')--}}

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/donation.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('support_fundraising_background')) }}");
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

        <section class="breadcrumbs mb-5 pb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="white" data-aos="fade-down">
                        <li><a href="{{ webPath('support-us') }}">SUPPORT US</a></li>
                        <li><b><i>FUNDRISING</i></b></li>
                    </ol>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <h4 class="title-program text-white pt-5 pb-5" data-aos="fade-down">FUNDRAISING</h4>

                    <div class="container">
                        <div class="row">
                            @foreach($data as $i => $row)
                                <div @if($i === 0) class="col-lg-8" @else class="col-lg-4" @endif data-aos="fade-up">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
@push('bottom')
    <script>
        function sameHeight(){
            let maxHeight = 0;
            let content = $('.content');

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
