@extends('template.frontend.index')
@section('title_page', 'Contact')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/contact.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('contact_us_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main">

        <div class="container-fluid">
            <h4 class="title-big text-white pt-5 text-center" data-aos="fade-down">CONTACT</h4>

            <div class=" d-flex flex-row flex-wrap align-items-center justify-content-center">
                <a href="mailto:{{ $email }}" class="menu-item" data-aos="fade-down">
                    <div class="image">
                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_email.png') }}">
                    </div>
                    <span class="title">EMAIL</span>
                </a>
                <a href="{{ $instagram }}" class="menu-item" target="_blank" data-aos="fade-down">
                    <div class="image">
                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_instagram.png') }}">
                    </div>
                    <span class="title">INSTAGRAM</span>
                </a>
                <a href="{{ $wa }}" class="menu-item" target="_blank" data-aos="fade-down">
                    <div class="image">
                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_whatsapp.png') }}">
                    </div>
                    <span class="title">WHATSAPP</span>
                </a>
            </div>

            <form action="{{ webPath('contact/save') }}" method="post" class="form-contact"
                enctype="multipart/form-data">
                {{ csrf_field() }}

                {!! showMessage() !!}
                <div class="form-group" data-aos="fade-up">
                    @if (!empty($errors->first('email')))
                        <div class="alert-text-danger">
                            <i class="ri-information-line"></i> {{ $errors->first('email') }}
                        </div>
                    @endif
                    <input type="email" name="email" class="form-control" placeholder="ENTER YOUR EMAIL"
                        value="{{ old('email') ?: '' }}">
                </div>
                <div class="form-group" data-aos="fade-up">
                    @if (!empty($errors->first('message')))
                        <div class="alert-text-danger">
                            <i class="ri-information-line"></i> {{ $errors->first('message') }}
                        </div>
                    @endif
                    <textarea name="message" class="form-control" cols="30" rows="10"
                        placeholder="YOUR MESSAGE">{!! old('message') ?: '' !!}</textarea>
                </div>
                <div class="form-group text-center" data-aos="fade-up">
                    <button type="submit" class="btn-danger-mid">SEND</button>
                </div>
            </form>
        </div>
    </main><!-- End #main -->
@endsection

@push('bottom')
@endpush
