@if(!isset(Sentinel::getUser()->id))
<div class="lwa bk-lwa lwa-template-modal bk-template-modal">
	<a href="{{ url("/") }}/adminpanel" class="bk-links-modal">{{ trans('front.login') }}</a>
</div>
@else
<div class="bk-lwa">
  <table>
      <tr>
         <td class="avatar lwa-avatar bk-avatar">
            <a href="#"><img alt='' src='{{ url("/") }}/admin/user_image/{{ Sentinel::getUser()->image }}' srcset='{{ url("/") }}/admin/user_image/{{ Sentinel::getUser()->image }} 2x' class='avatar avatar-27 photo' height='27' width='27' />{{ Sentinel::getUser()->full_name }} </a>
        </td>
        <td>
            <div class="bk-ud-logout-mobile">
                <span>-</span>
                <a class="wp-logout" href="{{ url('/adminpanel/logout') }}">{{ trans('front.Logout') }}</a>
            </div>
        </td>
    </tr>
</table>
<div class="bk-account-info">
    <div class="bk-lwa-profile">
        <div class="bk-user-data clearfix">
            <div class="bk-ud-topic">
                <i class="fa fa-comment-o"></i>
                <a href="{{ url('/adminpanel') }}">لوحة التحكم</a>
            </div>
            <div class="bk-ud-logout">
                <i class="fa fa-sign-out"></i>
                <a class="wp-logout" href="{{ url('/adminpanel/logout') }}">تسجيل الخروج</a>
            </div>
        </div>  
    </div>
</div>
</div>
@endif