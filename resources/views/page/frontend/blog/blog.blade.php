@extends('template.frontend.index')
@section('title_page', 'Blog')
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
            <h4 class="title-big text-white pt-5 text-center" data-aos="fade-down">BLOG</h4>

            <div class="row">
                @foreach ($data as $row)
                <div class="col-12 col-md-6 mt-4" data-aos="fade-down">
                    <a href="{{ url('blog/detail/'.$row->slug) }}" class="blog-wrapper">
                        <div class="blog-image" style="background-image: url({{ asset($row->image) }})"></div>
                        <div class="blog-items">
                            <h2 class="blog-title">
                                {{ $row->title }}
                            </h2>
                            <p class="blog-desc">
                                {{ Str::limit(strip_tags($row->content), 100, '...') }}
                                <span href="{{ url('blog/detail/'.$row->slug) }}" class="readmore">Baca Selengkapnya</span>
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row text-center mt-5" data-aos="fade-down">
                <div class="col-12">
                    @include('page.frontend.blog.pagination', ['paginator' => $data])
                </div>
            </div>
        </div>
    </main><!-- End #main -->
@endsection

@push('bottom')
@endpush
