@push('head')
    <link rel='stylesheet' href='<?php echo asset("vendor/crudbooster/assets/select2/dist/css/select2.min.css")?>'/>
    <style type="text/css">
        .select2-container--default .select2-selection--single {
            border-radius: .25rem !important
        }

        .select2-container .select2-selection--single {
            height: 40px
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #ebedf2 !important;
            border-color: #ebedf2 !important;
            color: #fff !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ebedf2;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #495057 !important;
            line-height: 38px !important;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 18px;
            padding-right: 20px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px;
            right: 12px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #495057 transparent transparent transparent;
        }
        .select2-dropdown {
            border: 1px solid #ebedf2;
        }
        .select2-search--dropdown {
            padding: 9px 16px;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #ebedf2;
        }
        .select2-search--dropdown .select2-search__field {
            padding: 8px 15px;
            border-radius: .25rem;
        }
        .select2-results__option {
            padding: 7px 16px;
        }
    </style>
@endpush
@push('bottom')
    <script src='<?php echo asset("vendor/crudbooster/assets/select2/dist/js/select2.full.min.js")?>'></script>
@endpush
