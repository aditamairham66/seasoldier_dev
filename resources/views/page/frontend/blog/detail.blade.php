@extends('template.frontend.index')
@section('title_page', $data->title)
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/blog.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('blog_background')) }}");
        }

    </style>
@endpush

@section('content')
    <main id="main">

        <div class="container-fluid">
            <h4 class="title-bc text-white pt-5" data-aos="fade-down"><span>BLOG</span> > {{ $data->title }}</h4>

            <div class="blog-wrapper-detail">
                @php
                    \Carbon\Carbon::setLocale('id')
                @endphp
                <p class="content">{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y') }}</p>
                <img src="{{ asset($data->image) }}" alt="" class="w-100" data-aos="fade-up">
                <div class="blog-title-big" data-aos="fade-up">
                    {{ $data->title }}
                </div>
                <div class="content mb-5" data-aos="fade-up">
                    {!! $data->content !!}
                </div>

                <form action="{{ url('blog/comment') }}" method="POST" class="row mt-5 {{ count($comments) > 0 ? 'justify-content-between' : ''}}">
                    @if (count($comments) > 0)
                    <div class="col-12 col-md-5">
                        <div class="custom-line mb-5"></div>
                        <div class="comment-wrapper" id="list-comment" data-aos="fade-up">
                            @foreach ($comments as $item)
                                <h2>{{ $item->name }}</h2>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>{{ $item->comment }}</p>
                                    <p>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="col-12 col-md-6">
                        @if (count($comments) > 0)
                        <div class="custom-line mb-5 d-block d-md-none"></div>
                        @else
                        <div class="custom-line mb-5"></div>
                        @endif
                        {{ csrf_field() }}

                        {!! showMessage() !!}
                        
                        <div id="post-comment" data-aos="fade-up">
                            <input type="hidden" name="blog_id" value="{{ $data->id }}" readonly>
                            <div class="form-group" >
                                <label for="" class="c-label">COMMENT</label>
                                @if (!empty($errors->first('comment')))
                                    <div class="alert-text-danger">
                                        <i class="ri-information-line"></i> {{ $errors->first('comment') }}
                                    </div>
                                @endif
                                <textarea name="comment" class="form-control" cols="30" rows="10"
                                    placeholder="YOUR COMMENT">{!! old('comment') ?: '' !!}</textarea>
                            </div>
                            <div class="form-group" >
                                <label for="" class="c-label">NAME</label>
                                @if (!empty($errors->first('name')))
                                    <div class="alert-text-danger">
                                        <i class="ri-information-line"></i> {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <input type="text" name="name" class="form-control" placeholder="ENTER YOUR NAME"
                                    value="{{ old('name') ?: '' }}">
                            </div>
                            <div class="form-group" >
                                <label for="" class="c-label">EMAIL</label>
                                @if (!empty($errors->first('email')))
                                    <div class="alert-text-danger">
                                        <i class="ri-information-line"></i> {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <input type="email" name="email" class="form-control" placeholder="ENTER YOUR EMAIL"
                                    value="{{ old('email') ?: '' }}">
                            </div>
                            <div class="form-group text-center" >
                                <button type="submit" class="btn-danger-mid d-block w-100">SEND</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main><!-- End #main -->
@endsection

@push('bottom')
<script>
    $(document).ready(function () {
        function heightComment() {
            let height = $('#post-comment').height()
            $('#list-comment').height(height);
        }
        heightComment()
        $(window).resize(function () { 
            heightComment()
        })
    })
</script>
@endpush
