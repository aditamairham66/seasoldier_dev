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
<style>
    .form-add-city {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 30px;
        padding: 278px 74px 46px 74px;
    }
    .form-add-city .form-left{
        width: 50%;
    }
    .form-add-city .form-right{
        width: 50%;
        padding-left: 150px;
    }
    .form-add-city .title {
        font-style: normal;
        font-weight: 500;
        font-size: 48px;
        line-height: 65px;
        color: #FFFFFF;
        max-width: 369px;
        text-overflow: inherit;
    }
    @media(max-width: 920px) {
        .form-add-city {
            flex-direction: column-reverse;
            padding-top: 100px;
        }
        .form-add-city .form-left,
        .form-add-city .form-right{
            width: 100%;
        }
        .form-add-city .form-right{
            padding-left: 0px;
            margin-bottom: 80px;
        }
    }
</style>
@endpush
