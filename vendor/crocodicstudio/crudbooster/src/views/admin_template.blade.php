<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Backend: {{ config("app.name") }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="path" content="{{ base64_encode(CRUDBooster::mainpath()) }}">
    <meta name="asset" content="{{ base64_encode(asset('/')) }}">
    <meta name='generator' content='CRUDBooster {{ \crocodicstudio\crudbooster\commands\CrudboosterVersionCommand::$version }}'/>
    <meta name='robots' content='noindex,nofollow'/>
    <link rel="shortcut icon"
            href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset("vendor/backend/azzara/img/icon.ico") }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Fonts and icons -->
    <script src="{{ asset("vendor/backend/azzara")."/" }}js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Open+Sans:300,400,600,700"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset("vendor/backend/azzara")."/" }}css/fonts.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

<!--    <link rel="preconnect" href="https://cdn.jsdelivr.net">-->
<!--    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">-->

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset("vendor/backend/azzara")."/" }}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset("vendor/backend/azzara")."/" }}css/azzara.min.css">
    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("vendor/backend/azzara/css/custom.css") }}">

    <!-- load css -->
    <style type="text/css">
        @if($style_css)
            {!! $style_css !!}
        @endif
    </style>
    @if($load_css)
        @foreach($load_css as $css)
            <link href="{{$css}}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif

    @stack("head")
</head>
<body>
<div class="wrapper">
    <!--
            Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
    -->
    @include('crudbooster::header')

    <!-- Sidebar -->
    @include('crudbooster::sidebar')
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <?php
                $module = CRUDBooster::getCurrentModule();
                ?>
                <div class="page-header">
                    @if($module)
                    <h4 class="page-title">{!! ucwords(($page_title)?:$module->name) !!}</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="{{url(config('crudbooster.ADMIN_PATH'))}}">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{ request()->url() }}">{!! ucwords(($page_title)?:$module->name) !!}</a>
                        </li>
                    </ul>
                    @else
                    <h4 class="page-title">{{ cbLang('text_dashboard') }} : {{Session::get('appname')}}</h4>
                    @endif
                </div>
                @if($module)
                <div class="page-category">Manage "{!! ucwords(($page_title)?:$module->name) !!}" data including create, read, update and delete</div>

                @if(!empty($index_button))
                    @foreach($index_button as $ib)
                        <a href='{{$ib["url"]}}' id='{{str_slug($ib["label"])}}' class='btn {{($ib['color'])?'btn-'.$ib['color']:'btn-primary'}} btn-sm mb-4'
                            @if($ib['onClick']) onClick='return {{$ib["onClick"]}}' @endif
                            @if($ib['onMouseOver']) onMouseOver='return {{$ib["onMouseOver"]}}' @endif
                            @if($ib['onMouseOut']) onMouseOut='return {{$ib["onMouseOut"]}}' @endif
                            @if($ib['onKeyDown']) onKeyDown='return {{$ib["onKeyDown"]}}' @endif
                            @if($ib['onLoad']) onLoad='return {{$ib["onLoad"]}}' @endif
                        >
                            <i class='{{$ib["icon"]}}'></i> {{$ib["label"]}}
                        </a>
                    @endforeach
                @endif
                @endif

                @if(@$alerts)
                    @foreach(@$alerts as $alert)
                        <div class='alert alert-{{$alert["type"]}} pb-1'>
                            {!! $alert['message'] !!}
                        </div>
                    @endforeach
                @endif

                @if( Session::get('message') != '' )
                    <div class='alert alert-{{ Session::get("message_type") }}'>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4 style="font-weight: bold;"><i class="fas fa-info-circle"></i> {{ cbLang("alert_".Session::get("message_type")) }}</h5>
                        {{ Session::get('message') }}
                    </div>
                @endif

                @yield("content")
            </div>
        </div>

    </div>

</div>

@include('crudbooster::admin_template_plugins')

<!-- load js -->
@if($load_js)
    @foreach($load_js as $js)
        <script src="{{$js}}"></script>
    @endforeach
@endif
<script type="text/javascript">
    var site_url = "{{url('/')}}";
    @if($script_js)
        {!! $script_js !!}
    @endif
</script>

@stack("bottom")

</body>
</html>
