<div class="footer">
	<div class="footer-content bkwrapper clearfix container">
		<div class="row">
			<div class="footer-sidebar col-md-4">
            @include('front.footer.footer-logo')
            @include('front.footer.footer-aboutus')
			</div>
			<div class="footer-sidebar col-md-4">
            @include('front.widget.widget-tabs')
			</div>
			<div class="footer-sidebar col-md-4">
            @include('front.widget.widget_flickr')
            @include('front.widget.widget-social')
			</div>
		</div>
	</div>
	<div class="footer-lower">
		<div class="container">
			<div class="footer-inner clearfix">
            	<div id="footer-menu" class="menu-footer-menu-container">
                	<ul id="menu-footer-menu" class="menu">
                    	<li id="menu-item-659" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-659">
                        	<a href="{{ url('/') }}">{{ trans('front.home') }}</a>
                        </li>
						<li id="menu-item-668" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-668">
                        	<a href="{{ url('/contact-us/أتصل_بنا') }}">{{ trans('front.ContactUs') }}</a>
                        </li>
						<li id="menu-item-660" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-660">
                        	<a href="{{ url('/about-us/من-نحن') }}">{{ trans('front.AboutUs') }}</a>
                        </li>
					</ul>
                </div>  
                              
                @foreach($siteoption as $soial)
                        @if($soial->name_lang == 'Copyright' && $soial->optnval != '')
                            <div class="bk-copyright">{{ $soial->optnval }}</div>
                        @endif
                @endforeach
      		</div>
    	</div>
	</div>                                
</div>