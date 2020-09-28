<!-- nav open -->
<style type="text/css">
    .s-list .thumb a img{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        min-height: 100%;
        min-width: 100%;
        max-width: 120%;
    }
    .s-list .thumb a{
        width: 80px;
        height: 80px;
        position: relative;
        overflow: hidden;
    }
</style>

<nav class="main-nav">
	<div class="main-nav-inner bkwrapper container">
		<div class="main-nav-container clearfix">
			<div class="main-nav-wrap">
				<div class="mobile-menu-wrap">
					<h3 class="menu-title">@yield('title')</h3>
					<a class="mobile-nav-btn" id="nav-open-btn"><i class="fa fa-bars"></i></a>  
				</div>
                                     
				<div id="main-menu" class="menu-main-menu-container">
                	<ul id="menu-main-menu-1" class="menu">
                    	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-0">
                        	<a href="{{ url('/') }}">{{ trans('front.home') }}</a>
                        </li>
                        @foreach($menu as $row)
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-{{ $row->id }}">
                            <a href="{{ url('/category' , [$row->id, url_site($row->title)]) }}">{{ $row->title }}</a>
                            <div class="bk-dropdown-menu">
                                <div class="bk-sub-menu-wrap">
                                    <ul class="bk-sub-menu clearfix">
                                        @foreach($row->submenu as $rows)
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-{{ $rows->id }}">
                                                <a 
                                                    @if($rows->id == '1131')
                                                        class="fancybox fancybox.iframe" href="{{ url('/tabo/dalil/index.html') }}"
                                                    @elseif($rows->id == '1132')
                                                        class="fancybox fancybox.iframe" href="{{ url('/pla_docs/area_daleel/index.html') }}"
                                                    @else
                                                        href="{{ url('/' , $rows->url_title ) }}"
                                                    @endif
                                                >{{ $rows->title }}</a>
                                            </li>
                                        @endforeach     
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @endforeach					
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2">
                        	<a href="#">خدمات المواطنين</a>
                            <div class="bk-dropdown-menu">
                                <div class="bk-sub-menu-wrap">
                                    <ul class="bk-sub-menu clearfix">                                        
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20">
                                        	<a href="{{ url('/') }}/service/transactions/الاستعلام-عن-حالة-معاملة">الاستعلام عن حالة معاملة</a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20">
                                        	<a href="{{ url('/') }}/service/deedcheck/التحقق-من-مستخرج-القيد">التحقق من مستخرج القيد</a>
                                        </li>
                                    	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21">
                                        	<a href="{{ url('/') }}/service/transactionsuncom/المعاملات-غير-المكتملة">المعاملات غير المكتملة</a>
                                        </li>
                                    	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23">
                                        	<a href="{{ url('/') }}/service/transactionsdeadline/المعاملات-التي-سيتم-اتلافها-في-نهاية-الشهر-الحالي">المعاملات التي سيتم اتلافها في نهاية الشهر الحالي</a>
                                        </li>
                                    	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24">
                                        	<a href="{{ url('/') }}/service/agencylist/الوكالات">الوكالات</a>
                                         </li>
                                    	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25">
                                        	<a href="{{ url('/') }}/service/suggestion/طلب-تقديم-اقتراح">طلب تقديم اقتراح</a>
                                        </li>
                                    	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26">
                                        	<a href="{{ url('/') }}/service/plaint/طلب-تقديم-شكوى">طلب تقديم شكوى</a>
                                        </li>    
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28">
                                        	<a href="{{ url('/') }}/service/citizianapp/طلب-تقديم"> تقديم طلب</a>
                                        </li>       
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27">
                                            <a href="{{ url('/category' ,['15' , url_site('نماذج-معاملات')]) }}">نماذج المعاملات</a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27">
                                            <a href="{{ url('/service/surveyor' , url_site('اسماء المساحين المعتمدين') ) }}">اسماء المساحين المعتمدين</a>
                                        </li>                 				
                                    </ul>
                                </div>
                            </div>
                        </li>                                                                     
					</ul>
				</div>                                    
    		</div>
            <input id="token_search" type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="ajax-search-wrap">
                <div id="ajax-form-search" class="ajax-search-icon"><i class="fa fa-search"></i></div>
                <form class="ajax-form" method="get" action="{{ url('/') }}/">
                    <fieldset>
                    	<input id="search-form-text" type="text" autocomplete="off" class="field" name="s" value="" placeholder="{{ trans('front.Search-this-Site') }}">
                    </fieldset>
                </form> 
                <div id="ajax-search-result">
                    
                </div>
 			</div> 
		</div>    
	</div><!-- main-nav-inner -->       
</nav>
<!-- nav close -->