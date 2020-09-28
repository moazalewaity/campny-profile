<!-- SHARE BOX -->
<div class="share-box-wrap">
	<div class="share-box">
    	<div class="share-total-wrap">
        	<div class="share-total">
            	<div class="share-total__value">0</div>
                <div class="share-total__title">{{ trans('front.Share') }}</div>
            </div>
        </div>
        <?php  
        $url_title = $data->id.$data->slug.'.html';
        $url = url('/', $url_title ) ?>
        
        <ul class="social-share">
        	<li id="facebook" class="bk-share bk_facebook_share" data-url="<?php echo $url ?>" data-text="{{ $data->title }}" data-title="Like"></li>
            <li class="bk_twitter_share">
            	<a onClick="window.open('http://twitter.com/share?url=<?php echo $url ?>&amp;text={{ $data->title }}','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo $url ?>&amp;text={{ $data->title }}">
                	<div class="share-item__icon"><i class="fa fa-twitter " title="Tweet"></i></div>
                </a>
                <div class="bk-twitter-share-icon">+</div>
            </li>
            <li id="gplus" class="bk-share bk_gplus_share" data-url="<?php echo $url ?>" data-text="{{ $data->title }}" data-title="G+"></li>
            <li id="pinterest" class="bk-share bk_pinterest_share" data-url="<?php echo $url ?>" data-text="{{ $data->title }}" data-title="Pinterest"></li>
            <li id="stumbleupon" class="bk-share bk_stumbleupon_share" data-url="<?php echo $url ?>" data-text="{{ $data->title }}" data-title="Stumbleupon"></li>
            <li id="linkedin" class="bk-share bk_linkedin_share" data-url="<?php echo $url ?>" data-text="{{ $data->title }}" data-title="Linkedin"></li>
		</ul>
	</div>
</div>