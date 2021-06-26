@extends('template.frontend.index')
@section('title_page', 'Detail')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-sea')
@section('content')
<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('regions') }}">REGIONAL</a></li>
                    <li>NEW REGIONAL</li>
                </ol>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <form action="{{ webPath('regions/city-save') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="form-add-city">
                            <div class="form-left">
                                {!! showMessage() !!}

                                <div class="form-group">
                                    @if(!empty($errors->first('city')))
                                    <div class="alert-text-danger">
                                        <i class="ri-information-line"></i> {{ $errors->first('city') }}
                                    </div>
                                    @endif
                                    <input type="text" name="city" class="form-control" placeholder="CITY"
                                           value="{{ (old('city')?:'') }}">
                                </div>
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
                                    @if(!empty($errors->first('phone')))
                                    <div class="alert-text-danger">
                                        <i class="ri-information-line"></i> {{ $errors->first('phone') }}
                                    </div>
                                    @endif
                                    <input type="number" name="phone" class="form-control" placeholder="PHONE"
                                           value="{{ (old('phone')?:'') }}">
                                </div>
                                <div class="form-group pt-5">
                                    <button class="btn-danger-mid mt-5">MORE INFO</button>
                                </div>
                            </div>
                            <div class="form-right">
                                <h4 class="title">REGISTER YOUR CITY</h4>
                            </div>
                        </div>
                    </form>
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
