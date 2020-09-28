<!-- COMMENT BOX -->
<div class="comment-box clearfix">
    <div id="comments" class="comments-area clear-fix">
    	<div class="comments-area-title"><h3>{{ trans('front.comments') }}</h3></div>
    	<!-- End Comment Area Title -->
		<ol class="commentlist">
			@foreach($commint as $crows)
            <li class="comment even thread-even depth-1">
				<div id="comment-108" class="comment-article  media">
                	<div class="comment-author clear-fix">
                    	<div class="comment-avatar">
                        	<img alt='' src='{{ url("/front/images/avatar.jpg") }}' srcset='{{ url("/front/images/avatar.jpg") }}' class='avatar avatar-60 photo' height='60' width='60' />  
                    	</div>
                        <span class="comment-author-name">{{ $crows->name }}</span>
                        <span class="comment-time"><a href="#" class="comment-timestamp">{{ strftime ("%d %B, %Y", strtotime($crows->recorddate)) }}</a></span>
                        <span class="comment-links"></span>
                	</div>
                
                	<div class="comment-text">
                        <div class="comment-content">
                            <p>{{ $crows->comment }}</p>
                        </div>
                    </div>
				</div>		
			</li>
			@endforeach
     	</ol>
    </div>
    <!-- #comments .comments-area -->
	<div id="respond" class="comment-respond">
		<h3 id="reply-title" class="comment-reply-title">{{ trans('front.leavreplay') }}</h3>				
        <form action="{{ url('/ajax/bk_ajax_comments_post' , [$post->id]) }}" method="post" id="comment-form" class="comment-form">
        	{{ csrf_field() }}
        	<div class="inputs">
        		<div class="row">
        			<div class="col-md-4">
        				<div class="inputsme">
        					<input type="text" id="name" name="name" placeholder="{{ trans('front.name') }}" size="30" required='true' />
        				</div>
        			</div>
        			<div class="col-md-4">
        				<div class="inputsme">
        					<input type="email" id="email" name="email" size="30" placeholder="{{ trans('front.email') }}" required='true' />
        				</div>
        			</div>
        			<div class="col-md-4">
        				<div class="inputsme">
        					<input type="text" id="url" name="url" size="30" placeholder="{{ trans('front.website') }}"/>
        				</div>
        			</div>
        			<div class="col-md-12">
        				<div class="inputsme">
        					<textarea id="comment" name="comment" cols="45" rows="8" required="true" placeholder="{{ trans('front.message') }}"></textarea>
        				</div>
        			</div>
        			<div class="col-md-4">
        				<div class="g-recaptcha" data-sitekey="6LfaXIwUAAAAANcVvXAQdeC6ogn1zDrMxCMVDttS"></div>
        				<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
        				<!-- <div class="g-recaptcha" id="g-recaptcha"></div> -->
			  		</div>
        			<div class="col-md-4 pull-left">
        				<div class="inputsme btns">
				  			<input name="comment-submit" type="submit" id="comment-submit" class="submit" value="{{ trans('front.send') }}" />
        				</div>
        			</div>
        		</div>
        	</div>
		</form>
        <div id="response"></div> 
	</div>
</div> 

<script>      
	jQuery(document).ready(function() {
		if(jQuery("#comment-form").length > 0){
			jQuery('#comment-form').validate({
				ignore: ".ignore",
				rules: {
					comment: {
						required: true
					},
					name: {
						required: true
					},
					email: {
						required: true
					},			
					"hiddenRecaptcha": {
					     required: function() {
					         if(grecaptcha.getResponse() == '') {
					             return true;
					         } else {
					             return false;
					         }
					     }
					}
				},

				messages: {
					comment: {
						required: "قم بادخال نص التعليق"
					},
					name: {
						required: "قم بادخال الاسم"
					},
					email: {
						required: "قم بادخال البريد الالكتروني"
					},			
					hiddenRecaptcha: {
						required: "قم بالضغط بانك لست ربيوت"
					}
				},

				submitHandler: function(form) {

					jQuery("#comment-submit").attr("value", "{{ trans('front.Sending') }} ...");
					jQuery(form).ajaxSubmit({
						success: function(responseText, statusText, xhr, $form) {
							jQuery('#comment-form').slideUp("slow");
							jQuery("#response").html(responseText).hide().slideDown("fast");
							jQuery("#comment-submit").attr("value", "{{ trans('front.send') }}");				
						}
					});
					return false;
				}
			});
		} 
	});
</script>
<!-- 
    <script type="text/javascript">
        $(document).ready(function (e) {
            $("form").on('submit',(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        $(".reorder2").removeClass('active');
                        console.log(data);
                        var id = data;
                        window.location.replace("{{ url('/') }}/family/add_excel_condition/"+id);
                    },
                    error: function(e) {
                        console.log(e);
                        $(".reorder2").removeClass('active');
                        showError(e.responseJSON,'error',true);
                    }
                });
            }));
        });
    </script> -->