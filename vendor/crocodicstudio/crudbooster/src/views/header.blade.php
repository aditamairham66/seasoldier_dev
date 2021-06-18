<div class="main-header" data-background-color="purple">
    <!-- Logo Header -->
    <div class="logo-header">

        <a href="{{url(config('crudbooster.ADMIN_PATH'))}}" title='{{Session::get('appname')}}' class="logo text-white">
            {{CRUDBooster::getSetting('appname')}}
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars"></i>
                </span>
        </button>
        <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
        <div class="navbar-minimize">
            <button class="btn btn-minimize btn-rounded">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item toggle-nav-search hidden-caret">
                    <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
            
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown" id="contentNotifDropdown">
                    </ul>
                </li>
            
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{ CRUDBooster::myPhoto() }}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="{{ CRUDBooster::myPhoto() }}" alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4>{{ CRUDBooster::myName() }}</h4>
                                    <p class="text-muted">{{ CRUDBooster::myPrivilegeName() }}</p><a href="{{ route('AdminCmsUsersControllerGetProfile') }}" class="btn btn-rounded btn-danger btn-sm">{{cbLang("label_button_profile")}}</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="return swal({
                                    title: 'Are you sure?',
                                    text: 'Are you sure you want to log out ?',
                                    type: 'warning',
                                    buttons:{
                                        confirm: {
                                            text : 'Yes, Log out',
                                            className : 'btn btn-primary'
                                        },
                                        cancel: {
                                            visible: true,
                                            className: 'btn btn-danger'
                                        }
                                    }
                                }).then((Logout) => {
                                    if (Logout) {
                                        location.href = '{{ route("getLogout") }}';
                                    } else {
                                        swal.close();
                                    }
                                });" href="javascript:void(0)">Logout</a>
                        </li>
                    </ul>
                </li>
            
            </ul>
        </div>
    </nav>
<!-- End Navbar -->
</div>