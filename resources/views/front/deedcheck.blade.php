@extends('front.layouts.app')


@section('title', $dep['title'])

@section('body')
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
                        <form name="deedcheck-form" id="deedcheck-form" action="{{ url('/ajax/bk_ajax_deedcheck') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="inputs">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="inputsme">
                                            <label class="required" for="DEED_CODE">كود التحقق</label>
                                            <input name="DEED_CODE" type="text" id="DEED_CODE" value="">
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="inputsme">
                                            <label class="required" for="DEED_CODE">تاريخ الطباعة</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="inputsme">
                                                        <input name="DEED_DATE_DAY" type="number" id="DEED_DATE_DAY" max="31" size="20" value="" placeholder="اليوم">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="inputsme">
                                                        <input name="DEED_DATE_MONTH" type="number" id="DEED_DATE_MONTH" max="12" size="20" value="" placeholder="الشهر">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="inputsme">
                                                        <input name="DEED_DATE_YEAR" type="number" id="DEED_DATE_YEAR" size="20" value="" placeholder="السنة">
                                                    </div>
                                                </div>
                                            </div>
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
                            <table width="100%" dir="rtl" align="center" border="1" cellpadding="2" cellspacing="2">
                                <tr class="subtitle1">
                                    <td width="50%"  align="center" bgcolor="#CCCCCC">اسم المالك</td>
                                    <td width="20%"  align="center" bgcolor="#CCCCCC">رقم الهوية</td>
                                    <td width="10%"  align="center" bgcolor="#CCCCCC">رقم القطعة</td>
                                    <td width="10%"  align="center" bgcolor="#CCCCCC">رقم القسيمة</td>
                                    <td width="10%"  align="center" bgcolor="#CCCCCC">المساحة</td>
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
                    DEED_CODE: {
                        required: true,
                        number:true
                    },
                    DEED_DATE_DAY: {
                        required: true,
                        number:true				
                    },
                    DEED_DATE_MONTH: {
                        required: true,
                        number:true				
                    },
                    DEED_DATE_YEAR: {
                        required: true,
                        number:true				
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
                    DEED_CODE: {
                        required: "قم بادخال كود التحقق",
                        number: "كود التحقق يحتوي على ارقام فقط"
                    },
                    DEED_DATE_DAY: {
                        required: "قم بادخال اليوم",
                        number: "اليوم يحتوي على ارقام فقط"				
                    },
                    DEED_DATE_MONTH: {
                        required: "قم بادخال الشهر",
                        number: "الشهر يحتوي على ارقام فقط"				
                    },
                    DEED_DATE_DAY: {
                        required: "قم بادخال السنة",
                        number: "السنة يحتوي على ارقام فقط"				
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
                            console.log(responseText.length);
                            for (var i = 0; i < responseText.length; i++) {
                                jQuery(".item_result").find('table').append("<tr class='subtitle1'><td align='center'>"+responseText[i].full_name+"</td><td align='center'>"+responseText[i].doc_no+"</td><td align='center'>"+responseText[i].piece_num+"</td><td align='center'>"+responseText[i].part_num+"</td><td align='center'>"+responseText[i].real_owner_area+"</td></tr>");
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
