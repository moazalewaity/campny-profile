<div class="bk-page-header">
	<div class="header-wrap header-1">
		<div class="top-bar">
			<div class="bkwrapper container">
				<div class="top-nav clearfix">
                    @include('front.header.header-lwa')
                    @include('front.header.header-top-menu')
                    @include('front.header.header-social')
                </div><!--top-nav-->
			</div>
		</div><!--top-bar-->
        
		<div class="header container">
			<div class="row">
				<div class="col-md-12">
                    <div class="header-inner ">
                    	@include('front.header.header-logo')
                    	@include('front.header.header-banner')
                    </div>
				</div>
			</div>
		</div>
		@include('front.header.header-main-nav')
	</div>  
	@include('front.header.header-ticker')
</div>