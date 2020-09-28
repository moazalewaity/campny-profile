@extends('admin.layouts.backend')

@section('title','عرض التنبيه')

@section('page_level_plugins_styles')

   <link href="{{url('/')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

<link href="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" /> 



 <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />



          <link href="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />

       <link href="{{url('/')}}/admin/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />



        <link href="{{url('/')}}/admin/assets/global/plugins/codemirror/lib/codemirror.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/assets/global/plugins/codemirror/theme/neat.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/assets/global/plugins/codemirror/theme/ambiance.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/assets/global/plugins/codemirror/theme/material.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/assets/global/plugins/codemirror/theme/neo.css" rel="stylesheet" type="text/css" />

      



  

@endsection



@section('page_global_styles')

<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<link href="{{url('/')}}/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />



@endsection



@section('page_level_styles')

@endsection





@section('theme_layout_styles')

@endsection

@section('style')

<link rel="stylesheet" href="{{url('/')}}/css/droidarabickufi.css">

<link rel="stylesheet" href="{{url('/')}}/css/jNotify.jquery.css">





<link rel="stylesheet" href="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.css?v=2.1.5"  media="screen">

<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />

<link rel="stylesheet" type="text/css" href="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />

<link rel="stylesheet" href="{{url('/')}}/css/style.css">







 





<style type="text/css">



span {

    font-weight: bold;

    /* overflow-y: hidden; */

    font-size: smaller;

}



@media (min-width: 768px) {

  .modal-dialog {

    width: 600px;

    margin: 30px auto;

  }

 

}



@media (min-width: 992px) {

  .modal-lg {

    width: 900px;

  }

}





@media (min-width: 768px) {

  .modal-xl {

    width: 90%;

   max-width:1200px;

  }

}





    .fancybox-custom .fancybox-skin {

      box-shadow: 0 0 50px #222;

    }



.modal-header {

    padding:9px 15px;

    border-bottom:1px solid #eee;

    background-color: #0480be;

    -webkit-border-top-left-radius: 5px;

    -webkit-border-top-right-radius: 5px;

    -moz-border-radius-topleft: 5px;

    -moz-border-radius-topright: 5px;

     border-top-left-radius: 5px;

     border-top-right-radius: 5px;

 }

   

  



  

</style>

@endsection

@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed')



@section('page_bar')

<li>

        <a href="#">{{ trans('mainpage.showAlert_title') }} </a>

        <i class="fa fa-angle-left"></i>

    </li>



@endsection





@section('content')







 <div class="portlet light bordered"  >                 

 <div class="row">

 <div class="col-md-12">



      <table class="table table-striped table-bordered table-hover" id="sample_1">

                <thead>

                   



                     <tr>

                   

                     <th>{{ trans('mainpage.showAlert_content') }}</th>

                     <th>{{ trans('mainpage.showAlert_type') }}</th>

                     <th>{{ trans('mainpage.showAlert_process') }}</th>

                    

                       

                    </tr>

                </thead>

                <tbody>        

                </tbody>

            </table>



 </div></div></div>







 



<!--==============================================================================-->

<div class="modal fade in" id="alert_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >

     <div class=" modal-dialog modal-xl">

    <div class="modal-content">

     <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">

    ×</span></button>

   <h4 class="modal-title" id="myModalLabel"></h4>

      </div>





    <div class="modal-body " style="background:#eee">







      <div class="portlet light bordered">

<div class="row">

<div class="col-md-12">

 <div class="portlet-title">

        <div class="caption font-dark">

            <i class="icon-settings font-dark"></i>

            <span class="caption-subject bold uppercase">بيانات التنبيه</span>

        </div>

        <hr>

        <div class="tools"> </div>

    <!--==========================================================-->  

       <form  class="form-horizontal"  data-toggle="validator" method="post"  id="edit_alerts" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="addalerts_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>





  

        <div class="form-body">



    

            <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_ocntent') }}</label>

                <div class="col-md-4">

                    <input type="text" class="form-control" 

                    placeholder="{{ trans('mainpage.alerts_ocntent') }}" id="content" name="content"

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

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_add_close') }}</label>

                <div class="col-md-4">

               

                <select id="closable" name="closable">

                   <option value="0" selected>No</option>

                   <option value="1">Yes</option>

                </select>

               

             



                </div>

            </div>





           

            

          



               <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.alerts_add_coseall') }}</label>

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



            



   <div id="put"></div>

   <input type="hidden" id="id">



            





             



          

            



            <div class="form-group">

                <div class="col-md-offset-3 col-md-9">

                    <button type="submit" class="btn green">{{ trans('mainpage.add') }}</button>

                    <button type="button" class="btn default">{{ trans('mainpage.cancel') }}</button>

                </div>

            </div>

        



        </div>

    </form>

     



    <!--===========================================================-->

      </div></div></div></div> 

  <!--===========================================================-->

     <br> <br>

                       </div>

                        <div class="modal-footer">  

                     

                        </div>

                    </div>

                </div>

            </div>





<meta name="_token" content="{!! csrf_token() !!}" />



@endsection



@section('body')

@include('admin.content.body_full')

@endsection







@section('page_level_plugins_js')



<script src="{{url('/')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>

 <script src="{{url('/')}}/admin/assets/global/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>

<script src="{{url('/')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>





 <script src="{{url('/')}}/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>

             <script src="{{url('/')}}/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

             <script src="{{url('/')}}/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>



              <script src="{{url('/')}}/admin/assets/global/plugins/codemirror/lib/codemirror.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/codemirror/mode/javascript/javascript.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/codemirror/mode/htmlmixed/htmlmixed.js" type="text/javascript"></script>

            <script src="{{url('/')}}/admin/assets/global/plugins/codemirror/mode/css/css.js" type="text/javascript"></script>

 



@endsection





@section('page_level_scripts_js')

   <script src="{{url('/')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

    <script src="{{url('/')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>

  @endsection



@section('theme_layout_scripts_js')

@endsection



 







@section('scripts')

<script type="text/javascript" src="{{url('/')}}/js/jNotify.jquery.js"></script>

<script type="text/javascript" src="{{url('/')}}/js/validator.min.js"></script>





<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>

<script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/jquery.fancybox.pack.js?v=2.1.5"></script>



  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

  <script type="text/javascript" src="{{url('/')}}/admin/assets/fancy/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>





<script type="text/javascript">



   $(document).ready(function(){

  $(".page-sidebar-menu").addClass("page-sidebar-menu-closed");

  

});



   

     $("#search").on('submit', function(e) {

        e.preventDefault();



show_data();



});



  show_data();

  function show_data(){

    $('#sample_1').DataTable({

      destroy: true,

      processing: true,

      serverSide: true,

     "pageLength": 10,

     "ajax": {

            "url": '{!! URL::asset("/adminpanel/alerts/show_alert_data") !!}',

            "data": function ( d ) {

         



             }

           },

       columns: [

           

               {data: 'content', name: 'content'},

               {data: 'type', name: 'type'},

               {data:'opration',name:'opration'},

               

             

                 ]





    });

  }

////////////////////////////////////////////////

 function edit(id){

 $('#alert_data').modal('toggle');

 show_alert_data(id);

}



///////////////////////////////////

function show_alert_data(id){

  var url1='{!! URL::asset("/adminpanel/alerts/alert_data/'+id+'") !!}';





     $.get(url1, function (e) {

    





$('#content').val(e[0]['content']);

$('#font_awsome').val(e[0]['font_awsome']);

$('#id').val(e[0]['id']);

jQuery("#edit_alerts").find("#type option[value="+e[0]['type']+"]").attr("selected", true);

jQuery("#edit_alerts").find("#placment option[value="+e[0]['placment']+"]").attr("selected", true);

jQuery("#edit_alerts").find("#closable option[value="+e[0]['closable']+"]").attr("selected", true); 

jQuery("#edit_alerts").find("#close_all_alret option[value="+e[0]['close_all_alret']+"]").attr("selected", true); 

jQuery("#edit_alerts").find("#close_in_second option[value="+e[0]['close_in_second']+"]").attr("selected", true);

$("#put").html('<input type="hidden" name="_method" value="PUT">');





  

  





   

     });



}



////////////////////////////////////////////////////////////////

 $(document).ready(function (e) {

$("#edit_alerts").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })

   var id =$("#id").val();     



 e.preventDefault(); 

    $.ajax({

      url: '{!! URL::asset("/adminpanel/alerts/edit_alert/'+id+'") !!}',

      data:new FormData($("#edit_alerts")[0]),

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







 

  </script>













@endsection













