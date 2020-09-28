@if($post->contype == 9)
<header id="bk-normal-feat" class="clearfix">
    <div class="s-feat-img">
		@foreach($file_gallery_post as $fgrows)
            <a href="{{ url('/media/post/gallery').'/'.$fgrows->path.'/'.$fgrows->file }}">
            	<span class="download-icon"></span>
                <img style="width:60px; height:60px" src="{{ url('/front/images/PDF.png') }}" class="attachment-bk660_400 size-bk660_400 wp-post-image" alt="{{ $data->title }}" />
            </a>
        @endforeach
    </div>
</header>
@endif