<div id="top-menu" class="menu-top-menu-container">
	<ul id="menu-top-menu-1" class="menu">
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-0">
        	<a href="{{ url('/') }}">{{ trans('front.home') }}</a>           
		</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1">
        	<a href="#">خدمات المواطنين</a>
            <ul class="sub-menu">
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-01">
                	<a href="{{ url('/') }}/service/transactions/الاستعلام-عن-حالة-معاملة">الاستعلام عن حالة معاملة</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-02">
                	<a href="{{ url('/') }}/service/transactionsuncom/المعاملات-غير-المكتملة">المعاملات غير المكتملة</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-03">
                	<a href="{{ url('/') }}/service/transactionsdeadline/المعاملات-التي-سيتم-اتلافها-في-نهاية-الشهر-الحالي">المعاملات التي سيتم اتلافها في نهاية الشهر الحالي</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-04">
                	<a href="{{ url('/') }}/service/agencylist/الوكالات">الوكالات</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-05">
                	<a href="{{ url('/') }}/service/suggestion/طلب-تقديم-اقتراح">طلب تقديم اقتراح</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-06">
                	<a href="{{ url('/') }}/service/plaint/طلب-تقديم-شكوى">طلب تقديم شكوى</a>
                </li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-08">
                    <a href="{{ url('/category' ,['15' , url_site('نماذج-معاملات')]) }}">نماذج المعاملات</a>
				</li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27">
                    <a href="{{ url('/service/surveyor' , url_site('اسماء المساحين المعتمدين') ) }}">اسماء المساحين المعتمدين</a>
                </li>   
            </ul>
		</li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3">
        	<a href="{{ url('/contact-us' , url_site(trans('front.ContactUs'))) }}">{{ trans('front.ContactUs') }}</a>
        </li>

</ul></div> 