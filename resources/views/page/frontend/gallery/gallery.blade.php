@extends('template.frontend.index')
@section('title_page', 'Gallery')
@section('description', '')
@section('keywords', '')
@section('background', 'bg-tree')

@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/front/assets/css/gallery.css') }}">
    <style>
        #main {
            background-image: url("{{ asset(\crocodicstudio\crudbooster\helpers\CRUDBooster::getSetting('gallery_background')) }}");
            background-size: cover;
            background-position: top;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <section class="breadcrumbs pb-5">
            <div class="row mt-3">
                <div class="col-lg-12 text-center">

                    <h4 class="title-big text-white pt-5">GALLERY</h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="gallery-list">
                                    <template v-for="(item, index) in items">
                                        <a :href="`{{ webPath('gallery/detail/') }}/${item.code}`" class="gallery-item" target="_blank">
                                            <img :src="`${item.image}`" alt="image gallery">
                                        </a>
                                    </template>
                                </div>
                                <a v-if="current_page < last_page" href="javascript:void(0)" class="btn-danger-mid" @click="getData">SEE MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@push('bottom')
    <script>
        appBooth = new Vue({
            el: '#main',
            data: {
                current_page: 0,
                last_page: 0,
                items: [],
            },
            created: function () {
                this.init();
            },
            methods: {
                init() {
                    console.log("init");
                    this.getData();
                },
                getData() {
                    axios.get(`{{url('gallery/load')}}`, {
                        params: {
                            page: (this.current_page + 1)
                        }
                    }).then((response) => {
                        if (response.data.status === 1) {
                            this.current_page = response.data.data.current_page;
                            this.last_page = response.data.data.last_page;

                            response.data.data.items.forEach((item, index) => {
                                this.items.push(item);
                            });
                        } else {
                            alert(response.data.message);
                        }
                    }, (error) => {
                        console.log(error);
                    });
                },
            }
        });
    </script>
@endpush
