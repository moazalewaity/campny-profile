@extends('front.layouts.app')


@section('title', 'الرئيسية')

@section('body')
<style type="text/css">
	.bk-mask.max350 {
    height: 300px;
}
</style>
<div class="has-sb container bkwrapper bksection">
    <div class="row">
    	<div class="content-wrap col-md-8">
			<div class="bkmodule module-grid clearfix ">
				<div class="flexslider">
					<ul class="slides">
						@foreach($slides_row as $srow)
						<li class="large-item content_in">        
							<div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
								<a href="{{ url('/' , $srow->url_title ) }}">
									@if($srow->image)
									<div class="thumb" data-type="background" style="background-image: url({{ url("/front/images/480x250"."/".$srow->image)}})"></div>
									@else
									<div class="thumb" data-type="background" style="background-image: url({{ url("/front/images/480x250/none/none/none.jpg")}})"></div>
									@endif
								</a>
								<div class="post-c-wrap">
									<div class="post-category"><a href="{{ url('/category' ,[$main_row->id , $main_row->title]) }}">{{ $main_row->title }}</a></div>      
									<h4 itemprop="name" class="title">
										<a itemprop="url" href="{{ url('/' , $srow->url_title ) }}">{{ $srow->title }}</a>
									</h4> 
								</div> 
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				@foreach($images_rows as $irow)
				<div class="small-item content_in">
					<div class="post-inner">        
						<div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
							<a href="{{ url('/' , $irow->url_title ) }}">
								@if($irow->image)
									<div class="thumb" data-type="background" style="background-image: url({{ url("/front/images/240x270"."/".$irow->image)}})"></div>
								@else
									<div class="thumb" data-type="background" style="background-image: url({{ url("/front/images/240x270/none/none/none.jpg")}})"></div>
								@endif
							</a>                        
							<div class="post-c-wrap">
								<div class="post-category"><a href="{{ url('/category' ,[$main_row->id ,$main_row->title]) }}">{{ $main_row->title }}</a></div>      
								<h4 itemprop="name" class="title">
									<a itemprop="url" href="{{ url('/' , $irow->url_title ) }}">{{ $irow->title }}</a>
								</h4> 
							</div>  
						</div>
					</div>
				</div>
				@endforeach
			</div>
	    	<div id="block_1-5753dbd4a0f244.94789032" class="bkmodule module-block-1 clearfix">
				<div class="module-title">
					<div class="main-title clearfix">
				    	<a href="{{ url('/category' ,[$dep->id,$dep->title]) }}"><h2>{{ $dep->title }}</h2></a>
				        <div class="bk-tabs-wrapper">
				        	<div class="bk-current-tab">
				            	<span>{{ $dep->title }}</span><i class="fa fa-chevron-down"></i>
				            </div>
				            <ul class="bk-module-tabs">
				            	<li class="bk-tab-1 bk-tabs active"><a href="{{ url('/category' ,[$dep->id,$dep->title]) }}">{{ $dep->title }}</a></li>
				            </ul>
				        </div>
				    </div>
				</div>
				<div class="bk-module-inner row clearfix">
					<div class="large-post row-type content_out col-md-6 col-sm-6 hasPostThumbnail">
					    <div class="row-type-inner">
				        	<div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
				        		<div class="bk-mask max350">
				            		<div class="thumb hide-thumb">
				                    	<a href="{{ url('/', $dep->post_main->url_title ) }}">
					                    	@if($dep->post_main->image)
				                            	<img width="130" height="130" src="{{ url('/front/images/320x218').'/'.$dep->post_main->image }}" class="attachment-bk130_130 size-bk130_130 wp-post-image" alt="{{ $dep->post_main->title }}" sizes="(max-width: 130px) 100vw, 130px" />
			                            	@else
				                            	<img width="130" height="130" src="{{ url('/front/images/320x218/none/none/none.jpg') }}" class="attachment-bk130_130 size-bk130_130 wp-post-image" alt="{{ $dep->post_main->title }}" sizes="(max-width: 130px) 100vw, 130px" />
			                            	@endif
				                        </a>
				                    </div>
				                </div>     
				        		<div class="post-c-wrap">        
				            		<h4 itemprop="name" class="title">
				                    	<a itemprop="url" href="{{ url('/', $dep->post_main->url_title ) }}">{{ $dep->post_main->title }}</a>
				                    </h4>                
				                    <div class="meta">
				        				<div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($dep->post_main->insertdate)) }}</div>
				        				<div class="views"><i class="fa fa-eye"></i>{{ $dep->post_main->views }}</div>
				                    </div>                
				                    <div class="excerpt">{{ str_limit($dep->post_main->summary, 10) }}</div>                
				                    <div class="readmore"><a href="{{ url('/', $dep->post_main->url_title ) }}">{{ trans('front.read_more') }}</a></div> 
				        		</div>      
				            </div>
				        </div>
				    </div>
				    <div class="col-md-6 col-sm-6 clearfix">
				    	<div class="list-small-post">
				        	<ul>
								@foreach($post_row as $row)
				            	<li class="small-post content_out clearfix">        
				                	<div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
				        				<div class="thumb hide-thumb">
					                    	<a href="{{ url('/', $row->url_title ) }}">
					                    		@if($row->image)
				                            	<img width="130" height="130" src="{{ url('/front/images/130x130').'/'.$row->image }}" class="attachment-bk130_130 size-bk130_130 wp-post-image" alt="{{ $row->title }}" sizes="(max-width: 130px) 100vw, 130px" />
				                            	@else
				                            	<img width="130" height="130" src="{{ url('/front/images/130x130/none/none/none.jpg') }}" class="attachment-bk130_130 size-bk130_130 wp-post-image" alt="{{ $row->title }}" sizes="(max-width: 130px) 100vw, 130px" />
				                            	@endif
					                        </a>
				                        </div>
				       					<div class="post-c-wrap">        
						            		<h4 itemprop="name" class="title">
						                    	<a itemprop="url" href="{{ url('/', $row->url_title ) }}">{{ $row->title }}</a>
						                    </h4>                
						                    <div class="meta">
						        				<div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($row->insertdate)) }}</div>
						        				<div class="views"><i class="fa fa-eye"></i>{{ $row->views }}</div>
						                    </div>          
				                    	</div>        
				                    </div>
				   			 	</li>
								@endforeach
				                <li class="small-post content_out clearfix">
				                	<div class="readmore"><a href="{{ url('/category' ,[$dep->id,url_site($dep->title)]) }}">{{ trans('front.more') }}</a></div>
				                </li>
				             </ul>
				       	</div>
				    </div>
				</div>
			</div>
			<div id="classic_blog-5753dbd4bc4a26.86287755" class="bkmodule module-classic-blog module-blog">
				<div class="module-title">
					<div class="main-title clearfix">
						<a href="{{ url('/category' ,[$module_classic->id,$module_classic->title]) }}"><h2>{{ $module_classic->title }}</h2></a>
						<div class="bk-tabs-wrapper">
							<div class="bk-current-tab"><span>{{ $module_classic->title }}</span><i class="fa fa-chevron-down"></i></div>
							<ul class="bk-module-tabs">
								<li class="bk-tab-1 bk-tabs active"><a href="{{ url('/category' ,[$module_classic->id,$module_classic->title]) }}">{{ $module_classic->title }}</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="bk-blog-wrapper row clearfix">
					<ul class="bk-blog-content clearfix">
						@foreach($module_classic_row as $mcrow)
						<li class="item col-md-12">
							<div class="classic-blog-type content_out clearfix hasPostThumbnail">
								<div class="classic-blog-post-wrapper">        
									<div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
										<div class="bk-mask">
											<div class="thumb">
												<a href="{{ url('/', $mcrow->url_title ) }}">

						                    		@if($mcrow->image)
						                    			<img width="320" height="218" src="{{ url('/front/images/320x218').'/'.$mcrow->image }}" class="attachment-bk320_218 size-bk320_218 wp-post-image" alt="{{$mcrow->title}}" sizes="(max-width: 320px) 100vw, 320px" />
					                            	@else
					                            		<img width="320" height="218" src="{{ url('/front/images/320x218/none/none/none.jpg') }}" class="attachment-bk320_218 size-bk320_218 wp-post-image" alt="{{$mcrow->title}}" sizes="(max-width: 320px) 100vw, 320px" />
					                            	@endif

												    
												</a>
											</div>                          
										</div> 
										<div class="post-c-wrap">  
											<div class="meta">
												<div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($mcrow->insertdate)) }}</div>
												<div class="views"><i class="fa fa-eye"></i>{{ $mcrow->views }}</div>
											</div>                
											<h4 itemprop="name" class="title"><a itemprop="url" href="{{ url('/', $mcrow->url_title ) }}">{{ $mcrow->title }}</a></h4>            
											<div class="excerpt">{{ str_limit($mcrow->summary, 150) }}</div>                
											<div class="readmore"><a href="{{ url('/', $mcrow->url_title ) }}">{{ trans('front.read_more') }}</a></div>      
										</div>      
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="blog-ajax loadmore">
					<a href="{{ url('/category' ,[$dep->id,$dep->title]) }}">
						<span class="ajaxtext ajax-load-btn active">{{ trans('front.more') }}</span>
					</a>
					<span class="loading-animation"></span>
				</div>
			</div>
        </div>
        <div class="sidebar col-md-4">
            @include('front.sidebar')
        </div>
    </div>
</div>
<div class="fullwidth bksection">
    <div class="sec-content">
		<div class="bkmodule container bkwrapper module-video-playlist clearfix">
			<div class="module-title">
		    	<div class="main-title clearfix">
		    		<a href="{{ url('/category' ,[$vid_dep->id,$vid_dep->title]) }}"><h2>{{ $vid_dep->title }}</h2></a>
		        </div>
		    </div>
		    <div class="bk-video-playlist-wrap">
		    	<div class="row clearfix">
		        	<div class="bk-current-video col-md-8">
		            	<div class="bk-frame-wrap"></div>
		            </div>
		            <div class="bk-playlist-wrap col-md-4">
		            	<ul class="bk-playlist">
		            		@foreach($video_row as $i=>$vrow)
		                    <li class="bk-video-item <?php if($i == 0){?> active <?php }?>" data-id="y&+{{$vrow->youtube}}">
								<div class="post-c-wrap clearfix">
		                         	<div class="thumb">
		                            	<span class="play-icon"></span>

			                    		@if($vrow->image)
			                    			<img width="130" height="130" src="{{ url('/front/images/130x130').'/'.$vrow->image }}" class="attachment-bk130_130 size-bk130_130 wp-post-image" alt="{{ $vrow->title }}" sizes="(max-width: 130px) 100vw, 130px" />
		                            	@else
			                    			<img width="130" height="130" src="{{ url('/front/images/130x130/none/none/none.jpg') }}" class="attachment-bk130_130 size-bk130_130 wp-post-image" alt="{{ $vrow->title }}" sizes="(max-width: 130px) 100vw, 130px" />
		                            	@endif

		                                
		                            </div>
		                            <div class="video-details">
		                            	<div class="meta">
		                                    <div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($vrow->insertdate)) }}</div>
		                                    <div class="views"><i class="fa fa-eye"></i>{{ $vrow->views }}</div>
		                                </div>
		                                <h4 itemprop="name" class="title">
		                                    <a itemprop="url" href="{{ url('/', $vrow->url_title) }}">{{ $vrow->title }}</a>
		                                </h4>
		                        	</div>
		                    	</div>
		                	</li>
		                	@endforeach
		            	</ul>
		        	</div>
		    	</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
@endsection
