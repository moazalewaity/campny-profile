<!-- ticker open -->
<div class="bk-ticker-module">
	<div class=" bkwrapper container">
		<div class="bk-ticker-inner">
			<ul id="ticker-5748cda317a44" class="bk-ticker-wrapper">
				@foreach($important_news as $row)
                <li class="news-item">
					<div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
						<h4 itemprop="name" class="title">
                        	<a itemprop="url" href="{{ url('/' , $row->url_title ) }}">{{ $row->title }}</a>
                        </h4>                                    
                    </div>
                </li>
                @endforeach
            </ul>
		</div>
	</div>                        
</div><!--end ticker-module-->
<!-- ticker close -->