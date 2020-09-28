@extends('front.layouts.app')


@section('title', $dep['title'])

@section('body')
<div class="single-page sidebar-right">
    <div class="article-wrap bkwrapper container" itemscope itemtype="http://schema.org/Article">
        <div class="article-content-wrap">
            <div class="row bksection bk-in-single-page clearfix">
                <div class="main col-md-8">
                    <div class="page-title">
                        @if(!isset($dep['search']))
                            <h2 class="heading"><span>{{ $dep['title'] }}</span></h2>
                            <div class="bk-breadcrumbs-wrap">
                                <div class="breadcrumbs">
                                    <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <a itemprop="url" href="{{ url('/') }}"><span itemprop="title">{{ trans('front.home') }}</span></a>
                                    </span>
                                    <span class="delim">&rsaquo;</span>
                                    <span class="current">{{ trans('front.Category') }} : &quot;{{ $dep['title'] }}&quot;</span>
                                </div>
                            </div>
                        @else
                            <h2 class="heading"><span>{{ $dep['search'] }}</span></h2>

                            <div class="bk-breadcrumbs-wrap">
                                <div class="breadcrumbs">
                                    <span class="current">
                                        <a><span itemprop="title"> {{ $dep['title'] }} </span></a>
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>  
                    <div class="row">              
                        <div class="content-wrap square-grid-2 module-square-grid">
                            <ul class="bk-masonry-content clearfix">
                            	@foreach($cat_row as $prow)
                                    <li class="content_in col-md-6 col-sm-6">
                                        <div class="content_in_wrapper">
                                            <div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
                                                <a href="{{ url('/' , $prow->url_title ) }}">
                                                    @if($prow->contype == 7)
                                                        @if(isset($prow->icons))
                                                            <span class="play-icon" style="background-image: url('{{ url("/front/images/icon-play.png") }}')"></span>
                                                        @endif
                                                    @endif
                                                    
                                                    @if($prow->contype == 6)
                                                        @if(isset($prow->icons))
                                                        <span class="vote-icon" style="background-image: url('{{ url("/icon/".$prow->icons.".png") }}')"></span>
                                                        @endif
                                                    @endif
                                                    
                                                    @if($prow->contype == 3)
                                                        @if(isset($prow->icons))
                                                        <span class="gallery-icon" style="background-image: url('{{ url("/icon/".$prow->icons.".png") }}')"></span>
                                                        @endif
                                                    @endif
                                                    @if($prow->contype == 9)
                                                        @if(isset($prow->icons))
                                                        <span class="download-icon" style="background-image: url('{{ url("/icon/".$prow->icons.".png") }}')"></span>
                                                        @endif
                                                    @endif

                                                    @if($prow->image && $dep['id'] != 19)
	                                                    <?php 
	                                                    	$exc = explode('.', $prow->image);
	                                                    	// dump(end($exc));
	                                                    ?>
	                                                    @if( end($exc) == 'pdf' || end($exc) == 'PDF')
	                                                    	<div class="thumb" data-type="background" style="background-image: url({{ url('/front/images/350x250/none/none/none.jpg') }})"></div>
	                                                    @else
	                                                    	<div class="thumb" data-type="background" style="background-image: url({{ url('/front/images/350x250').'/'.$prow->image }})"></div>
                                                    	@endif
                                                    @else
                                                    <div class="thumb" data-type="background" style="background-image: url({{ url('/front/images/350x250/none/none/none.jpg') }})"></div>
                                                    @endif
                                                </a>                        
                                                <div class="post-c-wrap">
                                                    <div class="post-category">
                                                        <a href="{{ url('/category' , [$prow->de_id, url_site($prow->de_name)]) }}">{{ $prow->de_name }}</a>
                                                    </div>      
                                                    <h4 itemprop="name" class="title">
                                                        <a itemprop="url" href="{{ url('/' , $prow->url_title ) }}">{{ $prow->title }}</a>
                                                    </h4> 
                                                </div>  
                                            </div>
                                        </div>
                            	   </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-12">
                            {{ $cat_row->links() }}              
                        </div>
                    </div>
                </div>
                <div class="sidebar col-md-4">
                    <!-- <aside class="sidebar-wrap stick" id="bk-single-sidebar"> -->
                        @include('front.sidebar')
                    <!-- </aside> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
