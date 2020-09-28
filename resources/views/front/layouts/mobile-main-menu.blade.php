		<div class="main-menu">
			<h3 class="menu-location-title">{{ trans('front.main-menu') }}</h3>
			<div id="mobile-menu" class="menu-main-menu-container">
            	<ul id="menu-main-menu" class="menu">
                	<li id="menu-item-0" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-0">
                    	<a href="{home_url}">{{ trans('front.home') }}</a>
					</li>
                    <!-- START BLOCK : item_row -->
					<li id="menu-item-{id}" class="menu-item menu-item-type-custom menu-item-object-custom {menu-item-has-children} menu-item-{id}">
                    	 <a href="{dep_url_title}">{title}</a>
						<ul class="sub-menu">
                            <!-- START BLOCK : subitem_row -->
                            <li id="menu-item-{id}" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-{id}">
                                <a href="{url_title}" class="{link_class}">{title}</a>
                            </li>
                            <!-- END BLOCK : subitem_row -->		
						</ul>
					</li>
					<!-- END BLOCK : item_row -->	
					<li id="menu-item-2" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2">
                    	<a href="#">خدمات المواطنين</a>
                        <ul class="sub-menu">
                            <li id="menu-item-02" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-02">
                            	<a href="{site_url}service/transactions/الاستعلام-عن-حالة-معاملة">الاستعلام عن حالة معاملة</a>
                            </li>
                            <li id="menu-item-03" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-03">
                            	<a href="{site_url}service/transactionsuncom/المعاملات-غير-المكتملة">المعاملات غير المكتملة</a>
                            </li>
                            <li id="menu-item-04" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-04">
                            	<a href="{site_url}service/transactionsdeadline/المعاملات-التي-سيتم-اتلافها-في-نهاية-الشهر-الحالي">المعاملات التي سيتم اتلافها في نهاية الشهر الحالي</a>
                            </li>
                            <li id="menu-item-05" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-05">
                            	<a href="{site_url}service/agencylist/الوكالات">الوكالات</a>
                            </li>
                            <li id="menu-item-06" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-06">
                            	<a href="{site_url}service/suggestion/طلب-تقديم-اقتراح">طلب تقديم اقتراح</a>
                            </li>
                            <li id="menu-item-07" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-07">
                            	<a href="{site_url}service/plaint/طلب-تقديم-شكوى">طلب تقديم شكوى</a>
                            </li>
                            <li id="menu-item-08" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-08">
                            	<a href="{site_url}category/نماذج-معاملات">نماذج المعاملات</a>
                            </li>
                        </ul>
                    </li>
					<li id="menu-item-3" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3">
                    	<a href="{contactus_url}">{{ trans('front.ContactUs') }}</a>
					</li>
				</ul>
			</div>
		</div>