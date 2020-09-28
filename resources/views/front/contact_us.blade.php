@extends('front.layouts.app')


@section('title', 'اتصل بنا')

@section('body')
<div class="single-page sidebar-right">
    <div class="article-wrap bkwrapper container" itemscope itemtype="http://schema.org/Article">
        <div class="article-content-wrap">
            <div class="row bksection bk-in-single-page clearfix">
                <div class="main col-md-8">
                    <div class="page-title">
                        <h2 class="heading"><span>خدمات الجمهور</span></h2>
                        <div class="bk-breadcrumbs-wrap">
                            <div class="breadcrumbs">
                                <span class="current">إتصل بنا</span>
                            </div>
                        </div>
                    </div>  
                    <div class="content-wrap square-grid-2 module-square-grid comment-respond">
                        <form name="deedcheck-form" id="deedcheck-form" action="{{ url('/ajax/bk_ajax_contact_us') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="inputs">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="inputsme">
                                            <label for="name">{{ trans('front.name') }}</label>
                                            <input type="text" id="name" name="name" size="30" required='true' />
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="inputsme">
                                            <label for="email">{{ trans('front.email') }}</label>
                                            <input type="email" id="email" name="email" size="50" required='true' />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="inputsme">
                                            <label for="subject">{{ trans('front.subject') }}</label>
                                            <input type="text" id="subject" name="subject" size="50" required='true' />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="inputsme">
                                            <label for="comment">{{ trans('front.text_message') }}</label>
                                            <textarea id="comment" name="comment" cols="45" rows="8" required="true"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="g-recaptcha" data-sitekey="6LfaXIwUAAAAANcVvXAQdeC6ogn1zDrMxCMVDttS"></div>
                                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                    </div>
                                    <div class="col-md-2 pull-left">
                                        <div class="inputsme btns" style="margin-top: 5px;">
                                            <input name="comment-submit" type="submit" id="comment-submit" class="submit" value="{{ trans('front.send') }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div> 
                        </form>
                        <div id="response"></div>
                    </div>
                </div>
                <div class="sidebar col-md-4">
                    <aside class="sidebar-wrap stick" id="bk-single-sidebar">
                        @include('front.sidebar')
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        jQuery(document).ready(function() {
            if(jQuery("#deedcheck-form").length > 0){
                jQuery('#deedcheck-form').validate({
                ignore: ".ignore",
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    subject: {
                        required: true,
                    },
                    comment: {
                        required: true,
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
                    name: {
                        required: "قم بادخال الاسم رباعياً ",
                    },
                    email: {
                        required: "قم بادخال البريد الالكتروني",
                    },
                    subject: {
                        required: "قم بادخال العنوان",
                    },
                    comment: {
                        required: "قم بادخال نص الرسالة",
                    },          
                    hiddenRecaptcha: {
                        required: "قم بالضغط بانك لست ربيوت",
                    }
                },
                
                submitHandler: function(form) {
                    jQuery("#comment-submit").attr("value", "{{ trans('front.Sending') }} ...");
                    jQuery(form).ajaxSubmit({
                        success: function(responseText, statusText, xhr, $form) {
                            jQuery('#deedcheck-form').slideUp("slow");
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
@endsection
