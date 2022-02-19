@extends('template.frontend.index')
@section('title_page', 'Contact')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-mangrove')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/contact.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('contact_us_background')) }}");
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
            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <h4 class="title-big text-white">CONTACT</h4>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="menu-round-center-midsmall pt-5">
                                    <a href="mailto:{{ $email }}" class="menu-item">
                                        <div class="image"><img src="{{ asset('vendor/front/assets/example/img/icon/ic_email.png') }}"></div>
                                        <span class="title">EMAIL</span>
                                    </a>
                                    <a href="{{ $instagram }}" class="menu-item" target="_blank">
                                        <div class="image"><img src="{{ asset('vendor/front/assets/example/img/icon/ic_instagram.png') }}"></div>
                                        <span class="title">INSTAGRAM</span>
                                    </a>
                                    <a href="{{ $wa }}" class="menu-item" target="_blank">
                                        <div class="image"><img src="{{ asset('vendor/front/assets/example/img/icon/ic_whatsapp.png') }}"></div>
                                        <span class="title">WHATSAPP</span>
                                    </a>
                                </div>

                                <form action="{{ webPath('contact/save') }}" method="post" class="form-contact" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}

                                    {!! showMessage() !!}
                                    <div class="form-group">
                                        @if(!empty($errors->first('email')))
                                            <div class="alert-text-danger">
                                                <i class="ri-information-line"></i> {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                        <input type="email" name="email" class="form-control" placeholder="ENTER YOUR EMAIL"
                                               value="{{ (old('email')?:'') }}">
                                    </div>
                                    <div class="form-group">
                                        @if(!empty($errors->first('message')))
                                            <div class="alert-text-danger">
                                                <i class="ri-information-line"></i> {{ $errors->first('message') }}
                                            </div>
                                        @endif
                                        <textarea name="message" class="form-control" cols="30" rows="10" placeholder="YOUR MESSAGE">{!! (old('message')?:'') !!}</textarea>
                                    </div>
                                    <div class="form-group mt-5">
                                        <button type="submit" class="btn-danger-mid">SEND</button>
                                    </div>
                                </form>

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
