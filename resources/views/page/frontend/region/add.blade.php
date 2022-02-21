@extends('template.frontend.index')
@section('title_page', 'Regional / NEW REGIONAL')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/regional.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('regional_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main" class="d-flex flex-column align-items-center">
        <div class="container-fluid position-relative">
            <nav aria-label="breadcrumb" data-aos="fade-down">
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item"><a href="{{ webPath('/regions') }}">REGIONAL</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><b><i>NEW REGIONAL</i></b></li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="region-detail">
                    <form action="{{ webPath('regions/city-save') }}" method="post" enctype="multipart/form-data"
                        class="row">
                        {{ csrf_field() }}

                        <div class="col-lg-7 order-lg-2 d-flex flex-column justify-content-center align-items-center"
                            @if ($is_mobile) data-aos="fade-up" @else data-aos="fade-left" @endif>
                            <p class="title text-center">REGISTER<br>YOUR CITY</p>
                        </div>

                        <div class="col-lg-5 order-lg-1"
                            @if ($is_mobile) data-aos="fade-up" @else data-aos="fade-right" @endif>
                            {!! showMessage() !!}

                            <div class="form-group">
                                @if (!empty($errors->first('city')))
                                    <div class="alert-text-danger">
                                        <i class="ri-information-line"></i> {{ $errors->first('city') }}
                                    </div>
                                @endif
                                <input type="text" name="city" class="form-control" placeholder="CITY"
                                    value="{{ old('city') ?: '' }}">
                            </div>
                            <div class="form-group">
                                @if (!empty($errors->first('email')))
                                    <div class="alert-text-danger">
                                        <i class="ri-information-line"></i> {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <input type="email" name="email" class="form-control" placeholder="ENTER YOUR EMAIL"
                                    value="{{ old('email') ?: '' }}">
                            </div>
                            <div class="form-group">
                                @if (!empty($errors->first('phone')))
                                    <div class="alert-text-danger">
                                        <i class="ri-information-line"></i> {{ $errors->first('phone') }}
                                    </div>
                                @endif
                                <input type="number" name="phone" class="form-control" placeholder="PHONE"
                                    value="{{ old('phone') ?: '' }}">
                            </div>
                            <div class="form-group box-submit">
                                <button class="btn-danger-mid">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('bottom')
@endpush
