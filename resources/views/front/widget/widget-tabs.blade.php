<aside id="bk_tabs-4" class="widget widget-tabs">        
	<div class="widget-tabs-title-container">
		<ul class="widget-tab-titles">
			@foreach($widget_5 as $row)
				@if($row->id == '252' || $row->id == '225' || $row->id == '228')
	            <li <?php if($row->id == '252'){?> class="active" <?php } ?>><h3><a href="#widget-tab{{ $row->id }}-content-5753dbd5e29e1">{{ $row->title }}</a></h3></li>
				@endif		
			@endforeach		
		</ul>
	</div>
	<div class="widget-tabs-content">
		@foreach($widget_5 as $row)
			@if($row->id == '252' || $row->id == '225' || $row->id == '228')
		        <div id="widget-tab{{$row->id}}-content-5753dbd5e29e1" <?php if($row->id == '252'){?> class="tab-content widget timeline-posts active" style="display: block;" <?php }else{ ?> class="tab-content" <?php } ?>>
					@if($row->id == '252')
						<ul>
							@foreach($row->posts_all as $posts)
								<li class="active">
									<a itemprop="url" href="{{ url('/', $posts->url_title ) }}">
										<div class="meta">
											<div class="post-date">
												<i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($posts->insertdate)) }}
											</div>
										</div>                     
										<h3 itemprop="name">{{ $posts->title }}</h3>
									</a>
								</li>
							@endforeach
						</ul>
					@endif
					@if($row->id != '252')
							<ul class="list post-list">
							@foreach($row->posts_all as $posts)
								<li class="content_out small-post clearfix">
									<div class="bk-article-wrapper" itemscope="" itemtype="http://schema.org/Article">
										<div class="bk-mask">
											<div class="thumb">
												<a href="{{ url('/', $posts->url_title ) }}">
													@if($posts->image)
													<img onerror="$(this).hide()" src="{{ url('/front/images/130x130').'/'.$posts->image }}" class="attachment-bk130_130 size-bk130_130 wp-post-image" alt="5437685854_d630fceaff_b-" sizes="(max-width: 130px) 100vw, 130px" width="130" height="130">
													@else
													<img onerror="$(this).hide()" src="{{ url('/front/images/130x130/none/none/none.jpg') }}" class="attachment-bk130_130 size-bk130_130 wp-post-image" alt="5437685854_d630fceaff_b-" sizes="(max-width: 130px) 100vw, 130px" width="130" height="130">
													@endif
												</a>
											</div>
										</div>
										<div class="post-c-wrap">
											<h4 itemprop="name" class="title">
												<a itemprop="url" href="{{ url('/', $posts->url_title ) }}">{{ $posts->title }}</a></h4>
											<div class="meta">
												<div class="post-author" style="display:none">بواسطة <a href=""></a></div>
												<div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($posts->insertdate)) }}</div>
												<div class="views"><i class="fa fa-eye"></i>{{ $posts->views }}</div>
											</div> 						
										</div>
									</div>
								</li>
							@endforeach
						@endif
					</ul>
		            <div class="readmore"><a href="{{ url('/category' ,[$row->id, url_site($row->title)]) }}">{{ trans('front.more') }}</a></div>
				</div>
			@endif		
		@endforeach		                  
	</div>
</aside>