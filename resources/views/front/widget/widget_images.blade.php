<style type="text/css">
    .myslidpso a img {

    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    min-height: 100%;
    min-width: 100%;

}
.myslidpso a {

    float: right;
    width: 100%;
    height: 75px;
    overflow: hidden;

}
</style>

<aside id="bk_flickr-2" class="widget widget_flickr">
	<div class="widget-title-wrap">
		<div class="bk-header"><div class="widget-title"><a href="{{ url('/gallery' , trans('front.image') ) }}"><h3>{{ trans('front.newimage') }}</h3></a></div></div>            
    </div>                                        		
	<ul class="flickr clearfix" id="flickr-5748cda3557ad">
        @foreach($images_row as $imrow)
            @if($imrow->file)
            <li>
            	<div class="thumb myslidpso">
                	<a class="flicker-popup-link cursor-zoom" href="{{ url('/front/images/full').'/'.$imrow->path.'/'.$imrow->file }}">
                    	<img src="{{ url('/front/images/75x75').'/'.$imrow->path.'/'.$imrow->file }}">
                    </a>
                </div>
            </li>
            @endif
        @endforeach    
    </ul>
    <script type="text/javascript">
    	jQuery(document).ready(function($){ 
            $('.flicker-popup-link').magnificPopup({ 
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                mainClass: 'mfp-no-margins mfp-with-zoom',
                image: { 
                	verticalFit: true
                },
                gallery: { 
                	enabled: true
                 },
                zoom: { 
                	enabled: true,
                	duration: 600,
                    easing: 'ease',
                	opener: function(element) { 
                		return element.find('img');
                	}
                }
            });
    	});
    </script>
    <div class="readmore"><a href="{{ url('/gallery' , url_site(trans('front.image')) ) }}">{{ trans('front.more') }}</a></div>
</aside>