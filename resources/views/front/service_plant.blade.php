@extends('front.layouts.app')


@section('title', $dep['title'])

@section('body')
<style type="text/css">
    .inputsme label{
        margin-bottom: 5px;
        float: left;
        width: 100%;
    }
    .attachment_file{
        position: relative;
    }
    .attachment_file #inputfile{
        display: none;
    }
    .attachment_file .attachment_label{
        position: absolute;
        left: 0;
        bottom: 0;
        background: {{ $sitesetting->color }};
        color: #fff;
        width: 100px;
        text-align: center;
        line-height: 42px;
        margin: 0;
        border: 1px solid {{ $sitesetting->color }};
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }
    .inputsme.checkbox_box label.required {

    float: none;
    display: inline-block;
    width: auto;
    padding-right: 30px;position: relative;
    cursor: pointer;

}
.inputsme.checkbox_box input[type=checkbox]:checked ~ label.required:after {
	content: '';
    position: absolute;
    right: 7px;
    top: 1px;
    width: 12px;
    height: 12px;
    background: {{ $sitesetting->color }};
    border-radius: 3px;
}
.inputsme.checkbox_box input[type=checkbox]:checked ~ label.required:before {
    border: 1px solid {{ $sitesetting->color }};
}
.inputsme.checkbox_box label.required:before {
    content: '';
    position: absolute;
    right: 0;
    top: -5px;
    width: 25px;
    height: 25px;
    border: 1px solid #eee;
    background: #fff;
    border-radius: 4px;
}
.inputsme.checkbox_box input {
	visibility: hidden;
	width: 0;
	height: 0;
}
.inputsme.checkbox_box {

    margin: 30px 0;
    text-align: center;

}
.inputsme label.error{
    text-align: right;
}
.comment-respond .btns input.submit,
.attachment_file .attachment_label{
	cursor: pointer;
}

</style>
<div class="single-page sidebar-right">
    <div class="article-wrap bkwrapper container" itemscope itemtype="http://schema.org/Article">
        <div class="article-content-wrap">
            <div class="row bksection bk-in-single-page clearfix">
                <div class="main col-md-8">
                    <div class="page-title">
                        <h2 class="heading"><span>{{ $dep['title'] }}</span></h2>
                        <div class="bk-breadcrumbs-wrap">
                            <div class="breadcrumbs">
                                <span class="current">{{ $dep['name'] }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrap square-grid-2 module-square-grid comment-respond">
                        <form  name="plaint-form" id="plaint-form" action="{{ url('/ajax/bk_ajax_plaint' , [$dep['apptype']]) }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="inputs">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="inputsme">
                                            <label class="required" for="fullname">{{ trans('front.fullname') }}</label>
                                            <input name="fullname" type="text" id="fullname" size="50">            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputsme">
                                            <label class="required" for="idnum">{{ trans('front.idnum') }}</label>
                                            <input name="idnum" type="text" id="idnum" size="50">            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputsme">
                                            <label class="required" for="city">{{ trans('front.city') }}</label>
                                            <input name="city" type="text" id="city" size="50">            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputsme">
                                            <label class="required" for="tel">{{ trans('front.tel') }}</label>
                                            <input name="tel" type="text" id="tel" size="20">            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputsme">
                                            <label class="required" for="mobile">{{ trans('front.mobile') }}</label>
                                            <input name="mobile" type="text" id="mobile" size="20">            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inputsme">
                                            <label class="required" for="email">{{ trans('front.email') }}</label>
                                            <input name="email" type="email" id="email" size="50">            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="inputsme">
                                        	@if($dep['apptype'] == '1')
                                            	<label class="required" for="department">{{ trans('front.department') }}</label>
                                            @else
                                            	<label class="required" for="department">{{ trans('front.department2') }}</label>
                                            @endif
                                            <input name="department" type="department" id="department" size="50">            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="inputsme">
                                        	@if($dep['apptype'] == '1')
                                            	<label class="required" for="details">{{ trans('front.details') }}</label>
                                            @else
                                            	<label class="required" for="details">{{ trans('front.details2') }}</label>
                                            @endif
                                            <textarea id="details" name="details" cols="45" rows="10" required="true"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="inputsme attachment_file">
                                            <label class="required">{{ trans('front.attachment') }}</label>
                                            <label class="attachment_label" for="inputfile">{{ trans('front.chose_attachment') }}</label>
                                            <input type="file" name="attachment" id="inputfile" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                                            <input type="text" readonly name="inputfile_Text" id="inputfile_Text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="inputsme checkbox_box">
                                            <input type="checkbox" name="plaint_APP_NO" id="plaint_APP_NO" onclick="plaintAgreement(this)">
                                            <label class="required" for="plaint_APP_NO">{{ trans('front.plaint_APP_NO') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="g-recaptcha" data-sitekey="6LfaXIwUAAAAANcVvXAQdeC6ogn1zDrMxCMVDttS"></div>
										<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                    </div>
                                    <div class="col-md-4 pull-left">
                                        <div class="inputsme btns">
                                            <input name="submit-plaint" type="submit" id="submit-plaint" class="submit" value="{{ trans('front.send') }}" disabled="disabled"/>
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

    <script type="text/javascript">

        jQuery("#inputfile").change(function () {
            var vaul = jQuery(this).val().replace(/C:\\fakepath\\/i, '');
            // alert(vaul);
            jQuery('#inputfile_Text').val(vaul);
        });
    </script>

<script>


	function plaintAgreement(obj){
		if(obj.checked){
			jQuery('#submit-plaint').attr('disabled',false);
		}
		else{
			jQuery('#submit-plaint').attr('disabled',true);
		}
	}
    jQuery(document).ready(function(){
        if(jQuery("#plaint-form").length > 0){
            jQuery('#plaint-form').validate({
				ignore: ".ignore",
                rules: {
                    fullname: {
                        required: true
                    },
                    idnum: {
                        required: true,
                        number:true
                    },
                    city: {
                        required: true
                    },
                        department: {
                        required: true
                    },
                    tel: {
                        required: true,
                        number:true
                    },
                    mobile: {
                        required: true,
                        number:true
                    },
                    email: {
                        required: true,
                        email:true
                    },
                    details: {
                        required: true
                    },
                    plaint_APP_NO: {
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
                    fullname: {
                        required: "قم بادخال الاسم رباعيا"
                    },
                    idnum: {
                        required: "قم بادخال رقم الهوية",
                        number: "رقم الهوية يحتوي على ارقام فقط"
                    },
                    city: {
                        required: "قم بادخال محافظة/مدينة/قرية"
                    },
                    department: {
                        required: "قم بادخال الجهة التي ستقدم ضدها الشكوى"
                    },
                    tel: {
                        required: "قم بادخال رقم الهاتف",
                        number: "رقم الهاتف يحتوي على ارقام فقط"
                    },
                    mobile: {
                        required: "قم بادخال رقم الجوال",
                        number: "رقم الجوال يحتوي على ارقام فقط"
                    },
                    email: {
                        required: "قم بادخال البريد الإلكتروني",
                        email: "قم بادخال البريد الإلكتروني بطريقة صحيحة"
                    },
                    details: {
                        required: "قم بادخال تفاصيل الشكوى"
                    }, 
                    plaint_APP_NO: {
                        required: "الرجاء قم بالموافقة علي  الشروط"
                    },          
                    hiddenRecaptcha: {
                        required: "قم بالضغط بانك لست ربيوت"
                    }
                },

                submitHandler: function(form) {

                    jQuery("#submit-plaint").attr("value", "{{ trans('front.Sending') }} ...");

                    jQuery(form).ajaxSubmit({
                        success: function(responseText, statusText, xhr, $form) {
                            jQuery('#plaint-form').slideUp("slow");
                            jQuery("#response").html(responseText).hide().slideDown("fast");
                            jQuery("#submit-plaint").attr("value", "{{ trans('front.send') }}");
                        }
                    });
                    return false;
                }
            });
        }
    });
</script>

@endsection
