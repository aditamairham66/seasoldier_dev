@extends('template.frontend.index')
@section('title_page', 'Gallery')
@section('description', 'Seasoldier, An environmental care movement that starts from self-action')
@section('keywords', '#Seasoldier,#Brani')

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

        <div class="container">
            <h4 class="title-big text-white pt-5 text-center" data-aos="fade-down">GALLERY</h4>
            <div class="row justify-content-center">
                <template v-for="(item, index) in items">
                    <div class="col-md-4">
                        <a :href="`{{ webPath('gallery/detail/') }}/${item.code}`" class="gallery-item" target="_blank"
                            data-aos="fade-up">
                            <img :src="`${item.image}`" class="gallery-img" alt="image gallery">
                        </a>
                    </div>
                </template>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-lg-12 text-center">
                    <a v-if="current_page < last_page" href="javascript:void(0)" class="btn-danger-mid"
                        @click="getData()">SEE MORE</a>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
@endsection

@push('bottom')
    <script>
        new Vue({
            el: '#main',
            data: {
                current_page: 0,
                last_page: 0,
                items: [],
            },
            created: function() {
                this.init();
            },
            methods: {
                init() {
                    console.log("init");
                    this.getData();
                    this.setSameHeight();
                },
                getData() {
                    axios.get(`{{ url('gallery/load') }}`, {
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

                            setTimeout(() => {
                                this.setSameHeight()
                            }, 100);
                        } else {
                            alert(response.data.message);
                        }
                    }, (error) => {
                        console.log(error);
                    });
                },
                setSameHeight() {
                    let img = $(document).find('.gallery-img');
                    let w = img.width();
                    img.height(w);
                },
            }
        });
    </script>
@endpush
