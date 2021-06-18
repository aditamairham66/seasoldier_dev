
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{cbLang("page_title_login")}} : {{Session::get('appname')}}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href=" {{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/indominer/azzara/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('vendor/indominer/azzara/js') }}/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset("vendor/indominer/azzara") }}/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('vendor/indominer/azzara') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('vendor/indominer/azzara') }}/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">
                <a href="{{url('/')}}">
                    <img title='{!!(Session::get('appname') == 'CRUDBooster')?"<b>CRUD</b>Booster":CRUDBooster::getSetting('appname')!!}'
                        src='{{ CRUDBooster::getSetting("logo")?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}'
                        style='max-width: 100%;max-height:170px'/>
                </a>
            </h3>

            @if( Session::get('message') != '' )
                <div class='alert alert-warning'>
                    {{ Session::get('message') }}
                </div>
            @endif

            <p class='login-box-msg'>{{cbLang("login_message")}}</p>
            <form autocomplete='off' action="{{ route('postLogin') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <div class="login-form">
                    <div class="form-group form-floating-label">
                        <input autocomplete='off' type="text" class="form-control input-border-bottom" name='email' required>
                        <label for="email" class="placeholder">Email</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input autocomplete='off' type="password" class="form-control input-border-bottom" name='password' required>
                        <label for="password" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        {{cbLang("text_forgot_password")}}
                        <a href='{{route("getForgot")}}' class="link float-right">{{cbLang("click_here")}}</a>
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-primary btn-rounded btn-login">{{cbLang("button_sign_in")}}</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
	<script src="{{ asset('vendor/indominer/azzara/js') }}/core/jquery.3.2.1.min.js"></script>
	<script src="{{ asset('vendor/indominer/azzara/js') }}/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{ asset('vendor/indominer/azzara/js') }}/core/popper.min.js"></script>
	<script src="{{ asset('vendor/indominer/azzara/js') }}/core/bootstrap.min.js"></script>
	<script src="{{ asset('vendor/indominer/azzara/js') }}/ready.js"></script>
	<!-- <script type="text/javascript" src="//themera.net/embed/themera.js?id=71769"></script> -->

    <style type="text/css">
        .login {
            background: {{ CRUDBooster::getSetting("login_background_color")?:'#dddddd'}} url('{{ CRUDBooster::getSetting("login_background_image")?asset(CRUDBooster::getSetting("login_background_image")):asset('vendor/crudbooster/assets/bg_blur3.jpg') }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
</body>
</html>