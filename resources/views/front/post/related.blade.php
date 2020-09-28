<!-- RELATED POST -->
<style type="text/css">
    .item.row-type.content_out.col-md-4.col-sm-4.hasPostThumbnail .thumb a img{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        min-width: 100%;
        max-width: 110%;
        min-height: 100%;
    }
    .item.row-type.content_out.col-md-4.col-sm-4.hasPostThumbnail .thumb a,
    .item.row-type.content_out.col-md-4.col-sm-4.hasPostThumbnail .thumb {
    height: 170px;
    background: #000;
    position: relative;
    overflow: hidden;
}

</style>
<div class="related-box">
	<h3>
		<a id="s-related-article-tab" class="related-tab 153 active" href="#">{{ trans('front.related') }}</a>		
	</h3>
	<div class="bk-related-posts">
    	<ul class="related-posts row clearfix">
            @foreach($related as $rowsw)
            <li class="item row-type content_out col-md-4 col-sm-4 hasPostThumbnail">
            	<div class="thumb hide-thumb">
                	<a href="{{ url('/' , $rowsw->url_title ) }}">

                        @if($rowsw->contype == 7)
                            <span class="play-icon" style="background-image: url('{{ url("/icon/".$rowsw->icons.".png") }}')"></span>
                        @endif
                        
                        @if($rowsw->contype == 6)
                            <span class="vote-icon" style="background-image: url('{{ url("/icon/".$rowsw->icons.".png") }}')"></span>
                        @endif
                        
                        @if($rowsw->contype == 3)
                            <span class="gallery-icon" style="background-image: url('{{ url("/icon/".$rowsw->icons.".png") }}')"></span>
                        @endif
                        @if($rowsw->contype == 9)
                            <span class="download-icon" style="background-image: url('{{ url("/icon/".$rowsw->icons.".png") }}')"></span>
                        @endif

                        @if($rowsw->image)
                            <?php $ext = pathinfo($rowsw->image, PATHINFO_EXTENSION); ?>
                            @if($ext != 'pdf' && $dep->id != 19)
                                <img width="660" height="400" src="{{ url('/front/images/660x400').'/'.$rowsw->image }}" class="{{ $ext }} attachment-bk660_400 size-bk660_400 wp-post-image" alt="{{ $rowsw->title }}" sizes="(max-width: 130px) 100vw, 130px" />
                            @else
                                <img width="130" height="130" src="{{ url('/front/images/660x400/none/none/none.jpg') }}" class="attachment-bk660_400 size-bk660_400 wp-post-image" alt="{{ $rowsw->title }}" sizes="(max-width: 130px) 100vw, 130px" />
                            @endif
                        @else
                            <img width="130" height="130" src="{{ url('/front/images/660x400/none/none/none.jpg') }}" class="attachment-bk660_400 size-bk660_400 wp-post-image" alt="{{ $rowsw->title }}" sizes="(max-width: 130px) 100vw, 130px" />
                        @endif
                    </a>
                    <!-- close a tag -->
                </div>
                <!-- close thumb -->
                <div class="post-category">
                	<a href="{{ url('/category' , [$rowsw->de_id , url_site($rowsw->de_name)] ) }}">{{ $rowsw->de_name }}</a>
                </div>
                <div class="post-c-wrap">
                	<h4><a itemprop="url" href="{{ url('/' , $rowsw->url_title ) }}">{{ $rowsw->title }}</a></h4>
                	<div class="meta">
                		<div class="post-date"><i class="fa fa-clock-o"></i>{{ strftime ("%d %B, %Y", strtotime($rowsw->insertdate)) }}</div>
                	</div>
             	</div>
             </li>
             @endforeach
		</ul>
	</div>
    <!--End related posts containter-->
</div>