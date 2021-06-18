
<!--   Core JS Files   -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/core/jquery.3.2.1.min.js"></script>
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/core/popper.min.js"></script>
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/moment/moment.min.js"></script>
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- Chart JS -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- Summernote -->
<script src="{{ asset("vendor/indominer/azzara") }}/js/plugin/summernote/summernote-bs4.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset("vendor/indominer/azzara")."/" }}js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="{{ asset('vendor/indominer/azzara')."/" }}js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="{{ asset('vendor/indominer/azzara')."/" }}js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="{{ asset('vendor/indominer/azzara')."/" }}js/ready.min.js"></script>

<!--BOOTSTRAP DATEPICKER-->
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datepicker/datepicker3.css') }}">

<!--BOOTSTRAP DATERANGEPICKER 2.1.27 AND MOMENT 2.13.0 -->
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker-bs3.css') }}">

<link rel='stylesheet' href='{{ asset("vendor/crudbooster/assets/lightbox/dist/css/lightbox.min.css") }}'/>
<script src="{{ asset('vendor/crudbooster/assets/lightbox/dist/js/lightbox.min.js') }}"></script>

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

<!--MONEY FORMAT-->
<script src="{{asset('vendor/crudbooster/jquery.price_format.2.0.min.js')}}"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    var ASSET_URL = "{{asset('/')}}";
    var APP_NAME = "{{Session::get('appname')}}";
    var ADMIN_PATH = '{{url(config("crudbooster.ADMIN_PATH")) }}';
    var ADMIN_ID = '{{ CRUDBooster::myId() }}';
    var NOTIFICATION_JSON = "{{route('NotificationsControllerGetLatestJson')}}";
    var NOTIFICATION_INDEX = "{{route('NotificationsControllerGetIndex')}}";

    var NOTIFICATION_YOU_HAVE = "{{cbLang('notification_you_have')}}";
    var NOTIFICATION_NOTIFICATIONS = "{{cbLang('notification_notification')}}";
    var NOTIFICATION_NEW = "{{cbLang('notification_new')}}";

    $(function () {
        $('.datatables-simple').DataTable();
    })
</script>
<script src="{{asset('vendor/crudbooster/assets/js/main.js').'?r='.time()}}"></script>
