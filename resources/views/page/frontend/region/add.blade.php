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
                    <div class="form-add-city">
                        <div class="form-left">
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="CITY">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="ENTER YOUR EMAIL">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" placeholder="PHONE">
                            </div>
                            <div class="form-group pt-5">
                                <button class="btn-danger-mid mt-5">MORE INFO</button>
                            </div>
                        </div>
                        <div class="form-right">
                            <h4 class="title">REGISTER YOUR CITY</h4>
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
