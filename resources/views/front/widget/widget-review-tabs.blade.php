@if(isset($review_post) && sizeof($review_row) != 0)
<style type="text/css">
	.review_removes {
	    margin-left: 5px;
	    float: right;
	    margin-top: 5px;
	}
</style>
<aside id="bk_review-2" class="widget widget-review-tabs">        
	<div class="widget_reviews_tabs"> 
		<div class="widget-tabs-title-container">
			<ul class="widget-tab-titles">
				<li class="active"><h3><a href="#reviews-tab1-content">{{ $review_post->title }}</a></h3></li>
				
			</ul>
		</div>
		<div class="reviews-tabs-content-container">
			<div id="reviews-tab1-content" class="reviews-tab-content" style="display: block;">	
            	<form action="{{ url('/') }}/ajax/bk_ajax_review/{{ $review_post->id }}" method="post" id="form-review" name="form-review" class="review-form">
                    {{ csrf_field() }}
                    <ul class=" post-list">
                    	@foreach($review_row as $rrow)
                        <li class="bk-review-box clearfix">
                            <div class="bk-article-wrapper" itemscope itemtype="http://schema.org/Article">
                                <h4 itemprop="name" class="title">
                                   <input name="choise" class="review_removes" type="radio" value="{{ $rrow->id }}" />{{ $rrow->title }}
                                </h4>
                                <span class="bk-final-score">{{ $rrow->range }}</span>
                                <span class="bk-overlay"><span class="bk-zero-trigger" style="width: {{ $rrow->range }}%"></span></span>
                             </div>
                        </li>
                        @endforeach
                         
                        <li class="bk-review-box clearfix form-submit">
                        	<input name="submit-review" type="submit" id="submit-review" class="submit review_removes" value="{{ trans('front.vote') }}" />
                        	<span class="readmore" style="width: auto;">
                        		<a href="{{ url('/votes' , trans('front.votes') ) }}">{{ trans('front.more') }}</a>
                        	</span>
                    	</li>
                       
                    </ul>                    
                </form>
                
			</div>
			<div id="reviews-tab2-content" class="reviews-tab-content" >
            	<ul class="list post-list">
                </ul>
            </div>
		</div>		
	</div>
</aside>
@endif