@include('admin.alert_data')  
@yield('menues_bar')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{ url('/adminpanel') }}">
                    {{ trans('mainpage.home') }}
                </a>
                <i class="fa {{ trans('mainpage.menu_iconsw') }}"></i>
            </li>
            @yield('page_bar')
        </ul>
    </div>
@include('admin.menue_according_permission')              

