@extends('template.frontend.index')
@section('title_page', 'Contact')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-mangrove')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <h4 class="title-big  text-white pt-5 mt-5">CONTACT</h4>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="menu-round-center-midsmall mt-5 pt-5">
                                <a href="index_drain.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_email.png') }}" alt="">
                                    </div>
                                    <span class="title">EMAIL</span>
                                </a>
                                <a href="index_partner.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_instagram.png') }}" alt="">
                                    </div>
                                    <span class="title">INSTAGRAM</span>
                                </a>
                                <a href="index_merchandise.html" class="menu-item">
                                    <div class="image">
                                        <img src="{{ asset('vendor/front/assets/example/img/icon/ic_whatsapp.png') }}" alt="">
                                    </div>
                                    <span class="title">PHONE</span>
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
@push('head')

@endpush
