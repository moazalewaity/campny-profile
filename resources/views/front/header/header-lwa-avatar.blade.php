<div class="bk-lwa">
		<table>
		<tr>
			<td class="avatar lwa-avatar bk-avatar">
				<a href="#"><img alt='' src='{{ url("/") }}/admin/media/users/{login-user-image}' srcset='{{ url("/") }}/admin/media/users/{login-user-image} 2x' class='avatar avatar-27 photo' height='27' width='27' /></a>
			</td>
            <td>
                <div class="bk-ud-logout-mobile">
                    <span>-</span>
                    <a class="wp-logout" href="{{ url("/") }}/admin/?service=general&action=logout">{{ trans('front.Logout') }}</a>
                </div>
            </td>
		</tr>
	</table>
    <div class="bk-account-info">
                        <div class="bk-lwa-profile">
                    <div class="bk-avatar">
                        <img alt='' src='{{ url("/") }}/admin/media/users/{login-user-image}' srcset='{{ url("/") }}/admin/media/users/{login-user-image} 2x' class='avatar avatar-80 photo' height='80' width='80' />
                    </div>
            
                    <div class="bk-user-data clearfix">
                       
                        <div class="bk-ud-topic">
                            <i class="fa fa-comment-o"></i>
                            <a href="{{ url('/') }}/admin/">{{ trans('front.controlpanel') }}</a>
                        </div>                                
                        
                        <div class="bk-ud-logout">
                            <i class="fa fa-sign-out"></i>
                            <a class="wp-logout" href="{{ url('/') }}/admin/?service=general&action=logout">{{ trans('front.Logout') }}</a>
                        </div>
                        
                    </div>  
                </div>
            </div>
</div>            