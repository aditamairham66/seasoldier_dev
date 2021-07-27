<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">

        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ CRUDBooster::myPhoto() }}" alt="{{ cbLang('user_image') }}"
                         class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ CRUDBooster::myName() }}
                            <span class="user-level">{{ cbLang('online') }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">{{cbLang("menu_navigation")}}</h4>
                </li>

                <?php $dashboard = CRUDBooster::sidebarDashboard();?>
                @if($dashboard)
                    <li data-id='{{$dashboard->id}}'
                        class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH'))) ? 'active' : '' }}">
                        <a href="{{CRUDBooster::adminPath()}}"
                           class='{{($dashboard->color)?"text-".$dashboard->color:""}}'>
                            <i class="fas fa-home"></i>
                            <p>{{cbLang("text_dashboard")}}</p>
                        </a>
                    </li>
                @endif

                @foreach(CRUDBooster::sidebarMenu() as $menu)

                    @if(!empty($menu->children))
                        <?php
                        $activeMenu = "";
                        foreach ($menu->children as $menuChild) {
                            $activeMenu .= (Request::is($menuChild->url_path .= !Str::endsWith(Request::decodedPath(), $menuChild->url_path) ? "/*" : "")) ? "active" : "";
                        }
                        ?>
                        <li data-id='{{$menu->id}}' class="nav-item {{$activeMenu}}">
                            <a data-toggle="collapse" href='#menu{{$menu->id}}'>
                                <i class='{{$menu->icon}}'></i>
                                <p>{{$menu->name}}</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="menu{{$menu->id}}">
                                <ul class="nav nav-collapse">
                                    @foreach($menu->children as $child)
                                        <li data-id='{{$child->id}}'
                                            class='{{(Request::is($child->url_path .= !Str::endsWith(Request::decodedPath(), $child->url_path) ? "/*" : ""))?"active":""}}'>
                                            <a href='{{ ($child->is_broken)?"javascript:alert('".cbLang('controller_route_404')."')":$child->url}}'>
                                                <span class="sub-item">{{$child->name}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @else
                        <li data-id='{{$menu->id}}'
                            class="nav-item {{ (Request::is($menu->url_path."*"))?"active":""}}">
                            <a href='{{ ($menu->is_broken)?"javascript:alert('".cbLang('controller_route_404')."')":$menu->url }}'>
                                <i class='{{$menu->icon}}'></i>
                                <p>{{$menu->name}}</p>
                            </a>
                        </li>
                    @endif

                @endforeach

                @if(CRUDBooster::isSuperadmin())
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">{{ cbLang('SUPERADMIN') }}</h4>
                    </li>
                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/privileges/add*')) ? 'active' : '' }} {{ (Request::is(config('crudbooster.ADMIN_PATH').'/privileges')) ? 'active' : '' }}">
                        <a data-toggle="collapse" href='#priviligesmenu'>
                            <i class='fa fa-key'></i>
                            <p>{{ cbLang('Privileges_Roles') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="priviligesmenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href='{{Route("PrivilegesControllerGetAdd")}}'>
                                        {{ $current_path }} <span
                                            class="sub-item">{{ cbLang('Add_New_Privilege') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{Route("PrivilegesControllerGetIndex")}}'>
                                        <span class="sub-item">{{ cbLang('List_Privilege') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/users/add*')) ? 'active' : '' }} {{ (Request::is(config('crudbooster.ADMIN_PATH').'/users')) ? 'active' : '' }}">
                        <a data-toggle="collapse" href='#usersmanagemnet'>
                            <i class='fa fa-users'></i>
                            <p>{{ cbLang('Users_Management') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="usersmanagemnet">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href='{{Route("AdminCmsUsersControllerGetAdd")}}'>
                                        <span class="sub-item">{{ cbLang('add_user') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{Route("AdminCmsUsersControllerGetIndex")}}'>
                                        <span class="sub-item">{{ cbLang('List_users') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/menu_management*')) ? 'active' : '' }}">
                        <a href="{{Route("MenusControllerGetIndex")}}">
                            <i class="fa fa-flag"></i>
                            <p>{{ cbLang('Menu_Management') }}</p>
                        </a>
                    </li>

                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/settings/add*')) ? 'active' : '' }}">
                        <a data-toggle="collapse" href='#settingsmenu'>
                            <i class='fa fa-wrench'></i>
                            <p>{{ cbLang('settings') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="settingsmenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href='{{Route("SettingsControllerGetAdd")}}'>
                                        <span class="sub-item">{{ cbLang('Add_New_Setting') }}</span>
                                    </a>
                                </li>
                                <?php
                                $groupSetting = DB::table('cms_settings')->groupby('group_setting')->pluck('group_setting');
                                foreach($groupSetting as $gs):
                                ?>
                                <li class="<?=($gs == Request::get('group')) ? 'active' : ''?>">
                                    <a href='{{route("SettingsControllerGetShow")}}?group={{urlencode($gs)}}&m=0'>
                                        <span class="sub-item">{{$gs}}</span>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/module_generator/step1')) ? 'active' : '' }} {{ (Request::is(config('crudbooster.ADMIN_PATH').'/module_generator')) ? 'active' : '' }}">
                        <a data-toggle="collapse" href='#modulegenerator'>
                            <i class='fa fa-th'></i>
                            <p>{{ cbLang('Module_Generator') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="modulegenerator">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href='{{Route("ModulsControllerGetStep1")}}'>
                                        <span class="sub-item">{{ cbLang('Add_New_Module') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{Route("ModulsControllerGetIndex")}}'>
                                        <span class="sub-item">{{ cbLang('List_Module') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/statistic_builder/add')) ? 'active' : '' }} {{ (Request::is(config('crudbooster.ADMIN_PATH').'/statistic_builder')) ? 'active' : '' }}">
                        <a data-toggle="collapse" href='#statisticbuilder'>
                            <i class='fas fa-chart-bar'></i>
                            <p>{{ cbLang('Statistic_Builder') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="statisticbuilder">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href='{{Route("StatisticBuilderControllerGetAdd")}}'>
                                        <span class="sub-item">{{ cbLang('Add_New_Statistic') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{Route("StatisticBuilderControllerGetIndex")}}'>
                                        <span class="sub-item">{{ cbLang('List_Statistic') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/api_generator/generator*')) ? 'active' : '' }} {{ (Request::is(config('crudbooster.ADMIN_PATH').'/api_generator')) ? 'active' : '' }} {{ (Request::is(config('crudbooster.ADMIN_PATH').'/api_generator/screet-key*')) ? 'active' : '' }}">
                        <a data-toggle="collapse" href='#apigenerator'>
                            <i class='fa fa-fire'></i>
                            <p>{{ cbLang('API_Generator') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="apigenerator">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href='{{Route("ApiCustomControllerGetGenerator")}}'>
                                        <span class="sub-item">{{ cbLang('Add_New_API') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{Route("ApiCustomControllerGetIndex")}}'>
                                        <span class="sub-item">{{ cbLang('list_API') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{Route("ApiCustomControllerGetScreetKey")}}'>
                                        <span class="sub-item">{{ cbLang('Generate_Screet_Key') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/email_templates/add*')) ? 'active' : '' }} {{ (Request::is(config('crudbooster.ADMIN_PATH').'/email_templates')) ? 'active' : '' }}">
                        <a data-toggle="collapse" href='#emailtemplate'>
                            <i class='fas fa-envelope'></i>
                            <p>{{ cbLang('Email_Templates') }}</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="emailtemplate">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href='{{Route("EmailTemplatesControllerGetAdd")}}'>
                                        <span class="sub-item">{{ cbLang('Add_New_Email') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href='{{Route("EmailTemplatesControllerGetIndex")}}'>
                                        <span class="sub-item">{{ cbLang('List_Email_Template') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ (Request::is(config('crudbooster.ADMIN_PATH').'/logs*')) ? 'active' : '' }}">
                        <a href="{{Route("LogsControllerGetIndex")}}">
                            <i class="fa fa-flag"></i>
                            <p>{{ cbLang('Log_User_Access') }}</p>
                        </a>
                    </li>
                @endif

            </ul>
        </div>

    </div>
</div>
