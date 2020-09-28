<div class="bk-share-box-top"> 
	<span>{{ trans('front.Share') }} :</span>

        <?php  
        $url_title = $data->id.$data->slug.'.html';
        $url = url('/', $url_title ) ?>


	<div class="share-box-wrap">
		<div class="share-box">
			<ul class="social-share">
				<li class="bk_facebook_share">
                	<a onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $url ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo $url ?>">
                    	<div class="share-item__icon"><i class="fa fa-facebook " title="Facebook"></i></div>
                    </a>
                </li>
                <li class="bk_twitter_share">
                	<a onClick="window.open('http://twitter.com/share?url=<?php echo $url ?>&amp;text={{ $data->name }}','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo $url ?>&amp;text={{ $data->name }}">
                    	<div class="share-item__icon"><i class="fa fa-twitter " title="Twitter"></i></div>
                     </a>
                 </li>
                 <li class="bk_gplus_share">
                 	<a onClick="window.open('https://plus.google.com/share?url=<?php echo $url ?>','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="https://plus.google.com/share?url=<?php echo $url ?>">
                    	<div class="share-item__icon"><i class="fa fa-google-plus " title="Google Plus"></i></div>
                    </a>
                 </li>
                 <li class="bk_pinterest_share">
                 	<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>
                    	<div class="share-item__icon"><i class="fa fa-pinterest " title="Pinterest"></i></div>
                    </a>
                 </li>
                 <li class="bk_stumbleupon_share">
                 	<a onClick="window.open('http://www.stumbleupon.com/submit?url=<?php echo $url ?>','Stumbleupon','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.stumbleupon.com/submit?url=<?php echo $url ?>">
                    	<div class="share-item__icon"><i class="fa fa-stumbleupon " title="Stumbleupon"></i></div>
                    </a>
                 </li>
                 <li class="bk_linkedin_share">
                 	<a onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url ?>','Linkedin','width=863,height=500,left='+(screen.availWidth/2-431)+',top='+(screen.availHeight/2-250)+''); return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url ?>">
                    	<div class="share-item__icon"><i class="fa fa-linkedin " title="Linkedin"></i></div>
                    </a>
                 </li>
			</ul>
		</div>
	</div>
</div>