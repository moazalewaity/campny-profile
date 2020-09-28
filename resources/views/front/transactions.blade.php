@extends('front.layouts.app')


@section('title', $dep['title'])

@section('body')
<style type="text/css">
    table th, table td {
        padding: 7px 10px;
        font-size: 12px;
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
                                <span class="current">{{ $dep['name'] }}</span>
                            </div>
                        </div>
                    </div>  
                    <div class="content-wrap square-grid-2 module-square-grid comment-respond">
                        <form name="deedcheck-form" id="deedcheck-form" action="{{ url('/ajax/bk_ajax_transactions') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="inputs">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="inputsme">
                                            <label class="required" for="APP_NO"> رقم المعاملة </label>
                                            <input name="APP_NO" type="number" id="APP_NO" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="inputsme">
                                            <label class="required" for="APP_YEAR">سنة المعاملة </label>
                                            <input name="APP_YEAR" type="number" id="APP_YEAR" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="inputsme">
                                            <label class="required" for="MAIN_BLOCK_ID"> رقم القطعة </label>
                                            <input name="MAIN_BLOCK_ID" type="number" id="MAIN_BLOCK_ID" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="inputsme">
                                            <label class="required" for="COUPON_NO"> رقم القسيمة </label>
                                            <input name="COUPON_NO" type="number" id="COUPON_NO" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="g-recaptcha" data-sitekey="6LfaXIwUAAAAANcVvXAQdeC6ogn1zDrMxCMVDttS"></div>
                                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                    </div>
                                    <div class="col-md-2 pull-left">
                                        <div class="inputsme btns" style="margin-top: 5px;">
                                            <input name="submit-deedcheck" type="submit" id="submit-deedcheck" class="submit" value="استعلام"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div> 
                        </form>
                        <div id="response"></div>
                        <div class="item_result" style="display: none;">
                            <table width="100%" dir="ltr" align="center" border="0" cellpadding="2" cellspacing="2">
                                <tr class="subtitle1">
                                    <td width="21%"  align="right" class="t_date"></td>
                                    <td width="27%"  align="center" bgcolor="#CCCCCC">تاريخ المعاملة</td>
                                    <td width="28%"  align="right" class="t_APP_NO"></td>
                                    <td width="24%"  align="center" bgcolor="#CCCCCC">رقم المعاملة</td>
                                </tr>
                                <tr class="subtitle1">
                                    <td align="right" class="t_APP_DESC"></td>
                                    <td align="center" bgcolor="#CCCCCC">حالة المعاملة</td>
                                    <td align="right" class="t_APP_TYPE"></td>
                                    <td align="center" bgcolor="#CCCCCC">نوع المعاملة</td>
                                </tr>
                                    <tr class="subtitle1">
                                    <td colspan="3" align="right" class="t_FROM_OWNER_NAME"></td>
                                    <td align="center" bgcolor="#CCCCCC">اسم الناقل</td>
                                </tr>
                                <tr class="subtitle1">
                                    <td colspan="3" align="right" class="t_TO_OWNER_NAME"></td>
                                    <td align="center" bgcolor="#CCCCCC">اسم المنقول اليه</td>
                                </tr>
                                <tr class="subtitle1">
                                    <td colspan="3" align="right" class="t_NOTE"></td>
                                    <td align="center" bgcolor="#CCCCCC">التفاصيل</td>
                                </tr>
                                <tr class="maintitle">
                                    <td colspan="4" align="right">ارقام القطع والقسائم داخل المعاملة</td>
                                </tr>
                            </table>
                        </div>
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
                    APP_NO: {
                        required: true,
                        number:true
                    },
                    APP_YEAR: {
                        required: true,
                        number:true
                    },
                    MAIN_BLOCK_ID: {
                        required: true,
                        number:true
                    },
                    COUPON_NO: {
                        required: true,
                        number:true
                    },
                    code: {
                        required: true
                        //number:true
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
                    APP_NO: {
                        required: "قم بادخال رقم المعاملة",
                        number: "رقم المعاملة يحتوي على ارقام فقط"
                    },
                    APP_YEAR: {
                        required: "قم بادخال سنة المعاملة",
                        number: "سنة المعاملة يحتوي على ارقام فقط"
                    },
                    MAIN_BLOCK_ID: {
                        required: "قم بادخال رقم القطعة",
                        number: "رقم القطعة يحتوي على ارقام فقط"
                    },
                    COUPON_NO: {
                        required: "قم بادخال رقم القسيمة",
                        number: "رقم القسيمة يحتوي على ارقام فقط"
                    },
                    code: {
                        required: "قم بكتابة النص داخل الصورة"
                        //number: "النص داخل الصورة يحتوي على ارقام فقط"
                    },
                    hiddenRecaptcha: {
                        required: "قم بالضغط بانك لست ربيوت"
                    }
                },
                
                submitHandler: function(form) {
                    jQuery("#submit-deedcheck").attr("value", "استعلام ...");
                    jQuery(form).ajaxSubmit({

                        error: function(responseText, statusText, xhr, $form) {
                            console.log(responseText.responseJSON);
                            jQuery('#response').html(responseText.responseJSON).show('slow');
                        },
                        success: function(responseText, statusText, xhr, $form) {
                            jQuery('#deedcheck-form').slideUp("slow");
                            jQuery('.item_result').show();
                            jQuery('#response').hide();
                            jQuery('.t_date').html(responseText.app_date);
                            jQuery('.t_APP_DESC').html(responseText.app_desc);
                            jQuery('.t_APP_NO').html(responseText.app_no);
                            jQuery('.t_APP_TYPE').html(responseText.app_type);
                            jQuery('.t_FROM_OWNER_NAME').html(responseText.from_owner_name);
                            jQuery('.t_TO_OWNER_NAME').html(responseText.to_owner_name);
                            jQuery('.t_NOTE').html(responseText.note);

                            for (var i = 0; i < responseText.da_all.length; i++) {
                                var coupon_no = responseText.da_all[i].coupon_no;
                                var main_block_id = responseText.da_all[i].main_block_id;
                                var rate_value = responseText.da_all[i].rate_value;
                                var f_discount = responseText.da_all[i].f_discount;
                                var s_discount = responseText.da_all[i].s_discount;
                                if(coupon_no == null){
                                    var coupon_no = '';
                                }
                                if(main_block_id == null){
                                    var main_block_id = '';
                                }
                                if(rate_value == null){
                                    var rate_value = '';
                                }
                                if(f_discount == null){
                                    var f_discount = '';
                                }
                                if(s_discount == null){
                                    var s_discount = '';
                                }
                                jQuery(".item_result").find('table').append("<tr class='subtitle1'><td align='right' bgcolor='#999999' style='color:#FFF; font-weight:bold'>"+coupon_no+"</td><td align='center' bgcolor='#666666' style='color:#FFF; font-weight:bold'>رقم القسيمة</td><td align='right' bgcolor='#999999' style='color:#FFF; font-weight:bold'>"+main_block_id+"</td><td align='center' bgcolor='#666666' style='color:#FFF; font-weight:bold'>رقم القطعة</td></tr><tr class='subtitle1'><td colspan='3' align='right'>"+rate_value+"</td><td align='center' bgcolor='#CCCCCC'>التقدير</td></tr><tr class='subtitle1'><td colspan='3' align='right'>"+f_discount+"</td><td align='center' bgcolor='#CCCCCC'>التخفيض بعد الاعتراض الاول</td></tr><tr class='subtitle1'><td colspan='3' align='right'>"+s_discount+"</td><td align='center' bgcolor='#CCCCCC'>التخفيض بعد الاعتراض الثاني</td></tr>");
                            }
                            jQuery("#submit-deedcheck").attr("value", "استعلام");
                        }
                    });
                    return false;
                }
                });
            } 
        });	      
    </script>
@endsection
