@extends('template.frontend.index')
@section('title_page', 'Fundraising')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-tree')
@section('content')
<main id="main">

    <section class="breadcrumbs mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol class="white">
                    <li><a href="{{ webPath('donation') }}">DONATION</a></li>
                    <li>FUNDRISING</li>
                </ol>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <h4 class="title-program text-white pt-5 mt-5">FUNDRAISING</h4>

                <div class="container">
                    <div class="row">
                        <div  v-for="(row, i) in data.list_line.list.data"
                              v-if="data.list_line.list.data.length > 0"
                              :class="(row.is_first === true ? 'col-lg-8': 'col-lg-4')">

                            <div class="box-black">
                                <div class="image">
                                    <img :src="row.image" alt="image">
                                </div>
                                <div class="content">
                                    <h4 class="title">@{{ row.name }}</h4>
                                    <div class="desc">@{{ row.desc }}</div>
                                    <a :href="row.link" class="btn-danger-mid">DONATE</a>
                                </div>
                            </div>

                        </div>
                        {{--<!--                        <div class="col-lg-4">-->
                        <!---->
                        <!--                            <div class="box-black">-->
                        <!--                                <div class="image">-->
                        <!--                                    <img src="{{ asset('vendor/front/assets/example/img/donation/f2.png') }}" alt="image">-->
                        <!--                                </div>-->
                        <!--                                <div class="content">-->
                        <!--                                    <h4 class="title">CORAL TRANSPLANT</h4>-->
                        <!--                                    <div class="desc">The coral reef has been extensively damaged, resulting in unbalanced of the marine ecosystem. Be a part of our action, by donating to the conservation of coral reefs.-->
                        <!--                                        Budget: 15,000,000 IDR</div>-->
                        <!--                                    <a href="#" class="btn-danger-mid">DONATE</a>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!---->
                        <!--                        </div>-->--}}

                        {{--<!--                        <div class="col-lg-4">-->
                        <!---->
                        <!--                            <div class="box-black">-->
                        <!--                                <div class="image">-->
                        <!--                                    <img src="{{ asset('vendor/front/assets/example/img/donation/f3.png') }}" alt="image">-->
                        <!--                                </div>-->
                        <!--                                <div class="content">-->
                        <!--                                    <h4 class="title">WEBSITE BUILDING</h4>-->
                        <!--                                    <div class="desc">The coral reef has been extensively damaged, resulting in unbalanced of the marine ecosystem. Be a part of our action, by donating to the conservation of coral reefs.-->
                        <!--                                        Budget: 15,000,000 IDR</div>-->
                        <!--                                    <a href="#" class="btn-danger-mid">DONATE</a>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!---->
                        <!--                        </div>-->
                        <!--                        <div class="col-lg-4">-->
                        <!---->
                        <!--                            <div class="box-black">-->
                        <!--                                <div class="image">-->
                        <!--                                    <img src="{{ asset('vendor/front/assets/example/img/donation/f4.png') }}" alt="image">-->
                        <!--                                </div>-->
                        <!--                                <div class="content">-->
                        <!--                                    <h4 class="title">OFFICE SPACE</h4>-->
                        <!--                                    <div class="desc">The coral reef has been extensively damaged, resulting in unbalanced of the marine ecosystem. Be a part of our action, by donating to the conservation of coral reefs.-->
                        <!--                                        Budget: 15,000,000 IDR</div>-->
                        <!--                                    <a href="#" class="btn-danger-mid">DONATE</a>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!---->
                        <!--                        </div>-->
                        <!--                        <div class="col-lg-4">-->
                        <!---->
                        <!--                            <div class="box-black">-->
                        <!--                                <div class="image">-->
                        <!--                                    <img src="{{ asset('vendor/front/assets/example/img/donation/f5.png') }}" alt="image">-->
                        <!--                                </div>-->
                        <!--                                <div class="content">-->
                        <!--                                    <h4 class="title">TEAM HIRING</h4>-->
                        <!--                                    <div class="desc">The coral reef has been extensively damaged, resulting in unbalanced of the marine ecosystem. Be a part of our action, by donating to the conservation of coral reefs.-->
                        <!--                                        Budget: 15,000,000 IDR</div>-->
                        <!--                                    <a href="#" class="btn-danger-mid">DONATE</a>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!---->
                        <!--                        </div>-->--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
@push('bottom')
<script src="{{ asset('js/vendor/donation/fundraising.js') }}"></script>
@endpush
@push('head')

@endpush
