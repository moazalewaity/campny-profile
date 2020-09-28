<aside id="bk_social_widget-2" class="widget widget-social">
	<div class="widget-title-wrap">
		<div class="bk-header">
        	<div class="widget-title"><h3>{{ trans('front.follow-us') }}</h3></div>
        </div>
    </div>
	<div class="social-wrapper">
		<ul class="clearfix">
                @foreach($siteoption as $soial)
                        @if($soial->name_lang == 'facebook' && $soial->optnval != '')
                            <li class="social-icon fb">
				            	<a class="bk-tipper-bottom" data-title="Facebook" href="{{ $soial->optnval }}" target="_blank"><i class="fa fa-facebook"></i></a>
				            </li>
                        @endif
                @endforeach
                @foreach($siteoption as $soial)
                        @if($soial->name_lang == 'twitter' && $soial->optnval != '')					
							<li class="social-icon twitter">
				            	<a class="bk-tipper-bottom" data-title="Twitter" href="{{ $soial->optnval }}" target="_blank"><i class="fa fa-twitter"></i></a>
				            </li>
                        @endif
                @endforeach
                @foreach($siteoption as $soial)
                        @if($soial->name_lang == 'googleplus' && $soial->optnval != '')	
							<li class="social-icon gplus">
				            	<a class="bk-tipper-bottom" data-title="Google Plus" href="{{ $soial->optnval }}" target="_blank"><i class="fa fa-google-plus"></i></a>
				            </li>
                        @endif
                @endforeach	
                @foreach($siteoption as $soial)
                        @if($soial->name_lang == 'Youtube' && $soial->optnval != '')
							<li class="social-icon youtube">
				            	<a class="bk-tipper-bottom" data-title="Youtube" href="{{ $soial->optnval }}" target="_blank"><i class="fa fa-youtube"></i></a>
				            </li>        
                        @endif
                @endforeach
		</ul>
	</div>
</aside>