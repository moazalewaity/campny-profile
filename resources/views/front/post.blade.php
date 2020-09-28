@extends('front.layouts.app')


@section('image', $post->image)
@section('title', $data->title)
@section('summary', $data->summary)
@section('keywords', $data->keywords)

@section('body')
<style type="text/css">
	.article-content img{
		display: inline-block;
		width: 100%;
	}
</style>
<div class="single-page sidebar-right">
	@include('front.post.gallery')
	<div class="article-wrap bkwrapper container" itemscope itemtype="http://schema.org/Article">
		<div class="article-content-wrap">
			<div class="row bksection bk-in-single-page clearfix">
				<div class="main col-md-8">
					<div class="singletop" style="display: inline-block;">
						<div class="post-category"><a href="{{ url('/' , $dep->url_title ) }}">{{ $dep->title }}</a></div>                            
						<div class="bk-breadcrumbs-wrap">
							<div class="breadcrumbs">
								<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
									<a itemprop="url" href="{{ url('/') }}"><span itemprop="title">{{ trans('front.home') }}</span></a>
								</span>
								<span class="delim">&rsaquo;</span>
								<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
									<a itemprop="url"  href="{{ url('/category' , [$dep->id , url_site($dep->title)]) }}"><span itemprop="title">
									{{ $dep->title }}</span></a>
								</span>
								<span class="delim">&rsaquo;</span>
								<span class="current">{{ $data->title }}</span>
							</div>
						</div>                        
					</div>

					<div class="s_header_wraper">
						<div class="s-post-header">
							<h1 itemprop="itemReviewed">{{ $data->title }}</h1>
							<div class="meta">
							<div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($post->insertdate)) }}</div>
							<div class="views"><i class="fa fa-eye"></i>{{ $post->views }}</div>
							</div>                            
						</div>
					</div>

						@include('front.post.share-box-top')       
						            
						<!-- {media} -->

						<div class="article-content  clearfix" itemprop="articleBody">
							
							<!-- {review} -->
                            
                            @if($post->contype == 6)
                            	@if($post->icons)
                                	<span class="vote-icon" style="background-image: url('{{ url("/icon/".$post->icons.".png") }}')"></span>
                               	@endif
                            @endif
                            
                            @if($post->contype == 3)
                            	@if($post->icons)
                                	<span class="gallery-icon" style="background-image: url('{{ url("/icon/".$post->icons.".png") }}')"></span>
                               	@endif
                            @endif
                            @if($post->contype == 9)
                            	@if($post->icons)
                                	<span class="download-icon" style="background-image: url('{{ url("/icon/".$post->icons.".png") }}')"></span>
                               	@endif
                            @endif

							@if($post->contype == 7)
								@if($video_post)
									<header id="bk-normal-feat" class="clearfix">
									    <div class="bk-embed-video">
									        <iframe width="1050" height="591" src="http://www.youtube.com/embed/{{ $video_post->optnval}}" allowFullScreen ></iframe>
									    </div>
									</header>
								@endif
							@elseif($post->contype == 6 || $post->contype == 3 || $post->contype == 9)
							@else
								@if($post->image)
								<img src="{{ url('/front/images/full').'/'.$post->image }}">
								@endif
							@endif

							<p><?php echo $data->summary ?></p>
						</div>


						@include('front.post.file')
						@include('front.post.share-box-bottom')

						@include('front.post.related')

						@include('front.post.comment')
				</div>


		        <div class="sidebar col-md-4">
		            @include('front.sidebar')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
@endsection
