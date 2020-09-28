<style type="text/css">
	.widget_reviews_tabs .reviews-tabs-content-container .reviews-tab-content, .widget-tabs .widget-tabs-content .tab-content {
	    display: none;
	}
</style>
<aside id="bk_tabs-6" class="widget widget-tabs">        
	<div class="widget-tabs-title-container">
		<ul class="widget-tab-titles">
			@foreach($widget_6 as $row)
				@if($row->id == '14' || $row->id == '15' || $row->id == '16')
	            <li <?php if($row->id == '14'){?> class="active" <?php } ?>><h3><a href="#widget-tab{{ $row->id }}-content-5753dbd5e29e1">{{ $row->title }}</a></h3></li>
				@endif		
			@endforeach		
		</ul>
	</div>
	<div class="widget-tabs-content">
		@foreach($widget_6 as $row)
			@if($row->id == '14' || $row->id == '15' || $row->id == '16')
		        <div id="widget-tab{{$row->id}}-content-5753dbd5e29e1" class="tab-content widget timeline-posts" <?php if($row->id == '14'){?> style='display: block;' <?php } ?>>
					<ul class="list post-list">
						@foreach($row->posts_all as $posts)
							<li>
								<div class="bk-article-wrapper" itemscope="" itemtype="http://schema.org/Article">
									<a itemprop="url" href="{{ url('/', $posts->url_title ) }}">
										<div class="meta"><div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($posts->insertdate)) }}</div></div>                     
										<h3 itemprop="name">{{ $posts->title }}</h3>
									</a>
								</div>
							</li>
						@endforeach
					</ul>
		            <div class="readmore"><a href="{{ url('/category' ,[$row->id, url_site($row->title) ]) }}">{{ trans('front.more') }}</a></div>
				</div>
			@endif		
		@endforeach		                  
	</div>
</aside>

