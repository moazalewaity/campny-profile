@extends('admin.layouts.backend')



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



@section('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid')

@section('page_bar')

<li>

        <a href="#">{{ trans('mainpage.rule_rul_new') }}</a>

        <i class="fa fa-angle-left"></i>

    </li>

@endsection









@section('content')



<div class="row " >

<div class="portlet light ">

    <div class="portlet-title">

<div class="caption">

    <i class="icon-share font-dark"></i>

    <span class="caption-subject font-dark bold uppercase">{{ trans('mainpage.rule_rul_new') }} </span>

</div>

        

    </div>



<div class="portlet-body form">

                                                <!-- BEGIN FORM-->

    <form  class="form-horizontal"  data-toggle="validator" method="post"  id="add_menu" enctype="multipart/form-data" >

     <div class="alert alert-danger" id="addmenu_alert" style="display:none" >

                        <ul id="error"> 

                        </ul>

                        </div>

        

        <div class="form-body">



    

            <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.rule_rul') }}</label>

                <div class="col-md-4">

                    <input type="text" class="form-control" 

                    placeholder="{{ trans('mainpage.rule_rul') }}" id="slug" name="slug"

                     required  data-error="{{ trans('mainpage.rule_rul_pls') }} ">

                    <div class="help-block with-errors"></div>

                    

                </div>

            </div>





            <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.rule_address') }}</label>

                <div class="col-md-4">

                <input type="text" class="form-control" required 

                 placeholder="{{ trans('mainpage.rule_address1') }}" data-error="{{ trans('mainpage.rule_address') }} "  id="title" name="title" >  

                  <div class="help-block with-errors"></div>



                </div>

            </div>





             <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.rule_icon') }}</label>

                <div class="col-md-4">

                <input type="text" class="form-control" required 

                 placeholder="{{ trans('mainpage.rule_icon') }}" data-error="{{ trans('mainpage.rule_link_icon') }}"  id="icon" name="icon" >  

                  <div class="help-block with-errors"></div>



                </div>

            </div>





               <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.rule_link') }}</label>

                <div class="col-md-4">

                <input type="text" class="form-control" required 

                 placeholder="{{ trans('mainpage.rule_link') }}" data-error="{{ trans('mainpage.rule_link_icon') }}"  id="url" name="url" >  

                  <div class="help-block with-errors"></div>



                </div>

            </div>





           

            

          



           <div class="form-group">

            <label class="control-label col-md-3">{{ trans('mainpage.showAlert_process') }}</label>

            <div class="col-md-6">

                <input type="text" class="form-control input-large" name="functions" data-role="tagsinput"> </div>

        </div>







            <div class="form-group">

            <label class="col-md-3 control-label">{{ trans('mainpage.rule_view') }} </label>

            <div class="col-md-9">

                <div class="mt-radio-inline">

                    <label class="mt-radio">

                        <input type="radio" name="visible" id="optionsRadios25" value="1" checked="">{{ trans('mainpage.rule_view1') }}

                        <span></span>

                    </label>

                    <label class="mt-radio">

                        <input type="radio" name="visible" id="optionsRadios26" value="2" checked="">{{ trans('mainpage.rule_view2') }} 

                        <span></span>

                    </label>

                    

                </div>

            </div>

        </div>







            <div class="form-group">

                <label class="col-md-3 control-label">{{ trans('mainpage.rule_sub') }}</label>

                <div class="col-md-4">

               <select class="form-control select2" id="p_id" name="p_id"> 

               <option value="0">{{ trans('mainpage.rule_sub_pls') }}</option>    

               @foreach($menus as $menu) 

               <option value="{{$menu->id}}">{{$menu->title}}</option>

               @endforeach

               </select>

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

  

  $(document).ready(function (e) {

$("#add_menu").validator().on('submit', function(e) {

 



   if (e.isDefaultPrevented()) {

       

    } else {



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        })



 e.preventDefault(); 

    $.ajax({

      url:"{!! URL::asset("/menus") !!}",

      data:new FormData($("#add_menu")[0]),

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









