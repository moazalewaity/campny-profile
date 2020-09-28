<aside id="text-4" class="widget widget_text">
    <div class="bk-header" style="display: block;">
        <div class="widget-title"><h3>أتصل بنا</h3></div>
    </div>
    <div class="textwidget">
    	<ul >
            @foreach($siteoption as $soial)
                @if($soial->name_lang == 'ADDRESS' && $soial->optnval != '')
        			<li style="margin-bottom: 7px;">
                    	<i class="fa fa-map-marker"></i>  
                        {{ $soial->optnval }}
                    </li>
                @endif
            @endforeach
            @foreach($siteoption as $soial)
                @if($soial->name_lang == 'TEL' && $soial->optnval != '')
        			<li style="margin-bottom: 7px;">
                    	<i class="fa fa-phone"></i>  
                        {{ $soial->optnval }}
                    </li>
                @endif
            @endforeach
            @foreach($siteoption as $soial)
                @if($soial->name_lang == 'EMAIL' && $soial->optnval != '')
        			<li>
                    	<i class="fa fa-envelope-o"></i>  
                        <a href="mailto:{{ $soial->optnval }}">{{ $soial->optnval }}</a>
                    </li>
                @endif
            @endforeach
		</ul>     
    </div>
</aside>