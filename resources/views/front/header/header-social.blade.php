<div class="header-social">
	<ul class="clearfix">
                @foreach($siteoption as $soial)
                        @if($soial->name_lang == 'facebook' && $soial->optnval != '')
                                <li class="social-icon fb">
                                       <a class="bk-tipper-bottom" data-title="Facebook" href="{{ $soial->optnval }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                        @endif
                        @if($soial->name_lang == 'twitter' && $soial->optnval != '')
                                <li class="social-icon twitter">
                                        <a class="bk-tipper-bottom" data-title="Twitter" href="{{ $soial->optnval }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                        @endif
                        @if($soial->name_lang == 'Youtube' && $soial->optnval != '')
                                <li class="social-icon youtube">
                                        <a class="bk-tipper-bottom" data-title="Youtube" href="{{ $soial->optnval }}" target="_blank"><i class="fa fa-youtube"></i></a>
                                </li>
                        @endif
                        @if($soial->name_lang == 'googleplus' && $soial->optnval != '')
                                <li class="social-icon gplus">
                                        <a class="bk-tipper-bottom" data-title="Google Plus" href="{{ $soial->optnval }}" target="_blank"><i class="fa fa-google-plus"></i></a>
                                </li>
                        @endif
                @endforeach
	</ul>
</div>