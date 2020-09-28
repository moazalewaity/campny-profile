@if(sizeof($images_gallery_post) != 0)
<div class="gallery-wrap background-preload">
	<div class="gallery-runner opacity-zero" style="direction:ltr">
		@foreach($images_gallery_post as $igrows)
        	@if($igrows->file && $igrows->ext != 'pdf')
		        <div class="item">
					<img width="900" height="600" src="{{ url('/front/images/full').'/'.$igrows->path.'/'.$igrows->file }}" class="attachment-bk_s_feat_img size-bk_s_feat_img" alt="{image}" sizes="(max-width: 900px) 100vw, 900px" />
		        </div>
			@endif
        @endforeach
	</div>
    <div class="bk-preload"></div>
</div>
@endif