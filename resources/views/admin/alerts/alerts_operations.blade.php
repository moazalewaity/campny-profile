@extends('admin.layouts.backend')

@section('title','التنبهات ')

@section('page_level_plugins_styles')

@endsection



@section('page_global_styles')

<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />

<link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />

@endsection



@section('page_level_styles')

@endsection



@section('theme_layout_styles')

@endsection



@section('style')

<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">

<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">









@endsection



@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed')

@section('page_bar')



<li>

        <a href="#">{{ trans('mainpage.alerts_noti') }}</a>

        <i class="fa fa-angle-left"></i>

    </li>



@endsection









@section('content')



<div class="row " >

<div class="portlet light ">

    <div class="portlet-title">

<div class="caption">

    <i class="icon-share font-dark"></i>

    <span class="caption-subject font-dark bold uppercase">
      {{ trans('mainpage.alerts_add_noti') }}
   

    </span>

</div>

        

    </div>



<div class="portlet-body form">

                                           <!-- BEGIN FORM-->

    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_alerts" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="addalerts_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>





  

        <div class="form-body">



    

            <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_content') }}</label>

                <div class="col-md-4">

                    <input type="text" class="form-control" 

                    placeholder="المحتوى" id="content" name="content"

                     required  data-error="{{ trans('mainpage.alerts_add_pls') }}" >

                    <div class="help-block with-errors"></div>

                    

                </div>

            </div>





            <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_add_type') }}</label>

                <div class="col-md-4">

                  <select id="type" name="type">

                   <option value="success">Success</option>

                   <option value="danger">Danger</option>

                    <option value="warning">warning</option>

                    <option value="info">Info</option>



                  </select>

               </div>



                </div>

            </div>





             <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_add_place') }}</label>

                <div class="col-md-4">

               <select id="placment" class="form-control input-medium">

                    <option value="append">Append</option>

                    <option value="prepend">Prepend</option>

               </select>



                </div>

            </div>





               <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_add_close') }} </label>

                <div class="col-md-4">

               

                <select id="closable" name="closable">

                   <option value="0" selected>No</option>

                   <option value="1">Yes</option>

                </select>

               

             



                </div>

            </div>





           

            

          



               <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_add_coseall') }} </label>

                <div class="col-md-4">

              

               



                <select id="close_all_alret" name="close_all_alret">

                   <option value="0" selected>No</option>

                   <option value="1">Yes</option>

                </select>

                



                </div>

            </div>













           



        <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_add_place') }}</label>

                <div class="col-md-4">

              



               <select id="close_in_second" class="form-control input-medium">

                  <option value="0">never close</option>

                  <option value="1">1 second</option>

                  <option value="5">5 seconds</option>

                  <option value="10">10 seconds</option>

              </select>



                </div>

            </div>



          



              <div class="form-group">

                <label class="col-md-3 control-label">font awesome</label>

                <div class="col-md-4">

                    <input type="text" class="form-control" 

                    placeholder="font_awsome" id="font_awsome" name="font_awsome"

                     required  data-error="الرجاء ادخال الرمز" >

                    <div class="help-block with-errors"></div>

                    

                </div>

            </div>



            





            





             



          

            



            <div class="form-group">

                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green">{{ trans('mainpage.add') }}</button>

                    <button type="button" class="btn default">{{ trans('mainpage.cancel') }}</button>

                </div>

            </div>

        



        </div>

    </form>

    <!-- END FORM-->

</div> </div></div>

<meta name="_token" content="{!! csrf_token() !!}" />





@endsection



@section('body')

@include('admin.content.body_full')

@endsection







@section('page_level_plugins_js')

<script src="{{url('/')}}/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

   <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>

@endsection





@section('page_level_scripts_js')

<script src="{{url('/')}}/admin/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>

@endsection







@section('scripts')

<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>

<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>

<script type="text/javascript">



  $(document).ready(function(){

  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

  

});

  

  $(document).ready(function (e) {

$("#add_alerts").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })



 e.preventDefault(); 

    $.ajax({

      url:"{!! URL::asset("/adminpanel/alerts/new_alert_data") !!}",

      data:new FormData($("#add_alerts")[0]),

      dataType:'json',

      async:false,

      type:'POST',

      processData: false,

      contentType: false,

      success:function(e) {

            

            

         

               

            if (e['result'] == 'ok') {

                jSuccess(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                 $('#addmenu_alert').hide();

                 

            }



           else if (e['result'] == 'error')

            {

                  jError(e['response'], {TimeShown: 2000, HorizontalPosition: 'left'});

                   $('#addmenu_alert').hide();

            }





            else

            {

                  jError("حدث خطأ ما", {TimeShown: 2000, HorizontalPosition: 'left'});

            }

       

        

            },

            error: function(e) 

            {

                

              $('#addmenu_alert').show();

              $('#error').empty();

              var error = e.responseJSON;

              $.each(error, function (i, member) {

              for (var i in member) {

              $('#error').append('<li >'+ member[i] +'</li>' );

             }

           });



             jError("حدث خطأ فى عملية الاضافة", {TimeShown: 2000, HorizontalPosition: 'left'});

            }           

       });



  }

            

        }); 

  });



///////////////////////////////////////////////







 



</script>

@endsection









