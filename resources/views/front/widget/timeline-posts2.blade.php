<aside id="timeline-posts-widget-3" class="widget timeline-posts">            
	<div class="widget-title-wrap">
		<div class="bk-header"><div class="widget-title"><h3>{{ $timeline->title }}</h3></div></div>            
    </div>
	<ul>
        @foreach($timeline_posts as $trows)
        <li>
			<div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
				<a itemprop="url" href="{{ url('/', $trows->url_title ) }}">
					<div class="meta"><div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($trows->insertdate)) }}</div></div>                     
					<h3 itemprop="name">{{ $trows->title }}</h3>
				</a>
            </div>
       </li>
       @endforeach
	</ul>
    <div class="readmore"><a href="{{ url('/category', [$timeline->id,url_site($timeline->title)]) }}">{{ trans('front.more') }}</a></div>
</aside>